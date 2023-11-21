<?php include 'config-file-file.php';?> 
<?php

    $tblName = 'multiimage';
    $wr['deleted'] = 1;
    $imgname=$_REQUEST['filename'];
    $where = array('multiimageid' => $_REQUEST['id'],'moduleid' => $_REQUEST['recordid']);
    $records = $db->update($tblName,$wr,$where);
    unlink(realpath(DIR_PATH_FULL.UI_IMAGE_PATH.$imgname)); 
    $data['status'] = 'OK';
    json_encode($data);
?>
            