<?php

if (!defined('BASEPATH'))    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $viewData = array();

    public function __construct() {

        parent::__construct();

        //error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        error_reporting(0);

        $this->load->model('module_model', '', TRUE);

        $this->getlanguage();

        if ($this->session->userdata('login_id')) {

            $this->getprofile();

        }

        $this->setAllUser();

        $this->setuiType();

        $this->setModules();

        //require_once APPPATH.'third_party/PHPExcel.php';

        //$this->excel = new PHPExcel(); 

        $this->load->dbutil();

        $this->form_validation->set_error_delimiters('<div class="validationErrorMsg"><i class="fa fa-exclamation-triangle fa-lg"></i>&nbsp;&nbsp;', '</div>');

    }

    public function excelExport($columnlistArray,$export_data) {

            $object_excel = new PHPExcel();

            $object_excel->setActiveSheetIndex(0);

            

            $head = 0;

            foreach($columnlistArray as $value){

                $object_excel->getActiveSheet()->setCellValueByColumnAndRow($head, 1, $value['fieldlabel']);

                $head++;

            }

            $body = 2;

            foreach($export_data as $value){

                $i = 0;

                foreach ($columnlistArray as $key => $y) {

                    if ($y['uitype'] =='3') {

                        foreach ($this->viewData[$y['fieldname']] as $k => $v) { 

                            if($v[$y['fieldname'].'id'] == $value[$y['fieldname'].'id']){ 

                                $object_excel->getActiveSheet()->setCellValueByColumnAndRow($i,$body,$v[$y['fieldname']]);

                            }   

                        } 

                    }else if ($y['uitype'] =='4') {

                        if(!empty(strtotime($value[$y['fieldname']])) && strtotime($value[$y['fieldname']]) >0){

                            $object_excel->getActiveSheet()->setCellValueByColumnAndRow($i,$body,date("m-d-Y",strtotime($value[$y['fieldname']])));

                        }else{

                            $object_excel->getActiveSheet()->setCellValueByColumnAndRow($i,$body,'00-00-0000');

                        }

                    }else if($y['uitype'] =='7' || $y['uitype'] =='8'){

                        if(!empty(strtotime($value[$y['fieldname']])) && strtotime($value[$y['fieldname']]) >0){

                            $object_excel->getActiveSheet()->setCellValueByColumnAndRow($i,$body,date("m-d-Y h:i:s",strtotime($value[$y['fieldname']])));

                        }else{

                            $object_excel->getActiveSheet()->setCellValueByColumnAndRow($i,$body,'00-00-0000 00:00:00');

                        }

                    }else if($y['uitype'] =='9'){

                        if($value[$y['fieldname']] == 1){

                            $object_excel->getActiveSheet()->setCellValueByColumnAndRow($i,$body,'YES');

                        }else{

                            $object_excel->getActiveSheet()->setCellValueByColumnAndRow($i,$body,'No');

                        }

                    }else if($y['uitype'] =='16'){

                        $object_excel->getActiveSheet()->setCellValueByColumnAndRow($i,$body,$value[$y['fieldname'].'withcode'].'-'.$value[$y['fieldname']]);

                    }else if($y['uitype'] =='27' && $y['fieldname'] == 'parentcategory'){

                        foreach ($this->viewData['parentcategory'] as $k => $v) { 

                            if($v[$this->uri->segment(1).'id'] == $value[$y['fieldname']]){ 

                                $object_excel->getActiveSheet()->setCellValueByColumnAndRow($i,$body,$v['category']);

                            }   

                        }

                    }else if($y['uitype'] =='27' && $y['fieldname'] == 'category'){

                        foreach ($this->viewData['category'] as $k => $v) { 

                            if($v[$this->uri->segment(1).'id'] == $value[$y['fieldname']]){ 

                                $object_excel->getActiveSheet()->setCellValueByColumnAndRow($i,$body,$v['category']);

                            }   

                        }

                    }else{

                        if ($y['fieldname'] == 'createdby') {

                            foreach ($this->viewData['allloginuser'] as $p => $q) {

                                if ($q['id'] == $value[$y['fieldname']]){

                                    $object_excel->getActiveSheet()->setCellValueByColumnAndRow($i,$body,$q['fullname']);   

                                }

                            }

                        }else if($y['fieldname'] == 'modifiedby') {

                            foreach ($this->viewData['allloginuser'] as $p => $q) {

                                if ($q['id'] == $value[$y['fieldname']]){

                                    $object_excel->getActiveSheet()->setCellValueByColumnAndRow($i,$body,$q['fullname']);   

                                }

                            }

                        }else{

                            $object_excel->getActiveSheet()->setCellValueByColumnAndRow($i,$body,$value[$y['fieldname']]);   

                        }

                    }

                    $i++;

                }

                $body++;

            }

            $object_excel_writer = PHPExcel_IOFactory::createWriter($object_excel, 'Excel5');

            header('Content-Type: application/vnd.ms-excel');

            header('Content-Disposition: attachment;filename="'.$this->uri->segment(1).time().'.xlsx"');

            $object_excel_writer->save('php://output');

            echo "EXPORTED";

    }

    public function force_download($columnlistArray,$export_data){

            $object_excel_writer = PHPExcel_IOFactory::createWriter($object_excel, 'Excel5');

            header('Content-Type: application/vnd.ms-excel');

            header('Content-Disposition: attachment;filename="'.$this->uri->segment(1).time().'.xlsx"');

            $object_excel_writer->save('php://output');

            echo "EXPORTED";   

    }

    public function getlanguage($languageid = '') {

            $this->db->select('*')

                    ->from(TBL_PREFIX.'language');

            $this->db->where('statusid', 1);

            if ($languageid != '') {

                $this->db->where('languageid', $languageid);

            } 

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->result_array();



            $this->viewData['alllanguage'] = $resultSet;

    }

    public function getprofile() {

            $this->db->select('*')

                    ->from(TBL_PREFIX.'userlogin')

                    ->where('id', $this->session->userdata('login_id')); 

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet1 = $query->row_array();



            $this->db->select('*')

                    ->from(TBL_PREFIX.$resultSet1['tablename'])

                    ->where($resultSet1['tablename'].'id', $this->session->userdata('user_id')); 

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->row_array();

            if (!empty($resultSet['timezoneid'])) {

                $timezone = $this->getGeneralRowByColumn('timezone','timezoneid',$resultSet['timezoneid']);

                date_default_timezone_set($timezone['timezone']);

            }

            $this->viewData['profiledetail'] = $resultSet;

    }

    public function paginationAll($total_records,$limit_per_page) {

        $config['base_url'] = base_url() .$this->uri->segment(1). '/index';

        $config['total_rows'] = $total_records;

        $config['per_page'] = $limit_per_page;

        $config["uri_segment"] = 3;

        $config['reuse_query_string'] = true;

        $this->pagination->initialize($config);

        $this->viewData["links"] = $this->pagination->create_links();

        $this->viewData['total_records'] = $total_records;

        $this->viewData['per_page'] = $limit_per_page;

    }

    public function downloadcsv($csvResultOfProjects){

        $decode_version = isset($_POST['decode_version']) ? TRUE : FALSE;

        $csvFileName = $this->uri->segment(1).'_'.time().'.csv';

        force_download($csvFileName, $csvResultOfProjects, $decode_version);

        exit(0);

    }

    public function getGeneralRows($tableName,$orderByField='', $sortOrder='ASC') {

            $this->db->select('*')

                    ->from(TBL_PREFIX.$tableName);

            if ( $orderByField != '' ){

                $this->db->order_by($orderByField, $sortOrder);

            }

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->result_array();

			//print_r($resultSet);

            return $resultSet;

    }

    public function getGeneralRowByColumn($tableName,$column,$value) {

            $this->db->select('*')

                    ->from(TBL_PREFIX.$tableName)

                    ->where($column, $value); 

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->row_array();

            return $resultSet;

    }

    public function getGeneralRowByColumnLang($tableName,$column,$value) {

            $this->db->select('*')

                ->from(TBL_PREFIX.$tableName.' as '.$tableName)

                ->join(TBL_PREFIX.$tableName.'_lang as lang', 'lang.'.$tableName.'id'.' = '.$tableName.'.'.$tableName.'id', 'left inner')

                ->where($tableName.'.deleted', 0)

                ->where($tableName.'.'.$column, $value)

                ->where('lang.languageid', $this->viewData['alllanguage'][0]['languageid']);

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->row_array();

            return $resultSet;

    }
    public function getGeneralRowByColumnLangf($tableName,$column,$value) {

            $this->db->select('*')

                ->from(TBL_PREFIX.$tableName.' as '.$tableName)

                ->where($tableName.'.deleted', 0)

                ->where($tableName.'.'.$column, $value);
            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->row_array();

            return $resultSet;

    }

    public function getGeneralRowsLang($tableName) {

            $this->db->select('*')

                ->from(TBL_PREFIX.$tableName.' as '.$tableName)

                ->join(TBL_PREFIX.$tableName.'_lang as lang', 'lang.'.$tableName.'id'.' = '.$tableName.'.'.$tableName.'id', 'left inner')

                ->where($tableName.'.deleted', 0)

                ->where('lang.languageid', $this->viewData['alllanguage'][0]['languageid']);

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->result_array();

            return $resultSet;

    }

    

    public function getGeneralRowBytwoColumn($tableName,$column1,$value1,$column2,$value2) {

            $this->db->select('*')

                    ->from(TBL_PREFIX.$tableName)

                    ->where($column1, $value1) 

                    ->where($column2, $value2); 

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->row_array();

            return $resultSet;

    }

    public function getGeneralRowBytwoColumnLang($tableName,$column1,$value1,$column2,$value2) {

            $this->db->select('*')

                ->from(TBL_PREFIX.$tableName.' as '.$tableName)

                ->join(TBL_PREFIX.$tableName.'_lang as lang', 'lang.'.$tableName.'id'.' = '.$tableName.'.'.$tableName.'id', 'left inner')

                ->where($tableName.'.deleted', 0)

                ->where($tableName.'.'.$column1, $value1)

                ->where($tableName.'.'.$column2, $value2)

                ->where('lang.languageid', $this->viewData['alllanguage'][0]['languageid']);

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->row_array();

            return $resultSet;

    }

    public function getGeneralRowsByColumn($tableName,$column,$value) {

            $this->db->select('*')

                    ->from(TBL_PREFIX.$tableName)

                    ->where($column, $value)

                    ->where('deleted', 0); 

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->result_array();

            return $resultSet;

    }

    public function setGeneralRowsByColumn($tableName,$column,$value) {

            $this->db->select('*')

                    ->from(TBL_PREFIX.$tableName)

                    ->where($column, $value); 

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->result_array();

            $this->viewData[$tableName] = $resultSet;

    }

    public function updateRowCommon($tableName,$recordId, $updateData) {

            $insertData['modifiedby'] = $this->session->userdata('login_id');

            $updateData['modifieddate'] = date('Y-m-d h:i:s');

            $this->db->where($tableName.'id', $recordId);

            $this->db->update(TBL_PREFIX.$tableName, $updateData);

            $this->db->last_query();

            return $this->db->affected_rows();

    }

    public function setGeneralDropDowmWithJoin($tableName,$tableName1,$moduleid = NULL) {

            $this->db->select($tableName.'.*'.','.$tableName1.'.uitype,'.$tableName1.'.fieldname,'.$tableName1.'.fieldlabel')

                    ->from(TBL_PREFIX.$tableName.' AS '.$tableName)

                    ->join(TBL_PREFIX.$tableName1.' as '.$tableName1, $tableName.'.columnname = '.$tableName1.'.columnname', 'inner')

                    ->where($tableName.'.moduleid',$moduleid)

                    ->group_by($tableName.'id');

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->result_array();

            $this->viewData[$tableName] = $resultSet;

    }

    public function setGeneralDropDowm($tableName,$moduleid = NULL) {

        if ($tableName == 'billcountry'){

            $this->db->select('*')

                    ->from(TBL_PREFIX.$tableName); 

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->result_array();

            $this->viewData[$tableName] = $resultSet;

        }else if ($tableName == 'shipcountry'){

            $this->db->select('*')

                    ->from(TBL_PREFIX.$tableName); 

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->result_array();

            $this->viewData[$tableName] = $resultSet;

        }else if ($tableName == 'billstate'){

            $resultSet = array();

            $this->viewData[$tableName] = $resultSet;

        }else if ($tableName == 'billcity'){

            $resultSet = array();

            $this->viewData[$tableName] = $resultSet;

        }else if ($tableName == 'shipstate'){

            $resultSet = array();

            $this->viewData[$tableName] = $resultSet;

        }else if ($tableName == 'shipcity'){

            $resultSet = array();

            $this->viewData[$tableName] = $resultSet;

        }else if ($tableName == 'filter'){

            $this->db->select('*')

                    ->from(TBL_PREFIX.$tableName);

            if ($moduleid != NULL ){

                $this->db->where('moduleid', $moduleid);

                $query = $this->db->get();

                $this->db->last_query();

                $resultSet = $query->result_array();

            }else{

                $resultSet = array();  

            }

            $this->viewData[$tableName] = $resultSet;

        }else if ($tableName == 'producttype1'|| $tableName == 'pcategorys'|| $tableName == 'constitute'|| $tableName == 'tastetea' || $tableName == 'packaging' || $tableName == 'fermagtation' || $tableName == 'varients123'){

            $this->db->select('*')

                ->from(TBL_PREFIX.$tableName.' as '.$tableName)

                ->join(TBL_PREFIX.'status as status', $tableName.'.statusid = status.statusid', 'inner')

                ->join(TBL_PREFIX.$tableName.'_lang as lang', 'lang.'.$tableName.'id'.' = '.$tableName.'.'.$tableName.'id', 'left inner')

                ->where($tableName.'.deleted', 0)

                ->where('lang.languageid', $this->viewData['alllanguage'][0]['languageid']);

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->result_array();

            $this->viewData[$tableName] = $resultSet;

        }else{

            $this->db->select('*')

                    ->from(TBL_PREFIX.$tableName); 

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->result_array();

            $this->viewData[$tableName] = $resultSet;

        }

    }

    public function setAllUser(){

        $this->load->model('user_model', '', TRUE);

        $f = $this->user_model->getAllArray();

        $this->viewData['allloginuser'] = $f;

    }

    public function setuiType() {

        $this->load->model('uitype_model', '', TRUE);

        $f = $this->uitype_model->getAllArray();

        $this->viewData['uitype'] = $f;

    }

    public function setModules() {

        if ($this->uri->segment(1)) {

            if ($this->uri->segment(1) == 'lowstockreport' || $this->uri->segment(1) == 'buyersignup' || $this->uri->segment(1) == 'sellersignup' || $this->uri->segment(1) == 'about' || $this->uri->segment(1) == 'home' || $this->uri->segment(1) == 'logout' || $this->uri->segment(1) == 'login' || $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == 'forgot') {

                

            }else{

                if ($this->uri->segment(1) == 'profile') {

                    $f = $this->module_model->getByName($this->session->userdata('tablename'));

                }else{

                    $f = $this->module_model->getByName($this->uri->segment(1));

                }

                $this->viewData['module'] = $f;

                $id = $f->moduleid;

                $this->setModuleFields($id);

                $this->setBlocks($id);

                $this->setDropDown($id);

                $this->setColumnList($id);

                $this->setProfileModuleView($this->session->userdata('role_id'),$id);

            }   

        }else{

        }

    }

    public function setModuleFields($id) {

        $this->load->model('modulefield_model', '', TRUE);

        $f = $this->modulefield_model->getRowsByColumn('moduleid', $id,'sequence');

        foreach ($f as $key => $value) {

            if ($value->uitype == 3) {

                $this->setGeneralDropDowm($value->fieldname);

            }

        }

        $this->setGeneralDropDowmWithJoin('filter','modulefield',$id);

        $this->viewData['modulefield'] = $f;

    }

    public function setModuleFieldsUI($id) {

        $this->load->model('modulefield_model', '', TRUE);

        $f = $this->modulefield_model->getRowsByColumn('moduleid', $id,'sequence');

        foreach ($f as $key => $value) {

            if ($value->uitype == 3) {

                $this->setGeneralDropDowm($value->fieldname);

            }

        }

        $this->viewData['modulefield'] = $f;

    }

    public function setProfileModuleView($profileid,$id) {

        $this->db->select('*')

                    ->from(TBL_PREFIX.'profile2moduleview AS profile2moduleview')

                    ->join(TBL_PREFIX.'modulemode as modulemode', 'profile2moduleview.modulemodeid = modulemode.modulemodeid', 'inner')

                    ->where('moduleid', $id)

                    ->where('profileid', $profileid);  

        $query = $this->db->get();

        $this->db->last_query();

        $resultSet = $query->result_array();

        $this->viewData['modulepermission'] = $resultSet;

    }

    public function setBlocks($id) {

        $this->load->model('block_model', '', TRUE);

        $f = $this->block_model->getRowsByColumn('moduleid', $id);

        $this->viewData['blocks'] = $f;

    }

    public function setDropDown($id) {

        $this->load->model('dropdown_model', '', TRUE);

        $f = $this->dropdown_model->getRowsByColumn('moduleid', $id);

        $this->viewData['dropdown'] = $f;

    }

    public function setColumnList($id) {

        $this->load->model('columnlist_model', '', TRUE);

        $f = $this->columnlist_model->getRowsByColumnArray('moduleid', $id,'sequence');

        $this->viewData['columnlist'] = $f;

    }

    public function loggedIn() {

        if (!$this->session->userdata('user_email')) {

            redirect('login/', 'location');

        } else {

        }

    }



    public function permissionRedirect() {

        if ($this->session->userdata('role_id') == 1) {

        }else{

            redirect($this->uri->segment(1)."/index");

        }

    }
public function getGeneralRowslg($tableName,$orderByField='', $sortOrder='ASC') {

            $this->db->select('*')
                    ->from(TBL_PREFIX.$tableName)
                    ->where(TBL_PREFIX.$tableName.'.deleted',0);

            if ( $orderByField != '' ){

                $this->db->order_by($orderByField, $sortOrder);

            }

            $query = $this->db->get();

            $this->db->last_query();

            $resultSet = $query->result_array();

			//print_r($resultSet);

            return $resultSet;

    }

    public function getPermissionRowByColumn($modulemodeid) {

            $f = $this->viewData['module']; 

            $moduleid = $f->moduleid;

            $this->db->select('*')

                    ->from(TBL_PREFIX.'profile2moduleview')

                    ->where('moduleid', $moduleid)

                    ->where('modulemodeid', $modulemodeid)

                    ->where('profileid', $this->session->userdata('role_id'));

            $rr = $this->db->count_all_results();

            $this->db->last_query();

            if($modulemodeid == 2 && empty($rr)){

                redirect(base_url());

            }

            if (empty($rr)) {

                redirect($this->uri->segment(1)."/index");

            }

    }

    public function createPermission() {

        $this->getPermissionRowByColumn(1);

    }

    public function readPermission() {

        $this->getPermissionRowByColumn(2);

    }

    public function updatePermission() {

        $this->getPermissionRowByColumn(3);

    }

    public function deletePermission() {

        $this->getPermissionRowByColumn(4);

    }

    public function isUserLoggedIn() {

        $this->load->library('Rememberme_Model');

        if ($this->rememberme_model->authenticate_user()) {

            $this->setUserSession();

            return true;

        } else {

            return false;

        }

    }



    public function setSendMail($from,$to,$subject,$message) {

        $this->email->from($from);

        $this->email->to($to);

        $this->email->subject($subject);

        $this->email->set_mailtype("html");

        $this->email->message($message);    

        $this->email->send();

    }

    public function setUserSession() {



        $rememberMeData = json_decode($_COOKIE['rememberme'], true);



        $this->load->model('user_model', '', TRUE);

        $rememberedUserData = $this->user_model->getById($rememberMeData['user_id']);

        $this->load->model('user_roles_model', '', TRUE);



        $userRoleObj = $this->user_roles_model->getById($rememberedUserData->role);



        if ($rememberedUserData->adminId != 0) {

            if ($rememberedUserData->role == 1) {

                $iid = $rememberedUserData->id;

            }else{

                $iid = $rememberedUserData->adminId;

            }

            $payments = $this->payment_model->getByIdPayment($iid);

        }



        $loggedInUserData = array(

            'user_id' => $rememberedUserData->id,

            'user_name' => $rememberedUserData->username,

            'full_name' => $rememberedUserData->fullname,

            'usertype' => $rememberedUserData->role,

            'userstatus' => $rememberedUserData->status,

            'user_email' => $rememberedUserData->email,

            'adminId' => $rememberedUserData->adminId,

            'companyUniqueId' => $rememberedUserData->companyUniqueId,

            'companyUniqueName' => $rememberedUserData->companyUniqueName,

            'companyUniqueCode' => $rememberedUserData->companyUniqueCode,

            'planLastDate' => $payments[0]->planLastDate,

            'planEndDate' => $rememberedUserData->planEndDate,

            'packageId' => $rememberedUserData->packageId,

            'user_role_name' => $userRoleObj->user_role

        );

        $this->session->set_userdata($loggedInUserData);

        $date1 = $rememberedUserData->lastLogin;

        $date2 = time();

        $mins = floor(($date2 - $date1) / 60);

        if ($mins > LOGOUT_TIME) {

            redirect('logout');

        }

        $t['lastLogin'] = time();

        $this->user_model->update($rememberMeData['user_id'], $t);

    }







    public function isSetClientAndProjectType() {

        if (date('Y-m-d') > $this->session->userdata('planEndDate')) {

            if ($this->session->userdata('adminId')) {

                redirect('payment');

            }

        }

        $loggedInUserId = $this->session->userdata('user_id');



        $this->load->model('remember_user_settings_model', '', TRUE);



        $userSettings = $this->remember_user_settings_model->getByUserId($loggedInUserId);



        if ($userSettings != NULL) {



            // Set user settings data into the session.



            $projectSettingsData = array(



                'user_id' => $userSettings->user_id,



                'order_id' => $userSettings->order_id,



                'order_id_compare' => $userSettings->order_id_compare,



                'client_id' => $userSettings->client_id,



                'project_type_id' => $userSettings->project_type_id,



                'projects_per_page' => $userSettings->projects_per_page



            );



            $sessionData = array('project_settings' => $projectSettingsData);



            $this->session->set_userdata($sessionData);







            // Set user settings data into viewData.



            $this->viewData['setOrderId'] = $userSettings->order_id;



            $this->viewData['setOrderIdCompare'] = $userSettings->order_id_compare;



            $this->viewData['setClientId'] = $userSettings->client_id;



            $this->viewData['setProjectTypeId'] = $userSettings->project_type_id;



            $this->viewData['setProjectsPerPage'] = $userSettings->projects_per_page;







            return true;



        } else {



            return false;



        }



    }



     public function uploadSingleImage($fieldName){
            $files = $_FILES;
            if (!empty($_FILES[$fieldName]['name'])) {
                $_FILES[$fieldName]['name']= $files[$fieldName]['name'];
                $_FILES[$fieldName]['type']= $files[$fieldName]['type'];
                $_FILES[$fieldName]['tmp_name']= $files[$fieldName]['tmp_name'];
                $_FILES[$fieldName]['error']= $files[$fieldName]['error'];
                $_FILES[$fieldName]['size']= $files[$fieldName]['size'];
                
                $config['upload_path'] = UPLOAD_FOLDER;
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|csv|svg';

                /*$config['max_size'] = '2000000';
                $config['max_width'] = '';
                $config['max_height'] = '';*/
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $mainImage = $_FILES[$fieldName]['name'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload($fieldName);
                return $mainImage;
            }
            return true; 
    }
    public function uploadMultiImage($fieldName){
        //$files = $_FILES;
        //$count = count($_FILES);
        $files = $_FILES;
        $count= count($_FILES['galleryimage']['name']);
        $images=array();
        for($i=0; $i <= $count; $i++){
            if (!empty($files[$fieldName]['name'][$i])) {
                $_FILES['mm']['name'] = $files[$fieldName]['name'][$i];
                $_FILES['mm']['type'] = $files[$fieldName]['type'][$i];
                $_FILES['mm']['tmp_name'] = $files[$fieldName]['tmp_name'][$i];
                $_FILES['mm']['error'] = $files[$fieldName]['error'][$i];
                $_FILES['mm']['size'] = $files[$fieldName]['size'][$i];
                
                $config['upload_path'] = UPLOAD_FOLDER;
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|csv|svg';
                /*$config['max_size'] = '2000000';
                $config['max_width'] = '';
                $config['max_height'] = '';*/
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('mm');
                $fileName = $_FILES['mm']['name'];
                $images[] = $fileName;
            }
        }
        return $images;
    }


    public function clean($string) {

       $string = str_replace(' ', '-', $string);

       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

    }

    public function get_Title($title){

            $title = strtolower($title);

            $urls1 = str_replace("-", "", $title);

            $urls1 = str_replace(" ", "-", $urls1);

            $urls2 = str_replace("-", "", $urls1);

            $urls2 = str_replace("(", "", $urls1);

            $urlDot = str_replace(")", "", $urls2);

            $urlComaas = str_replace(".", "", $urlDot);

            $urlComaa = str_replace("&", "", $urlComaas);

            $url1 = str_replace(",", "", $urlComaa);

            $url2 = str_replace("[", "", $url1);

            $url = str_replace("]", "", $url2);

            $url = $this->clean($url);

            return $url;

    }

    public  function dirToArray($dir) { 

        $result = array(); 

        $cdir = scandir($dir); 

        foreach ($cdir as $key => $value) { 

            if (!in_array($value,array(".",".."))) { 

                if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) { 

                    $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value); 

                }  else { 

                    $result[] = $value; 

                } 

            } 

        } 

        return $result; 

    }

    

}







// END Controller class







/* End of file MY_Controller.php */



/* Location: ./application/core/MY_Controller.php */