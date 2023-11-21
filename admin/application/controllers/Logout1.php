<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logout1 extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        $this->session->sess_destroy();
        redirect('../db/logout1.php?accesstoken='.$_REQUEST["accesstoken"]);
    }

}
