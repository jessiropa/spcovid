<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// controller untuk mengatur tampilan data berupa penyakit, gejala dan basis pengetahuan 
class Data extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // load library model
        // $this->load->model('Penyakit_model');
        $this->load->model('Gejala_model');
        $this->load->model('Pengetahuan_model');
        $this->load->model('Status_model');
    }

    public function index(){
        $data['title'] = 'Status Pasien';
        // mengambil data user yang berada di session 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // menampung data yang dipanggil 
        $data['status'] = $this->Status_model->datastatus();

        // melakukan set aturan pada form validation untuk inputan form
        $this->form_validation->set_rules('id_status', 'Kode Status', 'required|trim', [
            'required' => 'Kode status wajib diisi'
        ]);
        $this->form_validation->set_rules('nama_status', 'Nama status', 'required|trim',[
            'required' => 'Nama status wajib diisi'
        ]);

        // melakukan kondisi dalam insert data 
        if($this->form_validation->run() == false){
            // view halaman penyakit
            $this->load->view('tema/user_header', $data);
            $this->load->view('tema/user_sidebar', $data);
            $this->load->view('tema/user_topbar', $data);
            $this->load->view('data/index', $data);
            $this->load->view('tema/user_footer', $data);
        }else{
            $this->Status_model->tambahStatus();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Status berhasil ditambahkan!</div>');
            redirect('data');
        }
    }

    public function hapusstatus($id){
        $this->db->where('id_status', $id);
        $this->db->delete('status');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data status berhasil dihapus!</div>');
        redirect('data');
    }

    // function untuk edit data penyakit 
    public function editstatus(){
        // menampung nilai dari input id_penyakit
        $id = $this->input->post('id_status');

        // menampung nilai yang diubah
        $data =[
            'id_status' => $this->input->post('id_status', true),
            'nama_status' => $this->input->post('nama_status', true)
            // 'solusi' => $this->input->post('solusi', true)
        ];

        // memanggil model yang memiliki function edit data
        $this->Status_model->gantiStatus($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data status berhasil diubah!</div>');
        redirect('data');
    }

    // function gejala
    public function gejala(){
        $data['title'] = 'Gejala';
        // mengambil data user yang berada di session 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // menampung data yang dipanggil
        $data['gejala'] = $this->Gejala_model->datagejala(); 

        // melakukan validasi terhadap inputan data 
        $this->form_validation->set_rules('id_gejala', 'Kode Gejala', 'required|trim',[
            'required' => 'Kode gejala wajib diisi'
        ]);
        $this->form_validation->set_rules('nama_gejala', 'Nama gejala', 'required|trim', [
            'required' => 'Nama gejala wajib diisi'
        ]);

        // melakukan kondisi untuk insert data gejala 
        if($this->form_validation->run() == false){
            $this->load->view('tema/user_header', $data);
            $this->load->view('tema/user_sidebar', $data);
            $this->load->view('tema/user_topbar', $data);
            $this->load->view('data/gejala', $data);
            $this->load->view('tema/user_footer', $data);
        }else{
            $this->Gejala_model->insertGejala();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data gejala berhasil ditambahkan!</div>');
            redirect('data/gejala');
        }
    }

    // function untuk hapus gejala
    public function hapusgejala($id){
        $this->db->where('id_gejala', $id);
        $this->db->delete('gejala');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Gejala berhasil dihapus!</div>');
        redirect('data/gejala');
    }

    //function untuk edit gejala 
    public function editgejala(){
        // menampung nilai dari input id_penyakit
        $id = $this->input->post('id_gejala');

        // menampung nilai yang diubah
        $data =[
            'id_gejala' => $this->input->post('id_gejala', true),
            'nama_gejala' => $this->input->post('nama_gejala', true)
        ];
        // memanggil model yang memiliki function edit data
        $this->Gejala_model->gantiGejala($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data gejala berhasil diubah!</div>');
        redirect('data/gejala');
        
    }


    public function basispengetahuan(){
        $data['title'] = 'Basis Pengetahuan';
        // mengambil data user yang berada di session 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // menampung data yang dipanggil
        $data['basis_pengetahuan'] = $this->Pengetahuan_model->datapengetahuan();
        // memanggil data dari tabel status untuk ditampilkan pada select option modul tambah basispengetahuan
        $data['status'] = $this->db->get('status')->result_array();

        // memanggil data dari tabel gejala untuk ditampilkan pada select option modul tambah basispengetahuan
        $data['gejala'] = $this->db->get('gejala')->result_array();

        // melakukan set rules form validation untuk input data
        $this->form_validation->set_rules('aturan', 'Kode aturan', 'required|trim');
        $this->form_validation->set_rules('id_status', 'Penyakit', 'required|trim');
        $this->form_validation->set_rules('id_gejala', 'Gejala', 'required|trim');
        $this->form_validation->set_rules('nilaicf', 'Nilai CF', 'required|trim'); 

        // melakukan kondisi untuk insert data 
        if($this->form_validation->run() == false){
        $this->load->view('tema/user_header', $data);
        $this->load->view('tema/user_sidebar', $data);
        $this->load->view('tema/user_topbar', $data);
        $this->load->view('data/basispengetahuan', $data);
        $this->load->view('tema/user_footer', $data);
        }else{
            $this->Pengetahuan_model->insertBasis();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data basis pengetahuan berhasil ditambahkan!</div>');
            redirect('data/basispengetahuan');
        }
    }

    public function hapusbasis($id){
        $this->db->where('id_basis', $id);
        $this->db->delete('basispengetahuan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Basis pengetahuan berhasil dihapus!</div>');
        redirect('data/basispengetahuan');
    }

    public function editbasis(){
        // menampung nilai dari input id_penyakit
        $id = $this->input->post('aturan');

        // menampung nilai yang diubah
        $data =[
            'id_basis' => $this->input->post('aturan', true),
            'id_status' => $this->input->post('id_status', true),
            'id_gejala' => $this->input->post('id_gejala', true),
            'nilai_cf' => $this->input->post('nilaicf', true)
        ];
        // memanggil model yang memiliki function edit data
        $this->Pengetahuan_model->gantiBasis($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data basis pengetahuan berhasil diubah!</div>');
        redirect('data/basispengetahuan');
    }
} 