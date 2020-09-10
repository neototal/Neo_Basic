<?php

include_once '../../../../Imports/session_manager/session_setup.php';
include_once '../../../../Imports/header/back_end_head_imports.php';
$search_value = isset($_POST['search']) ? $_POST['search'] : "";

$database = database();

$json = array();

$estimate_id = isset($_SESSION['estiamte_id_type']) ? $_SESSION['estiamte_id_type'] : "0";
//echo $estimate_id;

$sql_query = "select * from others where ast='1' and idothers not in(select others_idothers from estimate_setup_others where ast='1' and Estimate_type_idEstimate_type='".$estimate_id."')";
//echo $sql_query;
$result = $database->query($sql_query);
while ($row = $result->fetch_assoc()) {
    $json[] = $row;
}

echo json_encode($json);
