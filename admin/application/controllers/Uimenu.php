<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Uimenu extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('uimenu_model', '', TRUE);
        $this->load->model('page_model', '', TRUE);
        $this->load->model('module_auto_num_model', '', TRUE);
        $this->loggedIn();
        $this->readPermission();
    }
    private function initializeInputFieldValues($id=0,$conditions ='') {
       $inputFieldValues = array();
        if ($id == 0) {
            foreach ($this->viewData['modulefield'] as $key => $value) {
               $inputFieldValues[$value->columnname] = '';
            }
        } else {
            $row = $this->uimenu_model->getRowByColumnArrayLanguage($this->uri->segment(1).'id',$id,$conditions);
            foreach ($this->viewData['modulefield'] as $key => $value) {
               $inputFieldValues[$value->columnname] = $row[$value->columnname];
            }
        }
        return $inputFieldValues;
    }
    public function phpexcel_export(){
        //if(isset($_POST['export'])){
            $f = $this->viewData['module']; 
            $id = $f->moduleid;
            $columnlistArray = $this->uimenu_model->getAllColumnArray($id,'sequence');
            $export_data = $this->uimenu_model->getAllmasterLangStatus();
            $this->excelExport($columnlistArray,$export_data);
        //}
    }
    public function index() {
        $limit_per_page = LIMIT_PER_PAGE;
        $total_records = $this->uimenu_model->get_totalLanguage($_GET);
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->paginationAll($total_records,$limit_per_page);
        $f = $this->viewData['module']; 
        $id = $f->moduleid;
        $this->viewData['columnlist'] = $this->uimenu_model->getAllColumnArray($id);
        $this->viewData['records'] = $this->uimenu_model->getAllmasterLangStatus($_GET,$limit_per_page,$start_index);
        $d['allArray'] = $this->viewData;
        $this->load->view($this->uri->segment(1)."/index",$d);
    }
    public function delete($id) {
        $this->deletePermission();
        $this->uimenu_model->delete($this->uri->segment(1).'id',$id);
        $this->uimenu_model->deletelanguage($this->uri->segment(1).'id',$id);
        $this->session->set_flashdata('flash_success_msg', 'The Product Type has been deleted successfully.');
        redirect($this->uri->segment(1)."/index");
    }
    public function deleteimage() {
        echo $this->uimenu_model->deletefile($this->uri->segment(1).'id',$_POST['id'],$_POST['columnname'],$_POST['filename'],$_POST['t']);
    }
    public function deleteAll() {
        $this->deletePermission();
        $this->uimenu_model->delete($this->uri->segment(1).'id',$this->input->post('ckbdelete'));
        $this->uimenu_model->deletelanguage($this->uri->segment(1).'id',$this->input->post('ckbdelete'));
        $this->session->set_flashdata('flash_success_msg', 'The Page has been deleted successfully.');
        redirect($this->uri->segment(1)."/index");
    }
    public function download(){
        $csvResultOfProjects = $this->uimenu_model->getAllAvailableArrayDownload();
        $this->downloadcsv($csvResultOfProjects);
    }
    public function view($id) {
        $this->getlanguage($_GET['languageid']);
        $inputFieldValues = $this->initializeInputFieldValues($id,$_GET);
        $this->viewData['records'] = $this->uimenu_model->getRowByColumn($this->uri->segment(1).'id',$id,$_GET);
        $d['allArray'] = $this->viewData;
        $d['inputFieldValues'] = $inputFieldValues;
        $this->load->view($this->uri->segment(1)."/view",$d);
    }
    public function edit($id) {
        $this->getlanguage($_GET['languageid']);
        $this->updatePermission();
        $inputFieldValues = $this->initializeInputFieldValues($id,$_GET);
        $this->viewData['pageid'] = $this->page_model->getAllAvailableArrayMenu($_GET);
        if (isset($_POST['insert'])) {
            $post = $this->input->post();
            $p=0;
            $postCategory ='';
            foreach ($this->input->post('pageid') as $key => $value) {
                if (!empty($value)){
                    if ($p!=0)$postCategory .=',';
                    $postCategory .= trim($value);
                    $p++;
                }
            }
            $parentArray['pageid'] = $postCategory;
            if (empty($this->input->post('pageid'))) {
                $parentArray['pageid']="";
            }
            unset($post['insert']);
            if (isset($_FILES) && !empty($_FILES) && count($_FILES)) {
                foreach ($_FILES as $key => $value) {
                    if (is_array($_FILES[$key]['name'])) {
                        if ($_FILES[$key]['name'][0]) {
                            $parentArray[$key] = serialize($this->uploadMultiImage($key) );
                        }
                    }else{
                        if ($_FILES[$key]['name']) {
                            $parentArray[$key] = $this->uploadSingleImage($key);
                        }
                    }
                }
            }
            $childArray = array();
            for ($i=0; $i < count($this->input->post('languageid')); $i++) { 
                $row  = array();
                foreach ($inputFieldValues as $key => $value) {
                    if (!is_array($this->input->post($key))) {
                        if (!empty($this->input->post($key))) {
                            $parentArray[$key] = $this->input->post($key);
                        }
                    }else{
                        if (!empty($this->input->post($key)[$i])) {
                            if ($key == 'slug' || $key == 'pageid') {
                            }else{
                                $row[$key] = $this->input->post($key)[$i];
                            }
                        }
                    }
                }

                $row['languageid'] = $this->input->post('languageid')[$i];
                array_push($childArray, $row);
            }
            $cc['languageid'] = $this->input->post('languageid')[0];
            $cc[$this->uri->segment(1).'id'] = $id;
            $inserted = $this->uimenu_model->update($id,$parentArray);
            $rr = $this->uimenu_model->getRowByColumnLangulage($this->uri->segment(1).'id',$id,$cc['languageid']);
            if($rr){
                $this->uimenu_model->updatelanguage($cc,$childArray[0]);
            }else{
                foreach ($childArray as $key => $value) {
                    $value[$this->uri->segment(1).'id'] = $id;
                    unset($value['slug']);
                    unset($value['pageid']);
                    $this->uimenu_model->insertlanguage($value);
                }
            }
            if($inserted){
                $this->session->set_flashdata('flash_success_msg', 'Your changes saved successfully.');
                redirect($this->uri->segment(1)."/index");
            }else{
                $this->session->set_flashdata('flash_error_msg', 'Some Problem occured.');
            }
        }
        $this->viewData['records'] = $this->uimenu_model->getRowByColumn($this->uri->segment(1).'id',$id);
        $d['allArray'] = $this->viewData;
        $d['inputFieldValues'] = $inputFieldValues;
        
        $this->load->view($this->uri->segment(1)."/add",$d);
    }
    public function add() {
        $this->createPermission();
        $inputFieldValues = $this->initializeInputFieldValues();
        $this->viewData['pageid'] = $this->page_model->getAllAvailableArrayMenu();
        if (isset($_POST['insert'])) {
            $post = $this->input->post();
            $p=0;
            $postCategory ='';
            foreach ($this->input->post('pageid') as $key => $value) {
                if (!empty($value)){
                    if ($p!=0)$postCategory .=',';
                    $postCategory .= trim($value);
                    $p++;
                }
            }
            $parentArray['pageid'] = $postCategory;
            if (empty($this->input->post('pageid'))) {
                $parentArray['pageid']="";
            }
            unset($post['insert']);
            if (isset($_FILES) && !empty($_FILES) && count($_FILES)) {
                foreach ($_FILES as $key => $value) {
                    if (is_array($_FILES[$key]['name'])) {
                        if ($_FILES[$key]['name'][0]) {
                            $parentArray[$key] = serialize($this->uploadMultiImage($key) );
                        }
                    }else{
                        if ($_FILES[$key]['name']) {
                            $parentArray[$key] = $this->uploadSingleImage($key);
                        }
                    }
                }
            }
            $childArray = array();
            for ($i=0; $i < count($this->input->post('languageid')); $i++) { 
                $row  = array();
                foreach ($inputFieldValues as $key => $value) {
                    if (!is_array($this->input->post($key))) {
                        if (!empty($this->input->post($key))) {
                            $parentArray[$key] = $this->input->post($key);
                        }
                    }else{
                        if (!empty($this->input->post($key)[$i])) {
                            if ($i == 0 || $key == 'uimenu') {
                                $parentArray['slug'] = $this->get_Title($this->input->post($key)[$i]);
                                $row[$key] = $this->input->post($key)[$i];
                            }else{
                                $row[$key] = $this->input->post($key)[$i];
                            }
                        }
                    }
                }

                $row['languageid'] = $this->input->post('languageid')[$i];
                array_push($childArray, $row);
            }
            $inserted = $this->uimenu_model->insert($parentArray);
            $moduleid = $this->viewData['module']->moduleid;
            if($inserted){
                foreach ($childArray as $key => $value) {
                    unset($value['pageid']);
                    $value[$this->uri->segment(1).'id'] = $inserted;
                    $this->uimenu_model->insertlanguage($value);
                }
                $this->session->set_flashdata('flash_success_msg', 'The New Page has been added successfully.');
                redirect($this->uri->segment(1)."/index");
            }else{
                $this->session->set_flashdata('flash_error_msg', 'Some Problem occured.');
            }
        }
        $this->viewData['records'] = array();
        $d['allArray'] = $this->viewData;
        $d['inputFieldValues'] = $inputFieldValues;
        $this->load->view($this->uri->segment(1)."/add",$d);
    }
}
