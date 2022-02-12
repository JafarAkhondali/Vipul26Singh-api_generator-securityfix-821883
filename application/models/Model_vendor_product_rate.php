<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_vendor_product_rate extends MY_Model {

	private $primary_key 	= 'vpr_id';
	private $table_name 	= 'vendor_product_rate';
	private $field_search 	= ['fk_vendor_id', 'fk_product_id', 'unit_rate'];

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
	                $where .= "vendor_product_rate.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "vendor_product_rate.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "vendor_product_rate.".$field . " = '" . $q . "' )";
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
	                $where .= "vendor_product_rate.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "vendor_product_rate.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "vendor_product_rate.".$field . " = '" . $q . "' )";
        }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }
		
		$this->join_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('vendor_product_rate.'.$this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

	public function join_avaiable() {
		$this->db->join('vendor_master', 'vendor_master.vendor_mast_id = vendor_product_rate.fk_vendor_id', 'LEFT');
	    $this->db->join('product_master', 'product_master.product_master_id = vendor_product_rate.fk_product_id', 'LEFT');
	    
    	return $this;
	}

}

/* End of file Model_vendor_product_rate.php */
/* Location: ./application/models/Model_vendor_product_rate.php */