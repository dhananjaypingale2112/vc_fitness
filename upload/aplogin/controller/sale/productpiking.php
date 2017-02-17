<?php

class ControllerSaleProductPiking extends Controller{ 
    public function index() {
        $this->load->language('sale/piking_list');

        $this->document->setTitle($this->language->get('heading_title'));

		if (isset($this->request->get['filter_batch'])) {
			$filter_batch = $this->request->get['filter_batch'];
		} else {
			$filter_batch = null;
		}
		
		if (isset($this->request->get['filter_date_added'])) {
			$filter_date_added = $this->request->get['filter_date_added'];
		} else {
			$filter_date_added = null;
		}
		
		
        if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
        } else {
            $page = 1;
        }

        $url = '';

		if (isset($this->request->get['filter_batch'])) {
			$url .= '&filter_batch=' . urlencode(html_entity_decode($this->request->get['filter_batch'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}
		
        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('sale/productpiking', 'token=' . $this->session->data['token'] . $url, 'SSL')
        );

        $this->load->model('sale/pikinglist');
		$this->load->model('sale/batch');

        $filter_data = array(
			'filter_batch'	   	   => $filter_batch,
			'filter_date_added'    => $filter_date_added,
            'start' => ($page - 1) * $this->config->get('config_limit_admin'),
            'limit' => $this->config->get('config_limit_admin')
        );

        $data['products'] = array();

        //$product_viewed_total = $this->model_sale_hello->getTotalProductViews();

        $product_total = $this->model_sale_pikinglist->getTotalProductsViewed($filter_data);

        $results = $this->model_sale_pikinglist->getProductsViewed($filter_data);
		 
        //$product_total = count($results);
        //echo $product_total;exit();
        //echo "<pre>";

        //echo "<pre>";print_r($results);exit();
		
		$batch = $this->model_sale_batch->getBatch();
		
		$data['shipping_batches'] = $batch;
		$data['filter_date_added'] = $filter_date_added;
		$data['filter_batch'] = $filter_batch;
		$data['token'] = $this->session->data['token'];
        $data['products'] = $results;
 

        //print_r($data['products']);exit(); 

        $data['heading_title'] = $this->language->get('heading_title');

        $data['text_list'] = $this->language->get('text_list');
        $data['text_no_results'] = $this->language->get('text_no_results');
        $data['text_confirm'] = $this->language->get('text_confirm');

        $data['column_name'] = $this->language->get('column_name');
        $data['column_model'] = $this->language->get('column_model');
        $data['column_price'] = $this->language->get('column_price');
        $data['column_qty'] = $this->language->get('column_qty');
        $data['column_status'] = $this->language->get('column_status');

        $data['button_reset'] = $this->language->get('button_reset');

        
        if (isset($this->session->data['error'])) {
            $data['error_warning'] = $this->session->data['error'];

            unset($this->session->data['error']);
        } elseif (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }
		//$data['print'] = $this->url->link('sale/pikinglistprint', 'token=' . $this->session->data['token'] , 'SSL');
		
		$data['print'] = $this->url->link('sale/productpiking/plist', 'token=' . $this->session->data['token'].$url, 'SSL');
        $pagination = new Pagination();
        $pagination->total = $product_total;
        $pagination->page = $page;
        $pagination->limit = $this->config->get('config_limit_admin');
        $pagination->url = $this->url->link('sale/productpiking', 'token=' . $this->session->data['token'] . '&page={page}', 'SSL');

        $data['pagination'] = $pagination->render();

        $data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($product_total - $this->config->get('config_limit_admin'))) ? $product_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $product_total, ceil($product_total / $this->config->get('config_limit_admin')));

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('sale/piking_form.tpl', $data));
    }

    public function reset() {
        $this->load->language('sale/piking_list');

        if (!$this->user->hasPermission('modify', 'sale/productpiking')) {
            $this->session->data['error'] = $this->language->get('error_permission');
        } else {
            $this->load->model('sale/Pikinglist');

            $this->model_sale_pikinglist->reset();

            $this->session->data['success'] = $this->language->get('text_success');
        }

        $this->response->redirect($this->url->link('sale/productpiking', 'token=' . $this->session->data['token'], 'SSL'));
    }
	
	public function plist() {
	 
	 if (isset($this->request->get['filter_batch'])) {
			 $filter_batch = $this->request->get['filter_batch'];
		} else {
			 $filter_batch = null;
		}
		
		if (isset($this->request->get['filter_date_added'])) {
			 $filter_date_added = $this->request->get['filter_date_added'];
		} else {
			 $filter_date_added = null;
		}
		$filter_data = array(
			'filter_batch'	   	   => $filter_batch,
			'filter_date_added'    => $filter_date_added 
        );
		
	 	if ($this->request->server['HTTPS']) {
			$data['base'] = HTTPS_SERVER;
		} else {
			$data['base'] = HTTP_SERVER;
		}
		
		$data['direction'] = $this->language->get('direction');
		$data['lang'] = $this->language->get('code');
		$this->load->language('sale/piking_list');
		$this->document->setTitle($this->language->get('heading_title'));

        
        $this->load->model('sale/pikinglist');

       
        $data['products'] = array();

 
		
        $product_total = $this->model_sale_pikinglist->getProductsViewed($filter_data);
  
        $data['products'] = $product_total;
		
        $data['heading_title'] = $this->language->get('heading_title');
		$data['title'] = "Piking List";

        $data['text_list'] = $this->language->get('text_list');
        $data['text_no_results'] = $this->language->get('text_no_results');
        $data['text_confirm'] = $this->language->get('text_confirm');

        $data['column_name'] = $this->language->get('column_name');
        $data['column_model'] = $this->language->get('column_model');
        $data['column_price'] = $this->language->get('column_price');
        $data['column_qty'] = $this->language->get('column_qty');
        $data['column_status'] = $this->language->get('column_status');

        $data['button_reset'] = $this->language->get('button_reset');
 
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('sale/plist.tpl', $data));
 
	}
	
	
}
?>