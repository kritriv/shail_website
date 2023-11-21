<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');
class Modulefield_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = 'modulefield';
        $this->tableNameWithPrifix = TBL_PREFIX.'modulefield';
        
    }
}

