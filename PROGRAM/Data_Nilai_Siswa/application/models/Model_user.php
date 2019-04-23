<?php
class Model_user extends CI_Model{
    
    function chekLogin($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',  md5($password));
        $user = $this->db->get('tbl_user')->row_array();
        return $user;
    }

    function chekLogin1($username,$password,$id_level_user){
        $this->db->where('A.username',$username);
        $this->db->where('A.password',  md5($password));
        $this->db->where('A.id_level_user',5);
        $user1 = $this->db->get('tbl_user a join tb_m_siswa b on a.username=b.NISN')->row_array();
        return $user1;
    }
    
}
