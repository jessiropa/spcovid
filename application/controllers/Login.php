<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 // ini adalah controller untuk mengatur halaman login 
class Login extends CI_Controller {

     // function untuk berisikan form validasi untuk form login dan form registrasi
    public function __construct()
    {
        parent::__construct();  // memanggil method contructor parent di controller utama CI_controller
        $this->load->library('form_validation');  // memanggil library form validasi 
    }

    // function untuk mengatur halaman default login
    public function index(){
        // melakukan pengecekan untuk user yang sudah berhasil login dan tidak bisa kembali ke halaman login selain 
        // melalui logout dan di kembalikan ke menu user profil
        if($this->session->userdata('email')){
            redirect('user/profil');
        }
        // membuat aturan validasi pada setiap baris input pada login 
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Kolom email wajib diisi!',
            'valid_email' => 'Alamat email harus  berformat email!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',[
            'required' => 'Kolom sandi wajib diisi!',
            'min_length' => 'Password minimal 6 karakter!'
        ]);

        // membuat kondisi saat tombol submit login di tekan
        if($this->form_validation->run() == false){ // kondisi kosong
            $data['title'] = 'Login - Sistem Pakar Covid';
            $this->load->view('tema/login_header', $data);
            $this->load->view('login/index');
            $this->load->view('tema/login_footer');
        }else{
            // melakukan validasi login 
            $this->_login(); // memanggil function login untuk validasi data (function bersifat private)
        }
    }

    private function _login(){
        
        // variabel untuk menampung input dari form login
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // melakukan query ke database untuk mengecek data sesuai tidak dengan yang diinput
        $user = $this->db->get_where('user', ['email'=> $email])->row_array();

        // Data email sesuai yang ada dalam database
        if($user){
            // jika ada maka lakukan pemeriksaan kondisi aktif
            if($user['is_active'] == 1){
                // Mengecek password 
                if(password_verify($password, $user['password'])){
                    // Password benar
                        $data = [
                            'id_user' => $user['id_user'],
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];

                        // menampung data array data di session
                        $this->session->set_userdata($data);

                        // melakukan pemeriksaan level pengguna 
                        if($user['role_id'] == 1){
                            redirect('admin');
                        }else{
                            redirect('general');
                        }
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!</div>');
                }
            }else{ // tidak aktif akunnya
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email anda belum diaktivasi!</div>');
            }
            
        }else{ // data tidak ditemukan di database
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email anda tidak terdaftar!</div>');
        }
    }

        // function untuk mengatur halaman registrasi 
    public function registrasi(){
        
        // melakukan pengecekan untuk user yang sudah berhasil login dan tidak bisa kembali ke halaman login selain 
        // melalui logout dan di kembalikan ke menu user profil
        if($this->session->userdata('email')){
            redirect('user/profil');
        }

        // membuat aturan validasi pada setiap baris input pada registrasi beserta pesan error yang ditampilkan
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Kolom Nama wajib diisi!'
        ]);


        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Kolom email wajib diisi!',
            'valid_email' => 'Alamat email harus  berformat email!',
            'is_unique' => 'Email sudah terdaftar!'
        ]);


        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'required' => 'Kolom password wajib diisi!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password minimal 6 karakter!'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        // melakukan kondisi validasi saat tombol submit registrasi di tekan
        if($this->form_validation->run() == false){ // kondisi saat tidak ada inputan 
            $data['title'] = 'Registrasi - Sistem Pakar Covid';
            $this->load->view('tema/login_header', $data);
            $this->load->view('login/registrasi');
            $this->load->view('tema/login_footer');
        } else{  // kondisi saat ada inputan 
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];
        
        // membuat token untuk verifikasi aktivasi akun 
        $token = base64_encode(random_bytes(32)); 
        // menampung data dari tabel user token untuk simpan ke database
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];

            // insert data ke dalam database
            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            // mengirim email untuk melakukan aktivasi
            $this->_sendEmail($token, 'verify'); // _sendEmail merupakan function private

            // pesan berhasil ketika data berhasil ditambahkan ke database
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Akun anda berhasil dibuat. Silakan aktivasi akun anda.</div>');

            // tampilan ketika berhasil insert data ke database 
            redirect('login');
        }
    }

    private function _sendEmail($token, $type){ // sendemail memiliki 2 parameter yaitu token dan tipe yaitu verify dan reset
        // configurasi email 
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'cobajejes@gmail.com',
            'smtp_pass' => 'jcr9700546',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];
        // memanggil library bawaan email dari codeigniter
        $this->load->library('email', $config);
        $this->email->initialize($config);

        // melakukan persiapan untuk pengiriman email 
        $this->email->from('cobajejes@gmail.com', 'Sistem Pakar Covid-19');
        $this->email->to($this->input->post('email'));

        // melakukan kondisi untuk mengirim pesan ke email tujuan 
        if($type == 'verify'){ // kondisi untuk jenis verifikasi untuk aktivasi akun user
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik disini untuk aktivasi akun anda : 
            <a href="'. base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
        }else if($type == 'forgot'){ // kondisi untuk jenis verifikasi untuk lupa password
            $this->email->subject('Reset Password');
            $this->email->message('Klik disini untuk reset kata sandi anda : 
            <a href="'. base_url() . 'login/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Kata Sandi</a>');

        }

        // untuk kondisi email berhasil dikirim 
        if($this->email->send()){
            return true;
        }else{
            echo $this->email->print_debugger();
            die;
        }
    }

    // function untuk verifikasi aktivasi akun user
    public function verify(){
        // mengambil email yang ada di url verifikasi 
        $email = $this->input->get('email');
        // mengambil token yang ada di url verifikasi 
        $token = $this->input->get('token');

        // mengecek email pada database sesuai dengan email yang ada dalam url verifikasi 
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // melakukan pengecekan kondisi email 
        if($user){
        // mengecek token pada database sesuai dengan token yang ada dalam url verifikasi 
        $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            // melakukan pengecekan kondisi token 
            if($user_token){
                // melakukan pengecekan waktu validasi 
                if(time()- $user_token['date_created'] < (60)){
                    // melakukan update pada tabel user 
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]); 
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    '. $email .' telah aktif! Silakan login.</div>');
                    redirect('login');
                } else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Aktivasi akun gagal! Token kedaluwarsa.</div>');
                    redirect('login');
                }
            }else{
                // menghapus user dan token dari database
                $this->db->delete('user', ['email' => $email]);
                $this->db->delete('user_token', ['email' => $email]);

                // pesan 
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Aktivasi akun gagal! Token salah.</div>');
                redirect('login');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi akun gagal! Email salah.</div>');
            redirect('login');
        }
    }

    public function lupapassword(){

        // melakukan validasi data 
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Kolom email wajib diisi!',
            'valid_email' => 'Alamat email harus  berformat email!'
        ]);

        if($this->form_validation->run() == false){
            $data['title'] = 'Lupa Kata Sandi';
            $this->load->view('tema/login_header', $data);
            $this->load->view('login/lupapassword');
            $this->load->view('tema/login_footer');
        }else{
            // menampung data dari form email 
            $email = $this->input->post('email');
            // mengecek data pada database dan form input
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            // melakukan pengecekan kondisi
            if($user){
                // membuat token 
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                // melakukan insert data ke tabel user token 
                $this->db->insert('user_token', $user_token);
                // melakukan pengiriman email dengan type lupa password 
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Silahkan mengecek email anda untuk reset password!</div>');
                redirect('login/lupapassword');

            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email tidak terdaftar atau tidak aktif!</div>');
                redirect('login/lupapassword');
            }
        }

    }

    // function untuk reset password
    public function resetpassword(){
        // mengambil data email dan token pada url 
        $email = $this->input->get('email');
        $token = $this->input->get('token');

         // mengecek email pada database sesuai dengan email yang ada dalam url verifikasi 
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if($user){
            // mengecek token pada database sesuai dengan token yang ada dalam url verifikasi 
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if($user_token){
                // membuat session khusus untuk reset password ketika sudah selesai maka session ini dihapuskan 
                $this->session->set_userdata('reset_email', $email);
                // memanggil function ubah password
                $this->gantipassword();
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Reset kata sandi gagal! Token salah.</div>');
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset kata sandi gagal! Email salah.</div>');
            redirect('auth');
        }
    }

    // function untuk mengganti password
    public function gantipassword(){
        if(!$this->session->userdata('reset_email')){
            redirect('login');
        }

        $this->form_validation->set_rules('password1', 'kata sandi', 'required|trim|min_length[6]|matches[password2]', [
            'required' => 'Kolom password wajib diisi!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password minimal 6 karakter!'
        ]);
        $this->form_validation->set_rules('password2', 'Kata sandi', 'trim|required|min_length[6]|matches[password1]');
        if($this->form_validation->run() == false){
            $data['title'] = 'Ganti Kata Sandi';
            $this->load->view('tema/login_header', $data);
            $this->load->view('login/gantipassword');
            $this->load->view('tema/login_footer');        
        }else{
            // enkripsi password baru 
            $password = password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
            // mengambil data email pengguna dari session 
            $email = $this->session->userdata('reset_email');

            // melakukan query untuk update password 
            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            // menghapus data user token pada tabel token 
            $this->db->delete('user_token', ['email' => $email]); 
            // menghapus session data 
            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kata sandi berhasil diubah! Silakan login.</div>');
            redirect('login');
        }
    }

    // function untuk logout 
    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda berhasil keluar!</div>');
        redirect('login');
    }

    public function bloked(){
        $this->load->view('login/bloked');
    }
}