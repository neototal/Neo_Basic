<?php

include_once '../../../Imports/session_manager/session_setup.php';
include_once '../../../Imports/header/back_end_head_imports.php';

$get_id = isset($_POST['id']) ? $_POST['id'] : "";

$database_connction = database();
$sql_query = "select * from estimate_type where idEstimate_type='" . $get_id . "'";
//echo $sql_query;
$json = array();
$result = $database_connction->query($sql_query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $json[] = $row;
        break;
    }
}

echo json_encode($json);
