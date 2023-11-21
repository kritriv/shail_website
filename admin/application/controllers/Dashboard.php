<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	function __construct() {
        parent::__construct();
       // $this->load->model('product_model', '', TRUE);
        //$this->load->model('order_model', '', TRUE);
        //$this->load->model('buyer_model', '', TRUE);
        $this->loggedIn();
    }
    public function index() {
    	$d['allArray'] = $this->viewData;
		$this->load->view($this->uri->segment(1)."/index",$d);
	}
	public function records() {
        $a = array();
        if(!empty($_GET)&& is_array($_GET)){
            foreach($_GET as $key => $value){if (!empty($value)) {if (!empty($value)) {$a[$key] = $value;}}}
        }
        $total_records = $this->buyer_model->get_total_dashboard($a);
        $this->viewData['total_buyer'] = $total_records;
        
        $a = array();
        $a['verified'] = 1;
        if(!empty($_GET)&& is_array($_GET)){
            foreach($_GET as $key => $value){if (!empty($value)) {if (!empty($value)) {$a[$key] = $value;}}}
        }
        $total_records = $this->buyer_model->get_total_dashboard($a);
        
        $this->viewData['verified_buyer'] = $total_records;
        $a['verified'] = 0;
        $total_records = $this->buyer_model->get_total_dashboard($a);
        
        $this->viewData['unverified_buyer'] = $total_records;
        $a = array();
        
        if(!empty($_GET)&& is_array($_GET)){
            foreach($_GET as $key => $value){if (!empty($value)) {if (!empty($value)) {$a[$key] = $value;}}}
        }
        $a['statusid'] = 1;
        $total_records = $this->buyer_model->get_total_dashboard($a);
        $this->viewData['active_buyer'] = $total_records;
        $a['statusid'] = 2;
        $total_records = $this->buyer_model->get_total_dashboard($a);
        $this->viewData['inactive_buyer'] = $total_records;
        
        $a = array();
        if(!empty($_GET)&& is_array($_GET)){
            foreach($_GET as $key => $value){if (!empty($value)) {if (!empty($value)) {$a[$key] = $value;}}}
        }
    	$total_records = $this->product_model->get_total_dashboard($a);
        $this->viewData['total_product'] = $total_records;
        
        $a = array();
        if(!empty($_GET)&& is_array($_GET)){
            foreach($_GET as $key => $value){if (!empty($value)) {if (!empty($value)) {$a[$key] = $value;}}}
        }
        $a['statusid'] = 1;
        $total_records = $this->product_model->get_total_dashboard($a);
        $this->viewData['active_product'] = $total_records;
        $a['statusid'] = 2;
        $total_records = $this->product_model->get_total_dashboard($a);
        $this->viewData['inactive_product'] = $total_records;
        
        $a = array();
        if(!empty($_GET)&& is_array($_GET)){
            foreach($_GET as $key => $value){if (!empty($value)) {if (!empty($value)) {$a[$key] = $value;}}}
        }
        $total_records = $this->order_model->get_total_order_date_dashboard(0,$a);
        $this->viewData['total_order'] = $total_records;
		
		$total_records = $this->order_model->get_total_order_date_dashboard(1,$a);
        $this->viewData['total_pending_order'] = $total_records;
		
		$total_records = $this->order_model->get_total_order_date_dashboard(2,$a);
        $this->viewData['total_received_order'] = $total_records;
		

		$d['allArray'] = $this->viewData;
		echo json_encode($d);
	}
}
