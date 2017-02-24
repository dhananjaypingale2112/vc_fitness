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
        $this->load->model('Product_model');

        $this->data['programs'] = $this->Helper_model->selectAll("","oc_program_master");
		$this->data['trainings'] = $this->Helper_model->selectAll("","oc_training_type");
		$this->data['packages'] = $this->Packages_model->getAllPackages(1);
		$this->data['cat'] = $this->Product_model->selectCategory();
		$this->data['product'] = $this->Product_model->selectNewproducForMenu();

    }
	public function index()
	{
		$data = $this->data;
		
		$data['page'] = "index";
		$this->load->view('templates/header',$data);
		$this->load->view('index');
		$this->load->view('templates/footer');
	}
}