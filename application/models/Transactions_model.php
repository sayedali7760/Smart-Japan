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
class Transactions_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }
    public function get_details()
    {
        $this->db->from('transactions');
        $this->db->order_by('transaction_id', "desc");
        $query = $this->db->get()->result();
        return $query;
    }
    
}
