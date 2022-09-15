<?php
class ControllerApiProduct extends Controller {
    public function products() {
        $this->load->language('api/product');
    
        $json = array();
        
        if (!isset($this->session->data['api_id'])) {
			$json['error']['warning'] = $this->language->get('error_permission');
		} else {
		    if (isset($this->request->get['category_id'])) {
		        $category_id = $this->request->get['category_id'];
		        if( $category_id >0){
		         $this->load->model('catalog/product');
		        $products = $this->model_catalog_product->getProducts();
		        $count_products = count($products);
		        foreach ($products as $product){
		              if (isset($product['product_id'])) {
		                  $product_id = $product['product_id'];
		                  $categoriesCheck = $this->model_catalog_product->getCategoriesOnly($product_id);
		                  if ($categoriesCheck !== $category_id){
		                      unset($products[$product_id]);
		                  }
		              } else {
						$product_id = array();
		              }
		          }
		          $count_products = count($products);
		          if ($count_products > 0 ){
		             $json['success']['products'] = $products;  
		          } else {
		              $json['error']['warning'] = $this->language->get('error_not_found');
		          }
		          
		        }else{
		        $json['error']['warning'] = $this->language->get('error_category_undefined');
		    }
		       
		    }
		    
		}
        
    $this->response->addHeader('Content-Type: application/json');
    $this->response->setOutput(json_encode($json));
  }
}