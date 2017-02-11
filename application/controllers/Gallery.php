<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->helper('cookie');
    }
	public function index()
	{
		$this->load->view('pages/gallery');
	}
}