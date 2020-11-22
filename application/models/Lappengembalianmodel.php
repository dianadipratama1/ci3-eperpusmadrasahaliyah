<?php
class Lappengembalianmodel extends CI_Model 
{
	function filterdatatanggalview($tglawal,$tglakhir)
	{
		$this->db->where('tglkembali >=',$tglawal); 
		$this->db->where('tglkembali <=',$tglakhir);
		$this->db->where('sts',1);
		$query 	=	$this->db->get('pengembalian');
		$data	=	$query->result();
		// print_r($data);
		// exit();
		return $data;
	}

	function getreportkembali($tglawal,$tglakhir)
	{
		$this->db->where('tglkembali >=',$tglawal); 
		$this->db->where('tglkembali <=',$tglakhir);
		$this->db->where('sts',1);
		$query 	=	$this->db->get('pengembalian');
		$data	=	$query->result();
		// print_r($data);
		// exit();
		return $data;
	}
}