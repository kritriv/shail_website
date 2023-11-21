<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Postcategory extends MY_Controller {

	function __construct() {

        parent::__construct();

        $this->load->model('postcategory_model', '', TRUE);

        $this->load->model('module_auto_num_model', '', TRUE);
        $this->viewData['category'] = $this->postcategory_model->getAllAvailableArray();

        $this->loggedIn();

        $this->readPermission();

    }

    private function initializeInputFieldValues($id = 0) {

        $inputFieldValues = array();

        if ($id == 0) {

            foreach ($this->viewData['modulefield'] as $key => $value) {

               $inputFieldValues[$value->columnname] = '';

            }

        } else {

            $row = $this->postcategory_model->getRowByColumnArray($this->uri->segment(1).'id',$id);

            foreach ($this->viewData['modulefield'] as $key => $value) {

               $inputFieldValues[$value->columnname] = $row[$value->columnname];

            }

        }

        return $inputFieldValues;

    }

    public function deleteimage() {

        echo $this->postcategory_model->deletefile($this->uri->segment(1).'id',$_postcategory['id'],$_postcategory['columnname'],$_postcategory['filename'],$_postcategory['t']);

    }

    public function phpexcel_export(){

        //if(isset($_postcategory['export'])){

            $f = $this->viewData['module']; 

            $id = $f->moduleid;

            $columnlistArray = $this->postcategory_model->getAllColumnArray($id);

            $export_data = $this->postcategory_model->getAllAvailableArray();

            $this->excelExport($columnlistArray,$export_data);

        //}

    }

	public function index() {

        $limit_per_page = LIMIT_PER_PAGE;

        $total_records = $this->postcategory_model->get_total();

        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->paginationAll($total_records,$limit_per_page);



 

        $f = $this->viewData['module']; 

        $id = $f->moduleid;

        $this->viewData['columnlist'] = $this->postcategory_model->getAllColumnArray($id);

        $this->viewData['records'] = $this->postcategory_model->getAllAvailableArray($limit_per_page,$start_index);

        $d['allArray'] = $this->viewData;

        $this->load->view($this->uri->segment(1)."/index",$d);

    }

    public function view($id) {

        $inputFieldValues = $this->initializeInputFieldValues($id);

        

        $this->viewData['records'] = $this->postcategory_model->getRowByColumn($this->uri->segment(1).'id',$id);

        $d['allArray'] = $this->viewData;

        $d['inputFieldValues'] = $inputFieldValues;

        $this->load->view($this->uri->segment(1)."/view",$d);

    }

    public function edit($id) {

        $this->updatePermission();

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

                            $post[$key] = $this->uploadSingleImage($key);

                        }

                    }

                }

            }

            unset($post['insert']);

            $inserted = $this->postcategory_model->update($id,$post);

            if($inserted){

                $this->session->set_flashdata('flash_success_msg', 'Your changes saved successfully.');

                redirect($this->uri->segment(1)."/index");

            }else{

                $this->session->set_flashdata('flash_error_msg', 'Some Problem occured.');

            }

        }

        $this->viewData['records'] = $this->postcategory_model->getRowByColumn('postcategoryid',$id);

        $d['allArray'] = $this->viewData;

        $d['inputFieldValues'] = $inputFieldValues;

        

        $this->load->view($this->uri->segment(1)."/add",$d);

    }

    public function delete($id) {

        $this->deletePermission();

        $this->postcategory_model->delete($this->uri->segment(1).'id',$id);

        $this->session->set_flashdata('flash_success_msg', 'The postcategory Icon has been deleted successfully.');

        redirect($this->uri->segment(1)."/index");

    }

    public function deleteAll() {

        $this->deletePermission();

        $this->postcategory_model->delete($this->uri->segment(1).'id',$this->input->postcategory('ckbdelete'));

        $this->session->set_flashdata('flash_success_msg', 'The postcategory Icon has been deleted successfully.');

        redirect($this->uri->segment(1)."/index");

    }

    public function download(){

        $csvResultOfProjects = $this->postcategory_model->getAllAvailableArrayDownload();

        $this->downloadcsv($csvResultOfProjects);

    }

    public function add() {

        $this->createPermission();

        $inputFieldValues = $this->initializeInputFieldValues();
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

                            $post[$key] = $this->uploadSingleImage($key);

                        }

                    }

                }

            }

            unset($post['insert']);

            $inserted = $this->postcategory_model->insert($post);

            $moduleid = $this->viewData['module']->moduleid;

            if($inserted){

                $this->session->set_flashdata('flash_success_msg', 'The New postcategory Icon has been added successfully.');

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

