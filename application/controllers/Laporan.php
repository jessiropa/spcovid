<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Laporan extends CI_Controller {
    public function __construct()
        {   
            parent::__construct();
            $this->load->library('Pdf');
            $this->load->model('Konsul_model');
            $this->load->model('Pasien_model');
        }
        
    public function cetak_rm($id){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail'] = $this->Konsul_model->detail($id);
        $data['kondisi'] = $this->Konsul_model->arrayKondisi();
        // $data['penyakit'] = $this->Konsul_model->queryPenyakit();
        $data['status'] = $this->Konsul_model->queryStatus();

        $this->load->view('konsultasi/cetakhasil', $data);

    }

    public function cetak_rpall(){
        $data['rekammedis'] = $this->Pasien_model->pilihanStatus();
        $this->load->view('pasien/cetakall', $data);
        
    }

    public function cetak_tgl(){
        $start = $this->input->post('awal', true);
        $end = $this->input->post('akhir', true);

        $data['cetak'] = $this->Pasien_model->cetaktgl($start, $end);
        $this->load->view('pasien/cetaktgl', $data);
    }
}