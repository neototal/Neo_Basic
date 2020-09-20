<?php

include_once '../../../Imports/session_manager/session_setup.php';
include_once '../../../Imports/header/back_end_head_imports.php';

$id = isset($_POST['id']) ? $_POST['id'] : "0";
$database_connction = database();
$sql_query = "update estimate_type set showing_state='1' where idEstimate_type='" . $id . "'";
$database_connction->query($sql_query);

if (isset($_SESSION['estiamte_id_type'])) {
    unset($_SESSION['estiamte_id_type']);
    echo 'ok';
}

