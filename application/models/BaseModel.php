<?php if ( ! defined('BASEPATH')) exit('no direct script acces allowed');

/**
* 
*/
class BaseModel extends CI_Model
{
	
	function insertData($table, $data){
		$query = $this->db->insert($table, $data);
		if (!$query) {
			return false;
		}
		return true;
	}
	function EditData($table, $data, $id){
		$query = $this->db->update($table, $data, $id);
		if (!$query) {
			return false;
		}
		return true;
	}
	function DeleteData($table, $data){
		$query = $this->db->delete($table, $data);
		if (!$query) {
			return false;
		}
		return true;
	}
	function getAllData($table){
		return $this->db->get($table);
	}
	function getWhere($table, $where, $limit){		
		return $this->db->get_where($table, $where, $limit);
	}
}