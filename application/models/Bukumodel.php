<?php
class Bukumodel extends CI_Model 
{
	function tampildata()
	{
		$query=$this->db->query("SELECT * FROM buku ORDER BY idbuku DESC");
		// print_r($query);
		// exit();
		return $query->result();
	}

	function getdatakategori()
	{
		$query = $this->db->query("SELECT nmkategori FROM kategoribuku Group BY nmkategori ORDER BY nmkategori ASC");
		return $query->result();
	}

	function getdatalokasirak()
	{
		$query = $this->db->query("SELECT lokasirak FROM rakbuku Group BY lokasirak ORDER BY lokasirak ASC");
		return $query->result();	
	}

	function caridataidkategori($namakategori)
	{
		$query = $this->db->query("SELECT idkategoribuku,nmkategori FROM kategoribuku WHERE nmkategori='$namakategori'");
		return $query->result();
	}

	function caridataidlokasi($namalokasi)
	{
		$query = $this->db->query("SELECT idrak,lokasirak FROM rakbuku WHERE lokasirak='$namalokasi'");
		return $query->result();
	}


	function getdatanobuku($nobuku){
		$query = $this->db->query("SELECT * FROM buku WHERE nobuku='$nobuku'");
		$data = $query->num_rows();
		// print_r($data);
		// exit();
		return $data;
	}

	function saverecords($nobuku,$judulbuku,$pengarang,$penerbit,$tahun,$idkategori,$nmkategori,$idlokasi,$namalokasi,$keterangan)
	{
		$data = array(
						'nobuku'			=>	$nobuku,
						'judulbuku'			=>	$judulbuku,
						'pengarang'			=>	$pengarang,
						'penerbit'			=>	$penerbit,
						'tahun'				=>	$tahun,
						'idkategoribuku'	=>	$idkategori,
						'nmkategori'		=>	$nmkategori,
						'idlokasi'			=>	$idlokasi,
						'lokasirak'			=>	$namalokasi,
						'keterangan'		=>	$keterangan,
						'sts'				=>	1
		);

		$datasimpan	= $this->db->insert('buku',$data);
		return $datasimpan;
	}

	function updaterecords($idbuku,$nobuku,$judulbuku,$pengarang,$penerbit,$tahun,$idkategori,$nmkategori,$idlokasi,$namalokasi,$keterangan)
	{
		$data = array(
						'nobuku'			=>	$nobuku,
						'judulbuku'			=>	$judulbuku,
						'pengarang'			=>	$pengarang,
						'penerbit'			=>	$penerbit,
						'tahun'				=>	$tahun,
						'idkategoribuku'	=>	$idkategori,
						'nmkategori'		=>	$nmkategori,
						'idlokasi'			=>	$idlokasi,
						'lokasirak'			=>	$namalokasi,
						'keterangan'		=>	$keterangan
		);

		$this->db->where('idbuku', $idbuku);
		$dataupdate = $this->db->update('buku', $data);
		// print_r($dataupdate);
		// exit();
		return $dataupdate;

		// $query="UPDATE `siswa` SET `namasiswa`='$namasiswa', `alamat`='$alamat', `kelas`='$kelas', `namaortu`='$namaortu', `nohportu`='$notelp', `keterangan`='$keterangan', `idkelas`='$idkelas', WHERE nis=$nis";
		// $this->db->query($query);
	}

	function deleterecords($id)
	{
		$query="DELETE FROM buku WHERE idbuku=$id";
		$this->db->query($query);
	}
}