<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function getSatuanMaterial(){
        $table = 'tbl_satuan';
        $result = $this->BaseModel->getAllData($table);
        if ($result){
            $list = $result->result();
        }
        return $list;
    }

    public function getNamaPT(){
        $table = 'tbl_pt';
        $result = $this->BaseModel->getAllData($table);
        if ($result){
            $list = $result->result();
        }
        return $list;
    }

    public function createNoSurat($pt, $typeSurat){
        $data = $this->db->query("SELECT * FROM tbl_no_surat where type='".$typeSurat."' and key_perusahaan='".$pt."' ORDER BY id_surat DESC LIMIT 1")->result_array();

        if(empty($data)) {
            $nomor_inc = 0;
        }

        if(!empty($data)) {
            $nomor_inc = $data[0]['nomor_inc'];
        }
        
        //get month romawi
        $array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $bln = $array_bln[date('n')];

        //inc no surat
        $nomor_surat = str_pad($nomor_inc+1,3,"0",STR_PAD_LEFT); 

        //get year
        $year =substr( date("y"), -2);

        //combine
        $noSurat = $nomor_surat."/".$pt."/".$typeSurat."/".$bln."/".$year;
       
        $data_save['nomor_inc']= $nomor_surat;
		$data_save['type']= $typeSurat;
		$data_save['key_perusahaan']= $pt;
		$data_save['bulan']= $bln;
		$data_save['tahun']= $year;
		$data_save['combine']= $noSurat;

        $this->BaseModel->insertData('tbl_no_surat', $data_save);

        return $noSurat;
    }
    
    public function returnJson($message)
    {
        echo json_encode($message);
        exit;
    }
}