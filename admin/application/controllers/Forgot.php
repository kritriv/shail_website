<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Forgot extends MY_Controller {



    function __construct() {

        parent::__construct();

        $this->load->model('role_model', '', TRUE);

        $this->load->model('user_model');

        $this->load->model('employee_model', '', TRUE);


        $this->load->model('email_model', '', TRUE);

        

        if($this->session->userdata('user_email')) {

            redirect('dashboard/', 'location');

        } else {

        }

    }



    public function index() {

        $viewData = array();

        if (isset($_POST['user_login'])) {

            $email = $this->input->post('emailid');

            if (!empty(trim($email))) {

                $loggedInUser = $this->user_model->getByEmail($email);

                if ($loggedInUser != NULL) {

                    if ($loggedInUser->status == '2') {

                        $viewData['error_notification_msg'] = 'Your account is blocked by admin.';

                    }else if ($loggedInUser->deleted == '1') {

                        $viewData['error_notification_msg'] = 'Your account is deleted by the administrator.';

                    } else {

                       $templateRow = $this->getGeneralRowByColumnLangf('email','slug','forgot');

                        $this->email->from(SEND_MAIL_ID);

                        $this->email->to($email);

                        $this->email->subject('Forgot Password');

                        $mmm = '';

                        

                        $t['forgotToken'] = $this->random_number(10);

                        $this->user_model->update($loggedInUser->id, $t);

                        if($loggedInUser->tablename  == 'employee'){

                            $empRow = $this->employee_model->getRowByColumnf('emailid',$loggedInUser->emailid);

                        }else if($loggedInUser->tablename  == 'buyer'){

                            $empRow = $this->buyer_model->getRowByColumnf('emailid',$loggedInUser->emailid);

                        }else if($loggedInUser->tablename  == 'seller'){

                            $empRow = $this->seller_model->getRowByColumnf('emailid',$loggedInUser->emailid);

                        }

                        

                        $mmm .= '<p>Dear '.$empRow->firstname.' '.$empRow->lastname. ',</p>';

                        $mmm .= '<p><a href="'.base_url().'forgot/update/'.$t['forgotToken'].'" target="_blank">Please Click here to reset the password.</a> </p><br/>';

                        $mmm .= '<p>Thanks & Regards,</p><p>Shail</p>';

                        

                        $changedMessage = '<!doctype html ><html><body><div>';

                        $changedMessage .= $mmm;

                        $changedMessage .= '</div></body></html><div>'; 



                        $this->email->set_mailtype("html");

                        $this->email->message($changedMessage);    

                        $this->email->send();

                        $viewData['success_notification_msg'] = 'To reset your password, please check your email!';

                    }

                } else {

                    $viewData['error_notification_msg'] = 'The username or password you used is incorrect.';

                }

            }else{

                $loggedInUser = $this->user_model->getByUsernamePassword($email, $password);

                if ($loggedInUser != NULL) {

                    $viewData['userNameArray'] = $loggedInUser;

                    $viewData['email'] = $email;

                }else{

                    $viewData['email'] = $email;

                    $viewData['error_notification_msg'] = 'The email you entered is incorrect.';

                }

            }

        }



        $this->load->view('login/forgot', $viewData);

    }

    public function update($id) {

        $user = $this->user_model->getByforgotToken($id);

        if ($user == NULL) {

            redirect('login');

            exit;

        }

        if (isset($_POST['user_login'])) {

            $pas['user_password'] = md5($this->input->post('confirm_password'));

            $pas['forgotToken'] = '';

            if ($this->input->post('user_password') != $this->input->post('confirm_password')) {

                $this->viewData['error_notification_msg'] = 'Your password did not match';

            } else {

                $this->user_model->update($user->id, $pas);

                $this->viewData['success_notification_msg'] = 'Password change Successfuly!.';

                $this->viewData['login'] = '1';

            }

        }

        $this->load->view('login/forgot_update', $this->viewData);

    }

    public function random_number($maxlength = 17) {

        $chary = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",

                        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",

                        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");

        $return_str = "";

        for ( $x=0; $x<=$maxlength; $x++ ) {

            $return_str .= $chary[rand(0, count($chary)-1)];

        }

        return $return_str;

    }



}

