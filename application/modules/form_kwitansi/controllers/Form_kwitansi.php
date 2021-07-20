<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Form_kwitansi extends MY_Controller {
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
        $data['content']='v_form_kwitansi';
        
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('../../layout/views/master', $data);
    }

    public function getDataKwitansi()
    {
        $table = 'tbl_kwitansi';
        $result = $this->BaseModel->getAllData($table);
        if ($result->result_array()) {
            $this->returnJson(
                array(
                    'status' => 'success',
                    'message' => 'Proses mengambil data kwitansi berhasil dilakukan.',
                    'data' => $result->result_array()
                )
            );
        };
    }

    public function ajaxInsert()
    {
        $nominal_uang = !$this->input->post("insert_nominal_uang") ? 0 : str_replace(',','',$this->input->post("insert_nominal_uang"));
        $dataInsert = array (
            'no_kwitansi' => $this->createNoSurat($this->input->post("insert_asal_perusahaan"), 'KW'),
            'sudah_terima_dari' => $this->input->post("insert_sudah_terima_dari"),
            'terbilang_uang' => $this->input->post("insert_terbilang_uang"),
            'nominal_uang' => $nominal_uang,
            'untuk_pembayaran' => $this->input->post("insert_untuk_pembayaran"),
            'tanggal' => date("Y-m-d")
        );
        
        $table = 'tbl_kwitansi';
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
                'message' => 'Proses penambahan data kwitansi berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function getByID()
    {
        $data = array(
            'id_kwitansi' => $this->input->post('id'),
        );
        
        $table = 'tbl_kwitansi';
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
                'message' => 'Data kwitansi berhasil ditampilkan.',
                'data' => $result->row()
            )
        );
    }

    public function ajaxUpdate()
    {
        $nominal_uang = !$this->input->post("edit_nominal_uang") ? 0 : str_replace(',','',$this->input->post("edit_nominal_uang"));
        $dataUpdate = array(
            'sudah_terima_dari' => $this->input->post("edit_sudah_terima_dari"),
            'terbilang_uang' => $this->input->post("edit_terbilang_uang"),
            'nominal_uang' => $nominal_uang,
            'untuk_pembayaran' => $this->input->post("edit_untuk_pembayaran"),
        );


        $idKwitansi = array(
            'id_kwitansi' => $this->input->post('idKwitansi')
        );
        
        $table = 'tbl_kwitansi';
        $insert = $this->BaseModel->EditData($table, $dataUpdate, $idKwitansi);

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
                'message' => 'Proses memperbarui data kwitansi berhasil dilakukan.',
                'data' => null
            )
        );
    }

    public function downloadKwitansi()
    {
        $nomorKontrak = $this->uri->segment(3);
        $data = array(
            'id_kwitansi' => $nomorKontrak,
        );
        
        $table = 'tbl_kwitansi';
        $result = $this->BaseModel->getWhere($table, $data, '1')->row();


        if(!$result){
            redirect('form_kwitansi');
        }
        $noKwitansi = str_replace('/','-',$result->no_kwitansi);

        $fileName = 'Kwitansi-' . $noKwitansi . '.pdf';
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('v_pdf_kwitansi', $result, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'D');
        echo "<pre>";print_r($fileName);echo "</pre>";exit;
    }
}