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

    public function getDataMaterial()
    {
        $result = $this->db->query("select * from tbl_material INNER JOIN tbl_satuan ON tbl_material.satuan = tbl_satuan.id_satuan");
        if ($result->result_array()) {
            $this->returnJson(
                array(
                    'status' => 'success',
                    'message' => 'Proses mengambil data material berhasil dilakukan.',
                    'data' => $result->result_array()
                )
            );
        };
    }

    public function ajaxInsert()
    {
        $dataInsert = array(
            'nama_material' => $this->input->post("insert_nama_material"),
            'harga_material' => $this->input->post("insert_harga_material"),
            'satuan' => $this->input->post("insert_satuan_material")
        );

        $table = 'tbl_material';
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
                'message' => 'Proses penambahan data material berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function ajaxDelete()
    {
        $idUser = array(
            'id_material' => $this->input->post('id')
        );

        $table = 'tbl_material';
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
                'message' => 'Proses menghapus data material berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function getByID()
    {
        $data = array(
            'id_material' => $this->input->post('id'),
        );
        
        $table = 'tbl_material';
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
                'message' => 'Data material berhasil ditampilkan.',
                'data' => $result->row()
            )
        );
    }

    public function ajaxUpdate()
    {
        $dataUpdate = array(
            'nama_material' => $this->input->post("form_edit_nama_material"),
            'harga_material' => $this->input->post("form_edit_harga_material"),
            'satuan' => $this->input->post("form_edit_id_satuan")
        );

        $idMaterial = array(
            'id_material' => $this->input->post('idMaterial')
        );
        
        $table = 'tbl_material';
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
                'message' => 'Proses memperbarui data material berhasil dilakukan.',
                'data' => null
            )
        );
    }

}