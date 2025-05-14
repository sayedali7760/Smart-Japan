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
        if ($data['event'] == "payment_completed") {
            require_once(APPPATH . 'MT/mt5_api/mt5_api.php');
            try {
                $instance = new MTWebAPI();
                $response = $instance->Connect(LIVE_IP, LIVE_PORT, LIVE_TIMEOUT, LIVE_LOGIN, LIVE_PASSWORD);
                if ($response !== MTRetCode::MT_RET_OK) {
                    echo "Failed to connect to MetaTrader 5 server. Error code: " . $response;
                } else {
                }
            } catch (Exception $e) {
                echo "An error occurred: " . $e->getMessage();
            }
            $mtAmount = $data['data']['body_amount'];
            $transaction_id = $data['data']['crypto_address_reference'];
            $qr = $this->db->select('t.*')
                ->from('transactions as t')
                ->where('t.id', $transaction_id)
                ->get()                // <- this was missing
                ->row_array();
            $client_details = $this->db->select('c.*')
                ->from('clients as c')
                ->where('c.id', $qr['user_id'])
                ->get()
                ->row_array();
            $login = $qr['account_id'];
            $email = $client_details['email'];
            $result = $instance->TradeBalance($login, MTEnDealAction::DEAL_BALANCE,  $mtAmount, 'Nexus', $ticket);
            $data_array = array('amount' => $mtAmount, 'amount_processed' => $mtAmount, 'amount_finished' => $mtAmount, 'status' => 'success', 'status_finished' => 'approved');
            $this->db->update('transactions', $data_array, 'id=' . $transaction_id . '');

            $subject = "Deposit Completed";
            $mailto = $email;
            $mail_to_manager = MANAGER_MAIL;
            $mail_data['name'] = $client_details['name'];
            $mail_data['amount'] = $mtAmount;
            $mail_data['login'] = $login;
            $mailcontent =  $this->load->view('mail_templates/deposit_success', $mail_data, true);
            $mailcontent_manager =  $this->load->view('mail_templates/deposit_success_manager', $mail_data, true);
            $cc = "";
            send_smtp_mailer($subject, $mailto, $mailcontent, $cc);
            send_smtp_mailer($subject, $mail_to_manager, $mailcontent_manager, $cc);

            return true;
        }
    }
}
