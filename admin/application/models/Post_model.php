<?php

if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Post_model extends MY_Model {

    public function __construct() {

        parent::__construct();

        $this->tableName = 'post';

        $this->tableNameWithPrifix = TBL_PREFIX.'post';

    }

public function get_total() {

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)
            ->join(TBL_PREFIX.'status as status', 'status.statusid = '.$this->tableName.'.statusid', 'inner')

            ->where($this->tableName.'.deleted', 0);

        if ($this->session->userdata('role_id') != '') {

            $this->db->where($this->tableName.'.createdby', $this->session->userdata('login_id'));

        }

        $rr = $this->db->count_all_results();

        $this->db->last_query();

        return $rr;

    }

    public function getAllAvailableArray($limit_per_page='', $start_index='',$orderByField='', $sortOrder='ASC'){

        $this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName)
            ->join(TBL_PREFIX.'status as status', 'status.statusid = '.$this->tableName.'.statusid', 'inner')
            ->where($this->tableName.'.deleted', 0); 

        if ($this->session->userdata('role_id') != '') {

            $this->db->where($this->tableName.'.createdby', $this->session->userdata('login_id'));

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



}


