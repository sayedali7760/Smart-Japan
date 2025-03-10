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
        if ($this->session->userdata['template_type'] != 1) {
            redirect('error');
        }
        $this->load->model('Transactions_model', 'TModel');
    }
    public function view_succesfull_transactions()
    {
        $data['title'] = 'Transactions';
        $data['subtitle'] = 'Successful Transactions';
        $data['deposit_data'] = $this->TModel->get_success_deposit_details($data);
        $data['withdraw_data'] = $this->TModel->get_success_withdraw_details($data);
        $data['template'] = 'modules/transactions/view_succesfull_trans';
        $this->load->view('template/dashboard_template', $data);
    }
    public function view_withdrawal()
    {
        $data['title'] = 'Transactions';
        $data['subtitle'] = 'Successful Withdrawals';
        $data['withdraw_data'] = $this->TModel->get_success_withdraw_details($data);
        $data['template'] = 'modules/transactions/view_withdraw';
        $this->load->view('template/dashboard_template', $data);
    }

    public function internal_transactions()
    {
        $data['title'] = 'Transactions';
        $data['subtitle'] = 'Internal Transfers';
        $data['details_data'] = $this->TModel->get_details($data);
        $data['template'] = 'modules/transactions/internal_transfer';
        $this->load->view('template/dashboard_template', $data);
    }

    public function pending_transactions()
    {
        $data['title'] = 'Transactions';
        $data['subtitle'] = 'Pending Payments';
        $data['details_data'] = $this->TModel->get_details($data);
        $data['template'] = 'modules/transactions/pending_transactions';
        $this->load->view('template/dashboard_template', $data);
    }
}
