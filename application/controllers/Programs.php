<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends CI_Controller {

	function __construct()
    {
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
	public function programView($programId="",$trainingId="")
	{
		$data = $this->data;
		
		$data['page'] = "programs";
		$this->load->view('templates/header',$data);

		$data['programs'] = $this->Program_model->getAllPrograms();
		if(empty($programId))
		{
			$programId = $data['programs'][0]['program_id'];
		}
		$data['trainings'] = $this->Program_model->getAllTrainingType($programId);
		//echo "<pre>";print_r($data['trainings']);exit;
		$this->load->view('programs/programsView',$data);
		$this->load->view('templates/footer');
	}
	public function getTrainingContent()
	{
		$trainingId = $this->input->post('trainingId');
		$data = $this->Program_model->getTrainingContent($trainingId);
		//echo "<pre>";print_r($data[0]['content']);exit;
		echo $data[0]['content'];
	}
}