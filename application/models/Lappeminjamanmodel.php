<?php
class Lappeminjamanmodel extends CI_Model 
{
	function filterdatatanggalview($tglawal,$tglakhir)
	{
		$this->db->where('tglpinjam >=',$tglawal); 
		$this->db->where('tglpinjam <=',$tglakhir);
		$this->db->where('sts',1);
		$query 	=	$this->db->get('peminjaman');
		$data	=	$query->result();
		// print_r($data);
		// exit();
		return $data;
	}

	// function cetakpdf($tglawal,$tglakhir)
	// {
	// 	$this->db->where('tglpinjam >=',$tglawal); 
	// 	$this->db->where('tglpinjam <=',$tglakhir);
	// 	$this->db->where('sts',1);
	// 	$query 	=	$this->db->get('peminjaman');
	// 	$data	=	$query->result();
	// 	// print_r($data);
	// 	// exit();
	// 	return $data;
	// }

	function getreportpinjam($tglawal,$tglakhir)
	{
		$this->db->where('tglpinjam >=',$tglawal); 
		$this->db->where('tglpinjam <=',$tglakhir);
		$this->db->where('sts',1);
		$query 	=	$this->db->get('peminjaman');
		$data	=	$query->result();
		// print_r($data);
		// exit();
		return $data;
	}
}