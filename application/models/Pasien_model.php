<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model{
    // private $_table = "rekammedis";
    public function rm(){
        $this->db->select('*');    
        $this->db->from('rekammedis'); // tabel 1
        $this->db->join('status', 'rekammedis.id_status = status.id_status'); // tabel 1 dan tabel 2
        $this->db->join('user', 'rekammedis.id_user = user.id_user'); // tabel 1 dan tabel 3
        // $this->db->where('id_user', $user);
        // $this->db->where('tgl BETWEEN"'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_akhir)).'"');
        // $this->db->where('tgl <=', $tgl_akhir);
        $this->db->order_by('tgl','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getStatus(){
     $this->db->distinct();
     $this->db->select('id_status');
     $this->db->order_by('id_status','asc');
     $records = $this->db->get('rekammedis')->result();
     $data = array();

     foreach($records as $record ){
        $data[] = $record->id_status;
     }

     return $data;
    }

    public function tglFilter($tgl_awal, $tgl_akhir){
        $this->db->select('*');    
        $this->db->from('rekammedis'); // tabel 1
        $this->db->join('status', 'rekammedis.id_status = status.id_status'); // tabel 1 dan tabel 2
        $this->db->join('user', 'rekammedis.id_user = user.id_user'); // tabel 1 dan tabel 3
        $this->db->where('tgl BETWEEN"'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_akhir)).'"');
        $this->db->order_by('tgl','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pilihanStatus(){
        $this->db->select('*');    
        $this->db->from('rekammedis'); // tabel 1
        $this->db->join('status', 'rekammedis.id_status = status.id_status'); // tabel 1 dan tabel 2
        $this->db->join('user', 'rekammedis.id_user = user.id_user'); // tabel 1 dan tabel 3
        $query = $this->db->get();
        return $query->result_array();
    }
    public function cetaktgl($start, $end){
        $this->db->select('*');    
        $this->db->from('rekammedis'); // tabel 1
        $this->db->join('status', 'rekammedis.id_status = status.id_status'); // tabel 1 dan tabel 2
        $this->db->join('user', 'rekammedis.id_user = user.id_user'); // tabel 1 dan tabel 3
        $this->db->where('tgl BETWEEN"'. date('Y-m-d', strtotime($start)). '" and "'. date('Y-m-d', strtotime($end)).'"');
        $query = $this->db->get();
        return $query->result_array();
    }
}