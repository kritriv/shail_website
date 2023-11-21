<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');
class Profile_module_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = 'profile2module';
        $this->tableNameWithPrifix = TBL_PREFIX.'profile2module';
    }
}

