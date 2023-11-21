<?php include 'config-file-file.php';?> 
<?php
$tblName = PRODUCT;
$wh = ' WHERE productname LIKE "%'.$_REQUEST['q'].'%" ORDER BY '.$tblName.'id DESC';
$posts = $db->getRows($tblName.$wh);
$values .='<ul role="listbox">';
foreach ($posts as $key=> $value) {
    $pname=$value->productname;
    $pid=$value->slug;
    $values .='<li style="border-bottom:1px solid;color:lightgray;padding:3px;"><a href="'.DIR_PATH_FULL.'products/'.$pid.'">'.$pname.'</a></li>';
    }
echo $values .='</ul>';

?>
                        