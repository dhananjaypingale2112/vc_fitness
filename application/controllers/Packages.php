<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Packages_model');
        $this->load->model('Helper_model');
        $this->load->library('cart');
        // $this->load->helper('session');
    }
	public function packagesView()
	{
		$data['packages'] = $this->Packages_model->getAllPackages();
		//echo "<pre>";print_r($data);exit;
		$this->load->view('packages/packagesView',$data);
	}
}