<?php

class Client_model extends CI_MODEL
{
    public function __construct()
    {
        parent::construct();
    }

    public function add_client($data)
    {
        if($this->db->insert('client_details',$data)){
            return TRUE;
        }
    }
}