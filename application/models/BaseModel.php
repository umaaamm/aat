<?php if ( ! defined('BASEPATH')) exit('no direct script acces allowed');

/**
* 
*/
class BaseModel extends CI_Model
{
	
	function TambahData($table,$data){
		$query = $this->db->insert($table,$data);
		if (!$query) {
			return false;
		}
		return true;
	}
	function EditData($table,$data,$id){
		$this->db->update($table,$data,$id);
	}
	function HapusData($table,$data){
		$this->db->delete($table,$data);
	}
	function TampilData($table){
		return $this->db->get($table);
	}
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
}