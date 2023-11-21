<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');
class Uitype_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = 'uitype';
        $this->tableNameWithPrifix = TBL_PREFIX.'uitype';
    }
}

