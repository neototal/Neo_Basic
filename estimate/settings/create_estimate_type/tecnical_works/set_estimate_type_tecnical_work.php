<?php

include_once '../../../../Imports/session_manager/session_setup.php';
include_once '../../../../Imports/header/back_end_head_imports.php';

$id_of_estimate = isset($_POST['estimate_id']) ? $_POST['estimate_id'] : "0";
$id_of_item_type = isset($_POST['id']) ? $_POST['id'] : "0";
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "0";
if ($id_of_estimate == 0) {
    $id_of_estimate = isset($_SESSION['estiamte_id_type']) ? $_SESSION['estiamte_id_type'] : "";
}
$estimate_in_state = isset($_POST['estimate_in_state']) ? $_POST['estimate_in_state'] : "";
$database_connction = database();

$sql_query = "insert into estimate_setup_tecnical_works(ast,sdt,user_login_iduser_login,Estimate_type_idEstimate_type,tecnical_works_idtecnical_works,estimate_in_state) values("
        . "'1',now(),'" . $userid . "','" . $id_of_estimate . "','" . $id_of_item_type . "','".$estimate_in_state."')";
//echo $sql_query;
$database_connction->query($sql_query);

echo $database_connction->error;
$database_connction = database();
$sql_query = "update estimate_type set tecnical_works_state='1' where idEstimate_type='" . $id_of_estimate . "'";
$database_connction->query($sql_query);

echo $database_connction->error;
