<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index()
    {
        $data['content']='v_home';
        $this->load->view('../../layout/views/master', $data);
    }
}