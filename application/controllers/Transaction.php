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
    public function view_succesfull_deposit()
    {
        $data['title'] = 'Transactions';
        $data['subtitle'] = 'Successful Deposits';
        $data['deposit_data'] = $this->TModel->view_succesfull_deposit();
        $data['template'] = 'modules/transactions/view_deposit';
        $this->load->view('template/dashboard_template', $data);
    }
    public function view_withdrawal()
    {
        $data['title'] = 'Transactions';
        $data['subtitle'] = 'Successful Withdrawals';
        $data['withdraw_data'] = $this->TModel->get_success_withdraw_details();
        $data['template'] = 'modules/transactions/view_withdraw';
        $this->load->view('template/dashboard_template', $data);
    }

    public function internal_transactions()
    {
        $data['title'] = 'Transactions';
        $data['subtitle'] = 'Internal Transfers';
        $data['transfer_data'] = $this->TModel->get_success_internal_transfers();
        $data['template'] = 'modules/transactions/internal_transfer';
        $this->load->view('template/dashboard_template', $data);
    }

    public function pending_deposits()
    {
        $data['title'] = 'Transactions';
        $data['subtitle'] = 'Pending Deposits';
        $data['pending_data'] = $this->TModel->get_pending_deposit_details();
        $data['template'] = 'modules/transactions/pending_transactions';
        $this->load->view('template/dashboard_template', $data);
    }
    public function pending_withdrawal()
    {
        $data['title'] = 'Transactions';
        $data['subtitle'] = 'Pending Withdrawals';
        $data['pending_data'] = $this->TModel->get_pending_withdraw_details();
        $data['template'] = 'modules/transactions/pending_withdraw';
        $this->load->view('template/dashboard_template', $data);
    }
    public function rejected_transactions()
    {
        $data['title'] = 'Transactions';
        $data['subtitle'] = 'Rejected Transactions';
        $data['rejected_data'] = $this->TModel->get_rejected_transaction_details();
        $data['template'] = 'modules/transactions/rejected_transactions';
        $this->load->view('template/dashboard_template', $data);
    }
    public function approve_deposit()
    {
        $transaction_id = $this->input->post('transaction_id');
        $data = array('status' => 'success', 'status_finished' => 'approved');
        if ($this->TModel->approve_deposit($data, $transaction_id)) {
            echo json_encode(array('status' => 1));
            return;
        } else {
            return false;
        }
    }
    public function reject_deposit()
    {
        $transaction_id = $this->input->post('transaction_id');
        $data = array('status' => 'success', 'status_finished' => 'declined');
        if ($this->TModel->reject_deposit($data, $transaction_id)) {
            echo json_encode(array('status' => 1));
            return;
        } else {
            return false;
        }
    }
    public function reject_withdraw()
    {
        $transaction_id = $this->input->post('transaction_id');
        $data = array('status_finished' => 'declined');
        if ($this->TModel->reject_withdraw($data, $transaction_id)) {
            echo json_encode(array('status' => 1));
            return;
        } else {
            return false;
        }
    }
    public function process_deposit()
    {
        $transaction_id = $this->input->post('transaction_id');
        $data = array('status' => 'success', 'status_finished' => 'closed', 'date_modified' => date('Y-m-d H:i:s'));
        if ($this->TModel->process_deposit($data, $transaction_id)) {

            $transaction_data = $this->TModel->get_transactions_unique($transaction_id);
            $mtAmount = $transaction_data['amount'];
            require_once(APPPATH . 'MT/mt5_api/mt5_api.php');
            $instance = new MTWebAPI();
            // $response = $instance->Connect(LIVE_IP, LIVE_PORT, LIVE_TIMEOUT, LIVE_LOGIN, LIVE_PASSWORD);
            $response = $instance->Connect(DEMO_IP, DEMO_PORT, DEMO_TIMEOUT, DEMO_LOGIN, DEMO_PASSWORD);
            if ($response !== MTRetCode::MT_RET_OK) {
                // echo "Failed to connect to MetaTrader 5 server. Error code: " . $response;
                echo json_encode(array('status' => 2));
                return;
            } else {
                $mtAmount = $transaction_data['amount'];
                // $login = $transaction_data['login'];
                $login = 1105391;
                $result = $instance->TradeBalance($login, MTEnDealAction::DEAL_BALANCE,  $mtAmount, 'Nexus', $ticket);
                echo json_encode(array('status' => 1));
                return;
            }
        } else {
            echo json_encode(array('status' => 2));
            return;
        }
    }
    public function process_withdraw()
    {
        $transaction_id = $this->input->post('transaction_id');
        $data = array('status_finished' => 'closed');
        if ($this->TModel->process_withdraw($data, $transaction_id)) {

            $transaction_data = $this->TModel->get_transactions_unique($transaction_id);
            $mtAmount = $transaction_data['amount'];
            require_once(APPPATH . 'MT/mt5_api/mt5_api.php');
            $instance = new MTWebAPI();
            // $response = $instance->Connect(LIVE_IP, LIVE_PORT, LIVE_TIMEOUT, LIVE_LOGIN, LIVE_PASSWORD);
            $response = $instance->Connect(DEMO_IP, DEMO_PORT, DEMO_TIMEOUT, DEMO_LOGIN, DEMO_PASSWORD);
            if ($response !== MTRetCode::MT_RET_OK) {
                // echo "Failed to connect to MetaTrader 5 server. Error code: " . $response;
                echo json_encode(array('status' => 2));
                return;
            } else {
                $mtAmount = $transaction_data['amount'];
                // $login = $transaction_data['login'];
                $login = 1105391;
                $result = $instance->TradeBalance($login, MTEnDealAction::DEAL_BALANCE,  -$mtAmount, 'Nexus', $ticket);
                echo json_encode(array('status' => 1));
                return;
            }
        } else {
            echo json_encode(array('status' => 2));
            return;
        }
    }
}
