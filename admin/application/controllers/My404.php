<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My404 extends MY_Controller {
	function __construct() {
        parent::__construct();
    }
    
	public function index() {
        $this->load->view("404");
    }
}
