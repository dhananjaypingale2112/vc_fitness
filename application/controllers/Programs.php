<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Program_model');
        $this->load->model('Helper_model');
    }

	public function programView($programId="",$trainingId="")
	{
		$data['programs'] = $this->Program_model->getAllPrograms();
		if(empty($programId))
		{
			$programId = $data['programs'][0]['program_id'];
		}
		$data['trainings'] = $this->Program_model->getAllTrainingType($programId);
		//echo "<pre>";print_r($data['trainings']);exit;
		$this->load->view('programs/programsView',$data);
	}
	public function getTrainingContent()
	{
		$trainingId = $this->input->post('trainingId');
		$data = $this->Program_model->getTrainingContent($trainingId);
		//echo "<pre>";print_r($data[0]['content']);exit;
		echo $data[0]['content'];
	}
}