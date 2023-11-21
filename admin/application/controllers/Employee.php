<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends MY_Controller {
	function __construct() {
        parent::__construct();

        $this->load->model('user_role_model', '', TRUE);
        $this->load->model('user_model', '', TRUE);
        $this->load->model('employee_model', '', TRUE);
        $this->load->model('module_auto_num_model', '', TRUE);
        $this->loggedIn();
        $this->viewData['countryphonecode'] = $this->getGeneralRows('billcountry','phonecode');
        $this->form_validation->set_error_delimiters('<div class="validationErrorMsg"><i class="fa fa-exclamation-triangle fa-lg"></i>&nbsp;&nbsp;', '</div>');
        $this->readPermission();
    }
    private function initializeInputFieldValues($id = 0) {
        $inputFieldValues = array();
        if ($id == 0) {
            foreach ($this->viewData['modulefield'] as $key => $value) {
               $inputFieldValues[$value->columnname] = '';
            }
            $inputFieldValues['confirm_password'] = '';
        } else {
            $row = $this->employee_model->getRowByColumnArray($this->uri->segment(1).'id',$id);
            foreach ($this->viewData['modulefield'] as $key => $value) {
               $inputFieldValues[$value->columnname] = $row[$value->columnname];
            }
            $inputFieldValues['user_password'] = '';
            $inputFieldValues['confirm_password'] = '';
            $this->setGeneralRowsByColumn('billstate','billcountryid',$row['billcountryid']);
            $this->setGeneralRowsByColumn('billcity','billstateid',$row['billstateid']);
            $this->setGeneralRowsByColumn('shipstate','shipcountryid',$row['shipcountryid']);
            $this->setGeneralRowsByColumn('shipcity','shipstateid',$row['shipstateid']);

        }
        return $inputFieldValues;
    }
    public function phpexcel_export(){
        //if(isset($_POST['export'])){
            $f = $this->viewData['module']; 
            $id = $f->moduleid;
            $columnlistArray = $this->employee_model->getAllColumnArray($id,'sequence');
            $export_data = $this->employee_model->getAllAvailableArray($_GET);
            $this->excelExport($columnlistArray,$export_data);
        //}
    }
	public function index() {
        $limit_per_page = LIMIT_PER_PAGE;
        $total_records = $this->employee_model->get_total($_GET);
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->paginationAll($total_records,$limit_per_page);


        $f = $this->viewData['module']; 
        $id = $f->moduleid;
        $this->viewData['columnlist'] = $this->employee_model->getAllColumnArray($id,'sequence');
        
        $this->viewData['records'] = $this->employee_model->getAllAvailableArray($_GET,$limit_per_page,$start_index);
        $d['allArray'] = $this->viewData;
        $this->load->view($this->uri->segment(1)."/index",$d);
    }
    public function view($id) {
        $inputFieldValues = $this->initializeInputFieldValues($id);
        $this->viewData['records'] = $this->employee_model->getRowByColumn($this->uri->segment(1).'id',$id);
        $d['allArray'] = $this->viewData;
        $d['inputFieldValues'] = $inputFieldValues;
        
        $this->load->view($this->uri->segment(1)."/view",$d);
    }
    public function edit($id) {
        $this->updatePermission();
        $inputFieldValues = $this->initializeInputFieldValues($id);
        if (isset($_POST['insert'])) {
            $post = $this->input->post();
            if (empty($post['user_password'])) {
                unset($post['user_password']);
                unset($post['confirm_password']);
            }
            if (isset($_FILES) && !empty($_FILES) && count($_FILES)) {
                foreach ($_FILES as $key => $value) {
                    if (is_array($_FILES[$key]['name'])) {
                        if ($_FILES[$key]['name'][0]) {
                            $post[$key] = serialize($this->uploadMultiImage($key) );
                        }
                    }else{
                        if ($_FILES[$key]['name']) {
                            $post[$key] = $this->uploadSingleImage($key);
                        }
                    }
                }
            }
            unset($post['insert']);
            if ($this->form_validation->run('employee_edit') == TRUE) {
                $inserted = $this->employee_model->update($id,$post);
                if($inserted){
                    $empRow = $this->employee_model->getRowByColumn($this->uri->segment(1).'id',$id);

                    $q = array();
                    $self = array();
                    if (!empty($post['user_password'])) {
                        $self['user_password'] = md5($empRow->user_password);
                        $self['confirm_password'] = md5($empRow->confirm_password);
                        $inserted = $this->employee_model->update($id,$self);
                    
                        $q['user_password'] = md5($empRow->user_password);
                        $q['confirm_password'] = md5($empRow->confirm_password);
                    }
                    $q['status'] = $empRow->statusid;
                    $q['fullname'] = $empRow->firstname.' '.$empRow->lastname;
                    $this->user_model->updateLogin($empRow->emailid,$q);

                    $this->session->set_flashdata('flash_success_msg', 'Your changes saved successfully.');
                    redirect($this->uri->segment(1)."/index");
                }else{
                }
            }else{
                $this->session->set_flashdata('flash_error_msg', 'Some Problem occured.');
            }
        }
        $this->viewData['records'] = $this->employee_model->getRowByColumn($this->uri->segment(1).'id',$id);
        $d['allArray'] = $this->viewData;
        $d['inputFieldValues'] = $inputFieldValues;
        
        $this->load->view($this->uri->segment(1)."/add",$d);
    }
    public function delete($id) {
        $this->deletePermission();
        $this->employee_model->delete($this->uri->segment(1).'id',$id);
        $row = $this->employee_model->getRowByColumn($this->uri->segment(1).'id',$id);
        $this->user_model->delete('emailid',$row->emailid);
        $this->session->set_flashdata('flash_success_msg', 'The Employee has been deleted successfully.');
        redirect($this->uri->segment(1)."/index");
    }
    public function deleteimage() {
        echo $this->employee_model->deletefile($this->uri->segment(1).'id',$_POST['id'],$_POST['columnname'],$_POST['filename'],$_POST['t']);
    }
    public function deleteAll() {
        $this->deletePermission();
        $this->employee_model->delete($this->uri->segment(1).'id',$this->input->post('ckbdelete'));
        $row = $this->employee_model->getColumnRowsByColumn('emailid',$this->uri->segment(1).'id',$this->input->post('ckbdelete'));
        $emailArray = array();
        foreach ($row as $key => $value) {
            array_push($emailArray, $value->emailid);
        }
        $this->user_model->delete('emailid',$emailArray);
        $this->session->set_flashdata('flash_success_msg', 'The Employee has been deleted successfully.');
        redirect($this->uri->segment(1)."/index");
    }
    public function download(){
        $csvResultOfProjects = $this->employee_model->getAllAvailableArrayDownload();
        $this->downloadcsv($csvResultOfProjects);
    }
    public function add() {
        $this->createPermission();
        $inputFieldValues = $this->initializeInputFieldValues();
        if (isset($_POST['insert'])) {
            $post = $this->input->post();
            $inputFieldValues = $post;
            if (isset($_FILES) && !empty($_FILES) && count($_FILES)) {
                foreach ($_FILES as $key => $value) {
                    if (is_array($_FILES[$key]['name'])) {
                        if ($_FILES[$key]['name'][0]) {
                            $post[$key] = serialize($this->uploadMultiImage($key) );
                        }
                    }else{
                        if ($_FILES[$key]['name']) {
                            $post[$key] = $this->uploadSingleImage($key);
                        }
                    }
                }
            }
            unset($post['insert']);
            if ($this->form_validation->run('employee') == TRUE) {
                $inserted = $this->employee_model->insert($post);
                $moduleid = $this->viewData['module']->moduleid;
                $module_auto_num = $this->module_auto_num_model->getRowByColumn('moduleid',$moduleid);
                if($inserted){
                    
                    $p=array();
                    $p['empcode'] = $module_auto_num->prefix.$module_auto_num->start_id;
                    $this->employee_model->update($inserted,$p);
                    $p=array();
                    $p['start_id'] = $module_auto_num->start_id + 1;
                    $module_auto_numId = $module_auto_num->module_auto_numid;
                    $this->module_auto_num_model->update($module_auto_numId,$p);


                    $empRow = $this->employee_model->getRowByColumn($this->uri->segment(1).'id',$inserted);

                    $self = array();
                    $self['user_password'] = md5($empRow->user_password);
                    $self['confirm_password'] = md5($empRow->confirm_password);
                    $this->employee_model->update($inserted,$self);
                
                    $q=array();
                    $q['emailid'] = $empRow->emailid;
                    $q['fullname'] = $empRow->firstname.' '.$empRow->lastname;
                    $q['user_password'] = md5($empRow->user_password);
                    $q['confirm_password'] = md5($empRow->confirm_password);
                    $q['status'] = $empRow->statusid;
                    $q['tablename'] = 'employee';
                    $userLoginId = $this->user_model->insert($q);
                    $q=array();
                    $q['roleid'] = $empRow->roleid;
                    $q['userid'] = $userLoginId;
                    $userLoginId = $this->user_role_model->insert($q);

                    $this->session->set_flashdata('flash_success_msg', 'The New Employee has been added successfully.');
                    redirect($this->uri->segment(1)."/index");
                }else{
                    $this->session->set_flashdata('flash_error_msg', 'Some Problem occured.');
                }
            }else{
                
            }
            
        }
        $this->viewData['records'] = array();
        $d['allArray'] = $this->viewData;
        $d['inputFieldValues'] = $inputFieldValues;
        $this->load->view($this->uri->segment(1)."/add",$d);
    }
}
