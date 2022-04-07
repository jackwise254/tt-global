<?php

namespace App\Models;
use CodeIgniter\Model;

class PModel extends Model {
	
	protected $product = 'masterlist';
	
	function get_product_list() {        
		$query = $this->db->table($this->product)->get();
        
		return $query->getResult();
    }
	
	function delete_products_by_ids($ids) {		
		if($this->db->table($this->product)->whereIn('id', $ids)->delete()) {
			return true;
		} else {
			return false;
		}
	}
	
}