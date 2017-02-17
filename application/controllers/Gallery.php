<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model');
    }
	public function index()
	{
		$data['gallery'] = $this->Helper_model->selectAll("","oc_gallery");
		//echo "<pre>"; print_r($data);exit;
		$this->load->view('pages/gallery',$data);
	}
}