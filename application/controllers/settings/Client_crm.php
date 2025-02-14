<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client_crm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['ecomm_login'])) {
            redirect('login');
        }
        $this->load->model('general_settings/Client_crm_model', 'CModel');
    }
    public function my_profile()
    {

        $data['title'] = 'Client';
        $data['subtitle'] = 'My Profile';
        $id = $this->session->userdata['id'];
        $data['user_data'] = $this->CModel->get_details($id);
        $data['template'] = 'modules/general_settings/my_profile';
        $this->load->view('template/dashboard_template', $data);
    }
    public function update_password()
    {
        $id = $this->session->userdata['id'];
        $password = md5($this->input->post('password'));
        $data = array('password' => $password);
        if ($this->CModel->update_password($id, $data)) {
            echo json_encode(array('status' => 1));
            return;
        } else {
            return false;
        }
    }
}
