<?php
class Kategoribukumodel extends CI_Model 
{
	function tampildata()
	{
		$query=$this->db->query("SELECT * FROM kategoribuku ORDER BY idkategoribuku DESC");
		// print_r($query);
		// exit();
		return $query->result();
	}

	function saverecords($nama)
	{
		$query = "INSERT INTO `kategoribuku`(`nmkategori`) VALUES ('$nama')";
		$data = $this->db->query($query);
		return $data;
	}

	function updaterecords($id,$nama)
	{
		$query="UPDATE `kategoribuku` SET `nmkategori`='".$nama."' WHERE idkategoribuku='".$id."'";
		$sql = $this->db->query($query);
		// $data = $sql->num_rows();
		// print_r($sql); 
		// exit();
		return $sql;
	}

	function carinamakategori($nama)
	{
		$query = $this->db->query("SELECT * FROM kategoribuku WHERE nmkategori='$nama'");
		$data = $query->num_rows();
		// print_r($data);
		// exit();
		return $data;
	}

	function carinamakategoriedit($nama)
	{
		$query	= "SELECT `nmkategori` FROM `kategoribuku` WHERE `nmkategori`='$nama'";
		// print_r($query);
		// exit();
		$sql = $this->db->query($query);
		$data = $sql->num_rows();
		// var_dump($data);
		// exit();
		return $data;
	}

	function deleterecords($id,$nama)
	{
		$query="DELETE FROM kategoribuku WHERE idkategoribuku=$id";
		$this->db->query($query);
	}
}