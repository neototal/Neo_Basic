<?php

include_once '../../../../Imports/session_manager/session_setup.php';
include_once '../../../../Imports/header/back_end_head_imports.php';
$id=isset($_SESSION['id']) ? $_SESSION['id'] : "0" ;

$database_connction = database();
$sql_quary = "select * from estimate_catergory where ast='1' and id='" .$id . "'";
//echo $sql_quary." ------------- sql";
$result = $database_connction->query($sql_quary);

$json = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $json[] = $row;
    }
} 

echo json_encode($json);


