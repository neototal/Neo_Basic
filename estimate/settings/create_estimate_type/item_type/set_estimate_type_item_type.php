<?php

include_once '../../../../Imports/session_manager/session_setup.php';
include_once '../../../../Imports/header/back_end_head_imports.php';

$id_of_estimate = isset($_POST['estimate_id']) ? $_POST['estimate_id'] : "0";
$id_of_item_type = isset($_POST['id']) ? $_POST['id'] : "0";
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "0";
if ($id_of_estimate == 0) {
    $id_of_estimate = isset($_SESSION['estiamte_id_type']) ? $_SESSION['estiamte_id_type'] : "";
}
$database_connction = database();

$sql_query = "insert into estimate_setup_item_type(ast,sdt,user_login_iduser_login,Estimate_type_idEstimate_type,item_type_iditem_type) values("
        . "'1',now(),'" . $userid . "','" . $id_of_estimate . "','" . $id_of_item_type . "')";

$database_connction->query($sql_query);

echo $database_connction->error;
$database_connction = database();
$sql_query = "update estimate_type set item_list_state='1' where idEstimate_type='" . $id_of_estimate . "'";
$database_connction->query($sql_query);

echo $database_connction->error;
