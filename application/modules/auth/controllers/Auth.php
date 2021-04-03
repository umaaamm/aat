<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['content']='v_auth';
        $this->load->view('../../layout/views/master_auth', $data);
    }

    public function authentification()
    {
        $data['username'] = $this->input->post('username');
        $data['password'] = md5($this->input->post('password'));
        $session        = null;

        $payload = array(
            'email' => $data['username']
        );

        $getUser = $this->BaseModel->getWhere('tbl_user', $payload, 1)->row();
        
        if (!$getUser) {
			$this->session->set_flashdata("notif","<div class='alert alert-danger'>Username yang anda masukkan salah !</div>");
			header('location:'.base_url().'auth');
			return;
		}

        if ($data['password'] !== $getUser->password) {
            $this->session->set_flashdata("notif","<div class='alert alert-danger'>Password yang anda masukkan salah !</div>");
			header('location:'.base_url().'auth');
			return;
        }
        
        $session = array(
            'username'   => $getUser->nama,
            'user_role' => $getUser->role,
            'email' => $getUser->email,
            'isLogin' => true
        );

        $this->session->set_userdata($session);
        redirect(base_url('home'));
    }

    function logout(){
		$this->session->sess_destroy();
		header('location:'.base_url().'auth');
		return;
	}
}