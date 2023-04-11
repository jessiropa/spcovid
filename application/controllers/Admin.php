<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// controller untuk mengatur tampilan pada sisi admin
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Jumlah_model'); // load model untuk hitung jumlah data
    }

    public function index(){
        $data['title'] = 'Dashboard';
        // mengambil data user yang berada di session 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // menampung data penyakit yang dipanggil
        $data['penyakit'] = $this->Jumlah_model->total_status();
        // menampung data gejala yang dipanggil
        $data['gejala'] = $this->Jumlah_model->total_gejala();

        $this->load->view('tema/user_header', $data);
        $this->load->view('tema/user_sidebar', $data);
        $this->load->view('tema/user_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('tema/user_footer', $data);
    }
}