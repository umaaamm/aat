<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Kelola_super_admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('isLogin')) {
			header('location:'.base_url().'auth');
            return;
		}
    }

    public function index()
    {
        $data['dataSuperAdmin'] = $this->getSuperAdmin();
        $data['content']='v_kelola_super_admin';
        $this->load->view('../../layout/views/master', $data);
    }

    private function getSuperAdmin()
    {
        $table = 'tbl_user';
        $result = $this->BaseModel->getAllData($table);
        if ($result){
            $list = $result->result_array();
        }

        return $list;
    }

    public function insertSuperAdmin()
    {
        $data['nama']=$this->input->post("nama");
		$data['email']=$this->input->post("email");
		$data['no_hp']=$this->input->post("no_hp");
		$data['password']=$this->input->post("password");
		$data['alamat']=$this->input->post("alamat");;
		$data['role']=1;

        $insert = $this->BaseModel->insertData('tbl_user', $data);

        if (!$insert) {
			$this->session->set_flashdata("notif","<div class='alert alert-danger'>Data Gagal di simpan</div>");
			header('location:'.base_url().'kelola_super_admin');
			return;
		}

		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil di simpan</div>");
		header('location:'.base_url().'kelola_super_admin');
		return;
    }
}