<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Public_dash extends CI_Controller
{


	//public $data;
	
	public function __construct()
	{
		parent::__construct();
		// $this->data['page_title'] = 'Dashboard';

		$this->load->model('extensions_m');
	}
	public function index()
	{
		$data['base_url'] = base_url();
		// $data = ""; 
		$data['campuses'] = $this->extensions_m->get_campuses();

		$this->load->view('templates/header',$data);
		 
		$this->load->view('templates/header_menu_v2',$data);
		$this->load->view('telephony', $data);
		$this->load->view('templates/footer',$data);
	}

	public function search() //$ext_number= "100"
	{
		$extension = $_POST['ext'];

		// $ext_number =  "main";
		
		$data['ext'] = $this->extensions_m->search_extension($extension);

		
		$jsonData = json_encode($data['ext'], JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES);
		
		header('Content-Type: application/json');

		echo $jsonData;

		// echo "<pre>";
        // print_r(json_encode($jsonData));
		// die;
	 
	}

	public function departments($campus)
	{
		$data['camp_code'] = $this->extensions_m->get_campus_code($campus);

		

	}
	public function test_join()
    {
		echo "<pre>";
        $data = $this->extensions_m->test_join();
       
		 print_r($data);
		// echo current_url().'/departments';
    }

	public function get_campuses_depart()
	{
		$campus_code = $_POST['campus'];

		// $campus_code = "main1";

		$data['campus_department'] = $this->extensions_m->get_campuses_depart($campus_code);
		// echo '<pre>';
		// print_r($data['campus_department']);
		// die;
		
		$filtered_data = [];

		foreach($data['campus_department'] as $key => $value)
		{
			if(in_array($value->deptname,$filtered_data))
			{
				continue;
			}
			$filtered_data[] =	$value->deptname;
		}

		// echo "<pre>";
		// print_r($filtered_data);
		// die();
		$jsonData = json_encode($filtered_data, JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES);

		header('Content-Type: application/json');

		echo $jsonData;
	 
	}

	public function test($campus)
	{
		print_r($this->extensions_m->get_campuses_depart($campus));
	}
	public function get_campuses_depart_ext()
	{
		$department = $_POST['depart'];
		$campus = $_POST['campus'];
		$data['extensions'] = $this->extensions_m->get_campuses_depart_ext($department,$campus);

		$jsonData = json_encode($data['extensions'], JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES);

		header('Content-Type: application/json');

		echo $jsonData;


		// echo "<pre>";
		// print_r($jsonData);
		// die;

	}


}
