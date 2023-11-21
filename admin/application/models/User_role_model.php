<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');
class user_role_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = 'user2role';
        $this->tableNameWithPrifix = TBL_PREFIX.'user2role';
    }
}

