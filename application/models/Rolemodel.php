<?php
class Rolemodel extends CI_Model 
{
	function tampildata()
	{
		$query=$this->db->query("select * from roleuser");
		// print_r($query);
		// exit();
		return $query->result();
	}
}