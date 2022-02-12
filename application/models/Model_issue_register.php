<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_issue_register extends MY_Model {

	private $primary_key 	= 'issue_register_id';
	private $table_name 	= 'issue_register';
	private $field_search 	= ['trn_type', 'fk_emp_id', 'fk_product_id', 'quantity', 'issue_date', 'return_date', 'issue_purpose'];

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
	                $where .= "issue_register.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "issue_register.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "issue_register.".$field . " = '" . $q . "' )";
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
	                $where .= "issue_register.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "issue_register.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "issue_register.".$field . " = '" . $q . "' )";
        }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }
		
		$this->join_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('issue_register.'.$this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

	public function join_avaiable() {
		$this->db->join('employee_master', 'employee_master.employee_id = issue_register.fk_emp_id', 'LEFT');
	    $this->db->join('product_master', 'product_master.product_master_id = issue_register.fk_product_id', 'LEFT');
	    
    	return $this;
	}

}

/* End of file Model_issue_register.php */
/* Location: ./application/models/Model_issue_register.php */