<?php

require APPPATH . 'third_party/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

function send_smtp_mailer($subject = '', $mailto = '', $mailcontent = '', $cc = '', $attachmentdata = array(), $reply_to = '')
{
    $CI = get_instance();

    $inst_name = 'NIMS UAE';
    $inst_id = 0;

    try {
        // $host = 'email-smtp.ap-south-1.amazonaws.com';
        // $smtp_username = "AKIAUM27CUNHHOQJ3FHI";
        // $password = "BLc2/24QN2Vn8G4l+62a4URY+7DGMynoUyjJ1tj6gpdo";

        $host = 'smtp.gmail.com';
        $smtp_username = "mailalert@docme.cloud";
        $password = "123abcAB";

        switch ($inst_id) {
            case 0:
                $smtp_from_email = "mailalert@docme.cloud";
                break;
            case 5:
                $smtp_from_email = "mailalert@docme.cloud";
                break;
            case 8:
                $smtp_from_email = "mailalert@docme.cloud";
                break;
            case 20:
                $smtp_from_email = "mailalert@docme.cloud";
                break;
            default:
                $smtp_from_email = "mailalert@docme.cloud";
                break;
        }

        if (ENVIRONMENT == 'development') {
            $mailto = 'mailalert@docme.cloud';
        }

        if (strpos($mailto, '@hotmail.com')) {
            $host = 'smtp.gmail.com';
            $smtp_username = "mailalert@docme.cloud";
            $password = "123abcAB";
            $smtp_from_email = "mailalert@docme.cloud";
        }

        $mail = new PHPMailer\PHPMailer\PHPMailer;
        $mail->isSMTP();
        $mail->Host = $host;
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username;
        $mail->Password = $password;
        $mail->SetFrom($smtp_from_email, $inst_name);
        if ($reply_to != '') {
            $mail->ClearReplyTos();
            $mail->addReplyTo($reply_to);
        }

        $addresses = explode(',', $mailto);
        foreach ($addresses as $address) {
            $mail->addAddress(trim($address));
        }

        $cc_emails = explode(',', $cc);
        foreach ($cc_emails as $cc_email) {
            $mail->AddCC(trim($cc_email));
        }

        $mail->Subject = $subject;
        $mail->msgHTML($mailcontent);

        if (!empty($attachmentdata)) {
            $filePath = FCPATH . $attachmentdata['filepath'] . $attachmentdata['filename'];
            $mail->addAttachment($filePath);
        }
        if ($mail->send()) {
            $connection = new AMQPStreamConnection('mq.bmark.in', 5672, 'admin', 'rabbitMQ');
            $channel = $connection->channel();
            $email_log_data['email'] = $smtp_from_email;
            $email_log_data['action'] = 'Email_notification';
            $email_log_data['module_name'] = APP_TITLE . '-' . $inst_name . ' : ' . $subject;
            $email_log_data['timestamp_server'] = time();
            $email_log_data['timestamp_date'] = date('Y-m-d h:i:s');


            foreach ($addresses as $address) {
                $email_log_array = [];
                $email_log_data['email_to'] =  $address;
                $email_log_array[] = $email_log_data;
                $email_log = json_encode($email_log_array);
                $msg = new AMQPMessage($email_log);
                $channel->basic_publish($msg, '', 'saveLog');
            }

            foreach ($cc_emails as $cc_email) {
                $email_log_array = [];
                $email_log_data['email_to'] =  $cc_email;
                $email_log_array[] = $email_log_data;
                $email_log = json_encode($email_log_array);
                $msg = new AMQPMessage($email_log);
                $channel->basic_publish($msg, '', 'saveLog');
            }

            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        $res = false;
        return $res;
    }
}
