<?php
class ControllerApiCategory extends Controller {
	public function categories() {
		$this->load->language('api/category');
		
		$json = array();
		
		if (!isset($this->session->data['api_id'])) {
			$json['error']['warning'] = $this->language->get('error_permission');
		} else {
		    $this->load->model('catalog/category');
		    $category = $this->model_catalog_category->getCategories();
		    if ($category !== null){
		    $json['success']['categories'] = $category;
		    }else {
		       	$json['error']['warning'] = $this->language->get('error_not_found'); 
		    }
		}
		
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
	}
	
}