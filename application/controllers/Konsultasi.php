<?php

use LDAP\Result;

defined('BASEPATH') OR exit('No direct script access allowed');

// Ini adalah controller untuk mengatur tampilan landing page
class Konsultasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Konsul_model');
    }
    public function index(){
        $data['title'] = 'Konsultasi';
        // mengambil data user yang berada di session 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['gejala'] = $this->Konsul_model->semuaGejala();
        $data['kondisi'] = $this->Konsul_model->semuaKondisi();
        $this->load->view('tema/user_header', $data);
        $this->load->view('tema/user_sidebar', $data);
        $this->load->view('tema/user_topbar', $data);
        $this->load->view('konsultasi/index', $data);
        $this->load->view('tema/user_footer');
    }

    public function konsul(){
        // ============== PROSES KONSULTASI DIMULAI ==============
        $arg = array(); // array kosong untuk menampung data gejala
        $inputuser = $this->input->post('cfpasien'); // mengambil dan menampung data inputan data user
        $user = $this->session->userdata['id_user'];

        // kondisi memeriksa input data
        $cekinputan = 0;
        for($i = 0; $i <count($inputuser); $i++){
            if(!empty($inputuser[$i])) {
                $cekinputan++;
            }
        }
        if($cekinputan < 2){
            // echo "Mohon untuk isi jawaban lebih dari 2 gejala";
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Mohon untuk mengisi gejala berdasarkan gejala yang anda alami! <b>(Jawaban wajib lebih dari 2 jawaban)</b> </div>');
            redirect('konsultasi/index');
        }
        // else{
        //     echo "next";
        // }
            for($i = 0; $i <count($inputuser); $i++){
                $arkn = explode("_", $inputuser[$i]);
                // var_dump($arkn);
                if(strlen($inputuser[$i]) > 1){
                    // menampung data gejala dan nilai cf yang di pilih
                    // arkn[0] berisi kode gejala 
                    // arkn[1] berisi nilai cf user (berupa kondisi yang memiliki nilai 0 - 1)
                    $arg += array($arkn[0] => $arkn[1]); 
                    
                }
            }
            
            // var_dump($inputuser);
            //  ========= QUERY TABEL KONDISI =========
            // Menampung data kondisi dari database kemudian ditampung dalam array 
            $kondisiquery = $this->Konsul_model->arrayKondisi();
            foreach($kondisiquery->result_array() as $rykondisi){
                $arrkonname[$rykondisi['id_kondisi']] = $rykondisi['kondisin'];
                $arrkonvalue[$rykondisi['id_kondisi']] = $rykondisi['nilaik'];
            }
    
            // ========= QUERY TABEL STATUS =========
            $statusquery = $this->Konsul_model->queryStatus();
            foreach($statusquery->result_array as $rystatus){
                $arrp[$rystatus['id_status']] = $rystatus['nama_status']; // array menampung nama status
            }
    
            // ============== PERHITUNGAN METODE ==============
            $statussql = $this->Konsul_model->queryStatus();
            $arrstatus= array();

            foreach($statussql->result_array() as $rastatus){
                $kodestatus= $rastatus['id_status'];
                $cf = 0;
    
                $this->db->select('*');
                $this->db->from('basispengetahuan');
                $this->db->where('id_status', $kodestatus);
                $gejalasql = $this->db->get();
                $cfgabungan = 0;
                foreach($gejalasql->result_array() as $ragejala){
                    $gejalacf = $ragejala['nilai_cf']; // nilai cf pakar dari basis pengetahuan
                    $kodegejala = $ragejala['id_gejala']; // id gejala dari basis pengetahuan

    
                    for($i = 0; $i < count($inputuser); $i++){
                        $rakondisi = explode("_", $inputuser[$i]);
                        $gejala = $rakondisi[0];
                        
                        if($kodegejala == $gejala){

                            // Perhitungan CF Sequential\
                            $cf = $gejalacf * $rakondisi[1];
                            // RUMUS CF GABUNGAN 
                            // KONDISI 1
                            if(($cf >= 0) && ($cf * $cfgabungan >= 0)){
                                // CF Gabungan untuk kondisi CFR1 dan CFR2 >= 0
                                $cfgabungan = $cfgabungan + ($cf * (1 - $cfgabungan));
                            }
    
                            // KONDISI 2 
                            if($cf * $cfgabungan < 0){
                                // CF Gabungan untuk kondisi CFR1 dan CFR2 < 0
                                $cfgabungan = ($cfgabungan + $cf) / (1- min(abs($cfgabungan), abs($cf)));
                            }
    
                            // KONDISI 3
                            if(($cf < 0) && ($cf * $cfgabungan >= 0)){
                                // CF Gabungan untuk kondisi salah satu bernilai < 0
                                $cfgabungan = $cfgabungan + ($cf * (1 + $cfgabungan));
                            }
                        }
                    }
                }
                if($cfgabungan > 0){
                    // menampung hasil perhitungan cf combine untuk setiap penyakit
                    // $rapenyakit['id_penyakit'] berisikan id penyakit 
                    // number_format($cfgabungan, 4) berisikan hasil perhitungan cf combine
                    $arrstatus += array($rastatus['id_status'] => number_format($cfgabungan, 4));
                }
            }
    
            // urutkan array status
            arsort($arrstatus);
            // var_dump($arrstatus);
    
            // berisikan data penyakit berupa kode penyakit diurutkan berdasarkan nilai cf terbesar
            $inputstatus = serialize($arrstatus);
            // var_dump($inputstatus);
            // berisikan kumpulan kode gejala yang diinput user berserta nilai cf user
            $inputgejala = serialize($arg);
            // var_dump($inputgejala);
    
            date_default_timezone_set("Asia/Jakarta");
            $tanggalkonsul = date('Y-m-d H:i:s');
            $n = 0;
            foreach($arrstatus as $kodes => $cfhasil){
                $n++;
                
                // menampilkan kode penyakit berdasarkan nilai cf combine terbesar
                $idstatus[$n] = $kodes;
                // menampilkan nilai cf combine berdasarkan urutan nilai terbesar
                $nilaicftotal[$n] = $cfhasil;
            }
            // if($idstatus[1] == null){
            //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            //     Mohon untuk mengisi gejala berdasarkan gejala yang anda alami!</div>');
            //     redirect('konsultasi/index');
            // }
            // var_dump($nilaicftotal[1]);
            $data = [
                'tgl' => $tanggalkonsul,
                'caristatus' => $inputstatus,
                'carigejala' => $inputgejala,
                'id_status' => $idstatus[1],
                'cfhasil' => $nilaicftotal[1],
                'id_user' => $user
            ];
            $this->db->insert('rekammedis', $data);
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            // Data konsultasi berhasil ditambahkan!</div>');
            redirect('konsultasi/riwayat');
    }

    public function riwayat(){
        $data['title'] = 'Riwayat Konsultasi';
        // mengambil data user yang berada di session 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['riwayat'] = $this->Konsul_model->riwayatbyuser();

        $this->load->view('tema/user_header', $data);
        $this->load->view('tema/user_sidebar', $data);
        $this->load->view('tema/user_topbar', $data);
        $this->load->view('konsultasi/riwayat', $data);
        $this->load->view('tema/user_footer');
    }

    // public function hasil(){
    //     $data['title'] = 'Hasil Rekam Medis';
    //     // mengambil data user yang berada di session 
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     // $data['gejala'] = $this->Konsul_model->semuaGejala();
    //     // $data['kondisi'] = $this->Konsul_model->semuaKondisi();
    //     $this->load->view('tema/user_header', $data);
    //     $this->load->view('tema/user_sidebar', $data);
    //     $this->load->view('tema/user_topbar', $data);
    //     $this->load->view('konsultasi/hasil', $data);
    //     $this->load->view('tema/user_footer');
    // }
    
    public function detail($id){
        $data['title'] = 'Detail Hasil Konsultasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail'] = $this->Konsul_model->detail($id);
        $data['kondisi'] = $this->Konsul_model->arrayKondisi();
        $data['status'] = $this->Konsul_model->queryStatus();
        $this->load->view('tema/user_header', $data);
        $this->load->view('tema/user_sidebar', $data);
        $this->load->view('tema/user_topbar', $data);
        $this->load->view('konsultasi/detail', $data);
        $this->load->view('tema/user_footer');
    }
}