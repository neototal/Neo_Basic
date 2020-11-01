<?php

include_once '../../../../Imports/session_manager/session_setup.php';
include_once '../../../../Imports/header/back_end_head_imports.php';

$id = isset($_POST['id']) ? $_POST['id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";

$database_connction = database();
$sql_quary = "insert into estimate_catergory_installing_condition(ast,sdt,dis,count_of_condition,estimate_catergory_id,user_login_iduser_login) values('1',now(),'" . $name . "','0','" . $id . "','" . $userid . "')";
$database_connction->query($sql_quary);
echo $database_connction->error;


$database_connction_01=  database();
$sql_quary_01="update estimate_catergory set installing_state='1' where id='".$id."'";

$database_connction_01->query($sql_quary_01);



