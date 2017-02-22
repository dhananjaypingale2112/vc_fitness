<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmaster extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Program_model');
        $this->load->model('Helper_model');
        $this->load->model('Packages_model');
    }
	public function index()
	{
		$data['programs'] = $this->Helper_model->selectAll("","oc_program_master");
		$data['trainings'] = $this->Helper_model->selectAll("","oc_training_type");
		$data['packages'] = $this->Packages_model->getAllPackages(1);
		//echo "<pre>";print_r($data);exit;
		$this->load->view('index',$data);
	}
}