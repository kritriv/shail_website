<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

	function __construct() {

        parent::__construct();

        $this->load->model('page_model', '', TRUE);
        $this->load->model('multiimage_model', '', TRUE);

        $this->load->model('module_auto_num_model', '', TRUE);

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

            $row = $this->page_model->getRowByColumnArray($this->uri->segment(1).'id',$id);

            foreach ($this->viewData['modulefield'] as $key => $value) {

               $inputFieldValues[$value->columnname] = $row[$value->columnname];

            }

        }

        return $inputFieldValues;

    }

    public function deleteimage() {

        echo $this->page_model->deletefile($this->uri->segment(1).'id',$_POST['id'],$_POST['columnname'],$_POST['filename'],$_POST['t']);

    }

    public function phpexcel_export(){

        //if(isset($_POST['export'])){

            $f = $this->viewData['module']; 

            $id = $f->moduleid;

            $columnlistArray = $this->page_model->getAllColumnArray($id);

            $export_data = $this->page_model->getAllAvailableArray();

            $this->excelExport($columnlistArray,$export_data);

        //}

    }

	public function index() {

        $limit_per_page = LIMIT_PER_PAGE;

        $total_records = $this->page_model->get_total();

        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->paginationAll($total_records,$limit_per_page);



 

        $f = $this->viewData['module']; 

        $id = $f->moduleid;

        $this->viewData['columnlist'] = $this->page_model->getAllColumnArray($id);

        $this->viewData['records'] = $this->page_model->getAllAvailableArray($limit_per_page,$start_index);

        $d['allArray'] = $this->viewData;

        $this->load->view($this->uri->segment(1)."/index",$d);

    }

    public function view($id) {

        $inputFieldValues = $this->initializeInputFieldValues($id);

        $this->viewData['multiimage'] = $this->multiimage_model->getRowByColumnarrayss('moduleid',$id,'deleted','0','module',$this->post_model->tableName);

        $this->viewData['records'] = $this->page_model->getRowByColumn($this->uri->segment(1).'id',$id);

        $d['allArray'] = $this->viewData;

        $d['inputFieldValues'] = $inputFieldValues;

        $this->load->view($this->uri->segment(1)."/view",$d);

    }

    public function edit($id) {

        $this->updatePermission();
        $dir = '../templates/';
        if (is_dir($dir)) {
            $dirToArray = $this->dirToArray($dir);
        }
        $this->viewData['templates'] = $dirToArray;    

        $inputFieldValues = $this->initializeInputFieldValues($id);

        if (isset($_POST['insert'])) {

            $post = $this->input->post();

            if (isset($_FILES) && !empty($_FILES) && count($_FILES)) {
                foreach ($_FILES as $key => $value) {
                    if (is_array($_FILES[$key]['name'])) {
                        if ($_FILES[$key]['name'][0]) {
                            $parentArray[$key] = $this->uploadMultiImage($key);
                            if(!empty($this->uploadMultiImage($key))){
                            $imgvals =count($this->uploadMultiImage($key));
                            for($i=0;$i<$imgvals;$i++){
                                $valus .=$this->uploadMultiImage($key)[$i].",";
                            }
                            $imgv =substr($valus,0,-1);
                            }
                            
                        }

                    }else{

                        if ($_FILES[$key]['name']) {

                            $post[$key] = $this->uploadSingleImage($key);

                        }

                    }

                }

            }

            unset($post['insert']);
            $inserted = $this->page_model->update($id,$post);
            $v1= explode(",",$imgv);
                $imgvalsv1 =count($v1);
                for($i=0;$i<$imgvalsv1;$i++){
                    $data9['multiimageid']='';
                    $data9['multiimage']=str_replace(" ","_",$v1[$i]);
                    $data9['moduleid']=$id;
                    $data9['module']=$this->page_model->tableName;
                    $data9['deleted']=0;
                    if(!empty($data9['multiimage'])){
                    $insertedid = $this->multiimage_model->insert($data9);
                    }
                }   
            if($inserted){

                $this->session->set_flashdata('flash_success_msg', 'Your changes saved successfully.');

                redirect($this->uri->segment(1)."/index");

            }else{

                $this->session->set_flashdata('flash_error_msg', 'Some Problem occured.');

            }

        }

        $this->viewData['records'] = $this->page_model->getRowByColumn('pageid',$id);
        $this->viewData['multiimage'] = $this->multiimage_model->getRowByColumnarrayss('moduleid',$id,'deleted','0','module',$this->post_model->tableName);

        $d['allArray'] = $this->viewData;

        $d['inputFieldValues'] = $inputFieldValues;

        

        $this->load->view($this->uri->segment(1)."/add",$d);

    }

    public function delete($id) {

        $this->deletePermission();

        $this->page_model->delete($this->uri->segment(1).'id',$id);

        $this->session->set_flashdata('flash_success_msg', 'The page Icon has been deleted successfully.');

        redirect($this->uri->segment(1)."/index");

    }

    public function deleteAll() {

        $this->deletePermission();

        $this->page_model->delete($this->uri->segment(1).'id',$this->input->post('ckbdelete'));

        $this->session->set_flashdata('flash_success_msg', 'The page Icon has been deleted successfully.');

        redirect($this->uri->segment(1)."/index");

    }

    public function download(){

        $csvResultOfProjects = $this->page_model->getAllAvailableArrayDownload();

        $this->downloadcsv($csvResultOfProjects);

    }

    public function add() {

        $this->createPermission();
        $dir = '../templates/';
        if (is_dir($dir)) {
            $dirToArray = $this->dirToArray($dir);
        }
        $this->viewData['templates'] = $dirToArray;    

        $inputFieldValues = $this->initializeInputFieldValues();

        if (isset($_POST['insert'])) {

            $post = $this->input->post();

            if (isset($_FILES) && !empty($_FILES) && count($_FILES)) {

                foreach ($_FILES as $key => $value) {

                    if (is_array($_FILES[$key]['name'])) {

                        if ($_FILES[$key]['name'][0]) {
                            $parentArray[$key] = $this->uploadMultiImage($key);
                            if(!empty($this->uploadMultiImage($key))){
                            $imgvals =count($this->uploadMultiImage($key));
                            for($i=0;$i<$imgvals;$i++){
                                $valus .=$this->uploadMultiImage($key)[$i].",";
                            }
                            $imgv =substr($valus,0,-1);
                            }
                        }

                    }else{

                        if ($_FILES[$key]['name']) {

                            $post[$key] = $this->uploadSingleImage($key);

                        }

                    }

                }

            }

            unset($post['insert']);
            $post['slug'] = $this->get_Title($this->input->post('pagetitle'));
            $post['seotitle'] = $this->input->post('pagetitle');
            $inserted = $this->page_model->insert($post);

            $moduleid = $this->viewData['module']->moduleid;
            $v1= explode(",",$imgv);
                $imgvalsv1 =count($v1);
                for($i=0;$i<$imgvalsv1;$i++){
                    $data9['multiimageid']='';
                    $data9['multiimage']=str_replace(" ","_",$v1[$i]);
                    $data9['moduleid']=$id;
                    $data9['module']=$this->page_model->tableName;
                    $data9['deleted']=0;
                    if(!empty($data9['multiimage'])){
                    $insertedid = $this->multiimage_model->insert($data9);
                    }
                }   
            if($inserted){

                $this->session->set_flashdata('flash_success_msg', 'The New page Icon has been added successfully.');

                redirect($this->uri->segment(1)."/index");

            }else{

                $this->session->set_flashdata('flash_error_msg', 'Some Problem occured.');

            }

        }

        $this->viewData['records'] = array();
        $this->viewData['multiimage'] = $this->multiimage_model->getRowByColumnarrayss('moduleid',$id,'deleted','0','module',$this->post_model->tableName);

        $d['allArray'] = $this->viewData;

        $d['inputFieldValues'] = $inputFieldValues;

        $this->load->view($this->uri->segment(1)."/add",$d);

    }

}

