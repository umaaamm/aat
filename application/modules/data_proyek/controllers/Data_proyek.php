<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Data_proyek extends MY_Controller {

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
        $data['getPt'] = $this->getNamaPT();
        $data['getProyek'] = $this->getProyek();
        $data['content']='v_data_proyek';
        $this->load->view('../../layout/views/master', $data);
    }

    private function getProyek(){
        $table = 'tbl_proyek';
        $result = $this->BaseModel->getAllData($table);
        if ($result){
            $list = $result->result();
        }
        return $list;
    }

}