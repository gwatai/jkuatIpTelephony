<?php

class extensions_m extends CI_Model
{
    function get_departments()
    {
       return  $this->db->get('depts')->result();
    }
    function get_campuses()
    {
       return  $this->db->get('campuses')->result(); 

    }
    function get_campuses_code($campus_name)
    {
        return $this->db->select('ccode')->where('cname',$campus_name)->get('campuses')->row_array();
    }

    function get_campuses_depart($campus_code)
    {
        return $this->db->select('deptname')->where('ccode',$campus_code)->get('trialexcel')->result();
    }
    function get_campuses_depart_ext($deptname)
    {
        return $this->db->select('extnumber,owerassigned,deptname')->where('deptname',$deptname)->get('trialexcel')->result();
    }
    function update_telephony($data)
    {
        return $this->db->insert('trialexcel',$data);
    }
    function get_extensions($limit,$start,$data)
    {
        if(isset($data) && !empty($data))
        {
            $this->search_extensions($data);
        }
        return $this->db->limit($limit,$start)->get("trialexcel")->result();
    }
    
   function search_extensions($data)
   {
    return $this->db->like($data)->get('trialexcel')->result();
   }
    function get_ext($id,$table)
    {
        return $this->db->where('id',$id)->get($table)->row_array();
    }

    function update_extension($data,$id)

    {
        return $this->db->where('id',$id)->update('trialexcel',$data);
    }
    function delete($id)
    {
        return $this->db->where('id',$id)->delete('trialexcel');
    }
    function search_by_code($code)
    {
        return $this->db->where('code',$code)->get('extensions')->row_array();
    }

    function hash_admin_pass()
    {

        $data = $this->db->select('id,password,secretWord')->get('telephoneadmin')->result();
        foreach($data as $key => $value)
        {
        $update_data[$key] = 
        [
            'id' => $value->id,
            'password' => password_hash($value->password,PASSWORD_DEFAULT),
            'secretWord' => $this->encryption->encrypt($value->secretWord)
            
        ];

         $data = $this->db->where('id',$update_data[$key]['id'])->update('telephoneadmin',$update_data[$key]);
    }
    if($data)
    return true;

    }
    function get_campus_code($campus_name)
    {
     //   $this->db->where('ccname',$campus_name)->get('campuses')->
    }
    function test_join()
    {
        $this->db->select('*');
		$this->db->from('campuses');
		$this->db->join('trialexcel','trialexcel.ccode = campuses.ccode');
		$query = $this->db->get();
		return $query;
    }

      function get_count() {
        return $this->db->count_all('trialexcel');
    }

      function search_extension($ext_number)
    {
      return $this->db->select('extnumber,owerassigned,deptname')->like('extnumber',$ext_number)->get('trialexcel')->result();
    }

    function get_admins()
    {
        return $this->db->get('adminregistration')->result();
    }
    function add_admin($data1, $data2)
    {
        if($this->db->insert('adminregistration',$data1) &&  $this->db->insert('telephoneadmin',$data2))
        return TRUE;

    }
    function get_admins_sens($email)
    {
        $this->db->where('email',$email)->get('telephoneadmin')->result();
    }
    function get_edit_admins($id)
    {
        return $this->db->where('id',$id)->get('adminregistration')->row_array();
    }
}