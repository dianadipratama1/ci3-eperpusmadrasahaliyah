<?php
class Usermodel extends CI_Model 
{
	function getdataroleuser()
	{
		// $query = $this->db->query("SELECT roleuser,koderole FROM roleuser WHERE idroleuser='2' OR idroleuser='3'");
		$query = $this->db->query("SELECT roleuser,koderole FROM roleuser ");
		// print_r($query);
		// exit();
		return $query->result();
	}

	function tampildata()
	{
		$query=$this->db->query("SELECT * FROM user ORDER BY iduser DESC");
		// print_r($query);
		// exit();
		return $query->result();
	}

	function caridataidroleuser($roleuser)
	{
		$query = $this->db->query("SELECT idroleuser,roleuser FROM roleuser WHERE roleuser='$roleuser'");
		return $query->result();
	}

	function getdatanip($nip){
		$query = $this->db->query("SELECT * FROM user WHERE nip='$nip'");
		$data = $query->num_rows();
		// print_r($data);
		// exit();
		return $data;
	}

	function saverecords($nip,$nmpgw,$nmuser,$passwd,$alamat,$notelp,$keterangan,$idroleuser,$roleuser)
	{
		$data = array(
						'nip'				=>	$nip,
						'nmpgw'				=>	$nmpgw,
						'nmuser'			=>	$nmuser,
						'passwd'			=>	$passwd,
						'alamat'			=>	$alamat,
						'notelp'			=>	$notelp,
						'keterangan'		=>	$keterangan,
						'idroleuser'		=>	$idroleuser,
						'roleuser'			=>	$roleuser
		);
		$datasimpan	= $this->db->insert('user',$data);
		return $datasimpan;
	}

	function updaterecords($id,$nip,$nmpgw,$nmuser,$passwd,$idroleuser,$roleuser,$alamat,$notelp,$keterangan)
	{
		$data = array(
						'nip'				=>	$nip,
						'nmpgw'				=>	$nmpgw,
						'nmuser'			=>	$nmuser,
						'passwd'			=>	$passwd,
						'idroleuser'		=>	$idroleuser,
						'roleuser'			=>	$roleuser,
						'alamat'			=>	$alamat,
						'notelp'			=>	$notelp,
						'keterangan'		=>	$keterangan
		);

		$this->db->where('iduser', $id);
		$dataupdate = $this->db->update('user', $data);
		// print_r($dataupdate);
		// exit();
		return $dataupdate;
	}

	function deleterecords($id)
	{
		$query="DELETE FROM user WHERE iduser=$id";
		$this->db->query($query);
	}

}