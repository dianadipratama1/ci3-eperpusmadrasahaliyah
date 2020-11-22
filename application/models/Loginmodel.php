<?php
class Loginmodel extends CI_Model{
    
    function validate($username,$password){
        $this->db->where('nmuser',$username);
        $this->db->where('passwd',$password);
        $result = $this->db->get('user',1);
        return $result;
    }

}