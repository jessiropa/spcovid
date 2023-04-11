<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jumlah_model extends CI_Model{

    function total_status(){
        return $this->db->get('status')->num_rows();
    }
    function total_gejala(){
        return $this->db->get('gejala')->num_rows();
    }
}