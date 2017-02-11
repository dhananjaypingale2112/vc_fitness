<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmaster extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->helper('cookie');
    }
	public function index()
	{
		$this->load->view('index');
	}
	public function aboutUs()
	{
		$this->load->view('about');
	}
	public function gallery()
	{
		$this->load->view('pages/gallery');
	}
}