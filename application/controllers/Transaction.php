<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['ecomm_login'])) {
            redirect('login');
        }
        if($this->session->userdata['type'] != 1){
            redirect('error');
        }
        $this->load->model('Transactions_model', 'TModel');
    }
    public function view_deposit()
    {
    
        $data['title'] = 'Transactions';
        $data['subtitle'] = 'Deposits';
        $data['details_data'] = $this->TModel->get_details($data);
        $data['template'] = 'modules/transactions/view_deposit';
        $this->load->view('template/dashboard_template', $data);

    }

    
}