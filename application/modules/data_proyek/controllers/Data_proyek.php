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
        $data['getPerusahaanRekanan'] = $this->getRekananPerusahaan();
        $data['getProyek'] = $this->getProyek();
        $data['content']='v_data_proyek';
        $this->load->view('../../layout/views/master', $data);
    }

    public function getProyek(){
        $table = 'tbl_proyek';
        $result = $this->db->query('select * from tbl_proyek join tbl_pt on tbl_proyek.id_pt = tbl_pt.id_pt');
        if ($result){
            $list = $result->result();
        }
        return $list;
    }

    public function getRekananPerusahaan(){
        $result = $this->db->query('select * from tbl_perusahaan_rekanan');
        if ($result){
            $list = $result->result();
        }
        return $list;
    }

    public function getDataProyek()
    {
        $table = 'tbl_proyek';
        $result = $this->db->query('select * from tbl_proyek join tbl_pt on tbl_proyek.id_pt = tbl_pt.id_pt join tbl_perusahaan_rekanan on tbl_proyek.id_perusahaan_rekanan = tbl_perusahaan_rekanan.id_perusahaan_rekanan');
        if ($result->result_array()) {
            $this->returnJson(
                array(
                    'status' => 'success',
                    'message' => 'Proses mengambil data proyek berhasil dilakukan.',
                    'data' => $result->result_array()
                )
            );
        };
    }

    public function ajaxInsert()
    {
        $dataInsert = array(
            'nama_proyek' => $this->input->post("insert_nama_proyek"),
            'alamat_proyek' => $this->input->post("insert_alamat_proyek"),
            'nama_pic' => $this->input->post("insert_nama_pic_proyek"),
            'no_hp_pic' => $this->input->post("insert_no_hp_pic_proyek"),
            'id_pt' => $this->input->post("insert_id_pt"),
            'id_perusahaan_rekanan' => $this->input->post("insert_id_rekanan_perusahaan")
        );


        // var_dump($dataInsert); die();

        $table = 'tbl_proyek';
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
                'message' => 'Proses penambahan data proyek berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function ajaxDelete()
    {
        $idUser = array(
            'id_proyek' => $this->input->post('id')
        );

        $table = 'tbl_proyek';
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
                'message' => 'Proses menghapus data proyek berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function getByID()
    {
        $data = array(
            'id_proyek' => $this->input->post('id'),
        );
        
        $table = 'tbl_proyek';
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
                'message' => 'Proses penambahan data proyek berhasil dilakukan.',
                'data' => $result->row()
            )
        );
    }

    public function ajaxUpdate()
    {
        $dataUpdate = array(
            'nama_proyek' => $this->input->post("form_edit_nama_proyek"),
            'alamat_proyek' => $this->input->post("form_edit_alamat_proyek"),
            'nama_pic' => $this->input->post("form_edit_nama_pic"),
            'no_hp_pic' => $this->input->post("form_edit_no_hp_pic"),
            'id_pt' => $this->input->post("form_edit_id_pt"),
            'id_perusahaan_rekanan' => $this->input->post("edit_id_rekanan_perusahaan"),
        );

        $idMaterial = array(
            'id_proyek' => $this->input->post('idProyek')
        );

        // print($dataUpdate);die();
        $table = 'tbl_proyek';
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
                'message' => 'Proses memperbarui data proyek berhasil dilakukan.',
                'data' => null
            )
        );
    }

}