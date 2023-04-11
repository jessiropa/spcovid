<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Ini adalah controller untuk mengatur tampilan landing page
class General extends CI_Controller {
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
        $this->load->view('general/index', $data);
        $this->load->view('tema/user_footer', $data);
    }
}
