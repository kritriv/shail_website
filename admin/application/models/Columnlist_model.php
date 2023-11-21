<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');
class Columnlist_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = 'columnlist';
        $this->tableNameWithPrifix = TBL_PREFIX.'columnlist';
    }
    
}

