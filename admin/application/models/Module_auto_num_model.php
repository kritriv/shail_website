<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');
class Module_auto_num_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = 'module_auto_num';
        $this->tableNameWithPrifix = TBL_PREFIX.'module_auto_num';
    }
}

