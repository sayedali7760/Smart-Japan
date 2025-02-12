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
class Client_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        if ($this->db->insert('client_details', $data)) {
            return TRUE;
        }
    }

    public function get_details()
    {
        $this->db->from('client_details');
        $this->db->order_by('id', "desc");
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_client_details($client_id)
    {
        $query = $this->db->select('C.*')
            ->from('client_details as C')
            ->where('C.id', $client_id)
            ->get()
            ->row_array();
        return $query;
    }

    public function change_status($data, $client_id)
    {
        $this->db->update('client_details', $data, 'id=' . $client_id . '');
        return true;
    }
}