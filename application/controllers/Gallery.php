<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model');
        $this->load->model('Gallery_model');
    }
	public function index($type_id="")
	{
		$data['gallery'] = $this->Gallery_model->selectAllgallery($type_id);
		$data['gallery_type'] = $this->Helper_model->selectallOrder("","oc_gallery_type","name","ASC");
		// echo "<pre>"; print_r($data);exit;
		$this->load->view('pages/gallery',$data);
	}
	public function addGalleryLike($galleryId = "")
	{
		$customer_id = $this->session->userdata('customer_id');
		if($customer_id){

			$check = $this->Gallery_model->select($customer_id,$galleryId);
			if(!empty($check[0]['gallery_likes_id']))
			{
				$value = $check[0]['gallery_likes_id'];
				$this->Helper_model->delete("oc_gallery_likes","gallery_likes_id",$value);
				echo 0;
			}
			else{
				$data = array(
					'customer_id' => $customer_id,
					'gallery_id'  => $galleryId
				);
				$this->Helper_model->insert('oc_gallery_likes',$data);
				echo 1;
			}
		}
	}




	////////////
}