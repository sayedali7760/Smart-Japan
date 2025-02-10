<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of caste_model
 *
 * @author Seyad ali N
 */
class Product_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }
    public function get_details()
    {
        $this->db->from('category');
        $this->db->order_by('category', "asc");
        $query = $this->db->get()->result();
        return $query;
    }
    public function get_product_details()
    {
        $this->db->select('product.*, category.category as category_name,organization.name as distributor_name');  
        $this->db->from('product');                                      
        $this->db->join('category', 'category.category_id = product.category');
        $this->db->join('organization', 'organization.organization_id = product.distributor'); 
        $this->db->order_by('product.name', "asc");                      
        $query = $this->db->get()->result();                            
        return $query;

    }
    public function get_product_details_single($product_id)
    {
        $this->db->select('product.*, category.category as category_name,organization.name as distributor_name');  
        $this->db->from('product');                                      
        $this->db->join('category', 'category.category_id = product.category');
        $this->db->join('organization', 'organization.organization_id = product.distributor'); 
        $this->db->order_by('product.name', "asc");
        $this->db->where('product.product_id',$product_id);
        $query = $this->db->get()->row();                            
        return $query;

    }
    public function get_category()
    {
        $query = $this->db->get_where('category', array('is_active' => 1))->result();
        return $query;
    }
    public function get_distributors()
    {
        $query = $this->db->get_where('organization', array('is_active' => 1))->result();
        return $query;
    }
    public function insert($data)
    {
        if ($this->db->insert('category', $data)) {
            return TRUE;
        }
    }
    public function insert_product($data)
    {
        if ($this->db->insert('product', $data)) {
            return TRUE;
        }
    }
    public function update($data, $category_id)
    {
        $this->db->update('category', $data, 'category_id=' . $category_id . '');
        return true;
    }
    public function update_product($data,$product_id)
    {
        $this->db->update('product', $data, 'product_id=' . $product_id . '');
        return true;
    }
    public function change_status($data, $category_id)
    {
        $this->db->update('category', $data, 'category_id=' . $category_id . '');
        return true;
    }
    public function change_product_status($data, $product_id)
    {
        $this->db->update('product', $data, 'product_id=' . $product_id . '');
        return true;
    }
}