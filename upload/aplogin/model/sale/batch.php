<?php
class ModelSaleBatch extends Model {
	function getBatch() {
		$this->load->language('shipping/pickup');

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "shipping_batch");
		
		return $query->rows;
	}
	
	function getbatchName($id) {
		//$this->load->language('shipping/pickup');

		$query = $this->db->query("SELECT batch_name FROM " . DB_PREFIX . "shipping_batch where batch_id=$id");
		
		return $query->rows;
	}
}