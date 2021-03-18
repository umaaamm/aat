<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$data['dataSuperAdmin'] = $this->db->query("select * from tbl_user")->result_array();;
		$data['content']='module/Admin/admin';
		$this->load->view('layout/master',$data);
	}

	public function saveSuperAdmin(){
		$data['nama']=$this->input->post("nama");
		$data['email']=$this->input->post("email");
		$data['no_hp']=$this->input->post("no_hp");
		$data['password']=$this->input->post("password");
		$data['alamat']=$this->input->post("alamat");;
		$data['role']=1;

		$simpan = $this->BaseModel->TambahData('tbl_user', $data);

		if (!$simpan) {
			$this->session->set_flashdata("notif","<div class='alert alert-danger'>Data Gagal di simpan</div>");
			header('location:'.base_url().'kelola_admin');
			return;
		}

		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil di simpan</div>");
		header('location:'.base_url().'kelola_admin');
		return;
	}
}
