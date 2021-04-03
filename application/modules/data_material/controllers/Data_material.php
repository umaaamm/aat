<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Data_material extends MY_Controller {

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
        $data['dataSatuan'] = $this->getSatuanMaterial();
        $data['dataMaterial'] = $this->getMaterial();
        $data['content']='v_data_material';
        $this->load->view('../../layout/views/master', $data);
    }

    private function getMaterial(){
        $table = 'tbl_material';
        $result = $this->BaseModel->getAllData($table);
        if ($result){
            $list = $result->result();
        }
        return $list;
    }

    public function simpan_material(){
        $data['nama_material']=$this->input->post("nama_material");
		$data['harga_material']=$this->input->post("harga_material");
		$data['satuan']=$this->input->post("satuan");

        $insert = $this->BaseModel->insertData('tbl_material', $data);

        if (!$insert) {
			$this->session->set_flashdata("notif","<div class='alert alert-danger'>Data Gagal di simpan</div>");
			header('location:'.base_url().'data_material');
			return;
		}

		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil di simpan</div>");
		header('location:'.base_url().'data_material');
		return;
    }

}