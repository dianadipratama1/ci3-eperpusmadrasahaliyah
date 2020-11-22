<?php
class Peminjamanmodel extends CI_Model 
{
	function tampildatabuku()
	{
		$query=$this->db->query("SELECT * FROM buku WHERE sts=1 ORDER BY idbuku DESC");
		// print_r($query);
		// exit();
		return $query->result();
	}

	function tampildatapeminjaman()
	{
		$query=$this->db->query("SELECT * FROM peminjaman WHERE sts=1 ORDER BY idpinjam DESC");
		// print_r($query);
		// exit();
		return $query->result();
	}

	function carinamasiswa($namasiswa)
	{
		$query = $this->db->query("SELECT idsiswa,nama FROM siswa WHERE nama='$namasiswa'");
		return $query->result();
	}

	function getdatanis()
	{
		$query = $this->db->query("SELECT nis,nama FROM siswa Group BY nis ORDER BY idsiswa DESC");
		return $query->result();
	}

	function carijudulbuku($judulbuku)
	{
		$query = $this->db->query("SELECT idbuku,judulbuku FROM buku WHERE judulbuku='$judulbuku'");
		return $query->result();
	}

	function cariketbuku($nobuku)
	{
		$query = $this->db->query("SELECT keterangan FROM buku WHERE nobuku='$nobuku'");
		return $query->result();
	}

	function getdatabuku()
	{
		$query = $this->db->query("SELECT judulbuku FROM buku Group BY judulbuku ORDER BY judulbuku ASC");
		return $query->result();
	}

	function getkodepinjam()
	{		
		$q = $this->db->query("SELECT MAX(RIGHT(kodepinjam,4)) AS kd_max FROM peminjaman WHERE DATE(NOW())=CURDATE()");
        $kode = "PJM";
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $kode.date('dmy').$kd;
	}

	function getnamabynis($nis)
	{
		$query = $this->db->query("SELECT idsiswa,nama FROM siswa WHERE nis='$nis'");
		return $query->result();
	}

	function getdatanobuku()
	{
		$query = $this->db->query("SELECT nobuku,judulbuku FROM buku WHERE sts=1 Group BY nobuku ORDER BY idbuku DESC");
		return $query->result();
	}

	function getjudulbukubynobuku($nobuku)
	{
		$query = $this->db->query("SELECT idbuku,judulbuku FROM buku WHERE nobuku='$nobuku'");
		return $query->result();
	}

	function cekkodepinjam($kodepinjam)
	{
		$query = $this->db->query("SELECT kodepinjam FROM peminjaman WHERE kodepinjam='$kodepinjam'");
		$data  = $query->num_rows();
		return $data;
		// print_r($data);
		// exit();
	}

	function simpandata($kodepinjam,$nis,$idsiswa,$namasiswa,$nobuku,$judulbuku,$idbuku,$tglpinjam,$tglrencanakembali,$lamapinjam,$keterangan,$sts)
	{
		$dataupdatestsbuku = array('sts' => 2);
		$this->db->where('idbuku',$idbuku);
		$this->db->update('buku',$dataupdatestsbuku);

		$data = array(
						'kodepinjam'		=>	$kodepinjam,
						'nis'				=>	$nis,
						'idsiswa'			=>	$idsiswa,
						'namasiswa'			=>	$namasiswa,
						'nobuku'			=>	$nobuku,
						'judulbuku'			=>	$judulbuku,
						'idbuku'			=>	$idbuku,
						'tglpinjam'			=>	$tglpinjam,
						'tglrencanakembali' => 	$tglrencanakembali,
						'lamapinjam' 		=> 	$lamapinjam,
						'keterangan' 		=> 	$keterangan,
						'sts'				=>	$sts
		);

		$datasimpan	= $this->db->insert('peminjaman',$data);
		return $datasimpan;
	}
}