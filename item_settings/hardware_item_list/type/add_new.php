<?php
include_once '../../../Imports/session_manager/session_setup.php';
include_once '../../../Imports/header/back_end_head_imports.php';

$name = isset($_POST['name']) ? $_POST['name'] : "";
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "not found";




$database = database();

$sql_query = "insert into hardware_type(hardware_type,ast,sdt,user_login_iduser_login) values('" . $name . "','1',now(),'" . $userid . "') ";
$database->query($sql_query);

echo $database->error;


