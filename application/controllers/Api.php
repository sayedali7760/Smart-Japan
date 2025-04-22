<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller
{
     public function __construct()
    {
        parent::__construct();
    }
   
    public function nexus_callback()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        print_r($data);
        die;
    }
}
