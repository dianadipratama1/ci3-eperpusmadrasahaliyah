<?php
class Kelasmodel extends CI_Model 
{
	function tampildata()
	{
		$query=$this->db->query("SELECT * FROM kelas ORDER BY idkelas DESC");
		// print_r($query);
		// exit();
		return $query->result();
	}

	function saverecords($nama)
	{
		$query = "INSERT INTO `kelas`(`namakelas`) VALUES ('$nama')";
		$data = $this->db->query($query);
		return $data;
	}

	function updaterecords($id,$nama)
	{
		$query="UPDATE `kelas` SET `namakelas`='$nama' WHERE idkelas=$id";
		$data = $this->db->query($query);
		return $data;
	}

	function carinamakelas($nama)
	{
		$query = $this->db->query("SELECT * FROM kelas WHERE namakelas='$nama'");
		$data = $query->num_rows();
		// print_r($data);
		// exit();
		return $data;
	}

	function carinamakelasedit($nama)
	{
		$query	= "SELECT `namakelas` FROM `kelas` WHERE `namakelas`='".$nama."'";
		$sql = $this->db->query($query);
		$data = $sql->num_rows();
		// print_r($data);
		// exit();
		return $data;
	}

	function deleterecords($id,$nama)
	{
		$query="DELETE FROM kelas WHERE idkelas=$id";
		$this->db->query($query);
	}
}