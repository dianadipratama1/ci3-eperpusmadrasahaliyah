<?php
class Rakbukumodel extends CI_Model 
{
	function tampildata()
	{
		$query=$this->db->query("SELECT * FROM rakbuku ORDER BY idrak DESC");
		// print_r($query);
		// exit();
		return $query->result();
	}
	
	function simpandata($lokasirak){
		$query = "INSERT INTO `rakbuku`(`lokasirak`) VALUES ('$lokasirak')";
		$data = $this->db->query($query);
		return $data;
	}

	function carilokasirak($lokasirak)
	{
		$query = $this->db->query("SELECT * FROM rakbuku WHERE lokasirak='$lokasirak'");
		$cekdata = $query->num_rows();
		return $cekdata;
	}

	
	function updaterecords($id,$lokasirak)
	{
		$query="UPDATE `rakbuku` SET `lokasirak`='".$lokasirak."' WHERE idrak='".$id."'";
		$sql = $this->db->query($query);
		// $data = $sql->num_rows();
		// print_r($sql); 
		// exit();
		return $sql;
	}

	function deleterecords($id,$lokasirak)
	{
		$query="DELETE FROM rakbuku WHERE idrak=$id";
		$this->db->query($query);
	}
}