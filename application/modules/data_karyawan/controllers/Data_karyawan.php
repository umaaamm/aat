<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Data_karyawan extends CI_Controller {

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
        $data['dataKaryawan'] = $this->getKaryawan();
        $data['content']='v_data_karyawan';
        $this->load->view('../../layout/views/master', $data);
    }

    private function getKaryawan(){
        $table = 'data_karyawan';
        $result = $this->BaseModel->getAllData($table);
        if ($result){
            $list = $result->result();
        }
        return $list;
    }

}