<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mt_Accounts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['ecomm_login'])) {
            redirect('login');
        }
        $this->load->model('general_settings/Mt_model', 'MModel');
    }
    public function show_live_account()
    {
        $data['title'] = 'MT Accounts';
        $data['subtitle'] = 'Live Accounts';
        $data['details_data'] = $this->MModel->get_live_accounts($data);
        $data['template'] = 'modules/mt/show_live_accounts';
        $this->load->view('template/dashboard_template', $data);
    }
    public function show_demo_account()
    {
        $data['title'] = 'MT Accounts';
        $data['subtitle'] = 'Demo Accounts';
        $data['details_data'] = $this->MModel->get_demo_accounts($data);
        $data['template'] = 'modules/mt/show_demo_accounts';
        $this->load->view('template/dashboard_template', $data);
    }
}
