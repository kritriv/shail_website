<?php

if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Pcategory_model extends MY_Model {

    public function __construct() {

        parent::__construct();

        $this->tableName = 'pcategory';

        $this->tableNameWithPrifix = TBL_PREFIX.'pcategory';

    }

public function get_total($conditions='') {

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)

            ->join(TBL_PREFIX.'status as status', $this->tableName.'.statusid = status.statusid', 'inner')

            ->where($this->tableName.'.deleted', 0); 

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

    public function getAllAvailableArray($conditions='',$limit_per_page='', $start_index='',$orderByField='', $sortOrder='ASC'){

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)

            ->join(TBL_PREFIX.'status as status', $this->tableName.'.statusid = status.statusid', 'inner')

            ->where($this->tableName.'.deleted', 0); 

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

        if ( $orderByField != '' ){

            $this->db->order_by($orderByField, $sortOrder);

        }

        if (!empty($limit_per_page)) {

            $this->db->limit($limit_per_page, $start_index);

        }

       	$query = $this->db->get();

        $this->db->last_query();

        $resultSet = $query->result_array();

        return $resultSet;

    }

        
    public function getAllColumnArray($leadid,$orderByField='', $sortOrder='ASC'){

        $this->db->select('*,uitype')

            ->from(TBL_PREFIX.'columnlist as columnlist') 

            ->join(TBL_PREFIX.'modulefield as modulefield', 'columnlist.fieldname = modulefield.fieldname', 'left inner')

            ->where('columnlist.moduleid', $leadid)

            ->where('modulefield.moduleid', $leadid);

        $this->db->group_by('columnlistid');

        if ( $orderByField != '' ){

            $this->db->order_by('columnlist.'.$orderByField, $sortOrder);

        }

        $query = $this->db->get();

        $this->db->last_query();

        $resultSet = $query->result_array();

        return $resultSet;

    }

    public function get_total_dashboard($conditions='',$column = '',$value = '') {

        $this->db->select('cast(createddate AS DATE) as createddate, count(*) as totalRows')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName) 

            ->join(TBL_PREFIX.'status as status', $this->tableName.'.statusid = status.statusid', 'inner')

            ->where($this->tableName.'.deleted', 0);

        if ($this->session->userdata('role_id') != 1) {

            $this->db->where($this->tableName.'.createdby', $this->session->userdata('login_id'));

        }

        if(!empty($conditions)&& is_array($conditions)){

            foreach($conditions as $key => $value){

                if($key == 'fromdate'){

                    $this->db->where('cast('.$this->tableName.'.createddate AS DATE) >=', $value);

                }else if($key == 'todate'){

                    $this->db->where('cast('.$this->tableName.'.createddate AS DATE) <=', $value);

                }else{

                    $this->db->where($this->tableName.'.'.$key, $value);

                }

            }

        }

        if ($column != '' && $value != '') {

            $this->db->where($this->tableName.'.'.$column, $value);

        }

        $query = $this->db->get();

        $this->db->last_query();



        $resultSet = $query->result_array();

        return $resultSet;

    }



}



