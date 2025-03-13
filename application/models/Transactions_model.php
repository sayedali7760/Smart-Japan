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
    public function get_transactions_unique($transaction_id)
    {
        $this->db->select('t.*');
        $this->db->from('transactions AS t');
        $this->db->where('t.id', $transaction_id);
        $query = $this->db->get()->row_array();
        return $query;
    }
    public function view_succesfull_deposit()
    {
        $this->db->select('t.*, c.name');
        $this->db->from('transactions AS t');
        $this->db->join('clients AS c', 'c.id = t.user_id', 'left');
        $this->db->where('t.type', 'deposit');
        $this->db->where('t.status', 'success');
        $this->db->where('t.status_finished', 'closed');
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
    public function get_success_internal_transfers()
    {
        $this->db->select('t.*, c.name');
        $this->db->from('transactions AS t');
        $this->db->join('clients AS c', 'c.id = t.user_id', 'left');
        $this->db->where_not_in('t.type', ['withdraw', 'deposit']);
        $this->db->order_by('t.id', "desc");
        $query = $this->db->get()->result();
        return $query;
    }
    public function get_pending_deposit_details()
    {
        $this->db->select('t.*, c.name');
        $this->db->from('transactions AS t');
        $this->db->join('clients AS c', 'c.id = t.user_id', 'left');
        $this->db->where('t.type', 'deposit');
        $this->db->where_in('t.status', ['pending', 'success']);
        $this->db->where_not_in('t.status_finished', ['closed', 'declined']);
        $this->db->order_by('t.id', "desc");
        $query = $this->db->get()->result();
        return $query;
    }
    public function get_pending_withdraw_details()
    {
        $this->db->select('t.*, c.name');
        $this->db->from('transactions AS t');
        $this->db->join('clients AS c', 'c.id = t.user_id', 'left');
        $this->db->where('t.type', 'withdraw');
        $this->db->where_in('t.status', ['new']);
        $this->db->where_not_in('t.status_finished', ['closed', 'declined']);
        $this->db->order_by('t.id', "desc");
        $query = $this->db->get()->result();
        return $query;
    }
    public function approve_deposit($data, $transaction_id)
    {
        $this->db->update('transactions', $data, 'id=' . $transaction_id . '');
        return true;
    }
    public function reject_deposit($data, $transaction_id)
    {
        $this->db->update('transactions', $data, 'id=' . $transaction_id . '');
        return true;
    }
    public function process_deposit($data, $transaction_id)
    {
        $this->db->update('transactions', $data, 'id=' . $transaction_id . '');
        return true;
    }
}
