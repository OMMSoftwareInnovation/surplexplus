<?php 

class Homemodel extends CI_Model
{

	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

    function searchbar($data)
    {
		$this->db->select('product_id,product_name');
		$this->db->from('products');
		$this->db->like('product_name', $data);
		$this->db->where('product_status','2');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
    }

    function searchbar1($data)
    {
		$this->db->select('distinct(p_manufacturer),count(product_id) as count');
		$this->db->from('products');
		$this->db->like('p_manufacturer', $data);
		$this->db->where('product_status','2');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
    }

	function productsearch($id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('product_id',$id);
		$this->db->where('product_status','2');
		$query = $this->db->get();
		return $query->result_array();
	}

	function manufacsearch($data)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->like('p_manufacturer', $data);
		$this->db->where('product_status','2');
		$query = $this->db->get();
		return $query->result_array();
	}

}