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
        $this->load->model('general_settings/Client_model', 'CCModel');
    }
    public function my_profile()
    {

        $data['title'] = 'Client';
        $data['subtitle'] = 'My Profile';
        $id = $this->session->userdata['id'];
        $data['user_data'] = $this->CModel->get_details($id);
        $data['documents_data'] = $this->CModel->get_documents_details($id);

        $data['id_front'] = 0;
        $data['id_front_status'] = 0;
        $data['id_back'] = 0;
        $data['id_back_status']  = 0;
        $data['sample_bill'] = 0;
        $data['sample_bill_status'] = 0;
        $data['other_doc'] = 0;
        $data['other_doc_status'] = 0;
        if (!empty($data['documents_data'])) {
            foreach ($data['documents_data'] as $document_stat) {
                if ($document_stat->doc_type == 'id') {
                    $data['id_front'] = $document_stat->name;
                    $data['id_front_status'] = $document_stat->status;
                }
                if ($document_stat->doc_type == 'address') {
                    $data['id_back'] = $document_stat->name;
                    $data['id_back_status'] = $document_stat->status;
                }
                if ($document_stat->doc_type == 'card') {
                    $data['sample_bill'] = $document_stat->name;
                    $data['sample_bill_status'] = $document_stat->status;
                }
                if ($document_stat->doc_type == 'other') {
                    $data['other_doc'] = $document_stat->name;
                    $data['other_doc_status'] = $document_stat->status;
                }
            }
        }
        $count_query = $this->db->get_where('documents', "user_id=$id");
        $data['count_qry'] = $count_query->num_rows();
        $data['template'] = 'modules/general_settings/my_profile';
        $this->load->view('template/dashboard_template', $data);
    }
    // new sush
    public function my_data()
    {
        $data['title'] = 'Client';
        $data['subtitle'] = 'Bank Details';
        $id = $this->session->userdata['id'];
        $data['wallet_data'] = $this->CModel->get_wallet_details($id);
        $data['bank_data'] = $this->CModel->get_bank_data($id);

        $data['template'] = 'modules/general_settings/bank_data';
        $this->load->view('template/dashboard_template', $data);
    }

    public function bank_data()
    {
        $id = $this->session->userdata('id');
        $data['client_id'] = $this->session->userdata('id');
        $data['beneficiary_name'] = $this->input->post('name');
        $data['bank_name'] = $this->input->post('bname');
        $data['account_no'] = $this->input->post('acc_no');
        $data['iban'] = $this->input->post('iban');
        $data['swift'] = $this->input->post('swift');
        $data['bank_addr'] = $this->input->post('addr');
        $data['branch'] = $this->input->post('branch');
        $data['created_by'] = $this->session->userdata('id');

        $uploadPath = 'uploads';

        $file_statement = 'files_statement';
        $files_statement = $this->fileUpload($uploadPath, $file_statement);
        if ($files_statement != null) {
            $data['statement'] = $files_statement;
        }

        if ($this->CModel->add_bank_data($data)) {
            $subject = "New Bank Data Verification Request - .'$id'.";
            $mailto = 'seyad@smartfx.com';
            $data['id'] = $id;
            $mailcontent =  $this->load->view('mail_templates/notify_bank_verify_template', $data, true);

            $cc = "";

            send_smtp_mailer($subject, $mailto, $mailcontent, $cc);

            echo json_encode(array('status' => 1));
            return;
        } else {
            return false;
        }
    }

    public function wallet_id()
    {
        $data['client_id'] = $this->session->userdata('id');
        $data['wallet_address'] = $this->input->post('wallet');
        $data['type'] = $this->input->post('wal_type');
        $data['created_by'] = $this->session->userdata('id');
        $data['status'] = 1;

        if ($this->CModel->add_wallet($data)) {
            echo json_encode(array('status' => 1));
            return;
        } else {
            return false;
        }
    }
    // end
    public function update_doc_status()
    {
        $doc_id = $this->input->post('doc_id');
        $data['status'] = $this->input->post('status');
        if ($this->CModel->update_document_status($doc_id, $data)) {
            echo json_encode(array('status' => 1));
            return;
        } else {
            return false;
        }
    }
    public function activate_client()
    {

        $client_id = $this->input->post('client_id');
        $email = $this->input->post('email');
        $data['status'] = 90;
        // $document_details = $this->CCModel->get_client_document_details($client_id);
        // if ($document_details == '') {
        //     $data['client_id'] = $client_id;
        //     $insert_doc = $this->CModel->doc_upload($data);
        // }
        if ($this->CModel->activate_client($client_id, $data)) {
            $subject = "Account Activated";
            $mailto = $email;
            $data['email'] = $email;
            $mailcontent =  $this->load->view('mail_templates/account_activate_template', $data, true);
            send_smtp_mailer($subject, $mailto, $mailcontent);
            echo json_encode(array('status' => 1));
            return;
        } else {
            return false;
        }
    }

    public function deactivate_client()
    {

        $client_id = $this->input->post('client_id');
        $email = $this->input->post('email');
        $data['status'] = 0;

        if ($this->CModel->activate_client($client_id, $data)) {
            $subject = "Account Deactivated";
            $mailto = $email;
            $data['email'] = $email;
            $mailcontent =  $this->load->view('mail_templates/account_deactivate_template', $data, true);
            send_smtp_mailer($subject, $mailto, $mailcontent);
            echo json_encode(array('status' => 1));
            return;
        } else {
            return false;
        }
    }

    public function client_verification()
    {
        $data['title'] = 'Client';
        $data['subtitle'] = 'Client Verify';
        $data['client_data'] = $this->CModel->get_notverified_clients();
        $data['template'] = 'modules/general_settings/show_notverified_client';
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
    public function update_thumbnail()
    {
        $id = $this->session->userdata['id'];
        $uploadPath = 'uploads';

        $file_id = 'avatar';
        $files_id = $this->fileUpload($uploadPath, $file_id);
        $data['file'] = $files_id;
        if ($this->CModel->thumbnail_update($data, $id)) {
            echo json_encode(array('status' => 1));
            return;
        } else {
            echo json_encode(array('status' => 0));
            return;
        }
    }
    public function upload_doc()
    {
        $id = $this->session->userdata['id'];
        $uploadPath = 'uploads';

        $file_id = 'files_id';
        $files_id = $this->fileUpload($uploadPath, $file_id);
        if ($files_id != null) {
            $data_id1['user_id'] = $id;
            $data_id1['name'] = $files_id;
            $data_id1['file_name'] = md5($files_id);
            $data_id1['doc_type'] = 1;
            $data_id1['status'] = 'new';
            $this->CModel->upload_document_update_client($data_id1, $id);
        }
        $file_pass = 'files_pass';
        $files_pass = $this->fileUpload($uploadPath, $file_pass);
        if ($files_pass != null) {
            $data_id2['user_id'] = $id;
            $data_id2['name'] = $files_pass;
            $data_id2['file_name'] = md5($files_pass);
            $data_id2['doc_type'] = 2;
            $data_id2['status'] = 'new';
            $this->CModel->upload_document_update_client($data_id2, $id);
        }
        $file_stmt = 'files_bank';
        $files_stmt = $this->fileUpload($uploadPath, $file_stmt);
        if ($files_stmt != null) {
            $data_address['user_id'] = $id;
            $data_address['name'] = $files_stmt;
            $data_address['file_name'] = md5($files_stmt);
            $data_address['doc_type'] = 3;
            $data_address['status'] = 'new';
            $this->CModel->upload_document_update_client($data_address, $id);
        }
        $file_others = 'files_other';
        $files_others = $this->fileUpload($uploadPath, $file_others);
        if ($files_others != null) {
            $data_other['user_id'] = $id;
            $data_other['name'] = $files_others;
            $data_other['file_name'] = md5($files_others);
            $data_other['doc_type'] = 4;
            $data_other['status'] = 'new';
            $this->CModel->upload_document_update_client($data_other, $id);
        }

        //$count_qry = $this->db->get_where('documents', "client_id=$id");
        // if ($count_qry->num_rows() > 0) {
        if ($this->CModel->upload_document_update($data, $id)) {
            $subject = "New Document Upload - .'$id'.";
            $mailto = MANAGER_MAIL;
            $data['id'] = $id;
            $mailcontent =  $this->load->view('mail_templates/notify_documents_template', $data, true);

            $cc = "";

            send_smtp_mailer($subject, $mailto, $mailcontent, $cc);
            echo json_encode(array('status' => 1, 'message' => 'Document Updated successfully.', 'view' => $this->load->view('modules/general_settings/my_profile', $data, TRUE)));
            return;
        } else {
            echo json_encode(array('status' => 0, 'message' => 'Failed to update document.'));
            return;
        }
        // } else {
        // if ($this->CModel->doc_upload($data)) {
        //     $subject = "New Document Upload - .'$id'.";
        //     $mailto = 'susmitha@smartfx.com';
        //     $data['id'] = $id;
        //     $mailcontent =  $this->load->view('mail_templates/notify_documents_template', $data, true);
        //     $cc = "";
        //     send_smtp_mailer($subject, $mailto, $mailcontent, $cc);
        //     echo json_encode(array('status' => 1, 'message' => 'Document Updated successfully.', 'view' => $this->load->view('modules/general_settings/my_profile', $data, TRUE)));
        //     return;
        // } else {
        //     echo json_encode(array('status' => 0, 'message' => 'Failed to save document.'));
        //     return;
        // }
        // }
    }

    // new sush 
    public function show_bank_details()
    {
        // if ($this->input->is_ajax_request() == 1) {
        $onload =  $this->input->post('load');
        $user_id = $this->input->post('client_id');
        if ($onload == 1) {

            $data['bank_data'] = $this->CModel->get_bank_data($user_id);

            $view = $this->load->view('modules/general_settings/bank_details', $data, TRUE);
            echo json_encode(array('status' => 1, 'message' => 'Data Loaded', 'view' => $view));
            return;
        }
        // } else {
        //     $this->load->view(ERROR_500);
        // }
    }

    public function reject_bank_data()
    {
        // if ($this->input->is_ajax_request() == 1) {
        $client_id = $this->input->post('client_id');
        $id = $this->input->post('id');
        if ($this->CModel->reject_data($client_id, $id)) {
            echo json_encode(array('status' => 1));
            return;
        } else {
            echo json_encode(array('status' => 0));
            return;
        }
        // }
    }

    public function approve_bank_data()
    {
        // if ($this->input->is_ajax_request() == 1) {
        $client_id = $this->input->post('client_id');
        $id = $this->input->post('id');
        if ($this->CModel->approve_data($client_id, $id)) {
            echo json_encode(array('status' => 1));
            return;
        } else {
            echo json_encode(array('status' => 0));
            return;
        }
        // }
    }
    // end

    public function update_dob()
    {
        $client_id = $this->input->post('client_id');
        $dob = $this->input->post('dob');
        if ($this->CModel->update_dob($client_id, $dob)) {
            echo json_encode(array('status' => 1));
            return;
        } else {
            echo json_encode(array('status' => 0));
            return;
        }
    }


    public function fileUpload($uploadPath, $uploadfile = '')
    {
        $uploadData = array(); // Store uploaded file names

        if (!isset($_FILES[$uploadfile])) {
            log_message('error', "File input {$uploadfile} not found in \$_FILES array.");
            return null;
        }

        $filesCount = count($_FILES[$uploadfile]['name']);

        if ($filesCount > 0) {
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|doc|docx|pdf';
            $this->load->library('upload', $config);

            for ($i = 0; $i < $filesCount; $i++) {
                if (!empty($_FILES[$uploadfile]['name'][$i])) {
                    $_FILES['file']['name'] = $_FILES[$uploadfile]['name'][$i];
                    $_FILES['file']['type'] = $_FILES[$uploadfile]['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES[$uploadfile]['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES[$uploadfile]['error'][$i];
                    $_FILES['file']['size'] = $_FILES[$uploadfile]['size'][$i];

                    if ($this->upload->do_upload('file')) {
                        $fileData = $this->upload->data();
                        $uploadData[] = $fileData['file_name'];
                    } else {
                        log_message('error', "File upload failed: " . $this->upload->display_errors());
                    }
                }
            }
        }

        return !empty($uploadData) ? implode(',', $uploadData) : null;
    }
}
