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
class Mt_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_live_accounts()
    {
        $this->db->select('a.*, c.name');
        $this->db->from('accounts AS a');
        $this->db->join('clients AS c', 'c.id = a.user_id', 'left');
        $this->db->where('a.server', 'Live');
        $this->db->order_by('a.user_id', "desc");
        $query = $this->db->get()->result();
        return $query;
    }
    public function get_demo_accounts()
    {
        $this->db->select('a.*, c.name');
        $this->db->from('accounts AS a');
        $this->db->join('clients AS c', 'c.id = a.user_id', 'left');
        $this->db->where('a.server', 'Demo');
        $this->db->order_by('a.user_id', "desc");
        $query = $this->db->get()->result();
        return $query;
    }
}
