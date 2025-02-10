<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
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
        $this->load->model('general_settings/Product_model', 'PModel');
    }
    public function show_product_cat()
    {
    
        $data['title'] = 'Product';
        $data['subtitle'] = 'Category List';
        $data['details_data'] = $this->PModel->get_details($data);
        $data['template'] = 'modules/general_settings/product/show_product_cat';
        $this->load->view('template/dashboard_template', $data);

    }
    public function show_product()
    {
        $data['title'] = 'Product';
        $data['subtitle'] = 'Product List';
        $data['details_data'] = $this->PModel->get_product_details($data);
        $data['template'] = 'modules/general_settings/product/show_product';
        $this->load->view('template/dashboard_template', $data);
    }
    public function view_product()
    {
        $product_id = $this->input->post('product_id');
        $product_data = $this->PModel->get_product_details_single($product_id);
        echo json_encode($product_data);
        return;
    }
    public function add_product_cat()
    {
 
        $data['title'] = 'Product';
        $data['subtitle'] = 'Add Category';
        $data['template'] = 'modules/general_settings/product/add_product_cat';
        $this->load->view('template/dashboard_template', $data);

    }
    public function add_product()
    {
        $data['title'] = 'Product';
        $data['subtitle'] = 'Add Product';
        $data['categories'] = $this->PModel->get_category();
        $data['distributors'] = $this->PModel->get_distributors();
        $data['template'] = 'modules/general_settings/product/add_product';
        $this->load->view('template/dashboard_template', $data);
    }
    public function save_product_cat()
    {
        $category = $this->input->post('category');
        $description = $this->input->post('description');
        
        $data = array('category' => $category, 'description' => $description);
        $qry = $this->db->get_where('category', "category like '$category'");
        if ($qry->num_rows() > 0) {
            echo json_encode(array('status' => 0, 'view' => $this->load->view('modules/general_settings/product/add_product_cat', $data, TRUE)));
            return;
        } else {
            if ($this->PModel->insert($data)) {
                echo json_encode(array('status' => 1, 'view' => $this->load->view('modules/general_settings/product/add_product_cat', $data, TRUE)));
                return;
            } else {
                return false;
            }
        }
    }
    public function save_product()
    {
        
        $category = $this->input->post('category');
        $name = $this->input->post('name');
        $code = $this->input->post('code');
        $tax = $this->input->post('tax');
        $distributor = $this->input->post('distributor');
        $pur_rate = $this->input->post('pur_rate');
        $sale_rate = $this->input->post('sale_rate');
        $offer = $this->input->post('offer');
        $description = $this->input->post('description');

        $uploadPath = 'uploads';
        $uploadfile = 'file';
        $images = '';
        $filename = $this->fileUpload($uploadPath, $uploadfile);
        $file = $filename;

        
        $data = array('name' => $name,'category' => $category, 'code' => $code, 'tax' => $tax, 'distributor' => $distributor, 'purchase_rate' => $pur_rate, 'sales_rate' => $sale_rate, 'offer_percentage' => $offer, 'description' => $description,
        'image' => $file);
        $qry = $this->db->get_where('product', ['name' => $name]);
        if ($qry->num_rows() > 0) {
            echo json_encode(array('status' => 0, 'view' => $this->load->view('modules/general_settings/product/add_product', $data, TRUE)));
            return;
        } else {
            if ($this->PModel->insert_product($data)) {
                echo json_encode(array('status' => 1, 'view' => $this->load->view('modules/general_settings/product/add_product', $data, TRUE)));
                return;
            } else {
                return false;
            }
        }
    }
    public function edit_product()
    {
        if ($this->input->is_ajax_request() == 1) {
            $onload = $this->input->post('load');
            $product_id = $this->input->post('product_id');
            $data['product_data'] = $this->PModel->get_product_details_single($product_id);
            $data['categories'] = $this->PModel->get_category();
            $data['distributors'] = $this->PModel->get_distributors();

            if ($onload == 1) {
                $view = $this->load->view('modules/general_settings/product/edit_product', $data, TRUE);
                echo json_encode(array('status' => 1, 'message' => 'Data Loaded', 'view' => $view));
                return;
            }
        } else {
            $this->load->view(ERROR_500);
        } 
    }
    public function edit_category()
    {
        if ($this->input->is_ajax_request() == 1) {
            $onload = $this->input->post('load');
            $data['category_id'] = $this->input->post('category_id');
            $data['category'] = $this->input->post('category');
            $data['description'] = $this->input->post('description');
        

            if ($onload == 1) {
                $view = $this->load->view('modules/general_settings/product/edit_product_cat', $data, TRUE);
                echo json_encode(array('status' => 1, 'message' => 'Data Loaded', 'view' => $view));
                return;
            }
        } else {
            $this->load->view(ERROR_500);
        }
    }
    public function update_product()
    {
        $product_id = $this->input->post('product_id');
        $category = $this->input->post('category');
        $name = $this->input->post('name');
        $code = $this->input->post('code');
        $tax = $this->input->post('tax');
        $distributor = $this->input->post('distributor');
        $pur_rate = $this->input->post('pur_rate');
        $sale_rate = $this->input->post('sale_rate');
        $offer = $this->input->post('offer');
        $description = $this->input->post('description');

        $uploadPath = 'uploads';
        $uploadfile = 'file';
        $images = '';
        $filename = $this->fileUpload($uploadPath, $uploadfile);
        $file = $filename;
        $data = array('name' => $name,'category' => $category, 'code' => $code, 'tax' => $tax, 'distributor' => $distributor, 'purchase_rate' => $pur_rate, 'sales_rate' => $sale_rate, 'offer_percentage' => $offer, 'description' => $description,
        'image' => $file);

        if($file != ''){
            $data['image'] = $file;
        }
        $qry = $this->db->get_where('product', "name like '$name' and product_id!=$product_id");

        if ($qry->num_rows() > 0) {
            echo json_encode(array('status' => 0, 'view' => $this->load->view('modules/general_settings/product/edit_product', $data, TRUE)));
            return;
        } else {
            if ($this->PModel->update_product($data, $product_id)) {
                echo json_encode(array('status' => 1, 'view' => $this->load->view('modules/general_settings/product/edit_product', $data, TRUE)));
                return;
            } else {
                return false;
            }
        }

    }
    public function update_category()
    {
        $category_id = $this->input->post('category_id');
        $category = $this->input->post('category');
        $description = $this->input->post('description');
       
        $data = array('category' => $category, 'description' => $description);
        $qry = $this->db->get_where('category', "category like '$category' and category_id!=$category_id");
        if ($qry->num_rows() > 0) {
            echo json_encode(array('status' => 0, 'view' => $this->load->view('modules/general_settings/product/edit_product_cat', $data, TRUE)));
            return;
        } else {
            if ($this->PModel->update($data, $category_id)) {
                echo json_encode(array('status' => 1, 'view' => $this->load->view('modules/general_settings/product/edit_product_cat', $data, TRUE)));
                return;
            } else {
                return false;
            }
        }
    }
    public function change_status()
    {
        $category_id = $this->input->post('category_id');
        $status = $this->input->post('status');
        $data = array('is_active' => $status);
        if ($this->PModel->change_status($data, $category_id)) {
            echo json_encode(array('status' => 1, 'view' => $this->load->view('modules/general_settings/organization/show_organization', $data, TRUE)));
            return;
        } else {
            return false;
        }
    }
    public function change_product_status()
    {
        $product_id = $this->input->post('product_id');
        $status = $this->input->post('status');
        $data = array('is_active' => $status);
        if ($this->PModel->change_product_status($data, $product_id)) {
            echo json_encode(array('status' => 1, 'view' => $this->load->view('modules/general_settings/product/show_product', $data, TRUE)));
            return;
        } else {
            return false;
        } 
    }
    public function fileUpload($uploadPath, $uploadfile = '')
    {
        $uploadData = "";
        $images = "";
        if ($uploadfile == '')
            $uploadfile = 'files';

        $filesCount = count($_FILES[$uploadfile]['name']);
        if ($filesCount > 0) {
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|doc|docx|pdf';
            $this->load->library('upload', $config);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name']     = $_FILES[$uploadfile]['name'][$i];
                $_FILES['file']['type']     = $_FILES[$uploadfile]['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES[$uploadfile]['tmp_name'][$i];
                $_FILES['file']['error']    = $_FILES[$uploadfile]['error'][$i];
                $_FILES['file']['size']     = $_FILES[$uploadfile]['size'][$i];


                if ($this->upload->do_upload('file')) {

                    $fileData = $this->upload->data();
                    //print_r($fileData);
                    $images .= $fileData['file_name'];
                } else {
                    return $images;
                }
            }
        }
        $this->session->set_flashdata('uploaded_file', $images);
        return $images;
    }
}