<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Data_rekanan_perusahaan extends MY_Controller {

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
        $data['content']='v_data_rekanan_perusahaan';
        $this->load->view('../../layout/views/master', $data);
    }

    public function getDataPerusahaan()
    {
        $table = 'tbl_perusahaan_rekanan';
        $result = $this->BaseModel->getAllData($table);
        if (!$result->result_array()) {
            $this->returnJson(
                array(
                    'status' => 'empty',
                    'message' => 'Data slip gaji masih kosong.',
                )
            );
        };

        $this->returnJson(
            array(
                'status' => 'success',
                'message' => 'Proses mengambil data rekanan perusahaan berhasil dilakukan.',
                'data' => $result->result_array()
            )
        );
    }

    public function ajaxInsert()
    {
        $dataInsert = array(
            'nama_perusahaan' => $this->input->post("insert_nama_perusahaan"),
            'alamat_perusahaan' => $this->input->post("insert_alamat_perusahaan")
        );

        $table = 'tbl_perusahaan_rekanan';
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
                'message' => 'Proses penambahan rekanan perusahaan berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function ajaxDelete()
    {
        $idUser = array(
            'id_perusahaan_rekanan' => $this->input->post('id')
        );

        $table = 'tbl_perusahaan_rekanan';
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
                'message' => 'Proses menghapus data rekanan perusahaan berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function getByID()
    {
        $data = array(
            'id_perusahaan_rekanan' => $this->input->post('id'),
        );
        
        $table = 'tbl_perusahaan_rekanan';
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
                'message' => 'Data rekanan perusahaan berhasil ditampilkan.',
                'data' => $result->row()
            )
        );
    }

    public function ajaxUpdate()
    {
        $dataUpdate = array(
            'nama_perusahaan' => $this->input->post("form_edit_nama_perusahaan"),
            'alamat_perusahaan' => $this->input->post("form_edit_alamat_perusahaan"),
        );

        $idPerusahaan = array(
            'id_perusahaan_rekanan' => $this->input->post('idPerusahaan'),
        );
        
        $table = 'tbl_perusahaan_rekanan';
        $insert = $this->BaseModel->EditData($table, $dataUpdate, $idPerusahaan);

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
                'message' => 'Proses memperbarui rekanan perusahaan berhasil dilakukan.',
                'data' => null
            )
        );
    }

}