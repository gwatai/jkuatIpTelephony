<?php

class auth_m extends CI_Model
{
        function email_exists($username)
        {
            return $this->db->where('username',$username)->get('telephoneadmin')->row_array();
        }
        function login($username,$password)
        {
            $data = $this->db->where('username',$username)->get('telephoneadmin')->row_array();
            if($data)
            {
                if(password_verify($password,$data['password']))
                {
                // return $data;
                    return $this->db->where('email',$data['email'])->get('adminregistration')->row_array();
                }
                else
                {
                return false;
                }
            }
            else 
            return false;
        }
}