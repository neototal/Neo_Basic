<?php

include_once '../../Imports/session_manager/session_setup.php';
include_once '../../Imports/header/back_end_head_imports.php';
$search_value = isset($_POST['search']) ? $_POST['search'] : "";

$database = database();

$json=array();

$sql_query = "select * from item_type where ast='1'";
$result = $database->query($sql_query);
while($row=$result->fetch_assoc()){
    $json[]=$row;
}

echo json_encode($json);
