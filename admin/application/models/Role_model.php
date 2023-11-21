<?php

if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Role_model extends MY_Model {

    public function __construct() {

        parent::__construct();

        $this->tableName = 'role';

        $this->tableNameWithPrifix = TBL_PREFIX.'role';

    }

    public function getAllModuleArray($roleid,$orderByField='', $sortOrder='ASC'){

    	$this->db->select('*')

            ->from($this->tableNameWithPrifix.' as '.$this->tableName) 

            ->join(TBL_PREFIX.'role2profile as role2profile', $this->tableName.'.roleid = role2profile.roleid', 'inner')

            ->join(TBL_PREFIX.'profile as profile', 'profile.profileid = role2profile.profileid', 'inner')

            ->join(TBL_PREFIX.'profile2module as profile2module', 'profile2module.profileid = profile.profileid', 'inner')

            ->join(TBL_PREFIX.'module as module', 'module.moduleid = profile2module.moduleid', 'inner')

            ->where($this->tableName.'.roleid', $roleid)

            ->where('profile2module.permissions', 0);

        if ( $orderByField != '' ){

            $this->db->order_by($orderByField, $sortOrder);

        }

       	$query = $this->db->get();

        $this->db->last_query();

        $resultSet = $query->result_array();

        return $resultSet;

    }

    public function getAllSubModuleArray($orderByField='', $sortOrder='ASC'){

        $this->db->select('*')

            ->from(TBL_PREFIX.'submodule');

        if ( $orderByField != '' ){

            $this->db->order_by($orderByField, $sortOrder);

        }

        $query = $this->db->get();

        $this->db->last_query();

        $resultSet = $query->result_array();

        return $resultSet;

    }

    public function getSubModules($orderByField='', $sortOrder='ASC'){

        $this->db->select('*')

            ->from(TBL_PREFIX.'module')

            ->where(TBL_PREFIX.'module.presence', 2);

        if ( $orderByField != '' ){

            $this->db->order_by($orderByField, $sortOrder);

        }

        $query = $this->db->get();

        $this->db->last_query();

        $resultSet = $query->result_array();

        return $resultSet;

    }



}



