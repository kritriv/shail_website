<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');
class Profile_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = 'profile';
        $this->tableNameWithPrifix = TBL_PREFIX.'profile';
    }
}

