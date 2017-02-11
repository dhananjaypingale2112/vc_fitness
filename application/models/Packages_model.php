<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packages_model extends CI_Model {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
	}

	public function getAllPackages()
	{
		return $this->db->query("SELECT * FROM oc_package_master ")->result_array();

		//return $this->db->query("SELECT pm.*,pvm.* FROM oc_package_master pm LEFT JOIN oc_package_video_master pvm ON(pm.package_id=pvm.package_id) GROUP BY(pvm.package_id) ")->result_array();
	}


}