<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
        $data['content']='v_home';
        $this->load->view('../../layout/views/master', $data);
    }
}