<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsul_model extends CI_Model{
    // private $_table = "gejala";

    // function untuk menampilkan semua data gejala
    public function semuaGejala(){
        $query = $this->db->query("SELECT * FROM gejala");
        foreach($query->result_array() as $baris){
            $gejala[] = $baris;
        }
        // query di atas menggantikan query struktual yang biasanya seperti berikut
        // $query = mysqli_query($koneksi, "query select data");
        // while ($row = mysqli_fetch_array($query))
        //    #statment
        // }
        return $gejala;
    }

    public function semuaKondisi(){
        $this->db->select('*');
        $this->db->from('kondisi');
        $qk = $this->db->get();
        foreach($qk->result_array() as $ark){
            $kondisi[] = $ark;
        }
        return $kondisi;
    }

    public function arrayKondisi(){
        // Query untuk menampung data kondisi dari database dalam bentuk array
        $qk = $this->db->query("SELECT * FROM kondisi");
        return $qk;
        // foreach($qk->result_array() as $rykondisi){
        //     $arrkonname[$rykondisi['id_kondisi']] = $rykondisi['kondisin'];
        //     $arrkonvalue[$rykondisi['id_kondisi']] = $rykondisi['nilaik'];
        // }
        // return $arrkonname;
    }

    // public function arrayPenyakit(){
    //     // Query untuk menampung data penyakit dari database dalam bentuk array
    //     $qp = $this->db->query("SELECT * FROM penyakit ORDER BY id");
    //     return $qp;
    //     // foreach($qp->result_array() as $dp){
    //     //     $arrp[$dp['id']] = $dp['nama_penyakit']; // array menampung nama penyakit
    //     //     $arrps[$dp['id']] = $dp['solusi']; // array menampung solusi penyakit
    //     // }
    // }

    public function queryStatus(){
        // query tabel penyakit
        $this->db->select('*');
        $this->db->from('status');
        $this->db->order_by('id_status', 'ASC');
        $dpsql = $this->db->get();
        return $dpsql;
    }
    // buat function untuk forward chaining 
    // public function diagnosaPenyakit(){ 

        // Perhitungan CF
        // // return $dpsql->result_array();
    // }

    public function riwayatbyuser(){
        $user = $this->session->userdata['id_user'];
        $this->db->select('*');    
        $this->db->from('rekammedis'); // tabel 1
        $this->db->join('status', 'rekammedis.id_status = status.id_status'); // tabel 1 dan tabel 2
        // $this->db->join('user', 'rekammedis.id_user = user.id_user'); // tabel 1 dan tabel 3
        $this->db->where('id_user', $user);
        $this->db->order_by('tgl','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail($id){
        // return $this->db->get_where('rekammedis', ['id_rm' => $id])->row_array();
        $this->db->where('id_rm', $id);
        $rm = $this->db->get('rekammedis');
        return $rm;
    }
}