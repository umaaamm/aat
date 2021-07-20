<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Data_karyawan extends MY_Controller {

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
        $data['content']='v_data_karyawan';
        $this->load->view('../../layout/views/master', $data);
    }

    public function getDataKaryawan(){
        $table = 'data_karyawan';
        $result = $this->BaseModel->getAllData($table);
        if (!$result->result_array()){
            $this->returnJson(
                array(
                    'status' => 'empty',
                    'message' => 'Data karyawan masih kosong.',
                )
            );
        }
        
        if ($result->result_array()) {
            $this->returnJson(
                array(
                    'status' => 'success',
                    'message' => 'Proses mengambil data karyawan berhasil dilakukan.',
                    'data' => $result->result_array()
                )
            );
        };
    }

    public function ajaxInsert()
    {
        $dataInsert = array(
            'nama_karyawan' => $this->input->post("insert_nama_karyawan"),
            'no_hp_karyawan' => $this->input->post("insert_no_hp_karyawan"),
            'alamat_karyawan' => $this->input->post("insert_alamat_karyawan")
        );

        $table = 'data_karyawan';
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
                'message' => 'Proses penambahan data karyawan berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function ajaxDelete()
    {
        $idUser = array(
            'id_karyawan' => $this->input->post('id')
        );

        $table = 'data_karyawan';
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
                'message' => 'Proses menghapus data karyawan berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function getByID()
    {
        $data = array(
            'id_karyawan' => $this->input->post('id'),
        );
        
        $table = 'data_karyawan';
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
                'message' => 'Data karyawan berhasil ditampilkan.',
                'data' => $result->row()
            )
        );
    }

    public function ajaxUpdate()
    {
        $dataUpdate = array(
            'nama_karyawan' => $this->input->post("edit_nama_karyawan"),
            'alamat_karyawan' => $this->input->post("edit_alamat_karyawan"),
            'no_hp_karyawan' => $this->input->post("edit_no_hp_karyawan")
        );

        $idMaterial = array(
            'id_karyawan' => $this->input->post('idKaryawan')
        );
        
        $table = 'data_karyawan';
        $insert = $this->BaseModel->EditData($table, $dataUpdate, $idMaterial);

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
                'message' => 'Proses memperbarui data karyawan berhasil dilakukan.',
                'data' => null
            )
        );
    }
}