<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengetahuan_model extends CI_Model{
    private $_table = "basispengetahuan"; // dibuat private karena variabel ini hanya digunakan pada class ini saja

    // function untuk menampilkan semua data basis pengetahuan
    public function datapengetahuan(){

        // query untuk melakukan inner join dari 3 tabel
        $this->db->select('*');    
        $this->db->from('basispengetahuan'); // tabel 1
        $this->db->join('status', 'basispengetahuan.id_status = status.id_status'); // tabel 1 dan tabel 2
        $this->db->join('gejala', 'basispengetahuan.id_gejala = gejala.id_gejala'); // tabel 1 dan tabel 3
        $query = $this->db->get();
        return $query->result_array(); // result_array() digunakan karena data yang ditampilkan lebih banyak dari 1 baris

    }

    public function insertBasis(){
        // array untuk menampung data basis pengetahuan
        $data =[
            'id_basis' => $this->input->post('aturan', true),
            'id_status' => $this->input->post('id_status', true),
            'id_gejala' => $this->input->post('id_gejala', true),
            'nilai_cf' => $this->input->post('nilaicf', true)
        ];
        // insert data ke dalam tabel basis pengetahuan
        $this->db->insert($this->_table, $data);
    }

    public function gantiBasis($data, $id){
        $this->db->where('id_basis', $id);
        $this->db->update($this->_table, $data);
    }
}