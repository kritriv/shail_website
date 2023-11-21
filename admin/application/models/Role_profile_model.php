<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');
class Role_profile_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = 'role2profile';
        $this->tableNameWithPrifix = TBL_PREFIX.'role2profile';
    }
}

