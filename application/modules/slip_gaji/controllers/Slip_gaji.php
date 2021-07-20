<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Slip_gaji extends MY_Controller {
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
        $data['getProyek'] = $this->getNamaProyek();
        $data['getKaryawan'] = $this->getNamaKaryawan();
        $data['content']='v_slip_gaji';
        
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('../../layout/views/master', $data);
    }
    
    public function getDataSlipGaji() {
        $result = $this->db->query("select tbl_pt.nama_pt AS nama_pt, tbl_proyek.nama_proyek AS nama_proyek, id_slip_gaji, data_karyawan.nama_karyawan AS nama_karyawan, gaji_pokok, uang_makan,uang_lembur, lama_lembur, periode_awal, periode_akhir 
        from tbl_slip_gaji 
        INNER JOIN tbl_pt ON tbl_pt.id_pt = tbl_slip_gaji.id_pt
        INNER JOIN tbl_proyek ON tbl_proyek.id_proyek = tbl_slip_gaji.id_proyek
        INNER JOIN data_karyawan ON data_karyawan.id_karyawan = tbl_slip_gaji.id_karyawan");
        if (!$result->result_array()){
            $this->returnJson(
                array(
                    'status' => 'empty',
                    'message' => 'Data slip gaji masih kosong.',
                )
            );
        }

        $this->returnJson(
            array(
                'status' => 'success',
                'message' => 'Proses mengambil data alat berhasil dilakukan.',
                'data' => $result->result_array()
            )
        );
    }

    public function ajaxInsert()
    {
        $gaji_pokok = !$this->input->post("insert_gaji_pokok") ? 0 : str_replace(',','',$this->input->post("insert_gaji_pokok"));
        $uang_makan = !$this->input->post("insert_uang_makan") ? 0 : str_replace(',','',$this->input->post("insert_uang_makan"));
        $uang_lembur = !$this->input->post("insert_uang_lembur") ? 0 : str_replace(',','',$this->input->post("insert_uang_lembur"));
        
        $dataInsert = array(
            'id_pt' => $this->input->post("insert_nama_perusahaan"),
            'id_proyek' => $this->input->post("insert_nama_proyek"),
            'id_karyawan' => $this->input->post("insert_nama_karyawan"),
            'periode_awal' => $this->input->post("periode_awal"),
            'periode_akhir' => $this->input->post("periode_akhir"),
            'gaji_pokok' => $gaji_pokok,
            'uang_makan' => $uang_makan,
            'uang_lembur' => $uang_lembur,
            'lama_lembur' => $this->input->post("insert_lama_lembur"),
        );

        
        // echo "<pre>";print_r($dataInsert);echo "</pre>";exit;

        $table = 'tbl_slip_gaji';
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
                'message' => 'Proses penambahan data slip gaji berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function ajaxDelete()
    {
        $idUser = array(
            'id_slip_gaji' => $this->input->post('id')
        );

        $table = 'tbl_slip_gaji';
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
            'id_slip_gaji' => $this->input->post('id'),
        );
        
        $table = 'tbl_slip_gaji';
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
                'message' => 'Data slip gaji berhasil ditampilkan.',
                'data' => $result->row()
            )
        );
    }

    public function ajaxUpdate()
    {
        $gaji_pokok = !$this->input->post("edit_gaji_pokok") ? 0 : str_replace(',','',$this->input->post("edit_gaji_pokok"));
        $uang_makan = !$this->input->post("edit_uang_makan") ? 0 : str_replace(',','',$this->input->post("edit_uang_makan"));
        $uang_lembur = !$this->input->post("edit_uang_lembur") ? 0 : str_replace(',','',$this->input->post("edit_uang_lembur"));

        $dataUpdate = array(
            'id_pt' => $this->input->post("edit_nama_perusahaan"),
            'id_proyek' => $this->input->post("edit_nama_proyek"),
            'id_karyawan' => $this->input->post("edit_nama_karyawan"),
            'periode_awal' => $this->input->post("edit_periode_awal"),
            'periode_akhir' => $this->input->post("edit_periode_akhir"),
            'gaji_pokok' => $gaji_pokok,
            'uang_makan' => $uang_makan,
            'uang_lembur' => $uang_lembur,
            'lama_lembur' => $this->input->post("edit_lama_lembur"),
        );

        $idSlipGaji = array(
            'id_slip_gaji' => $this->input->post('idSlipGaji')
        );
        
        $table = 'tbl_slip_gaji';
        $insert = $this->BaseModel->EditData($table, $dataUpdate, $idSlipGaji);

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

    public function downloadSlipGaji()
    {
        $idSlipGaji = $this->uri->segment(3);
        $result = $this->db->query("select tbl_pt.nama_pt AS nama_pt, tbl_proyek.nama_proyek AS nama_proyek, id_slip_gaji, data_karyawan.nama_karyawan AS nama_karyawan, gaji_pokok, uang_makan,uang_lembur, lama_lembur, periode_awal, periode_akhir 
        from tbl_slip_gaji 
        INNER JOIN tbl_pt ON tbl_pt.id_pt = tbl_slip_gaji.id_pt
        INNER JOIN tbl_proyek ON tbl_proyek.id_proyek = tbl_slip_gaji.id_proyek
        INNER JOIN data_karyawan ON data_karyawan.id_karyawan = tbl_slip_gaji.id_karyawan
        WHERE tbl_slip_gaji.id_slip_gaji = ".$idSlipGaji."")->row();


        if(!$result){
            redirect('slip_gaji');
        }

        $fileName = 'Slip Gaji - ' . $result->nama_karyawan . '.pdf';
        // echo "<pre>";print_r($result);echo "</pre>";exit;
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('v_pdf_slip_gaji', $result, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'D');
    }
}