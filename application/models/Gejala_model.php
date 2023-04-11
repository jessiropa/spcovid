<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala_model extends CI_Model{
    private $_table = "gejala"; // dibuat private karena variabel ini hanya digunakan pada class ini saja

        // function untuk menampilkan semua data gejala
        public function datagejala(){

            // query builder untuk mengambil semua data di dalam tabel gejala dan ditampung dalam sebuah array
            return $this->db->get($this->_table)->result_array();
    
        }

        // function untuk insert data gejala
        public function insertGejala(){

            // array untuk menampung data gejala
            $data =[
                'id_gejala' => $this->input->post('id_gejala', true),
                'nama_gejala' => $this->input->post('nama_gejala', true)
            ];

            // insert data ke dalam tabel gejala
            $this->db->insert($this->_table, $data);
        }
    
        // function untuk update gejala
    public function gantiGejala($data, $id){
        $this->db->where('id_gejala', $id);
        $this->db->update($this->_table, $data);
    }
}