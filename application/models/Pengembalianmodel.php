<?php
class Pengembalianmodel extends CI_Model 
{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function tampildatapeminjaman()
	{
		$query=$this->db->query("SELECT * FROM peminjaman WHERE sts=1 ORDER BY idpinjam DESC");
		// print_r($query);
		// exit();
		return $query->result();
	}

	function tampildatapengembalian()
	{
		$query=$this->db->query("SELECT * FROM pengembalian WHERE sts=1 ORDER BY idpinjam DESC");
		// print_r($query);
		// exit();
		return $query->result();
	}

	function getkodekembali()
	{		
		$q = $this->db->query("SELECT MAX(RIGHT(kodekembali,4)) AS kd_max FROM pengembalian WHERE DATE(NOW())=CURDATE()");
		$kode = "KBL";
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
        return $kode.date('dmY').$kd;
	}

	function cekkodekembali($kodekembali)
	{
		$query=$this->db->query("SELECT * FROM pengembalian WHERE kodekembali='$kodekembali'");
		$data = $query->result();
		return $data;
	}

	function cekdatapinjam($idpinjam,$kodepinjam,$nis,$sts)
	{
		$query = $this->db->query("SELECT idpinjam,kodepinjam,sts FROM peminjaman WHERE idpinjam='$idpinjam' OR sts='$sts' OR kodepinjam='$kodepinjam' ORDER BY idpinjam DESC ");
		$data = $query->result();
		return $data;
	}

	function simpandata($iduser,$idpinjam,$idbuku,$idsiswa,$sts,$kodekembali,$kodepinjam,$nis,$namasiswa,$nobuku,$judulbuku,$tglpinjam,$tglkembali,$tglrencanakembali,$lamapinjam,$terlambat,$keterangan,$keterangankembali)
	{
		// print_r($idbuku);
		// exit();
		$cekkodekembali = $this->model->cekkodekembali($kodekembali);
		// print_r($cekkodekembali);
		// exit();
		if (count($cekkodekembali)>0) {
			$a = 1;
			return $a;
		}else{
			$cekdatapinjam = $this->model->cekdatapinjam($idpinjam,$kodepinjam,$nis,$sts);
			// print_r($cekdatapinjam);
			// exit();
			if (count($cekdatapinjam)>0) {
				$stspjm = 2;
				$dataupdatestspinjam	=	array('sts' => $stspjm);
				$this->db->where('idpinjam', $idpinjam);
				$this->db->update('peminjaman', $dataupdatestspinjam);

				$dataupdateketstsbuku = array(
											'keterangan'	=> $keterangankembali,
											'sts'			=>	1
										);
				$this->db->where('idbuku',$idbuku);
				$this->db->update('buku',$dataupdateketstsbuku);

				// $this->db->query("UPDATE ")
				$datakembali = array(
						'iduser' 			=>	$iduser,
						'idpinjam'			=>	$idpinjam,
						'idbuku'			=>	$idbuku,
						'idsiswa'			=>	$idsiswa,
						'sts'				=>	$sts,
						'kodekembali'		=>	$kodekembali,
						'kodepinjam'		=>	$kodepinjam,
						'nis'				=>	$nis,
						'namasiswa'			=>	$namasiswa,
						'nobuku'			=>	$nobuku,
						'judulbuku'			=>	$judulbuku,
						'tglpinjam'			=>	$tglpinjam,
						'tglkembali'		=>	$tglkembali,
						'tglrencanakembali'	=>	$tglrencanakembali,
						'lamapinjam'		=>	$lamapinjam,
						'terlambat'			=>	$terlambat,
						'keterangan'		=>	$keterangan,
						'keterangankembali'	=>	$keterangankembali
				);
				$this->db->insert('pengembalian',$datakembali);
				$a=2;
				return $a;
			}else{
				$a = 3;
				return $a;
			}
			// $a = "0";
			// return $a;
		}
	}
}