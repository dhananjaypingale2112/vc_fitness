<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Packages_model');
        $this->load->model('Helper_model');
    }
	public function packagesView()
	{
		$data['packages'] = $this->Packages_model->getAllPackages(1);
		$data['optional_packages'] = $this->Packages_model->getAllPackages(2);
		//echo "<pre>";print_r($data);exit;
		$this->load->view('packages/packagesView',$data);
	}
	public function custPackagesView($packageId)
	{
		$firstname = $this->session->userdata('firstname');
		$lastname = $this->session->userdata('lastname');
		$where = array('package_id' => $packageId);
		$data['package'] = $this->Helper_model->select("","oc_package_master",$where);
		$data['name'] = "$firstname  $lastname";
		//echo "<pre>";print_r($data);exit;
		$this->load->view('packages/custPackagesView',$data);
	}
	public function get_packageEndDate()
	{
		$startDate = $this->input->post('strat_date');
		$duration = $this->input->post('duration');
		$endDate = date('d-m-Y', strtotime("+$duration months", strtotime($startDate)));
		echo $endDate;
	}
	public function confirmPackage()
	{
		$formData = $this->input->post();

		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone );
		$date =  $date->format( 'Y-m-d H:i:s');

		$data = array(
			'package_id'=> $formData['package_id'],
			'customer_id'=> $formData['package_customer_id'],
			'start_date'=> date('Y-m-d',strtotime($formData['package_stratDate'])),
			'end_date'=> date('Y-m-d',strtotime($formData['package_endDate'])),
			'comment'=> $formData['package_comment'],
			'date_added'=> $date
			);
		$result = $this->Helper_model->insert('oc_package_customer_master',$data);
		if(!empty($result))
		{
			echo 1;
		}
	}
	public function packagesPayment()
	{
		
		$this->load->view('packages/packagePayment');
	}
}