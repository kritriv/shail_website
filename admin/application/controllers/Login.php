<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('role_model', '', TRUE);
        $this->load->model('employee_model', '', TRUE);
        $this->load->model('user_model');
        if($this->session->userdata('user_email')) {
            redirect('dashboard/', 'location');
        } else {
        }
    }

    public function index() {
        $viewData = array();
        if (isset($_POST['user_login'])) {
            $email = $this->input->post('email');
            $password = $this->input->post('user_password');
            $postrecord = [
                        'username' => $email,
                        'password' => $password,
                    ];
            if (!empty(trim($email)) && !empty(trim($password))) {
                $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
                $userIp=$this->input->ip_address();
                $secret = $this->config->item('google_secret');
                $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
                $ch = curl_init(); 
                curl_setopt($ch, CURLOPT_URL, $url); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $output = curl_exec($ch); 
                curl_close($ch);      
                $status= json_decode($output, true);
                //if ($status['success']) {
                    $loggedInUser = $this->user_model->getByUsernamePassword($email, $password);
                    if ($loggedInUser != NULL) {
                        if ($loggedInUser->status == '2') {
                            $viewData['error_notification_msg'] = 'Your account is not active by admin.';
                        }else if ($loggedInUser->deleted == '1') {
                            $viewData['error_notification_msg'] = 'Your account is deleted by admin.';
                        } else {
                            $this->db->select('*')
                                    ->from(TBL_PREFIX.$loggedInUser->tablename)
                                    ->where('emailid', $loggedInUser->emailid); 
                            $query = $this->db->get();
                            $this->db->last_query();
                            $resultSet = $query->row_array();
                            if ($loggedInUser->tablename == 'buyer') {
                                if ($resultSet['verified'] == 1) {
                                    $displayModule = $this->role_model->getAllModuleArray($resultSet['roleid']);
                                    $subModule = $this->role_model->getSubModules();
                                    $displaySubModule = $this->role_model->getAllSubModuleArray();
                                    $loggedInUserData = array(
                                        'login_id' => $loggedInUser->id,
                                        'user_id' => $resultSet[$loggedInUser->tablename.'id'],
                                        'role_id' => $resultSet['roleid'],
                                        'user_name' => $resultSet['firstname'].' '.$resultSet['lastname'],
                                        'user_email' => $loggedInUser->emailid,
                                        'tablename' => $loggedInUser->tablename,
                                        'displayModule' => $displayModule,
                                        'subModule' => $subModule,
                                        'displaySubModule' => $displaySubModule,
                                    );
                                    $this->session->set_userdata($loggedInUserData);
                                    $_SESSION['login_id']=$loggedInUser->id;
                                    $_SESSION['key']=$resultSet[$loggedInUser->tablename.'id'];
                                    $_SESSION['email']=$loggedInUser->emailid;
                                    $_SESSION['role_id']=$resultSet['roleid'];
                                    $ch = curl_init(str_replace('/admin', '', base_url()).'db/login.php');
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postrecord);
                                    $response = curl_exec($ch);
                                    curl_close($ch);
                                    //redirect('/dashboard/', 'location'); 
                                    redirect('../login-redirect.php?login_id='.$loggedInUser->id.'&key='.$resultSet[$loggedInUser->tablename.'id'].'&email='.$loggedInUser->emailid.'&role_id='.$resultSet['roleid']);                                }else{
                                    $viewData['error_notification_msg'] = 'You are not varified.';
                                }
                            }else if ($loggedInUser->tablename == 'seller') {
                                if ($resultSet['verified'] == 1) {
                                    $displayModule = $this->role_model->getAllModuleArray($resultSet['roleid']);
                                    $subModule = $this->role_model->getSubModules();
                                    $displaySubModule = $this->role_model->getAllSubModuleArray();
                                    
                                    $loggedInUserData = array(
                                        'login_id' => $loggedInUser->id,
                                        'user_id' => $resultSet[$loggedInUser->tablename.'id'],
                                        'role_id' => $resultSet['roleid'],
                                        'user_name' => $resultSet['firstname'].' '.$resultSet['lastname'],
                                        'user_email' => $loggedInUser->emailid,
                                        'tablename' => $loggedInUser->tablename,
                                        'displayModule' => $displayModule,
                                        'subModule' => $subModule,
                                        'displaySubModule' => $displaySubModule,
                                    );
                                    $this->session->set_userdata($loggedInUserData);
                                    $_SESSION['login_id']=$loggedInUser->id;
                                    $_SESSION['key']=$resultSet[$loggedInUser->tablename.'id'];
                                    $_SESSION['email']=$loggedInUser->emailid;
                                    $_SESSION['role_id']=$resultSet['roleid'];
                                    $ch = curl_init(str_replace('/admin', '', base_url()).'db/login.php');
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postrecord);
                                    $response = curl_exec($ch);
                                    curl_close($ch);
                                    redirect('/dashboard/', 'location'); 
                                    //redirect('../login-redirect.php?login_id='.$loggedInUser->id.'&key='.$resultSet[$loggedInUser->tablename.'id'].'&email='.$loggedInUser->emailid.'&role_id='.$resultSet['roleid']);
                                }else{
                                    $viewData['error_notification_msg'] = 'You are not varified.';
                                }
                            }else{
                                $displayModule = $this->role_model->getAllModuleArray($resultSet['roleid']);
                                $subModule = $this->role_model->getSubModules();
                                $displaySubModule = $this->role_model->getAllSubModuleArray();
                                $loggedInUserData = array(
                                    'login_id' => $loggedInUser->id,
                                    'user_id' => $resultSet[$loggedInUser->tablename.'id'],
                                    'role_id' => $resultSet['roleid'],
                                    'user_name' => $resultSet['firstname'].' '.$resultSet['lastname'],
                                    'user_email' => $loggedInUser->emailid,
                                    'tablename' => $loggedInUser->tablename,
                                    'displayModule' => $displayModule,
                                    'subModule' => $subModule,
                                    'displaySubModule' => $displaySubModule,
                                );
                                $this->session->set_userdata($loggedInUserData);
                                $_SESSION['login_id']=$loggedInUser->id;
                                $_SESSION['key']=$resultSet[$loggedInUser->tablename.'id'];
                                $_SESSION['email']=$loggedInUser->emailid;
                                $_SESSION['role_id']=$resultSet['roleid'];
                                $ch = curl_init(str_replace('/admin', '', base_url()).'db/login.php');
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $postrecord);
                                $response = curl_exec($ch);
                                curl_close($ch);
                                redirect('/dashboard/', 'location'); 
                                //redirect('../login-redirect.php?login_id='.$loggedInUser->id.'&user_id='.$resultSet[$loggedInUser->tablename.'id'].'&key='.$resultSet[$loggedInUser->tablename.'id'].'&email='.$loggedInUser->emailid.'&role_id='.$resultSet['roleid']);
                            }
                        }
                    } else {
                        $viewData['error_notification_msg'] = 'The username or password you entered is incorrect.';
                    }
                //}else{
                  //  $viewData['error_notification_msg'] = 'Sorry Google Recaptcha Unsuccessful!!';
                //}

                /*$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
                $userIp=$this->input->ip_address();
                $secret = $this->config->item('google_secret');
                $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
                $ch = curl_init(); 
                curl_setopt($ch, CURLOPT_URL, $url); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $output = curl_exec($ch); 
                curl_close($ch);      
                $status= json_decode($output, true);
                if ($status['success']) {
                    $loggedInUser = $this->user_model->getByUsernamePassword($email, $password);
                    if ($loggedInUser != NULL) {
                        if ($loggedInUser->status == '2') {
                            $viewData['error_notification_msg'] = 'Your account is blocked by admin.';
                        }else if ($loggedInUser->deleted == '1') {
                            $viewData['error_notification_msg'] = 'Your account is deleted by admin.';
                        } else {
                            $this->db->select('*')
                                ->from(TBL_PREFIX.$loggedInUser->tablename)
                                ->where('emailid', $loggedInUser->emailid); 
                            $query = $this->db->get();
                            $this->db->last_query();
                            $resultSet = $query->row_array();
                            if ($loggedInUser->tablename == 'buyer' || $loggedInUser->tablename == 'seller') {
                                if ($resultSet['verified'] == 1) {
                                    $displayModule = $this->role_model->getAllModuleArray($resultSet['roleid']);
                                    $subModule = $this->role_model->getSubModules();
                                    $displaySubModule = $this->role_model->getAllSubModuleArray();
                                    
                                    $loggedInUserData = array(
                                        'login_id' => $loggedInUser->id,
                                        'user_id' => $resultSet[$loggedInUser->tablename.'id'],
                                        'role_id' => $resultSet['roleid'],
                                        'user_name' => $resultSet['firstname'].' '.$resultSet['lastname'],
                                        'user_email' => $loggedInUser->emailid,
                                        'tablename' => $loggedInUser->tablename,
                                        'displayModule' => $displayModule,
                                        'subModule' => $subModule,
                                        'displaySubModule' => $displaySubModule,
                                    );
                                    $this->session->set_userdata($loggedInUserData);
                                    $_SESSION['login_id']=$loggedInUser->id;
                                    $_SESSION['key']=$resultSet[$loggedInUser->tablename.'id'];
                                    $_SESSION['email']=$loggedInUser->emailid;
                                    $_SESSION['role_id']=$resultSet['roleid'];
                                    $ch = curl_init(str_replace('/admin', '', base_url()).'db/login.php');
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postrecord);
                                    $response = curl_exec($ch);
                                    curl_close($ch);
                                    //if($resultSet['roleid'] == 3){
                                        //redirect('../login-redirect.php?login_id='.$loggedInUser->id.'&key='.$resultSet[$loggedInUser->tablename.'id'].'&email='.$loggedInUser->emailid.'&role_id='.$resultSet['roleid']);
                                    //}else{
                                       //redirect('dashboard/', 'location'); 
                                    //}
                                    redirect('../login-redirect.php?login_id='.$loggedInUser->id.'&key='.$resultSet[$loggedInUser->tablename.'id'].'&email='.$loggedInUser->emailid.'&role_id='.$resultSet['roleid']);
                                }else{
                                    $viewData['error_notification_msg'] = 'You are not varified.';
                                }
                            }else{
                                $displayModule = $this->role_model->getAllModuleArray($resultSet['roleid']);
                                $subModule = $this->role_model->getSubModules();
                                $displaySubModule = $this->role_model->getAllSubModuleArray();
                                $loggedInUserData = array(
                                    'login_id' => $loggedInUser->id,
                                    'user_id' => $resultSet[$loggedInUser->tablename.'id'],
                                    'role_id' => $resultSet['roleid'],
                                    'user_name' => $resultSet['firstname'].' '.$resultSet['lastname'],
                                    'user_email' => $loggedInUser->emailid,
                                    'tablename' => $loggedInUser->tablename,
                                    'displayModule' => $displayModule,
                                    'subModule' => $subModule,
                                    'displaySubModule' => $displaySubModule,
                                );
                                $this->session->set_userdata($loggedInUserData);
                                $_SESSION['login_id']=$loggedInUser->id;
                                $_SESSION['key']=$resultSet[$loggedInUser->tablename.'id'];
                                $_SESSION['email']=$loggedInUser->emailid;
                                $_SESSION['role_id']=$resultSet['roleid'];
                                $ch = curl_init(str_replace('/admin', '', base_url()).'db/login.php');
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $postrecord);
                                $response = curl_exec($ch);
                                curl_close($ch);
                                //if($resultSet['roleid'] == 3){
                                    //redirect('../login-redirect.php?login_id='.$loggedInUser->id.'&key='.$resultSet[$loggedInUser->tablename.'id'].'&email='.$loggedInUser->emailid.'&role_id='.$resultSet['roleid']);
                                //}else{
                                   //redirect('dashboard/', 'location'); 
                                //}
                                redirect('../login-redirect.php?login_id='.$loggedInUser->id.'&key='.$resultSet[$loggedInUser->tablename.'id'].'&email='.$loggedInUser->emailid.'&role_id='.$resultSet['roleid']);
                            }
                        }
                    } else {
                        $viewData['error_notification_msg'] = 'The username or password you entered is incorrect.';
                    }
                }else{
                    $viewData['error_notification_msg'] = 'Sorry Google Recaptcha Unsuccessful!!';
                }*/
                

            }else{
                $loggedInUser = $this->user_model->getByUsernamePassword($email, $password);
                if ($loggedInUser != NULL) {
                    $viewData['userNameArray'] = $loggedInUser;
                    $viewData['email'] = $email;
                }else{
                    $viewData['email'] = $email;
                    $viewData['error_notification_msg'] = 'The Email you entered is incorrect.';
                }
            }
        }
        $this->load->view('login/login', $viewData);
    }
    public function uilogin(){
        $email = $this->input->post('email');
        $password = $this->input->post('user_password');
        $postrecord = [
                    'username' => $email,
                    'password' => $password,
                ];
        if (!empty(trim($email)) && !empty(trim($password))) {
            $loggedInUser = $this->user_model->getByUsernamePassword($email, $password);
            if ($loggedInUser != NULL) {
                $this->db->select('*')
                        ->from(TBL_PREFIX.$loggedInUser->tablename)
                        ->where('emailid', $loggedInUser->emailid); 
                $query = $this->db->get();
                $this->db->last_query();
                $resultSet = $query->row_array();
                if ($loggedInUser->tablename == 'buyer' || $loggedInUser->tablename == 'seller') {
                    if ($resultSet['verified'] == 1) {
                        $displayModule = $this->role_model->getAllModuleArray($resultSet['roleid']);
                        $subModule = $this->role_model->getSubModules();
                        $displaySubModule = $this->role_model->getAllSubModuleArray();
                        
                        $loggedInUserData = array(
                            'login_id' => $loggedInUser->id,
                            'user_id' => $resultSet[$loggedInUser->tablename.'id'],
                            'role_id' => $resultSet['roleid'],
                            'user_name' => $resultSet['firstname'].' '.$resultSet['lastname'],
                            'user_email' => $loggedInUser->emailid,
                            'tablename' => $loggedInUser->tablename,
                            'displayModule' => $displayModule,
                            'subModule' => $subModule,
                            'displaySubModule' => $displaySubModule,
                        );
                        $this->session->set_userdata($loggedInUserData);
                        $_SESSION['login_id']=$loggedInUser->id;
                        $_SESSION['key']=$resultSet[$loggedInUser->tablename.'id'];
                        $_SESSION['email']=$loggedInUser->emailid;
                        $_SESSION['role_id']=$resultSet['roleid'];
                        $ch = curl_init(str_replace('/admin', '', base_url()).'db/login.php');
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $postrecord);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        redirect('../login-redirect.php?login_id='.$loggedInUser->id.'&key='.$resultSet[$loggedInUser->tablename.'id'].'&email='.$loggedInUser->emailid.'&role_id='.$resultSet['roleid']);
                    }else{
                        $viewData['error_notification_msg'] = 'You are not varified.';
                    }
                }else{
                    $displayModule = $this->role_model->getAllModuleArray($resultSet['roleid']);
                    $subModule = $this->role_model->getSubModules();
                    $displaySubModule = $this->role_model->getAllSubModuleArray();
                    $loggedInUserData = array(
                        'login_id' => $loggedInUser->id,
                        'user_id' => $resultSet[$loggedInUser->tablename.'id'],
                        'role_id' => $resultSet['roleid'],
                        'user_name' => $resultSet['firstname'].' '.$resultSet['lastname'],
                        'user_email' => $loggedInUser->emailid,
                        'tablename' => $loggedInUser->tablename,
                        'displayModule' => $displayModule,
                        'subModule' => $subModule,
                        'displaySubModule' => $displaySubModule,
                    );
                    $this->session->set_userdata($loggedInUserData);
                    $_SESSION['login_id']=$loggedInUser->id;
                    $_SESSION['key']=$resultSet[$loggedInUser->tablename.'id'];
                    $_SESSION['email']=$loggedInUser->emailid;
                    $_SESSION['role_id']=$resultSet['roleid'];
                    $ch = curl_init(str_replace('/admin', '', base_url()).'db/login.php');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postrecord);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    redirect('../login-redirect.php?login_id='.$loggedInUser->id.'&key='.$resultSet[$loggedInUser->tablename.'id'].'&email='.$loggedInUser->emailid.'&role_id='.$resultSet['roleid']);
                }
            }
        }
    }
    public function accountactive($id){
        $user = $this->user_model->getbytoken('activetoken',$id);
        if ($user == NULL) {
            redirect('login');
            exit;
        }
        $pas['status'] = 1;
        $pas['activetoken'] = '';
        $sta['statusid'] = 1;
        $sta['verified'] = 1;
        $this->user_model->update($user->id, $pas);
        if ($user->tablename == 'buyer') {
            $rr = $this->buyer_model->getRowByColumnArray('emailid',$user->emailid);
            $this->buyer_model->update($rr[$user->tablename.'id'], $sta);
        }else if ($user->tablename == 'seller') {
            $rr = $this->seller_model->getRowByColumnArray('emailid',$user->emailid);
            $this->seller_model->update($rr[$user->tablename.'id'], $sta);
        }else if ($user->tablename == 'employee') {
            $rr = $this->employee_model->getRowByColumnArray('emailid',$user->emailid);
            $this->employee_model->update($rr[$user->tablename.'id'], $sta);
        }
        redirect('login');
    }
}
