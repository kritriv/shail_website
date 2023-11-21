<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends MY_Controller {

	function __construct() {

        parent::__construct();

        $this->load->model('sliders_model', '', TRUE);
        $this->load->model('media_model', '', TRUE);
        
        $this->load->model('module_auto_num_model', '', TRUE);

        $this->loggedIn();
        $this->readPermission();
    }
    public function deleteimage() {
        echo $this->sliders_model->deletefile($this->uri->segment(1).'id',$_POST['id'],$_POST['columnname'],$_POST['filename'],$_POST['t']);
    }
    private function initializeInputFieldValues($id = 0) {

        $inputFieldValues = array();

        if ($id == 0) {

            foreach ($this->viewData['modulefield'] as $key => $value) {

               $inputFieldValues[$value->columnname] = '';

            }

        } else {

            $row = $this->sliders_model->getRowByColumnArray($this->uri->segment(1).'id',$id);

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
            $columnlistArray = $this->sliders_model->getAllColumnArray($id,'sequence');
            $export_data = $this->sliders_model->getAllAvailableArray();
            $this->excelExport($columnlistArray,$export_data);
        //}
    }
	public function index() {

        $limit_per_page = LIMIT_PER_PAGE;

        $total_records = $this->sliders_model->get_total();

        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

       $this->paginationAll($total_records,$limit_per_page);


 

        $f = $this->viewData['module']; 

        $id = $f->moduleid;

        $this->viewData['columnlist'] = $this->sliders_model->getAllColumnArray($id);

        $this->viewData['records'] = $this->sliders_model->getAllAvailableArray($limit_per_page,$start_index);

        $d['allArray'] = $this->viewData;

        $this->load->view($this->uri->segment(1)."/index",$d);

    }

    public function view($id) {

        $inputFieldValues = $this->initializeInputFieldValues($id);

        

        $this->viewData['records'] = $this->sliders_model->getRowByColumn($this->uri->segment(1).'id',$id);

        $d['allArray'] = $this->viewData;

        $d['inputFieldValues'] = $inputFieldValues;

        $this->load->view($this->uri->segment(1)."/view",$d);

    }

    public function edit($id) {
        $this->updatePermission();
        $inputFieldValues = $this->initializeInputFieldValues($id);
        $this->viewData['imagesid'] = $this->media_model->getAllAvailableArray();
        
        if (isset($_POST['insert'])) {
            $post = $this->input->post();
            
            $p=0;
            $postCategory ='';
            foreach ($this->input->post('imagesid') as $key => $value) {
                if (!empty($value)){
                    if ($p!=0)$postCategory .=',';
                    $postCategory .= trim($value);
                    $p++;
                }
            }
            $post['imagesid'] = $postCategory;
            if (empty($post['imagesid'])) {
                $post['imagesid']="";
            }
            unset($post['insert']);

            $inserted = $this->sliders_model->update($id,$post);

            if($inserted){

                $this->session->set_flashdata('flash_success_msg', 'Your changes saved successfully.');

                redirect($this->uri->segment(1)."/index");

            }else{

                $this->session->set_flashdata('flash_error_msg', 'Some Problem occured.');

            }

        }

        $this->viewData['records'] = $this->sliders_model->getRowByColumn('slidersid',$id);

        $d['allArray'] = $this->viewData;

        $d['inputFieldValues'] = $inputFieldValues;

        

        $this->load->view($this->uri->segment(1)."/add",$d);

    }

    public function delete($id) {
        $this->deletePermission();
        $this->sliders_model->delete($this->uri->segment(1).'id',$id);

        $this->session->set_flashdata('flash_success_msg', 'The Sliders has been deleted successfully.');

        redirect($this->uri->segment(1)."/index");

    }

    public function deleteAll() {
        $this->deletePermission();
        $this->sliders_model->delete($this->uri->segment(1).'id',$this->input->post('ckbdelete'));

        $this->session->set_flashdata('flash_success_msg', 'The Sliders has been deleted successfully.');

        redirect($this->uri->segment(1)."/index");

    }

    public function download(){

        $csvResultOfProjects = $this->sliders_model->getAllAvailableArrayDownload();

        $this->downloadcsv($csvResultOfProjects);

    }

    public function add() {
        $this->createPermission();
        $inputFieldValues = $this->initializeInputFieldValues();
        $this->viewData['imagesid'] = $this->media_model->getAllAvailableArray();
        

        if (isset($_POST['insert'])) {
            $post = $this->input->post();
            if ($this->input->post('imagesid')) {
                $p=0;
                $postCategory ='';
                foreach ($this->input->post('imagesid') as $key => $value) {
                    if (!empty($value)){
                        if ($p!=0)$postCategory .=',';
                        $postCategory .= trim($value);
                        $p++;
                    }
                }
                $post['imagesid'] = $postCategory;
            }
            if (empty($post['imagesid'])) {
                $post['imagesid']="";
            }
            $post['slug'] = $this->get_Title($this->input->post($this->uri->segment(1).'title'));
            
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

            $inserted = $this->sliders_model->insert($post);

            $moduleid = $this->viewData['module']->moduleid;

            if($inserted){

                $this->session->set_flashdata('flash_success_msg', 'The New Sliders has been added successfully.');

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

