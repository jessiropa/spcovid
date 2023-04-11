<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index(){
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required', [
            'required' => 'Nama menu wajib diisi'
        ]);

        
        if($this->form_validation->run() == false){
            $this->load->view('tema/user_header', $data);
            $this->load->view('tema/user_sidebar', $data);
            $this->load->view('tema/user_topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('tema/user_footer'); 
        }else{
            $this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu berhasil ditambahkan!</div>');
            redirect('menu');
        }

    }

    public function submenu(){
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // load data dari model Menu Model 
        $this->load->model('Menu_model', 'menu');
 
        // mengambil data dari model menu 
        $data['subMenu'] = $this->menu->getSubMenu();
        
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('judul', 'Title', 'required|trim');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim');
        $this->form_validation->set_rules('url', 'URL', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim'); 

        if($this->form_validation->run() == false){
            $this->load->view('tema/user_header', $data);
            $this->load->view('tema/user_sidebar', $data);
            $this->load->view('tema/user_topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('tema/user_footer');
        }else{
            $data =[
                'judul' => $this->input->post('judul'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Submenu berhasil ditambahkan!</div>');
            redirect('menu/submenu');
        }
    }

    public function role(){
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required', [
            'required' => 'Nama menu wajib diisi'
        ]);

        
        if($this->form_validation->run() == false){
            $this->load->view('tema/user_header', $data);
            $this->load->view('tema/user_sidebar', $data);
            $this->load->view('tema/user_topbar', $data);
            $this->load->view('menu/role', $data);
            $this->load->view('tema/user_footer'); 
        }else{
            $this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu berhasil ditambahkan!</div>');
            redirect('menu');
        }
    }
    public function roleakses($role_id){
        $data['title'] = 'Role Akses';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('tema/user_header', $data);
        $this->load->view('tema/user_sidebar', $data);
        $this->load->view('tema/user_topbar', $data);
        $this->load->view('menu/roleakses', $data);
        $this->load->view('tema/user_footer'); 
    }

    public function gantiakses(){
        // menampung data menu id dan role id dari ajax
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        // menampung data yang akan di input ke database
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        // query ke database untuk menambah data namun melihat kondisi
        $result = $this->db->get_where('user_access_menu', $data);

        // kondisi jika data tidak ada dalam tabel
        if($result->num_rows() < 1){
            // data role akan di tambahkan ke dalam database
            $this->db->insert('user_access_menu', $data);
        }else{
            // jika ada maka data role akan di hapus dari database
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Akses berhasil diubah!</div>');
    }

    //function untuk menghapus menu
    public function hapusmenu($id){
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu berhasil dihapus!</div>');
        redirect('menu');
    }

    public function editmenu(){
        // menampung nilai dari input hidden 
        $id = $this->input->post('id');

        // menampung nilai yang diubah
        $data = [
            'menu' => $this->input->post('menu')
        ];

        // melakukan query untuk update data
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu berhasil diedit!</div>');
        redirect('menu');
    }
    public function editsubmenu(){
        // menampung nilai dari input hidden 
        $id = $this->input->post('id');

        // menampung nilai yang diubah
        $data = [
            'id' => $this->input->post('id'),
            'menu_id' => $this->input->post('menu'),
            'judul' => $this->input->post('judul'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('aktif'),
        ];

        // melakukan query untuk update data
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Submenu berhasil diedit!</div>');
        redirect('menu/submenu');
    }

    public function hapussubmenu($id){
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Submenu berhasil dihapus!</div>');
        redirect('menu/submenu');
    }
}