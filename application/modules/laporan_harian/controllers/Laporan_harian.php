<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_harian extends MY_Controller
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
        $data['getPt'] = $this->getNamaPT();
        $data['getProyek'] = $this->getProyek();
        $data['getLaporanHarian'] = $this->getLaporanHarian();
        $data['content'] = 'v_laporan_harian';
        $this->load->view('../../layout/views/master', $data);
    }

    private function getProyek()
    {
        $table = 'tbl_proyek';
        $result = $this->db->query('select * from tbl_proyek join tbl_pt on tbl_proyek.id_pt = tbl_pt.id_pt');
        if ($result) {
            $list = $result->result();
        }
        return $list;
    }

    public function getDataLaporanHarian()
    {
        $result = $this->db->query('select * from tbl_laporan_harian join tbl_perusahaan_rekanan on tbl_laporan_harian.id_perusahaan_rekanan = tbl_perusahaan_rekanan.id_perusahaan_rekanan join tbl_proyek on tbl_laporan_harian.id_proyek = tbl_proyek.id_proyek');
        if ($result->result_array()) {
            $this->returnJson(
                array(
                    'status' => 'success',
                    'message' => 'Proses mengambil data material berhasil dilakukan.',
                    'data' => $result->result_array()
                )
            );
        }
    }

    public function getDetailDataLaporanHarian()
    {
        $id_laporan_harian = $this->input->post('id_laporan_harian');
        $result = $this->db->query('select * from tbl_laporan_harian join tbl_perusahaan_rekanan on tbl_laporan_harian.id_perusahaan_rekanan = tbl_perusahaan_rekanan.id_perusahaan_rekanan join tbl_proyek on tbl_laporan_harian.id_proyek = tbl_proyek.id_proyek join tbl_data_laporan_harian on tbl_laporan_harian.id_laporan_harian = tbl_data_laporan_harian.id_laporan_harian WHERE tbl_laporan_harian.id_laporan_harian = "' . $id_laporan_harian . '"');
        if ($result->result_array()) {
            $this->returnJson(
                array(
                    'status' => 'success',
                    'message' => 'Proses mengambil data material berhasil dilakukan.',
                    'data' => $result->result_array()
                )
            );
        }
    }


    public function getLaporanHarian()
    {
        $result = $this->db->query('select * from tbl_laporan_harian join tbl_perusahaan_rekanan on tbl_laporan_harian.id_perusahaan_rekanan = tbl_perusahaan_rekanan.id_perusahaan_rekanan join tbl_proyek on tbl_laporan_harian.id_proyek = tbl_proyek.id_proyek');
        if ($result) {
            $list = $result->result();
        }
        return $list;
    }


    public function ajaxInsert()
    {
        $dataInsert = array(
            'id_perusahaan_rekanan' => $this->input->post("insert_id_rekanan_perusahaan"),
            'id_proyek' => $this->input->post("insert_id_proyek"),
            'tanggal' => date("Y-m-d", strtotime($this->input->post("insert_tanggal"))),
            'saldo' => $this->input->post("insert_saldo")
        );
        $table = 'tbl_laporan_harian';
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

    public function ajaxInsertKeterangan()
    {
        $dataInsert = array(
            'id_laporan_harian' => $this->input->post("insert_id_laporan_harian"),
            'keterangan' => $this->input->post("insert_keterangan"),
            'qyt' => $this->input->post("insert_qyt"),
            'satuan' => $this->input->post("insert_satuan"),
            'kredit' => $this->input->post("insert_kredit"),
            'debit' => $this->input->post("insert_debit")
        );
        $table = 'tbl_data_laporan_harian';
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

        $id_laporan_harian = $this->input->post('id');
        $result = $this->db->query('delete tbl_laporan_harian, tbl_data_laporan_harian from tbl_laporan_harian INNER JOIN tbl_data_laporan_harian 
        where  tbl_laporan_harian.id_laporan_harian = tbl_data_laporan_harian.id_laporan_harian and tbl_laporan_harian.id_laporan_harian = "' . $id_laporan_harian . '" ');

        if (!$result) {
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
        $id_laporan_harian = $this->input->post('id');
        $result = $this->db->query('select * from tbl_laporan_harian join tbl_perusahaan_rekanan on tbl_laporan_harian.id_perusahaan_rekanan = tbl_perusahaan_rekanan.id_perusahaan_rekanan join tbl_proyek on tbl_laporan_harian.id_proyek = tbl_proyek.id_proyek where tbl_laporan_harian.id_laporan_harian = "' . $id_laporan_harian . '" ');

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
            'id_pt' => $this->input->post("form_edit_id_pt")
        );

        $idMaterial = array(
            'id_proyek' => $this->input->post('idProyek')
        );

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

    public function ajaxUpdateLaporanHarian()
    {
        $dataUpdate = array(
            'id_perusahaan_rekanan' => $this->input->post("perusahaan_rekanan_modal"),
            'id_proyek' => $this->input->post("id_proyek_modal"),
            'tanggal' => date("Y-m-d", strtotime($this->input->post("edit_tanggal_laporan_harian"))),
            'saldo' => $this->input->post("edit_saldo_laporan_harian")
        );

        $idMaterial = array(
            'id_laporan_harian' => $this->input->post('editIDForm_laporan')
        );

        $table = 'tbl_laporan_harian';
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

    public function ajaxDeleteKeterangan()
    {
        $idUser = array(
            'id_data_laporan_harian' => $this->input->post('id')
        );

        $table = 'tbl_data_laporan_harian';
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
}
