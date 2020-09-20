<?php

include_once '../../Imports/session_manager/session_setup.php';
include_once '../../Imports/header/back_end_head_imports.php';

$search_value = isset($_POST['search_value']) ? $_POST['search_value'] : "";
$no_of_count = isset($_POST['no_of_count']) ? $_POST['no_of_count'] : "";
$stating_row_number = isset($_POST['stating_row_number']) ? $_POST['stating_row_number'] : "";
$showing_state=  isset($_POST['showing_state'])?$_POST['showing_state']:"";

$json = array();

$database_connction = database();
$sql_query = "select * from estimate_type where ast='1' and showing_state='".$showing_state."' and name like '%" . $search_value . "%' LIMIT " . $no_of_count . " OFFSET " . $stating_row_number;
//echo $sql_query;
$result = $database_connction->query($sql_query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $json[] = $row;
    }
} else {
    
}

echo json_encode($json);
