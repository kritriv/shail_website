<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');
class Multiimage_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = 'multiimage';
        $this->tableNameWithPrifix = TBL_PREFIX.'multiimage';
    }
}

