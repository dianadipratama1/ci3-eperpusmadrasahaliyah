<?php
class Anggotamodel extends CI_Model 
{
	function tampildata()
	{
		$query=$this->db->query("SELECT * FROM siswa ORDER BY idsiswa DESC");
		// print_r($query);
		// exit();
		return $query->result();
	}

	function getdatakelas()
	{
		$query = $this->db->query("SELECT namakelas FROM kelas Group BY namakelas ORDER BY namakelas ASC");
		return $query->result();
	}

	function getdatanis($nis)
	{
		$query = $this->db->query("SELECT * FROM siswa WHERE nis='$nis'");
		$data = $query->num_rows();
		// print_r($data);
		// exit();
		return $data;
	}

	function getdatanisedit($nis)
	{
		$query = $this->db->query("SELECT * FROM siswa WHERE nis='$nis'");
		$data = $query->result();
		// print_r($data);
		// exit();
		return $data;
	}

	function saverecords($nis,$namasiswa,$alamat,$kelas,$namaortu,$notelp,$keterangan,$idkelas)
	{
		$data = array(
						'nis'		=>	$nis,
						'nama'		=>	$namasiswa,
						'alamat'	=>	$alamat,
						'kelas'		=>	$kelas,
						'namaortu'	=>	$namaortu,
						'nohportu'	=>	$notelp,
						'keterangan'=>	$keterangan,
						'idkelas'	=>	$idkelas
		);

		$datasimpan	= $this->db->insert('siswa',$data);
		return $datasimpan;
	}

	function caridataidkelas($namakelas)
	{
		$query = $this->db->query("SELECT idkelas,namakelas FROM kelas WHERE namakelas='$namakelas'");
		return $query->result();
	}

	function updaterecords($idsiswa,$nis,$namasiswa,$alamat,$kelas,$namaortu,$notelp,$keterangan,$idkelas)
	{
		// print_r($kelas);
		// exit();
		$data = array(
						'nis'		=>	$nis,
						'nama'		=>	$namasiswa,
						'alamat'	=>	$alamat,
						'kelas'		=>	$kelas,
						'namaortu'	=>	$namaortu,
						'nohportu'	=>	$notelp,
						'keterangan'=>	$keterangan,
						'idkelas'	=>	$idkelas
		);

		$this->db->where('idsiswa', $idsiswa);
		$dataupdate = $this->db->update('siswa', $data);
		// print_r($dataupdate);
		// exit();
		return $dataupdate;

		// $query="UPDATE `siswa` SET `namasiswa`='$namasiswa', `alamat`='$alamat', `kelas`='$kelas', `namaortu`='$namaortu', `nohportu`='$notelp', `keterangan`='$keterangan', `idkelas`='$idkelas', WHERE nis=$nis";
		// $this->db->query($query);
	}

	function deleterecords($id)
	{
		$query="DELETE FROM siswa WHERE idsiswa=$id";
		$this->db->query($query);
	}
}