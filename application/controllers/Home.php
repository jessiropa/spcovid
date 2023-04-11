<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Ini adalah controller untuk mengatur tampilan landing page
class Home extends CI_Controller {
    public function index(){
        $this->load->view('home/index');
        $this->load->view('tema/home_footer');
    }

    public function informasi(){
        $this->load->view('tema/home_header');
        $this->load->view('home/informasi');
        $this->load->view('tema/home_footer');
    }

    public function tentangKami(){
        $this->load->view('tema/home_header');
        $this->load->view('home/tentangkami');
        $this->load->view('tema/home_footer');
    }   
}