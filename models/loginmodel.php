<?php
class Loginmodel extends CI_Model
{
	public function login_valid($username,$pswd)
	{
        $result=$this->db->where(['uname'=>$username,'password'=>$pswd])
                         ->get('user');
        if( $result->num_rows() )
        {
          return $result->row();
        }
        else
        {
         return false;
        }
	}
}
?>