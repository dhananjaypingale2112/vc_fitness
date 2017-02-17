<?php
class ModelSalePikinglist extends Model {
     
    	public function getProductsViewed($data = array()) {
		//$sql = "SELECT pd.name, p.model, p.viewed FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.viewed > 0 ORDER BY p.viewed DESC";
		$sql = "SELECT op.name as product_name,op.model,op.price,sum(op.quantity) as qty,o.order_status_id,o.batch_id,sb.batch_name,os.name FROM ". DB_PREFIX ."order_product op,". DB_PREFIX ."order o,". DB_PREFIX ."shipping_batch sb,". DB_PREFIX ."order_status os where o.order_id = op.order_id and o.order_status_id=2 and o.batch_id = sb.batch_id and o.order_status_id=os.order_status_id";
		//echo $sql;exit();
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}
			
		}
		
		if (!empty($data['filter_date_added'])) {
			$sql .= " AND DATE(o.date_added) = DATE('" . $this->db->escape($data['filter_date_added']) . "')";
			}
			
			if (!empty($data['filter_batch'])) {
			$sql .= " AND o.batch_id = '" . (int)$data['filter_batch'] . "'";
			}
		
		$sql .= " group by product_name";
		if (isset($data['start']) || isset($data['limit'])) {
		$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
		//echo $sql;exit;
		$query = $this->db->query($sql);
		//echo "<pre>";
		//print_r($query->rows);exit();
		return $query->rows;
	}

	

	public function getTotalProductsViewed($data = array()) {
		$sql = "SELECT op.name as product_name,op.model,op.price,sum(op.quantity) as qty,o.order_status_id,sb.batch_name,os.name  FROM ". DB_PREFIX ."order_product op,". DB_PREFIX ."order o,". DB_PREFIX ."shipping_batch sb,". DB_PREFIX ."order_status os where o.order_id = op.order_id and o.order_status_id=2 and o.batch_id = sb.batch_id and o.order_status_id=os.order_status_id";
		
		
		if (!empty($data['filter_date_added'])) {
		$sql .= " AND DATE(o.date_added) = DATE('" . $this->db->escape($data['filter_date_added']) . "')";
		}
		
		if (!empty($data['filter_batch'])) {
		$sql .= " AND o.batch_id = '" . (int)$data['filter_batch'] . "'";
		}
		
		$sql .= " group by product_name";
		//echo $sql;
		$query = $this->db->query($sql);
		/*echo "<pre>";
		print_r($query->rows);
		echo count($query->rows);exit;*/
		return count($query->rows);
	}

	 

     
}
?>