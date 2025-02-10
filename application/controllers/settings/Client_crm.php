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
        $this->load->model('general_settings/Product_model', 'PModel');
    }
    public function show_product()
    {
    
        $data['title'] = 'Available Products';
        $data['subtitle'] = 'Product List available';
        $data['details_data'] = $this->PModel->get_product_details($data);
        $data['template'] = 'modules/client_crm/show_product';
        $this->load->view('template/dashboard_template', $data);

    }
    public function view_product()
    {
        $product_id = $this->input->post('product_id');
        $product_data = $this->PModel->get_product_details_single($product_id);
        echo json_encode($product_data);
        return;
    }

   
}