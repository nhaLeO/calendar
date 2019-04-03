<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Paypal_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/* This function create new Service. */

	function create($Total,$PaymentMethod,$PayerStatus,$PayerMail,$saleId,$CreateTime,$UpdateTime,$State) {

        $payments = array(
            "txn_id" => $saleId,
            "PaymentMethod" => $PaymentMethod,
            "PayerStatus" => $PayerStatus,
            "PayerMail" => $PayerMail,
            "Total" => $Total,
            "SubTotal" => 0,
            "Tax" => 0,
            "Payment_state" => $State,
            "CreateTime" => $CreateTime,
            "UpdateTime" => $UpdateTime,
        );
        //var_dump($payments);die;

        $this->db->insert("payments", $payments);
		$id = $this->db->insert_id();
		return $id;
	}

}