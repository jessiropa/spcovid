<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// controller untuk mengatur tampilan pada sisi user
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index(){
        $data['title'] = 'Dashboard';
        // mengambil data user yang berada di session 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tema/user_header', $data);
        $this->load->view('tema/user_sidebar', $data);
        $this->load->view('tema/user_topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('tema/user_footer', $data);
    }
    public function profil(){
        $data['title'] = 'Profil Saya';
        // mengambil data user yang berada di session 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // var_dump($data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array());
        // $datauser = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // // var_dump('email' => $this->session->userdata('email'));
        // // $user = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->result();
        // $userdata = $this->session->userdata['email'];
        // var_dump($userdata);
        $this->load->view('tema/user_header', $data);
        $this->load->view('tema/user_sidebar', $data);
        $this->load->view('tema/user_topbar', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('tema/user_footer', $data);
    }

    public function edit(){
        $data['title'] = 'Edit Profil';
        // mengambil data user yang berada di session 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'nama lengkap', 'required|trim', [
            'required' => 'Kolom Nama wajib diisi!'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('tema/user_header', $data);
            $this->load->view('tema/user_sidebar', $data);
            $this->load->view('tema/user_topbar', $data);
            $this->load->view('user/editprofil', $data);
            $this->load->view('tema/user_footer', $data);
        }else{
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            // cek jika ada foto baru yang akan diupload 
            $upload_foto = $_FILES['image']['name'];

            // kondisi ketika ada file yang akan diupload 
            if($upload_foto){
                // dilakukan pengecekan terhadap file yang akan diupload
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/admin/img/profile/';

                // memanggil library upload dari codeigniter untuk upload. 
                $this->load->library('upload', $config);

                // melakukan kondisi untuk upload 
                if($this->upload->do_upload('image')){ // 'image' diambil dari form browse file 
                    // variabel untuk menampung data nama gambar lama
                    $foto_lama = $data['user']['image'];

                    // melakukan pemeriksaan terhadap foto lama dan foto default
                    if($foto_lama != 'default.jpg'){
                        // foto lama akan dihapus dan digantikan foto baru
                        unlink(FCPATH . '/assets/admin/img/profile/'.$foto_lama);
                    }

                    // mengambil nama gambar baru yang sudah di upload 
                    $foto_baru = $this->upload->data('file_name');
                    // jika ada gambar baru maka nama foto baru akan di set ulang
                    $this->db->set('image', $foto_baru);
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user/profil');
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            // query untuk mengupdate data terbaru
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Profil anda berhasil diubah</div>');
            redirect('user/profil');
        }
    }

    public function gantipassword(){
        $data['title'] = 'Ganti Kata Sandi';
        // mengambil data user yang berada di session 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // membuat aturan / rule untuk setiap form inputan 
        $this->form_validation->set_rules('passwordlama', 'Kata sandi sebelumnya', 'required|trim', [
            'required' => 'Kolom password sebelumnya wajib diisi!',
        ]);
        $this->form_validation->set_rules('passwordbaru1', 'Kata sandi baru', 'required|trim|min_length[6]|matches[passwordbaru2]', [
            'required' => 'Kolom password wajib diisi!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password minimal 6 karakter!'
        ]);
        $this->form_validation->set_rules('passwordbaru2', 'Ulangi kata sandi baru', 'required|trim|min_length[6]|matches[passwordbaru1]', [
            'required' => 'Kolom password wajib diisi!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password minimal 6 karakter!'
        ]);
        if($this->form_validation->run() == false){
            $this->load->view('tema/user_header', $data);
            $this->load->view('tema/user_sidebar', $data);
            $this->load->view('tema/user_topbar', $data);
            $this->load->view('user/gantipassword', $data);
            $this->load->view('tema/user_footer', $data);
        }else{
             // melakukan pengecekan password lama apakah sesuai yang ada di database dan yang diinput user
             $passwordlama = $this->input->post('passwordlama');
             // melakukan pengecekan password baru dan password lama
             $passwordbaru = $this->input->post('passwordbaru1');
             // kondisi pemeriksaan password
             if(!password_verify($passwordlama, $data['user']['password'])){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password anda salah!</div>');
                redirect('user/gantipassword');
             }else{
                 // melakukan pengecekan password baru dan password lama tidak boleh sama
                 if($passwordlama == $passwordbaru){ // kondisi jika password baru sama seperti password lama
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password tidak boleh sama dengan password sebelumnya!</div>');
                    redirect('user/gantipassword');
                 }else{
                     // lolos pengecekan (password baru berbeda dengan password lama)
                     $password_hash = password_hash($passwordbaru, PASSWORD_DEFAULT);

                     // melakukan query update password 
                     $this->db->set('password', $password_hash);
                     $this->db->where('email', $this->session->userdata['email']);
                     $this->db->update('user');
                     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                     Password berhasil diubah!</div>');
                     redirect('user/gantipassword');
                 }
             }
        }
    }
}