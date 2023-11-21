<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model{

    public $tableName;

    public $tableNameWithPrifix;

    public function __construct(){

        parent::__construct();

    }

    public function get_total() {

        $this->db->select('*')

                    ->from($this->tableNameWithPrifix) 

                    ->where('deleted', 0); 

        $rr = $this->db->count_all_results();

        $this->db->last_query();

        return $rr;

    }
    public function getRowByColumnarrayss($column,$val,$column1,$val1,$column2,$val2,$orderByField = '',$sortOrder = 'ASC') {
        $this->db->select('*')
                ->from($this->tableNameWithPrifix)
                ->where($column, $val)
                ->where($column1, $val1);
        
        $query = $this->db->get();
        $resultSet = $query->result_array();
        $this->db->last_query();
        return (count($resultSet) > 0) ? $resultSet : null;
    }

    public function getAll($orderByField='', $sortOrder='ASC'){

        $this->db->select('*')

                    ->from($this->tableNameWithPrifix); 

        if ( $orderByField != '' ){

            $this->db->order_by($orderByField, $sortOrder);

        }

        $query = $this->db->get();

        $resultSet = $query->result();

        return $resultSet;

    }

    public function getAllArray($orderByField='', $sortOrder='ASC'){

        $this->db->select('*')

                    ->from($this->tableNameWithPrifix); 

        if ( $orderByField != '' ){

            $this->db->order_by($orderByField, $sortOrder);

        }

        $query = $this->db->get();

        $resultSet = $query->result_array();

        return $resultSet;

    }

    public function getAllAvailable($orderByField='', $sortOrder='ASC'){

        $this->db->select('*')

                    ->from($this->tableNameWithPrifix) 

                    ->where('deleted', 0);

        

        if ( $orderByField != '' ){

            $this->db->order_by($orderByField, $sortOrder);

        }

        $query = $this->db->get();

        $resultSet = $query->result();

        return $resultSet;

    }

    public function getAllAvailableArray($orderByField='', $sortOrder='ASC'){

        $this->db->select('*')

                    ->from($this->tableNameWithPrifix) 

                    ->where('deleted', 0);

        

        if ( $orderByField != '' ){

            $this->db->order_by($orderByField, $sortOrder);

        }

        $query = $this->db->get();

        $resultSet = $query->result_array();

        $this->db->last_query();

        return $resultSet;

    }

    public function get_totalLang($conditions='') {

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)

            ->join(TBL_PREFIX.'status as status', $this->tableName.'.statusid = status.statusid', 'inner')

            ->join($this->tableNameWithPrifix.'_lang as lang', 'lang.'.$this->uri->segment(1).'id'.' = '.$this->tableName.'.'.$this->uri->segment(1).'id', 'left inner')

            ->where($this->tableName.'.deleted', 0)

            ->where('lang.languageid', $this->viewData['alllanguage'][0]['languageid']);

        if ($this->session->userdata('role_id') != 1) {

            $this->db->where($this->tableName.'.createdby', $this->session->userdata('login_id'));

        }

        if(!empty($conditions)&& is_array($conditions)){

            foreach($conditions as $key => $value){

                if (!empty($value)) {

                    $this->db->where($this->tableName.'.'.$key, $value);

                }

            }

        }

        $rr = $this->db->count_all_results();

        $this->db->last_query();

        return $rr;

    }

    public function getAllmasterLangStatus($conditions='',$limit_per_page='', $start_index='',$orderByField='', $sortOrder='DESC'){

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)

            ->join(TBL_PREFIX.'status as status', $this->tableName.'.statusid = status.statusid', 'inner')

            ->join($this->tableNameWithPrifix.'_lang as lang', 'lang.'.$this->uri->segment(1).'id'.' = '.$this->tableName.'.'.$this->uri->segment(1).'id', 'left inner')

            ->where($this->tableName.'.deleted', 0)

            ->where('lang.languageid', $this->viewData['alllanguage'][0]['languageid']);

        if ($this->session->userdata('role_id') != 1) {

            $this->db->where($this->tableName.'.createdby', $this->session->userdata('login_id'));

        }

        if(!empty($conditions)&& is_array($conditions)){

            foreach($conditions as $key => $value){

                if ($key == 'soldqty') {

                    if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, 0);

                    }

                }else if($key == 'orderby'){

                    $this->db->order_by($this->tableName.'.'.$this->uri->segment(1).'id', $value);

                }else{

                    if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, $value);

                    } 

                }

                /*if (!empty($value)) {

                    $this->db->where($this->tableName.'.'.$key, $value);

                }*/

            }

        }

        /*if ( $orderByField != '' ){

            $this->db->order_by($this->tableName.'.'.$orderByField, $sortOrder);

        }else{

            $this->db->order_by($this->tableName.'.'.$this->uri->segment(1).'id', $sortOrder);

        }*/

        if (!empty($limit_per_page)) {

            $this->db->limit($limit_per_page, $start_index);

        }

        $query = $this->db->get();

        $this->db->last_query();

        $resultSet = $query->result_array();

        return $resultSet;

    }

    public function get_totalLangMaster($conditions='') {

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)

            ->join(TBL_PREFIX.'status as status', $this->tableName.'.statusid = status.statusid', 'inner')

            ->join($this->tableNameWithPrifix.'_lang as lang', 'lang.'.$this->uri->segment(1).'id'.' = '.$this->tableName.'.'.$this->uri->segment(1).'id', 'left inner')

            ->where($this->tableName.'.deleted', 0)

            ->where('lang.languageid', $this->viewData['alllanguage'][0]['languageid']);

        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 3) {

            $this->db->where($this->tableName.'.createdby', $this->session->userdata('login_id'));

        }

        if(!empty($conditions)&& is_array($conditions)){

            foreach($conditions as $key => $value){

                if ($key == 'soldqty') {

                    if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, 0);

                    }

                }else if($key == 'orderby'){

                    $this->db->order_by($this->tableName.'.'.$this->uri->segment(1).'id', $value);

                }else{

                    if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, $value);

                    } 

                }

            }

        }

        $rr = $this->db->count_all_results();

        $this->db->last_query();

        return $rr;

    }

    public function getAllmasterLangStatusMaster($conditions='',$limit_per_page='', $start_index='',$orderByField='', $sortOrder='DESC'){

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)

            ->join(TBL_PREFIX.'status as status', $this->tableName.'.statusid = status.statusid', 'inner')

            ->join($this->tableNameWithPrifix.'_lang as lang', 'lang.'.$this->uri->segment(1).'id'.' = '.$this->tableName.'.'.$this->uri->segment(1).'id', 'left inner')

            ->where($this->tableName.'.deleted', 0)

            ->where('lang.languageid', $this->viewData['alllanguage'][0]['languageid']);

        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 3) {

            $this->db->where($this->tableName.'.createdby', $this->session->userdata('login_id'));

        }

        if(!empty($conditions)&& is_array($conditions)){

            foreach($conditions as $key => $value){

                if ($key == 'soldqty') {

                    if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, 0);

                    }

                }else if($key == 'orderby'){

                    $this->db->order_by($this->tableName.'.'.$this->uri->segment(1).'id', $value);

                }else{

                    if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, $value);

                    } 

                }

            }

        }

        /*if ( $orderByField != '' ){

            $this->db->order_by($this->tableName.'.'.$orderByField, $sortOrder);

        }else{

            $this->db->order_by($this->tableName.'.'.$this->uri->segment(1).'id', $sortOrder);

        }*/

        if (!empty($limit_per_page)) {

            $this->db->limit($limit_per_page, $start_index);

        }

        $query = $this->db->get();

        $this->db->last_query();

        $resultSet = $query->result_array();

        return $resultSet;

    }

    public function get_totalLanguage($conditions='',$limit_per_page='', $start_index='',$orderByField='', $sortOrder='DESC'){

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)

            ->join($this->tableNameWithPrifix.'_lang as lang', 'lang.'.$this->uri->segment(1).'id'.' = '.$this->tableName.'.'.$this->uri->segment(1).'id', 'left inner')

            ->where($this->tableName.'.deleted', 0)

            ->where('lang.languageid', $this->viewData['alllanguage'][0]['languageid']);

        if ($this->session->userdata('role_id') != '') {

            $this->db->where($this->tableName.'.createdby', $this->session->userdata('login_id'));

        }

        if(!empty($conditions)&& is_array($conditions)){

            foreach($conditions as $key => $value){

                if ($key == 'soldqty') {

                    if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, 0);

                    }

                }else if($key == 'orderby'){

                }else{

                   if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, $value);

                    } 

                }

            }

        }

        $rr = $this->db->count_all_results();

        $this->db->last_query();

        return $rr;

    }

    public function getAllAvailableArrayLanguage($conditions='',$limit_per_page='', $start_index='',$orderByField='', $sortOrder='DESC'){

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)

            ->join($this->tableNameWithPrifix.'_lang as lang', 'lang.'.$this->uri->segment(1).'id'.' = '.$this->tableName.'.'.$this->uri->segment(1).'id', 'left inner')

            ->where($this->tableName.'.deleted', 0)

            ->where('lang.languageid', $this->viewData['alllanguage'][0]['languageid']);

        if ($this->session->userdata('role_id') != '') {

            $this->db->where($this->tableName.'.createdby', $this->session->userdata('login_id'));

        }

        if(!empty($conditions)&& is_array($conditions)){

            foreach($conditions as $key => $value){

                if ($key == 'soldqty') {

                    if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, 0);

                    }

                }else if($key == 'orderby'){

                    $this->db->order_by($this->tableName.'.'.$this->uri->segment(1).'id', $value);

                }else{

                    if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, $value);

                    } 

                }

            }

        }

        /*if ( $orderByField != '' ){

            $this->db->order_by($this->tableName.'.'.$orderByField, $sortOrder);

        }else{

            $this->db->order_by($this->tableName.'.'.$this->uri->segment(1).'id', $sortOrder);

        }*/

        if (!empty($limit_per_page)) {

            $this->db->limit($limit_per_page, $start_index);

        }

        $query = $this->db->get();

        $this->db->last_query();

        $resultSet = $query->result_array();

        return $resultSet;

    }

    public function getAllColumnArrayReport($leadid,$orderByField='', $sortOrder='ASC'){

        $this->db->select('*,uitype')

            ->from(TBL_PREFIX.'columnlist as columnlist') 

            ->join(TBL_PREFIX.'modulefield as modulefield', 'columnlist.fieldname = modulefield.fieldname', 'left inner')

            ->where('columnlist.moduleid', $leadid);

        $this->db->group_by('columnlistid');

        if ( $orderByField != '' ){

            $this->db->order_by('columnlist.'.$orderByField, $sortOrder);

        }

        $query = $this->db->get();

        $this->db->last_query();

        $resultSet = $query->result_array();

        return $resultSet;

    }

    public function get_totalLanguageReport($conditions='',$k=''){

        $seg = explode("_", $this->uri->segment(1));

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)

            ->join($this->tableNameWithPrifix.'_lang as lang', 'lang.'.$seg[0].'id'.' = '.$this->tableName.'.'.$seg[0].'id', 'left inner')

            ->where($this->tableName.'.deleted', 0)

            ->where('lang.languageid', $this->viewData['alllanguage'][0]['languageid']);

        if ($this->session->userdata('role_id') != 1) {

            $this->db->where($this->tableName.'.createdby', $this->session->userdata('login_id'));

        }

        if(!empty($conditions)&& is_array($conditions)){

            foreach($conditions as $key => $value){

                if ($key == 'soldqty') {

                    if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, 0);

                    }

                }else if($key == 'orderby'){

                }else{

                   if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, $value);

                    } 

                }

            }

        }

        if (!empty($k) && $k == 'lowstock') {

            $this->db->where($this->tableName.'.availbleqty <= ', 5);

        }else if (!empty($k) && $k == 'soldqty') {

            $this->db->where($this->tableName.'.soldqty', 0);

        }

        $rr = $this->db->count_all_results();

        $this->db->last_query();

        return $rr;

    }

    public function getAllAvailableArrayLanguageReport($conditions='',$k=''){

        $seg = explode("_", $this->uri->segment(1));

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)

            ->join($this->tableNameWithPrifix.'_lang as lang', 'lang.'.$seg[0].'id'.' = '.$this->tableName.'.'.$seg[0].'id', 'left inner')

            //->join(TBL_PREFIX.'producttype as producttype', 'producttype.producttypeid = '.$this->tableName.'.producttypeid', 'left inner')

            ->where($this->tableName.'.deleted', 0)

            ->where('lang.languageid', $this->viewData['alllanguage'][0]['languageid']);

        if ($this->session->userdata('role_id') != 1) {

            $this->db->where($this->tableName.'.createdby', $this->session->userdata('login_id'));

        }

        if(!empty($conditions)&& is_array($conditions)){

            foreach($conditions as $key => $value){

                if ($key == 'soldqty') {

                    if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, 0);

                    }

                }else if($key == 'orderby'){

                    $this->db->order_by($this->tableName.'.'.$seg[0].'id', $value);

                }else{

                    if (!empty($value)) {

                        $this->db->where($this->tableName.'.'.$key, $value);

                    } 

                }

            }

        }

        

        if (!empty($k) && $k == 'lowstock') {

            $this->db->where($this->tableName.'.availbleqty <= ', 5);

        }else if (!empty($k) && $k == 'soldqty') {

            $this->db->where($this->tableName.'.soldqty', 0);

        }





        if (!empty($limit_per_page)) {

            $this->db->limit($limit_per_page, $start_index);

        }

        $query = $this->db->get();

        $this->db->last_query();

        $resultSet = $query->result_array();

        return $resultSet;

    }



    public function getAllmasterLangStatusdependent($conditions='',$limit_per_page='', $start_index='',$orderByField='', $sortOrder='DESC'){

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)

            ->join(TBL_PREFIX.'status as status', $this->tableName.'.statusid = status.statusid', 'inner')

            ->join($this->tableNameWithPrifix.'_lang as lang', 'lang.'.$this->tableName.'id'.' = '.$this->tableName.'.'.$this->tableName.'id', 'left inner')

            ->where($this->tableName.'.deleted', 0)

            ->where('lang.languageid', $this->viewData['alllanguage'][0]['languageid']);

        if ($this->session->userdata('role_id') != 1) {

            $this->db->where($this->tableName.'.createdby', $this->session->userdata('login_id'));

        }

        

        $this->db->order_by($this->tableName.'.'.$this->tableName.'id', $sortOrder);

        

        $query = $this->db->get();

        $this->db->last_query();

        $resultSet = $query->result_array();

		

        return $resultSet;

    }

    public function getAllAvailableArrayDownload($orderByField='', $sortOrder='ASC'){

        $this->db->select('*')

                    ->from($this->tableNameWithPrifix) 

                    ->where('deleted', 0);

        

        if ( $orderByField != '' ){

            $this->db->order_by($orderByField, $sortOrder);

        }

        $query = $this->db->get();

        $resultSet = $this->dbutil->csv_from_result($query);

        echo $this->db->last_query();

        return $resultSet;

    }

    public function getById($recordId){

        $this->db->select('*')

                ->from($this->tableNameWithPrifix)

                ->where($this->tableName.'id', $recordId);

        $query = $this->db->get();

        $resultSet = $query->result();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet[0] : NULL;

    }

    public function getByIdArray($recordId){

        $this->db->select('*')

                ->from($this->tableNameWithPrifix)

                ->where($this->tableName.'id', $recordId);

        $query = $this->db->get();

        $resultSet = $query->result_array();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet[0] : NULL;

    }

    public function getByName($recordId){

        $this->db->select('*')

                ->from($this->tableNameWithPrifix)

                ->where($this->tableName.'name', $recordId);

        $query = $this->db->get();

        $resultSet = $query->result();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet[0] : NULL;

    }

    public function getByNameArray($recordId){

        $this->db->select('*')

                ->from($this->tableNameWithPrifix)

                ->where($this->tableName.'name', $recordId);

        $query = $this->db->get();

        $resultSet = $query->result_array();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet[0] : NULL;

    }

    public function getRowsByColumn($column,$val,$orderByField = '',$sortOrder = 'ASC') {

        $this->db->select('*')

                ->from($this->tableNameWithPrifix)

                ->where($column, $val);

        if ($orderByField != '') {

            $this->db->order_by($orderByField, $sortOrder);

        }

        $query = $this->db->get();

        $resultSet = $query->result();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet : null;

    }

    public function getRowsByColumnArray($column,$val,$orderByField = '',$sortOrder = 'ASC') {

        $this->db->select('*')

                ->from($this->tableNameWithPrifix)

                ->where($column, $val);

        if ($orderByField != '') {

            $this->db->order_by($orderByField, $sortOrder);

        }

        $query = $this->db->get();

        $resultSet = $query->result_array();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet : null;

    }

    public function getRowByColumn($column,$val,$orderByField = '',$sortOrder = 'ASC') {

        $this->db->select('*')

                ->from($this->tableNameWithPrifix)

                ->where($column, $val);

        if ($this->session->userdata('role_id') != '1') {

            $this->db->where('createdby', $this->session->userdata('login_id'));

        }

        $query = $this->db->get();

        $resultSet = $query->row();

        $this->db->last_query();

        return $resultSet;

    }
public function getRowByColumnf($column,$val,$orderByField = '',$sortOrder = 'ASC') {

        $this->db->select('*')

                ->from($this->tableNameWithPrifix)

                ->where($column, $val);

        if ($this->session->userdata('role_id') != '') {

            $this->db->where('createdby', $this->session->userdata('login_id'));

        }

        $query = $this->db->get();

        $resultSet = $query->row();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet : null;

    }

    public function getRowByColumnLangulage($column,$val,$languageid) {

        $this->db->select('*')

                ->from($this->tableNameWithPrifix.'_lang')

                ->where($column, $val)

                ->where('languageid', $languageid);

        $query = $this->db->get();

        $resultSet = $query->row();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet : null;

    }

    public function getRowByColumnLangulageArray($column,$val,$languageid) {

        $this->db->select('*')

                ->from($this->tableNameWithPrifix.'_lang')

                ->where($column, $val)

                ->where('languageid', $languageid);

        $query = $this->db->get();

        $resultSet = $query->row_array();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet : null;

    }

    public function getRowByColumnCommon($column,$val,$orderByField = '',$sortOrder = 'ASC') {

        $this->db->select('*')

                ->from($this->tableNameWithPrifix)

                ->where($column, $val);

        $query = $this->db->get();

        $resultSet = $query->row();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet : null;

    }

    public function getColumnRowByColumn($filed,$column,$val,$orderByField = '',$sortOrder = 'ASC') {

        $this->db->select($filed)

                ->from($this->tableNameWithPrifix)

                ->where($column, $val);

        $query = $this->db->get();

        $resultSet = $query->row();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet : null;

    }

    public function getColumnRowByColumnArray($filed,$column,$val,$orderByField = '',$sortOrder = 'ASC') {

        $this->db->select($filed)

                ->from($this->tableNameWithPrifix)

                ->where($column, $val);

        $query = $this->db->get();

        $resultSet = $query->row_array();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet : null;

    }

    public function getColumnRowsByColumn($filed,$column,$val,$orderByField = '',$sortOrder = 'ASC') {

        $this->db->select($filed)

                ->from($this->tableNameWithPrifix);

        if (is_array($val)) {

            $this->db->where_in($column, $val);

        }else{

            $this->db->where($column, $val);

        }

        $query = $this->db->get();

        $resultSet = $query->result();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet : null;

    }

    public function getRowByColumnArray($column,$val) {

        $this->db->select('*')

                ->from($this->tableNameWithPrifix)

                ->where($column, $val);

        $query = $this->db->get();

        $resultSet = $query->row_array();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet : null;

    }

    public function getRowByColumnArrayLanguage($column,$val,$conditions='') {

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)

            ->join($this->tableNameWithPrifix.'_lang as lang', 'lang.'.$column.' = '.$this->tableName.'.'.$column, 'left inner');

        $this->db->where($this->tableName.'.'.$column, $val);

        

        if(!empty($conditions)&& is_array($conditions)){

            foreach($conditions as $key => $value){

                if (!empty($value)) {

                    $this->db->where('lang.'.$key, $value);

                }

            }

        }

        $query = $this->db->get();

        $resultSet = $query->row_array();

        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet : null;

    }

    public function insert($insertData){

        if ($this->session->userdata('login_id')) {

            $insertData['createdby'] = $this->session->userdata('login_id');

            $insertData['modifiedby'] = $this->session->userdata('login_id');

        }

        $insertData['createddate'] = date('Y-m-d h:i:s');

        $insertData['modifieddate'] = date('Y-m-d h:i:s');

        foreach ($insertData as $key => $value) {

            //$records[$key] = htmlentities($value, ENT_QUOTES, "UTF-8");

            $records[$key] = $value;

        }

        $this->db->insert($this->tableNameWithPrifix, $records);

        $this->db->last_query();

        return $this->db->insert_id();

    }

    public function insertlanguage($insertData){

        if ($this->session->userdata('login_id')) {

            $insertData['createdby'] = $this->session->userdata('login_id');

            $insertData['modifiedby'] = $this->session->userdata('login_id');

        }

        $insertData['createddate'] = date('Y-m-d h:i:s');

        $insertData['modifieddate'] = date('Y-m-d h:i:s');

        foreach ($insertData as $key => $value) {

            //$records[$key] = htmlentities($value, ENT_QUOTES, "UTF-8");

            $records[$key] = $value;

        }

        $this->db->insert($this->tableNameWithPrifix.'_lang', $records);

        $this->db->last_query();

        return $this->db->insert_id();

    }

    public function inserthistory($insertData){

        if ($this->session->userdata('login_id')) {

            $insertData['createdby'] = $this->session->userdata('login_id');

            $insertData['modifiedby'] = $this->session->userdata('login_id');

        }

        $insertData['createddate'] = date('Y-m-d h:i:s');

        $insertData['modifieddate'] = date('Y-m-d h:i:s');

        foreach ($insertData as $key => $value) {

            //$records[$key] = htmlentities($value, ENT_QUOTES, "UTF-8");

            $records[$key] = $value;

        }

        $this->db->insert($this->tableNameWithPrifix.'_history', $records);

        $this->db->last_query();

        return $this->db->insert_id();

    }

    public function insertlanguagehistory($insertData){

        if ($this->session->userdata('login_id')) {

            $insertData['createdby'] = $this->session->userdata('login_id');

            $insertData['modifiedby'] = $this->session->userdata('login_id');

        }

        $insertData['createddate'] = date('Y-m-d h:i:s');

        $insertData['modifieddate'] = date('Y-m-d h:i:s');

        foreach ($insertData as $key => $value) {

            //$records[$key] = htmlentities($value, ENT_QUOTES, "UTF-8");

            $records[$key] = $value;

        }

        $this->db->insert($this->tableNameWithPrifix.'_lang_history', $records);

        $this->db->last_query();

        return $this->db->insert_id();

    }
public function updatebuy($recordId, $updateData){

        $updateData['modifiedby'] = $this->session->userdata('login_id');

        $updateData['modifieddate'] = date('Y-m-d h:i:s');

        foreach ($updateData as $key => $value) {

            //$records[$key] = htmlentities($value, ENT_QUOTES, "UTF-8");

            $records[$key] = $value;

        }

        $this->db->where('emailid', $recordId);

        $this->db->update($this->tableNameWithPrifix, $records);

        $this->db->last_query();

        return $this->db->affected_rows();

    }

    public function update($recordId, $updateData){

        $updateData['modifiedby'] = $this->session->userdata('login_id');

        $updateData['modifieddate'] = date('Y-m-d h:i:s');

        foreach ($updateData as $key => $value) {

            //$records[$key] = htmlentities($value, ENT_QUOTES, "UTF-8");

            $records[$key] = $value;

        }

        $this->db->where($this->tableName.'id', $recordId);

        $this->db->update($this->tableNameWithPrifix, $records);

        $this->db->last_query();

        return $this->db->affected_rows();

    }
    public function updatelanguage($conditions, $updateData){

        $updateData['modifiedby'] = $this->session->userdata('login_id');

        $updateData['modifieddate'] = date('Y-m-d h:i:s');

        if(!empty($conditions)&& is_array($conditions)){

            foreach($conditions as $key => $value){

                if (!empty($value)) {

                    $this->db->where($key, $value);

                }

            }

        }

        foreach ($updateData as $key => $value) {

            //$records[$key] = htmlentities($value, ENT_QUOTES, "UTF-8");

            $records[$key] = $value;

        }

        $this->db->update($this->tableNameWithPrifix.'_lang', $records);

        $this->db->last_query();

        return $this->db->affected_rows();

    }

    public function updateLogin($recordId, $updateData){

        $updateData['modifieddate'] = date('Y-m-d h:i:s');

        $updateData['modifiedby'] = $this->session->userdata('login_id');

        $this->db->where('emailid', $recordId);

        $this->db->update($this->tableNameWithPrifix, $updateData);

        $this->db->last_query();

        return $this->db->affected_rows();

    }

    public function delete($column,$recordId){

        if(is_array($recordId)){

            $this->db->where_in($column, $recordId);

        }else{

            $this->db->where($column, $recordId);

        }

        $updateData['deleted'] = 1;

        $this->db->update($this->tableNameWithPrifix, $updateData);

    }

    public function deletelanguage($column,$recordId){

        if(is_array($recordId)){

            $this->db->where_in($column, $recordId);

        }else{

            $this->db->where($column, $recordId);

        }

        $updateData['deleted'] = 1;

        $this->db->update($this->tableNameWithPrifix.'_lang', $updateData);

    }

    public function deleteCustom($table,$column,$recordId){

        $this->db->where($column, $recordId);

        $updateData['deleted'] = 1;

        $this->db->update(TBL_PREFIX.$table, $updateData);

    }

    public function deleteElement($element, $array){

        $index = array_search($element, $array);

        if($index !== false){

            unset($array[$index]);

        }

        return $array;

    }

    public function deletefile($column,$recordId,$imageField,$image,$t=''){

        if(is_array($recordId)){

            $this->db->where_in($column, $recordId);

        }else{

            $this->db->where($column, $recordId);

        }

        if ($t != '') {

            $row = $this->getColumnRowByColumnArray($imageField,$column,$recordId);

            $arrayName = unserialize($row[$imageField]);

            $value = $this->deleteElement($image, $arrayName);

            $updateData[$imageField]= serialize($value);

        }else{

            $updateData[$imageField] = $image;

        }

        unlink(UPLOAD_FOLDER.$image); 

        if(is_array($recordId)){

            $this->db->where_in($column, $recordId);

        }else{

            $this->db->where($column, $recordId);

        }

        $this->db->update($this->tableNameWithPrifix, $updateData);

        echo $this->db->last_query();

        return $this->db->affected_rows();

    }

    public function getAllHistory($recordId){

        if($this->session->userdata('usertype') == 1){

            $this->db->select('*')

                        ->from($this->tableNameWithPrifix.'_history')

                        ->where($this->tableName.'Id',$recordId); 

                        $query = $this->db->get();

                        $resultSet = $query->result();

                        return $resultSet;

        }  

    }

    public function insert_history($insertData){

        $tb = $this->tableName;

        $tbl = $tb.'_history';

        

        $insertData['created_date'] = date('Y-m-d h:i:s');

        $insertData['modified_date'] = date('Y-m-d h:i:s');

        $insertData['createdBy'] = $this->session->userdata('login_id');

        $insertData['modifiedBy'] = $this->session->userdata('login_id');



        $this->db->insert($tbl, $insertData);

        return $this->db->insert_id();

    }

    public function updateChild($recordId, $updateData){

        $updateData['modified_date'] = date('Y-m-d h:i:s');

        $updateData['modifiedBy'] = $this->session->userdata('login_id');



        $this->db->where('adminId', $recordId);

        $this->db->update($this->tableNameWithPrifix, $updateData);

        if ($this->tableNameWithPrifix == 'user') {

            $companyUniqueId = $updateData['companyUniqueId'];

            if ($updateData['isActive'] == 0) {

                $p['status'] = 'inactive';

            }else{

                $p['status'] = 'active';

            }

            $this->updateCompany($companyUniqueId, $p);

        }

    }

    public function updateChildReNew($recordId, $updateData){

        $updateData['modified_date'] = date('Y-m-d h:i:s');

        $updateData['modifiedBy'] = $recordId;

        $this->db->where('adminId', $recordId);

        $this->db->update($this->tableNameWithPrifix, $updateData);

    }

    public function updateCompany($recordId, $updateData){

        $updateData['modified_date'] = date('Y-m-d h:i:s');

        $updateData['modifiedBy'] = $this->session->userdata('login_id');



        $this->db->where('id', $recordId);

        $this->db->update('company', $updateData);

    }

    public function deleteCompany($recordId){

        $this->db->where('id', $recordId);

        $updateData['deleted'] = 1;

        $this->db->update('company', $updateData);

    }

    public function deleteChild($recordId){

        $this->db->where('adminId', $recordId);

        $updateData['deleted'] = 1;

        $this->db->update($this->tableNameWithPrifix, $updateData);

    }

    public function deleteUnRegisterUser($recordId){

        $this->db->where('companyUniqueId', $recordId);

        $this->db->delete($this->tableNameWithPrifix, $updateData);

    }

    public function deleteUnRegisterCompany($recordId){

        $this->db->where('id', $recordId);

        $this->db->delete($this->tableNameWithPrifix, $updateData);

    }

}

