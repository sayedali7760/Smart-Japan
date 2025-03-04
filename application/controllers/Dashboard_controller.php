<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['ecomm_login'])) {
            redirect('login');
        }
        $this->load->model('Dashboard_model', 'MDashboard');
        $this->load->model('general_settings/Client_crm_model', 'CModel');
        $this->load->model('general_settings/Mt_model', 'MModel');
    }
    public function index()
    {

        $data['title'] = 'Home';
        $data['subtitle'] = 'Dashboard';
        $type = $this->session->userdata['template_type'];
        if ($type == 1) {
            $data['template'] = 'dashboard';
        }
        if ($type == 2) {
            $id = $this->session->userdata['id'];
            $data['client_document_data'] = $this->CModel->get_documents_details($id);
            $data['mt_demo_accounts'] = $this->MModel->get_mt_demo_account_details($id);
            $data['mt_live_accounts'] = $this->MModel->get_mt_live_account_details($id);
            $data['template'] = 'dashboard_client';
        }
        $this->load->view('template/dashboard_template', $data);
    }
    public function settings()
    {
        if ($this->session->userdata('position') != 1) {
            redirect('login');
        }
        $breadcrumb = array(
            0 => array('title' => 'Home', 'status' => 0, 'link' => base_url('home')),
            1 => array('title' => 'General Settings', 'status' => 1),
        );
        $data['breadcrumb'] = bread_crump_maker($breadcrumb);
        $data['subtitle'] = 'Settings';
        $data['template'] = 'modules/general_settings/settings';
        $this->load->view('template/dashboard_template', $data);
    }
}
