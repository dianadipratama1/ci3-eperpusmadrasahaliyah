<?php
class Bukuindukmodel extends CI_Model 
{
	function tampildata()
	{
		$query=$this->db->query("SELECT * FROM bukuinduk ORDER BY idbukuinduk DESC");
		// print_r($query);
		// exit();
		return $query->result();
	}

	function getdatanobukuinduk($nobukuinduk)
	{
		$query = $this->db->query("SELECT * FROM bukuinduk WHERE noindukbuku='$nobukuinduk'");
		$data = $query->num_rows();
		// print_r($data);
		// exit();
		return $data;
	}

	function saverecords($nobukuinduk,$noklasifikasi,$tgldibukukan,$judulbuku,$pengarang,$penerbit,$tahunasal,$jumlahhalaman,$ukuranbuku,$jumlahbuku,$keterangan)
	{
		$data = array(
						'noindukbuku'			=>	$nobukuinduk,
						'noklasifikasi'			=>	$noklasifikasi,
						'tgldibukukan'			=>	$tgldibukukan,
						'judulbuku'				=>	$judulbuku,
						'pengarang'				=>	$pengarang,
						'penerbit'				=>	$penerbit,
						'tahunasal'				=>	$tahunasal,
						'jmlhalaman'			=>	$jumlahhalaman,
						'ukuranbuku'			=>	$ukuranbuku,
						'jmlbuku'				=>	$jumlahbuku,
						'keterangan'			=>	$keterangan,
						'sts'					=>	1
		);

		$datasimpan	= $this->db->insert('bukuinduk',$data);
		return $datasimpan;
	}

	function updaterecords($idbukuinduk,$nobukuinduk,$noklasifikasi,$tgldibukukan,$judulbuku,$pengarang,$penerbit,$tahunasal,$jumlahhalaman,$ukuranbuku,$jumlahbuku,$keterangan)
	{
		$data = array(
						'noindukbuku'			=>	$nobukuinduk,
						'noklasifikasi'			=>	$noklasifikasi,
						'tgldibukukan'			=>	$tgldibukukan,
						'judulbuku'				=>	$judulbuku,
						'pengarang'				=>	$pengarang,
						'penerbit'				=>	$penerbit,
						'tahunasal'				=>	$tahunasal,
						'jmlhalaman'			=>	$jumlahhalaman,
						'ukuranbuku'			=>	$ukuranbuku,
						'jmlbuku'				=>	$jumlahbuku,
						'keterangan'			=>	$keterangan,
						'sts'					=>	1
		);

		$this->db->where('idbukuinduk', $idbukuinduk);
		$dataupdate = $this->db->update('bukuinduk', $data);
		// print_r($dataupdate);
		// exit();
		return $dataupdate;

		// $query="UPDATE `siswa` SET `namasiswa`='$namasiswa', `alamat`='$alamat', `kelas`='$kelas', `namaortu`='$namaortu', `nohportu`='$notelp', `keterangan`='$keterangan', `idkelas`='$idkelas', WHERE nis=$nis";
		// $this->db->query($query);
	}

	function deleterecords($id)
	{
		$query="DELETE FROM bukuinduk WHERE idbukuinduk=$id";
		$this->db->query($query);
	}
}