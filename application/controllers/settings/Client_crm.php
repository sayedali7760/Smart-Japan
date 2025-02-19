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
    public function upload_doc()
    {
        $id = $this->session->userdata['id'];
        $data['client_id'] = $id;
        $uploadPath = 'uploads';

        $file_id = 'files_id';
        log_message('info', 'FILES ARRAY: ' . print_r($_FILES, true));
        $filename = $this->fileUpload($uploadPath, $file_id);
        $files_id = $filename;
        log_message('info', 'File ID Upload: ' . $filename);
        if ($files_id != null) {
            $data['eid'] = $files_id;
        }
        $file_pass = 'files_pass';
        $filename = $this->fileUpload($uploadPath, $file_pass);
        $files_pass = $filename;
        log_message('info', 'File Passport Upload: ' . $filename);
        if ($files_pass != null) {
            $data['passport'] = $files_pass;
        }
        $file_stmt = 'files_bank';
        $filename = $this->fileUpload($uploadPath, $file_stmt);
        $files_stmt = $filename;
        log_message('info', 'File Statement Upload: ' . $filename);
        if ($files_stmt != null) {
            $data['bank'] = $files_stmt;
        }
        $file_others = 'files_other';
        $filename = $this->fileUpload($uploadPath, $file_others);
        $files_others = $filename;
        log_message('info', 'File Statement Upload: ' . $filename);
        if ($files_stmt != null) {
            $data['others'] = $files_others;
        }
        $sql = $this->db->select('*')
            ->from('documents')
            ->where('client_id', $id)
            ->get();
        if ($sql->num_rows() > 0) {
            $doc_update = $this->CModel->upload_document_update($data, $id);
            if ($doc_update) {
                log_message('info', 'Document Update Status: true');
                echo json_encode(array('status' => 1, 'message' => 'Document updated successfully.', 'view' => $this->load->view('modules/general_settings/my_profile', $data, TRUE)));
                return;
            } else {
                log_message('info', 'Document Update Status: false');
                echo json_encode(array('status' => 0, 'message' => 'Failed to update document.'));
                return;
            }
        } else {
            $doc_save = $this->CModel->doc_upload($data);
            if ($doc_save) {
                log_message('info', 'Document Save Status: true');
                echo json_encode(array('status' => 1, 'message' => 'Document saved successfully.', 'view' => $this->load->view('modules/general_settings/my_profile', $data, TRUE)));
                return;
            } else {
                log_message('info', 'Document Save Status: false');
                echo json_encode(array('status' => 0, 'message' => 'Failed to save document.'));
                return;
            }
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
