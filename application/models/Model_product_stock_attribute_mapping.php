<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_product_stock_attribute_mapping extends MY_Model {

	private $primary_key 	= 'product_stock_attribite_mapping_id';
	private $table_name 	= 'product_stock_attribute_mapping';
	private $field_search 	= ['fk_stock_id', 'fk_product_attribute_mapping_id', 'value'];

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}

	public function count_all($q = null, $field = null)
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "product_stock_attribute_mapping.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "product_stock_attribute_mapping.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "product_stock_attribute_mapping.".$field . " = '" . $q . "' )";
        }

		$this->join_avaiable();
        $this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}

	public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "product_stock_attribute_mapping.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "product_stock_attribute_mapping.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "product_stock_attribute_mapping.".$field . " = '" . $q . "' )";
        }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }
		
		$this->join_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('product_stock_attribute_mapping.'.$this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

	public function join_avaiable() {
		$this->db->join('product_stock', 'product_stock.product_stock_id = product_stock_attribute_mapping.fk_stock_id', 'LEFT');
	    $this->db->join('attribute_master', 'attribute_master.attribute_id = product_stock_attribute_mapping.fk_product_attribute_mapping_id', 'LEFT');
	    
    	return $this;
	}

}

/* End of file Model_product_stock_attribute_mapping.php */
/* Location: ./application/models/Model_product_stock_attribute_mapping.php */