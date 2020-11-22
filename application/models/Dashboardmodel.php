<?php
class Dashboardmodel extends CI_Model 
{
	function jumlahdataanggota()
	{
		$query=$this->db->get('siswa');
		if ($query->num_rows()>0) {
			return $query->num_rows();
		}else{
			return 0;
		}
	}

	function jumlahdatabuku()
	{
		$query=$this->db->get('buku');
		if ($query->num_rows()>0) {
			return $query->num_rows();
		}else{
			return 0;
		}
	}

	function jumlahdatauser()
	{
		$query=$this->db->get('user');
		if ($query->num_rows()>0) {
			return $query->num_rows();
		}else{
			return 0;
		}
	}

	function jumlahdatarak()
	{
		$query=$this->db->get('rakbuku');
		if ($query->num_rows()>0) {
			return $query->num_rows();
		}else{
			return 0;
		}
	}

	function jumlahdatapeminjaman()
	{
		$this->db->where('tglpinjam','NOW()'); 
		$this->db->where('sts',1);
		$query=$this->db->get('peminjaman');
		if ($query->num_rows()>0) {
			return $query->num_rows();
		}else{
			return 0;
		}
	}

	function jumlahdatapengembalian()
	{
		$this->db->where('tglkembali','NOW()'); 
		$this->db->where('sts',1);
		$query=$this->db->get('pengembalian');
		if ($query->num_rows()>0) {
			return $query->num_rows();
		}else{
			return 0;
		}
	}



	function jumlahdatakelas()
	{
		$query=$this->db->get('kelas');
		if ($query->num_rows()>0) {
			return $query->num_rows();
		}else{
			return 0;
		}
	}
}