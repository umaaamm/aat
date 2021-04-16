<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_super_admin extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('isLogin')) {
            header('location:' . base_url() . 'auth');
            return;
        }
    }

    public function index()
    {
        $data['content'] = 'v_kelola_super_admin';
        $this->load->view('../../layout/views/master', $data);
    }

    public function getSuperAdmin()
    {
        $table = 'tbl_user';
        $result = $this->BaseModel->getAllData($table);

        if (!$result->result_array()) {
            $this->returnJson(
                array(
                    'status' => 'error',
                    'message' => 'Sistem gagal menampilkan data, silahkan mengulangi beberapa saat lagi.',
                    'data' => null
                )
            );
        }

        $this->returnJson(
            array(
                'status' => 'success',
                'message' => 'Proses mengambil data super admin berhasil dilakukan.',
                'data' => $result->result_array()
            )
        );
    }

    public function getByID()
    {
        $data = array(
            'id_user' => $this->input->post('id'),
        );
        
        $table = 'tbl_user';
        $result = $this->BaseModel->getWhere($table, $data, '1');

        if (!$result->result_array()) {
            $this->returnJson(
                array(
                    'status' => 'error',
                    'message' => 'Sistem gagal menampilkan data, silahkan mengulangi beberapa saat lagi.',
                    'data' => null
                )
            );
        }

        $this->returnJson(
            array(
                'status' => 'success',
                'message' => 'Proses penambahan data super admin berhasil dilakukan.',
                'data' => $result->row()
            )
        );
    }

    public function ajaxInsert()
    {
        $dataInsert = array(
            'nama' => $this->input->post("insert_nama"),
            'email' => $this->input->post("insert_email"),
            'no_hp' => $this->input->post("insert_hp"),
            'password' => md5($this->input->post("insert_password")),
            'alamat' => $this->input->post("insert_alamat"),
            'role' => 1,
        );

        $table = 'tbl_user';
        $insert = $this->BaseModel->insertData($table, $dataInsert);

        if (!$insert) {
            $this->returnJson(
                array(
                    'status' => 'error',
                    'message' => 'Sistem gagal menambahkan data, silahkan mengulangi beberapa saat lagi.',
                    'data' => null
                )
            );
        }

        $this->returnJson(
            array(
                'status' => 'success',
                'message' => 'Proses penambahan data super admin berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function ajaxUpdate()
    {
        $dataUpdate = array(
            'nama' => $this->input->post("editNamaForm"),
            'email' => $this->input->post("editEmailForm"),
            'no_hp' => $this->input->post("editNoHPForm"),
            'password' => md5($this->input->post("editPasswordForm")),
            'alamat' => $this->input->post("editAlamatForm"),
            'role' => $this->input->post("roleUser"),
        );

        $idUser = array(
            'id_user' => $this->input->post('idUser')
        );

        $table = 'tbl_user';
        $insert = $this->BaseModel->EditData($table, $dataUpdate, $idUser);

        if (!$insert) {
            $this->returnJson(
                array(
                    'status' => 'error',
                    'message' => 'Sistem gagal memperbarui data, silahkan mengulangi beberapa saat lagi.',
                    'data' => null
                )
            );
        }

        $this->returnJson(
            array(
                'status' => 'success',
                'message' => 'Proses memperbarui data super admin berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function ajaxDelete()
    {
        $idUser = array(
            'id_user' => $this->input->post('id')
        );

        $table = 'tbl_user';
        $delete = $this->BaseModel->DeleteData($table, $idUser);

        if (!$delete) {
            $this->returnJson(
                array(
                    'status' => 'error',
                    'message' => 'Sistem gagal menghapus data, silahkan mengulangi beberapa saat lagi.',
                    'data' => null
                )
            );
        }

        $this->returnJson(
            array(
                'status' => 'success',
                'message' => 'Proses menghapus data super admin berhasil dilakukan.',
                'data' => null
            )
        );
    }
}
