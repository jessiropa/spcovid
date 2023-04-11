<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// controller untuk mengatur tampilan data berupa penyakit, gejala dan basis pengetahuan 
class Pasien extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Pasien_model');
        $this->load->model('Status_model');
    }
    public function index(){
        $data['title'] = 'Riwayat Konsultasi Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['status'] = $this->Status_model->datastatus();
        $data['awal'] = $this->input->post('tgl_awal', true);
        $data['akhir'] = $this->input->post('tgl_akhir', true);
        $tgl_awal = $this->input->post('tgl_awal', true);
        $tgl_akhir = $this->input->post('tgl_akhir', true);
        // var_dump($pilihstatus);
        $data['rekammedis'] = $this->Pasien_model->rm();

        if($tgl_awal != null || $tgl_akhir != null){   
            $data['rekammedis'] = $this->Pasien_model->tglFilter($tgl_awal, $tgl_akhir); 
            $this->load->view('tema/user_header', $data);
            $this->load->view('tema/user_sidebar', $data);
            $this->load->view('tema/user_topbar', $data);
            $this->load->view('pasien/index', $data);
            $this->load->view('tema/user_footer'); 
        }else{
            $data['rekammedis'] = $this->Pasien_model->rm();
            $this->load->view('tema/user_header', $data);
            $this->load->view('tema/user_sidebar', $data);
            $this->load->view('tema/user_topbar', $data);
            $this->load->view('pasien/index', $data);
            $this->load->view('tema/user_footer'); 
        }
    }

    public function pilihStatus(){
        $data['title'] = 'Riwayat Konsultasi Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['status'] = $this->Status_model->datastatus();
        
        $statusfilter = $this->Pasien_model->pilihanStatus();

        if($statusfilter > 0){
            $data = $this->Pasien_model->pilihanStatus();
        }
        else{
            $data = $this->Pasien_model->rm();
        }
        $data['rekammedis'] = $data;

        // $result = $this->db->get_where('rekammedis', ['id_status' => $statusfilter])->result_array();
        // $data['filter'] = $this->db->get_where('rekammedis', ['id_status' => $id])->result_array();

        // if($id == 0){
        //     // $data = $this->Pasien_model->rm();
        //     $data = $this->db->get('rekammedis')->result();
        // }else{
        //     $data = $this->db->get_where('rekammedis', ['id_status' => $id])->result();
        // }

        // $data['filter'] = $data;
        $this->load->view('tema/user_header', $data);
        $this->load->view('tema/user_sidebar', $data);
        $this->load->view('tema/user_topbar', $data);
        $this->load->view('pasien/index', $data);
        $this->load->view('tema/user_footer'); 
    }
}