<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/PayPal-PHP-SDK/paypal/rest-api-sdk-php/sample/bootstrap.php'); // require paypal files

use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;

class Paypal extends CI_Controller
{
    public $_api_context;

    function __construct()
    {
        parent::__construct();
        //$this->load->model('paypal_model', 'paypal');
        $this->load->helper('email');
        // paypal credentials
        $this->config->load('paypal');
        $this->load->library('email');
        $this->_api_context = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $this->config->item('client_id'), $this->config->item('secret')
            )
        );
    }

    function index()
    {
        $this->load->view('content/payment_credit_form');
    }


    function create_payment_with_paypal()
    {

        //郵便番号
        $zipcode = $this->input->post('zipcode');
        $this->session->set_userdata('calendar_zipcode', $zipcode);

        //メアド
        $email = $this->input->post('email');
        $this->session->set_userdata('calendar_email', $email);

        //住所
        $address = $this->input->post('address');
        $this->session->set_userdata('calendar_address', $address);

        //氏名
        $name = $this->input->post('name');
        $this->session->set_userdata('calendar_name', $name);

        //ファンクラブ会員番号
        $fanClubId = $this->input->post('fanClubId');
        $this->session->set_userdata('calendar_fan_club_id', $fanClubId);

        // setup PayPal api context
        $this->_api_context->setConfig($this->config->item('settings'));


        $payer['payment_method'] = 'paypal';

        $item["name"] = $this->session->userdata('calendar_type');
        $item["description"] = $this->session->userdata('calendar_type') . 'と作成する';
        $item["currency"] = "JPY";
        $item["quantity"] = 1;
        $item["price"] = $this->session->userdata('calendar_price');

        $itemList = new ItemList();
        $itemList->setItems(array($item));

        $amount['currency'] = "JPY";
        $amount['total'] = $this->session->userdata('calendar_price');

        $transaction['description'] = 'JP カレンダー';
        $transaction['amount'] = $amount;
        $transaction['invoice_number'] = uniqid();
        $transaction['item_list'] = $itemList;

        $baseUrl = base_url();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($baseUrl . "paypal/getPaymentStatus")
            ->setCancelUrl($baseUrl . "paypal/getPaymentStatus");

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $ex);
            exit(1);
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        if (isset($redirect_url)) {
            /** redirect to paypal **/
            redirect($redirect_url);
        }

        $this->session->set_flashdata('success_msg', 'Unknown error occurred');
        redirect('paypal/index');

    }


    public function getPaymentStatus()
    {

        // paypal credentials

        /** Get the payment ID before session clear **/
        $payment_id = $this->input->get("paymentId");
        $PayerID = $this->input->get("PayerID");
        $token = $this->input->get("token");
        /** clear the session payment ID **/

        if (empty($PayerID) || empty($token)) {
            $this->session->set_flashdata('success_msg', 'Payment failed');
            redirect('paypal/index');
        }

        $payment = Payment::get($payment_id, $this->_api_context);


        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId($this->input->get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);


        //  DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {
            $trans = $result->getTransactions();

            $payer = $result->getPayer();
            // payer info //
            $PaymentMethod = $payer->getPaymentMethod();
            $PayerStatus = $payer->getStatus();
            $PayerMail = $this->session->userdata('calendar_email');

            $relatedResources = $trans[0]->getRelatedResources();
            $sale = $relatedResources[0]->getSale();
            // sale info //
            $saleId = $sale->getId();
            $CreateTime = $sale->getCreateTime();
            $UpdateTime = $sale->getUpdateTime();
            $State = $sale->getState();
            $Total = $sale->getAmount()->getTotal();
            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            //$this->paypal->create($Total, $PaymentMethod, $PayerStatus, $PayerMail, $saleId, $CreateTime, $UpdateTime, $State);
            $this->session->set_flashdata('success_msg', 'Payment success');

            $data = array(
                'saleId' => $saleId,
                'CreateTime' => $CreateTime,
                'State' => $State,
                'Total' => $Total
            );
            $this->session->set_userdata("paymentinfo", $data);
            redirect(base_url() . 'paypal/success');
        }
        $this->session->set_flashdata('success_msg', 'Payment failed');
        redirect(base_url() . 'paypal/cancel');
    }

    function success()
    {
        
        $this->send_mail();
        $this->send_mail_to_admin();
    }

    function cancel()
    {
        $this->paypal->create_payment();
        $this->load->view("payment_fail");
    }

    public function send_mail_to_admin()
    {

        $CI = get_instance();
        $CI->config->load('config', TRUE);
        $from_email = $CI->config->item('mail_account','config');

        $to_admin = $CI->config->item('mail_admin','config');
        
        // Customer info
        //郵便番号
        $zipcode = $this->session->userdata('calendar_zipcode');

        //メアド
        $email = $this->session->userdata('calendar_email');

        //住所
        $address = $this->session->userdata('calendar_address');

        //氏名
        $name = $this->session->userdata('calendar_name');

        //ファンクラブ会員番号
        $fanClubId = $this->session->userdata('calendar_fan_club_id');

        //calendar url
        $link = $this->session->userdata('filename');

        // Calendar type info
        $cal_type = $this->session->userdata('calendar_type');
        $price = $this->session->userdata('calendar_price');

        
        $message = "新し注文があります。\r\n 以下の注文情報です。\r\n\r\n";
        
        $message .="**************↓ご購入はコチラ*********************\r\n";

        $message .= base_url() . "pages/view/" . $link ."（URL）\r\n";

        $message .="*************************************************\r\n";


        $message .= "郵便番号: " . $zipcode . "\r\n";
        $message .= "住所: " . $address . "\r\n";
        $message .= "氏名: " . $name . "\r\n";
        $message .= "メアド: " . $email . "\r\n";
        $message .= "ファンクラブ会員番号: " . $fanClubId . "\r\n";

        $message .= "カレンダーサイズ: " . $cal_type . "\r\n";
        $message .= "金額: ￥" . $price . "\r\n";

        //Load email library
        $this->email->initialize(config());
        $this->email->set_newline("\r\n"); 
        $this->email->from($from_email, 'noreply');
        $this->email->to($to_admin);
        $this->email->subject('[CALENDAR] 購入完了のお知らせ');
        $this->email->message($message);
        //$this->email->attach('C:\Users\pc\Desktop\myicon.jpeg');
        
        //Send mail
        if ($this->email->send()) {
            $this->session->set_flashdata("email_sent", "Congragulation Email Send Successfully.");
        } else {
            $this->session->set_flashdata("email_sent", "You have encountered an error");
        }
    }

    public function send_mail()
    {

        $CI = get_instance();
        $CI->config->load('config', TRUE);
        $from_email = $CI->config->item('mail_account','config');

        $to_email = $this->session->userdata('calendar_email');
        
        // Body for customer
        $tmp = $this->session->userdata('paymentinfo');

        $data['saleId'] = $tmp["saleId"];
        $data['CreateTime'] = date("Y-m-d H:i:s");
        $data['State'] = $tmp["State"];
        $data['Total'] = $tmp["Total"];

        $message = $this->session->userdata('calendar_name') . "様\r\n";
        $message .= "購入が登録されてました。\r\n 以下の情報です。\r\n\r\n";
        
        $message .= "購入ID: " . $data['saleId'] . "\r\n";
        $message .= "作成日時: " . $data['CreateTime'] . "\r\n";
        $message .= "ステータス: " . $data['State'] . "\r\n";
        $message .= "金額: ￥" . $data['Total'] . "\r\n";

        //Load email library
        $this->email->initialize(config());
        $this->email->set_newline("\r\n"); 
        $this->email->from($from_email, 'noreply');
        $this->email->to($to_email);
        $this->email->subject('[CALENDAR] 購入完了のお知らせ');
        $this->email->message($message);
        //$this->email->attach('C:\Users\pc\Desktop\myicon.jpeg');
        
        //Send mail
        if ($this->email->send()) {
            $this->session->set_flashdata("email_sent", "Congragulation Email Send Successfully.");
            
            $this->load->view("payment_success", $data);
        } else {
            $this->session->set_flashdata("email_sent", "You have encountered an error");
        }
    }

}