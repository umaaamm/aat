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
}