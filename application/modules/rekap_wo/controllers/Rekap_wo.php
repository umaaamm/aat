<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Rekap_wo extends MY_Controller {

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
        $data['content']='v_rekap_wo';
        $this->load->view('../../layout/views/master', $data);
    }

    public function getRekananPerusahaanAjax(){
        echo "<option value=''>- Pilih Salah Satu -</option>";
        $result = $this->db->query('select * from tbl_perusahaan_rekanan');
        foreach ($result->result_array() as $row){
            echo "<option value='" . $row['id_perusahaan_rekanan'] . "'>" . $row['nama_perusahaan'] . "</option>";
        }
    }

    public function getProyekAjax(){
        $perusahaan_rekanan = $_POST['perusahaan_rekanan'];
        echo "<option value=''>- Pilih Salah Satu -</option>";
        $result = $this->db->query('select * from tbl_proyek where id_perusahaan_rekanan="'.$perusahaan_rekanan.'" ');
        foreach ($result->result_array() as $row){
            echo "<option value='" . $row['id_proyek'] . "'>" . $row['nama_proyek'] . "</option>";
        }
    }

    public function getRekananPerusahaan(){
        $result = $this->db->query('select * from tbl_perusahaan_rekanan');
        if ($result){
            $list = $result->result();
        }
        return $list;
    }

    public function getRekapDataWo()
    {
        $result = $this->db->query('select * from tbl_rekap_data_wo join tbl_perusahaan_rekanan on tbl_rekap_data_wo.id_perusahaan_rekanan = tbl_perusahaan_rekanan.id_perusahaan_rekanan join tbl_proyek on tbl_rekap_data_wo.id_proyek = tbl_proyek.id_proyek order by tbl_rekap_data_wo.id_rekap_data_wo DESC');
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

    public function ajaxInsert()
    {
        $dataInsert = array(
            'tanggal' => date("Y-m-d", strtotime($this->input->post("insert_tanggal"))),
            'id_perusahaan_rekanan' => $this->input->post("insert_id_rekanan_perusahaan"),
            'id_proyek' => $this->input->post("insert_id_proyek"),
            'workorder' => $this->input->post("insert_work_order"),
            'nilai_kontrak' => $this->input->post("insert_nilai_kontrak"),
            'ppn' => $this->input->post("insert_ppn"),
            'pph' => $this->input->post("insert_pph"),
            'tagihan_faktur' => $this->input->post("insert_tagihan_faktur"),
            'rekening_koran' => $this->input->post("insert_rekening_koran")
        );

        $table = 'tbl_rekap_data_wo';
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
            'id_rekap_data_wo' => $this->input->post('id')
        );

        $table = 'tbl_rekap_data_wo';
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
            'id_rekap_data_wo' => $this->input->post('id'),
        );
        
        $table = 'tbl_rekap_data_wo';
        // $result = $this->db->query('select * from tbl_rekap_data_wo join tbl_proyek on tbl_rekap_data_wo.id_proyek = tbl_proyek.id_proyek where tbl_rekap_data_wo.id_rekap_data_wo = "'.$this->input->post('id').'" ');
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
                'tanggal' => date("Y-m-d", strtotime($this->input->post("edit_tanggal"))),
                'id_perusahaan_rekanan' => $this->input->post("edit_id_rekanan_perusahaan"),
                'id_proyek' => $this->input->post("edit_id_proyek"),
                'workorder' => $this->input->post("edit_work_order"),
                'nilai_kontrak' => $this->input->post("edit_nilai_kontrak"),
                'ppn' => $this->input->post("edit_ppn"),
                'pph' => $this->input->post("edit_pph"),
                'tagihan_faktur' => $this->input->post("edit_tagihan_faktur"),
                'rekening_koran' => $this->input->post("edit_rekening_koran")        
        );

        $idRekapWO = array(
            'id_rekap_data_wo' => $this->input->post('idRekapWO')
        );

        $table = 'tbl_rekap_data_wo';
        $insert = $this->BaseModel->EditData($table, $dataUpdate, $idRekapWO);


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
