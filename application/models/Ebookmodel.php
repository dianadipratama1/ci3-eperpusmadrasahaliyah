<?php
class Ebookmodel extends CI_Model 
{
	function tampildata()
	{
		$query=$this->db->query("SELECT * FROM ebookperpus ORDER BY idebook DESC");
		// print_r($query);
		// exit();
		return $query->result();
	}
	function simpanebook($judulbukuinput,$ebookfileinput){
		$data = array(
	        			'judulebook'	=> $judulbukuinput,
	        			'ebookfile'		=> $ebookfileinput
	       		);  
	    $result= $this->db->insert('ebookperpus',$data);
	    return $result;
	}

	function caridata()
	{
		$urutan=0;
		$query = $this->db->query("SELECT idebook FROM ebookperpus ORDER BY idebook DESC LIMIT 1");
		foreach ($query->result() as $row) {
			$urutan = $row->idebook;
		}
		return $urutan;
	}
}