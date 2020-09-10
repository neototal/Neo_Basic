<?php

include_once '../../Imports/session_manager/session_setup.php';
include_once '../../Imports/header/back_end_head_imports.php';

$name = isset($_POST['name']) ? $_POST['name'] : "";
$dis = isset($_POST['dis']) ? $_POST['dis'] : "";
$vsp = isset($_POST['vsp']) ? $_POST['vsp'] : "";
$dealer = isset($_POST['delar']) ? $_POST['delar'] : "";
$budget = isset($_POST['budget']) ? $_POST['budget'] : "";
$coperate = isset($_POST['copurate']) ? $_POST['copurate'] : "";
$unit = isset($_POST['unit']) ? $_POST['unit'] : "";

$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "";
//var sending_value = "name=" + obj_name.value + "&dis=" + obj_dis.value + "&vsp=" + 
//obj_vsp.value + "&delar=" + obj_delar.value + "&budget=" + obj_budget.value + "&copurate=" + obj_copurate.value;


$database_connction = database();
$sql_query = "insert into others(sdt,ast,user_login_iduser_login,name,dis,unit_of_measher,vsp,delar_rate,budget_rate,corperate_rate) values(now(),'1','".$userid."','".$name."','".$dis."','".$unit."','".$vsp."','".$dealer."','".$budget."','".$coperate."')";
$database_connction->query($sql_query);

echo $database_connction->error;
