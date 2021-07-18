<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Data_alat extends MY_Controller {
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
        $data['dataKondisi'] = $this->getKondisiAlat();
        $data['content']='v_data_alat';

        $this->load->view('../../layout/views/master', $data);
    }

    public function getDataAlat() {
        $result = $this->db->query("select * from tbl_alat INNER JOIN tbl_kondisi_alat ON tbl_alat.kondisi_alat = tbl_kondisi_alat.id_kondisi");
        if ($result->result_array()) {
            $this->returnJson(
                array(
                    'status' => 'success',
                    'message' => 'Proses mengambil data alat berhasil dilakukan.',
                    'data' => $result->result_array()
                )
            );
        };
    }

    public function ajaxInsert()
    {
        $dataInsert = array(
            'merk_alat' => $this->input->post("insert_merk_alat"),
            'tahun_beli' => $this->input->post("insert_tahun_beli"),
            'seri_alat' => $this->input->post("insert_seri_alat"),
            'jumlah_alat' => $this->input->post("insert_jumlah_alat"),
            'kondisi_alat' => $this->input->post("insert_kondisi_alat")
        );

        $table = 'tbl_alat';
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
                'message' => 'Proses penambahan data alat berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function ajaxDelete()
    {
        $idUser = array(
            'id_alat' => $this->input->post('id')
        );

        $table = 'tbl_alat';
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
                'message' => 'Proses menghapus data alat berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function getByID()
    {
        $data = array(
            'id_alat' => $this->input->post('id'),
        );
        
        $table = 'tbl_alat';
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
                'message' => 'Data alat berhasil ditampilkan.',
                'data' => $result->row()
            )
        );
    }

    public function ajaxUpdate()
    {
        $dataUpdate = array(
            'merk_alat' => $this->input->post("form_edit_merk_alat"),
            'tahun_beli' => $this->input->post("form_edit_tahun_beli"),
            'seri_alat' => $this->input->post("form_edit_seri_alat"),
            'jumlah_alat' => $this->input->post("form_edit_jumlah_alat"),
            'kondisi_alat' => $this->input->post("form_edit_kondisi_alat")
        );

        $idAlat = array(
            'id_alat' => $this->input->post('idAlat')
        );
        
        $table = 'tbl_alat';
        $insert = $this->BaseModel->EditData($table, $dataUpdate, $idAlat);

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
                'message' => 'Proses memperbarui data alat berhasil dilakukan.',
                'data' => null
            )
        );
    }
}

?>