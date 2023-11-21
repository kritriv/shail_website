<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');
class Dropdown_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = 'dropdown';
        $this->tableNameWithPrifix = TBL_PREFIX.'dropdown';
    }
}

