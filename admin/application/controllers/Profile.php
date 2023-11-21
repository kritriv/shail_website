<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	function __construct() {

        parent::__construct();
        $this->load->model('user_model', '', TRUE);
        $this->load->model('employee_model', '', TRUE);

        $this->load->model('module_auto_num_model', '', TRUE);


        $this->loggedIn();

    }

    public function initializeInputFieldValues($id = 0) {

        $inputFieldValues = array();

        if ($id == 0) {

            foreach ($this->viewData['modulefield'] as $key => $value) {

               $inputFieldValues[$value->columnname] = '';

            }

        } else {

            $row = $this->getGeneralRowByColumn($this->session->userdata('tablename'),'emailid',$this->session->userdata('user_email'));

            foreach ($this->viewData['modulefield'] as $key => $value) {

               $inputFieldValues[$value->columnname] = $row[$value->columnname];

            }

            $inputFieldValues['user_password'] = '';

            $inputFieldValues['confirm_password'] = '';

        }

        return $inputFieldValues;

    }

    public function deleteimage() {
        echo $this->buyer_model->deletefile('buyerid',$_POST['id'],$_POST['columnname'],$_POST['filename'],$_POST['t']);

    }

    public function index() {

        $id = $this->session->userdata('user_id');

        $inputFieldValues = $this->initializeInputFieldValues($id);

        if (isset($_POST['insert'])) {

            $post = $this->input->post();

            if (isset($_FILES) && !empty($_FILES) && count($_FILES)) {

                foreach ($_FILES as $key => $value) {

                    if (is_array($_FILES[$key]['name'])) {

                        if ($_FILES[$key]['name'][0]) {

                            $post[$key] = serialize($this->uploadMultiImage($key) );

                        }

                    }else{

                        if ($_FILES[$key]['name']) {

                            $post[$key] = str_replace(" ","_",$this->uploadSingleImage($key));

                        }

                    }

                }

            }

            if (empty($post['user_password'])) {

                unset($post['user_password']);

                unset($post['confirm_password']);

            }



            if($this->input->post('buyerphonewithcode_')){

                $post['buyerphonewithcode'] = $this->input->post('buyerphonewithcode_');

                unset($post['buyerphonewithcode_']);

            }

            if($this->input->post('mobilewithcode_')){

                $post['mobilewithcode'] = $this->input->post('mobilewithcode_');

                unset($post['mobilewithcode_']);

            }

            if($this->input->post('sellerphonewithcode_')){

                $post['sellerphonewithcode'] = $this->input->post('sellerphonewithcode_');

                unset($post['sellerphonewithcode_']);

            }

            unset($post['insert']);
            if ($this->form_validation->run('profile') == TRUE) {
                $inserted = $this->updateRowCommon($this->session->userdata('tablename'),$id,$post);

                if($inserted){

                    $empRow = $this->getGeneralRowByColumn($this->session->userdata('tablename'),'emailid',$this->session->userdata('user_email'));

                    $q = array();

                    $self = array();

                    if (!empty($post['user_password'])) {

                        $self['user_password'] = md5($post['user_password']);

                        $self['confirm_password'] = md5($post['confirm_password']);

                        $inserted = $this->updateRowCommon($this->session->userdata('tablename'),$id,$self);

                    

                        $q['user_password'] = md5($post['user_password']);

                        $q['confirm_password'] = md5($post['confirm_password']);

                    }

                    //$q['status'] = $empRow['statusid'];

                    $q['fullname'] = $empRow['firstname'].' '.$empRow['lastname'];

                    $this->user_model->updateLogin($empRow['emailid'],$q);



                    $loggedInUserData = array(

                        'user_name' => $post['firstname'].' '.$post['lastname']

                    );

                    $this->session->set_userdata($loggedInUserData);

                    $this->session->set_flashdata('flash_success_msg', 'Your changes saved successfully.');

                    redirect($this->uri->segment(1)."/index");

                }else{

                    $this->session->set_flashdata('flash_error_msg', 'Some Problem occured.');

                }

            }else{



            }

        }



        $records = $this->getGeneralRowByColumn($this->session->userdata('tablename'),'emailid',$this->session->userdata('user_email'));
        $this->viewData['records'] = $records;

        $d['allArray'] = $this->viewData;

        $d['inputFieldValues'] = $inputFieldValues;

        

        $this->load->view("profile/add",$d);

    }

}

