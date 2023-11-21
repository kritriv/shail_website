<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');
class Block_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = 'blocks';
        $this->tableNameWithPrifix = TBL_PREFIX.'blocks';
    }
}

