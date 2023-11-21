<?php include 'config-file-file.php';?> 
<?php
$tblName = 'users';
if(isset($_REQUEST['type']) && !empty($_REQUEST['type'])){
    $type = $_REQUEST['type'];
    $where = $_REQUEST['column'].'="'.$_REQUEST['field'].'"';
    if (isset($_REQUEST['mobileCode']) && !empty($_REQUEST['mobileCode'])) {
        $where = 'mobileCode = "'.$_REQUEST['mobileCode'].'" AND '.$_REQUEST['column'].'="'.$_REQUEST['field'].'"';
    }
    switch($type){
        case "user":
            $records = $db->getRow($tblName,$where);
            if($records){
                $data['status'] = 'OK';
                $data['msg'] = '<span style="color:#000"><b>Alerady Exist</b></span>';
            }else{
                $data['records'] = array();
                $data['status'] = 'ERR';
                $data['msg'] = '';
            }
            echo json_encode($data);
            break;
        default:
            echo '{"status":"INVALID"}';
    }
}