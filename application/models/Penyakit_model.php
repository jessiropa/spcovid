<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit_model extends CI_Model{
    private $_table = "status"; // dibuat private karena variabel ini hanya digunakan pada class ini saja

    // function untuk menampilkan semua data penyakit 
    public function datastatus(){

        // query builder untuk mengambil semua data di dalam tabel penyakit dan ditampung dalam sebuah array
        return $this->db->get($this->_table)->result_array();

    }

    // function untuk insert data penyakit ke database
    public function tambahStatus(){

        // array untuk menampung data penyakit
        $data =[
            'id_status' => $this->input->post('id_status', true),
            'nama_status' => $this->input->post('nama_status', true),
            'solusi' => $this->input->post('solusi', true)
        ];

        // insert data ke dalam tabel penyakit 
        $this->db->insert($this->_table, $data);
    }

    //function untuk hapus data penyakit dari database
    // function ini menerima id dari data penyakit yang ingin dihapus
    // public function deletePenyakit($id){
    //     $this->db->where('id', $id);
    //     $this->db->delete($this->_table);
    // }

    public function gantiPenyakit($data, $id){
        $this->db->where('id', $id);
        $this->db->update($this->_table, $data);
    }
}