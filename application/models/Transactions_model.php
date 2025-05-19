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
    public function insert_transaction($data_array)
    {
        if ($this->db->insert('transactions', $data_array)) {
            return true;
        }
    }
    public function update_transaction($data_update_array, $transaction_id)
    {
        $this->db->update('transactions', $data_update_array, 'id=' . $transaction_id . '');
        return true;
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
        $this->db->where('t.status_finished', 'approved');
        $this->db->order_by('t.id', "desc");
        $query = $this->db->get()->result();
        return $query;
    }
    public function get_transaction_details($client_id)
    {
        $this->db->select('t.*, c.name');
        $this->db->from('transactions AS t');
        $this->db->join('clients AS c', 'c.id = t.user_id', 'left');
        $this->db->where('t.user_id', $client_id);
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
        $this->db->where('t.status', 'new');
        $this->db->where('t.status_finished', 'approved');
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
        $this->db->where('t.status', 'pending');
        $this->db->where('t.status_finished', null);
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
        $this->db->where('t.status', 'new');
        $this->db->where('t.status_finished', null);
        $this->db->order_by('t.id', "desc");
        $query = $this->db->get()->result();
        return $query;
    }
    public function get_rejected_transaction_details()
    {
        $this->db->select('t.*, c.name');
        $this->db->from('transactions AS t');
        $this->db->join('clients AS c', 'c.id = t.user_id', 'left');
        //$this->db->where('t.type', 'withdraw');
        $this->db->where('t.status', 'success');
        $this->db->where('t.status_finished', 'declined');
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
    public function reject_withdraw($data, $transaction_id)
    {
        $this->db->update('transactions', $data, 'id=' . $transaction_id . '');
        return true;
    }
    public function process_deposit($data, $transaction_id)
    {
        $this->db->update('transactions', $data, 'id=' . $transaction_id . '');
        return true;
    }
    public function process_withdraw($data, $transaction_id)
    {
        $this->db->update('transactions', $data, 'id=' . $transaction_id . '');
        return true;
    }
    public function get_verified_bank_details($id)
    {
        $this->db->select('b.*');
        $this->db->from('bank_data AS b');
        $this->db->where('b.client_id', $id);
        $this->db->where('b.status', 1);
        $query = $this->db->get()->result();
        return $query;
    }
    public function check_wallet_address($id)
    {
        $this->db->select('w.*');
        $this->db->from('wallet_address AS w');
        $this->db->where('w.client_id', $id);
        $this->db->where('w.status', 1);
        $query = $this->db->get()->row_array();
        return $query;
    }
    public function get_client($login)
    {
        $this->db->select('a.user_id');
        $this->db->from('accounts AS a');
        $this->db->where('a.login', $login);
        $query = $this->db->get()->row();
        return $query ? (int) $query->user_id : null;
    }
}
