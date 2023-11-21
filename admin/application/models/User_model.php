<?php 

if (!defined('BASEPATH'))    exit('No direct script access allowed');

class User_model extends MY_Model {

    public function __construct() {

        parent::__construct();

        $this->tableName = 'userlogin';

        $this->tableNameWithPrifix = TBL_PREFIX.'userlogin';

    }

    public function getByUsernamePassword($email,$password) {

        $this->db->select('*')

                ->from($this->tableNameWithPrifix);

        $this->db->where("emailid",trim($email));

        $this->db->where("user_password",md5($password));

        $query = $this->db->get();

        $resultSet = $query->row();

        $this->db->last_query();

        return $resultSet ? $resultSet : NULL;

        

    }

    public function getByEmail($username) {

        $this->db->select('*')

                ->from($this->tableNameWithPrifix)

                ->where("emailid = '$username'");

        $query = $this->db->get();

        $resultSet = $query->result();

        return (count($resultSet) > 0) ? $resultSet[0] : NULL;

    }

    public function getByEmail_username($email,$username) {

        $this->db->select('*')

                ->from('user')

                ->where("emailid = '$email'");

        $this->db->where("username",$username);

        $query = $this->db->get();

        $resultSet = $query->result();

        return (count($resultSet) > 0) ? $resultSet[0] : NULL;

    }

    public function update($recordId, $updateData){

        $this->db->where('id', $recordId);

        $this->db->update($this->tableNameWithPrifix, $updateData);

        $this->db->last_query();

        return $this->db->affected_rows();

    }

    public function getByforgotToken($username) {

        $this->db->select('*')

                ->from($this->tableNameWithPrifix)

                ->where("forgotToken = '$username'");

        $query = $this->db->get();

        $resultSet = $query->result();
        $this->db->last_query();

        return (count($resultSet) > 0) ? $resultSet[0] : NULL;

    }

    public function getbytoken($key,$val) {

        $this->db->select('*')

                ->from($this->tableNameWithPrifix)

                ->where($key,$val);

        $query = $this->db->get();

        $resultSet = $query->result();

        return (count($resultSet) > 0) ? $resultSet[0] : NULL;

    }

    public function getRoles($id) {

        $this->db->select("*")

                ->from('user_roles')

                ->where("id = '$id'");

        $query = $this->db->get();

        $resultSet = $query->result();

        return $resultSet;

    }

}



