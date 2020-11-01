<?php

include_once '../../../../Imports/session_manager/session_setup.php';
include_once '../../../../Imports/header/back_end_head_imports.php';

$id = isset($_POST['id']) ? $_POST['id'] : "0";
$name = isset($_POST['name']) ? $_POST['name'] : "";

$json = array();

$database_connction = database();
$sql_quary = "select * from estimate_catergory_general_condition where ast='1' and estimate_catergory_id='" . $id . "' and dis like '%" . $name . "%'";

$result = $database_connction->query($sql_quary);
if ($result->num_rows > 0) {
    while($row=$result->fetch_assoc()){
        $json[]=$row;
    }
}
echo json_encode($json);