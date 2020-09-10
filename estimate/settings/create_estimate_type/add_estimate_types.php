<?php

include_once '../../../Imports/session_manager/session_setup.php';
include_once '../../../Imports/header/back_end_head_imports.php';

$get_name = isset($_POST['name']) ? $_POST['name'] : "";
$get_dis = isset($_POST['dis']) ? $_POST['dis'] : "";
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "Not Found";

$database_connction = database();
$sql_query = "insert into estimate_type(sdt,ast,name,dis,tecnical_works_state,other_work_state,item_list_state,hardware_list,showing_state,user_login_iduser_login)"
        . "values(now(),'1','" . $get_name . "','" . $get_dis . "','0','0','0','0','0','" . $userid . "')";
$database_connction->query($sql_query);

echo $database_connction->insert_id;
$_SESSION['estiamte_id_type'] = $database_connction->insert_id;
echo $database_connction->error;
