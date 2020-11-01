<?php

include_once '../../../../Imports/session_manager/session_setup.php';
include_once '../../../../Imports/header/back_end_head_imports.php';
$database_connction = database();
$search_value_from_name = isset($_POST['name']) ? $_POST['name'] : "";
$sql_query = "select * from estimate_catergory where ast='1' and name like '%".$search_value_from_name."%'";

$json = array();

$result = $database_connction->query($sql_query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $json[] = $row;
    }
}

echo json_encode($json);
