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

    function get_new_extension_departments($campus)
    {
        
        $this->db->select('t.deptname');
        $this->from('campuses as c');
        $this->join('trialexcel as t','c.ccode = t.ccode');
        $this->where('c.cname',$campus);

        $query = $this->db->get();

        return $query->result();

    }

    function search_extension_by_campus($data)
    {

     $this->db->select('c.cname,t.deptname,t.owerassigned,t.extnumber,t.id');
     $this->db->from('campuses as c');
     $this->db->join('trialexcel as t','c.ccode = t.ccode');
     $this->db->like('c.cname',$data);
     $this->db->or_like('t.deptname', $data);
     $this->db->or_like('t.owerassigned', $data);
     $this->db->or_like('t.extnumber', $data);
     //$this->db->limit($limit,$start);
     $query = $this->db->get();
 
     return $query->result();
 
    }
    function search_extension($data)
    {
      //return $this->db->select('extnumber,owerassigned,deptname')->like('extnumber',$ext_number)->or_like('owerassigned',$ext_number)->or_like('deptname',$ext_number)->get('trialexcel')->result();
      $this->db->select('c.cname,t.deptname,t.owerassigned,t.extnumber');
      $this->db->from('campuses as c');
      $this->db->join('trialexcel as t','c.ccode = t.ccode');
      $this->db->or_like('c.cname',$data);
    //   $this->db->like('t.deptname',$data);
    //   $this->db->like('t.owerassigned',$data);
    //   $this->db->like('t.extnumber',$data);
      $this->db->or_like('t.deptname', $data);
      $this->db->or_like('t.owerassigned', $data);
      $this->db->or_like('t.extnumber', $data);

      $query = $this->db->get();

      return $query->result();

    }

    function get_campuses_code($campus_name)
    {

        return $this->db->select('ccode')->where('cname',$campus_name)->get('campuses')->row_array();

    }

    function get_campuses_depart($campus_code)
    {

        return $this->db->select('deptname')->where('ccode',$campus_code)->get('trialexcel')->result();

    }
    function get_campuses_depart_ext($deptname,$campus)
    {

        //return $this->db->select('extnumber,owerassigned,deptname')->where('deptname',$deptname)->get('trialexcel')->result();

        $this->db->select('c.cname,t.deptname,t.owerassigned,t.extnumber');
        $this->db->from('campuses as c');
        $this->db->join('trialexcel as t','c.ccode = t.ccode');
        $this->db->where('t.deptname',$deptname);
        $this->db->where('c.ccode',$campus);

        $query = $this->db->get();

        return $query->result();


    }
    function update_telephony($data)
    {

        return $this->db->insert('trialexcel',$data);

    }
    function get_extensions($limit,$start)
    {

        return $this->db->limit($limit,$start)->get("trialexcel")->result();

    }

    function get_extensions_by_search($data)
    {

        if($this->search_extension_by_campus($data))
        {
            return $this->search_extension_by_campus($data);

        }
        else 
        return FALSE;

    }


   function test_join()
    {

        $this->db->select('c.cname,t.deptname,t.owerassigned,t.extnumber');
		$this->db->from('campuses as c');
		$this->db->join('trialexcel as t','c.ccode = t.ccode');
        $this->db->like('c.cname','karen');
        $this->db->or_like('c.cname', 'main');
        $this->db->limit(10,0);
		$query = $this->db->get();

		return $query->result();

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
    

    function get_count() {

        return $this->db->count_all('trialexcel');
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

       return $this->db->where('email',$email)->get('telephoneadmin')->result();

    }
    function get_edit_admins($id)
    {

        return $this->db->where('id',$id)->get('adminregistration')->row_array();
        
    }
}