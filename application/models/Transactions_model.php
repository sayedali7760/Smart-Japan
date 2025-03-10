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
    public function get_success_deposit_details()
    {
        $this->db->select('t.*, c.name');
        $this->db->from('transactions AS t');
        $this->db->join('clients AS c', 'c.id = t.user_id', 'left');
        $this->db->where('t.type', 'deposit');
        $this->db->where('t.status', 'success');
        $this->db->order_by('t.id', "desc");
        $query = $this->db->get()->result();
        return $query;
    }
    public function get_success_withdraw_details()
    {
        $this->db->select('t.*, c.name');
        $this->db->from('transactions AS t');
        $this->db->join('clients AS c', 'c.id = t.user_id', 'left');
        $this->db->where('t.type', 'withdraw');
        $this->db->where('t.status_finished', 'closed');
        $this->db->order_by('t.id', "desc");
        $query = $this->db->get()->result();
        return $query;
    }
}
