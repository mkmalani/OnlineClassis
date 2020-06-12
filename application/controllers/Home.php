<?php
ob_start();
error_reporting(0);

class Home extends CI_Controller{

	public function __construct()
  {
    parent::__construct();
  }

	
	public function index()
	{
		if($this->session->userdata('sess_id'))
		{
		 	
      		$data['schoolDtl']=$this->model->querydata("select * FROM school_master WHERE School_IsActDct = '0' order by School_RowId asc");

		 	$this->load->view('Admin/home',$data);

      
		}
		else
		{
			redirect(base_url());	
		}	
	}


  
}		