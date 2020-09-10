<?php

include_once '../../Imports/session_manager/session_setup.php';
include_once '../../Imports/header/back_end_head_imports.php';

// var sending_value = "type_id=" + type_of_hardware_id + "&name=" + obj_name.value + "&unit_of_measure=" + obj_unit_of_measure.value+
//                "&vsp="+obj_vsp.value+"&dealer="+obj_dealer.value+"&budget="+obj_budget.value+"&coperate="+obj_coperate.value;

$hardware_type_id = isset($_POST['type_id']) ? $_POST['type_id'] : "0";
$name = isset($_POST['name']) ? $_POST['name'] : "Not Found";
$unit_of_measure = isset($_POST['unit_of_measure']) ? $_POST['unit_of_measure'] : "";
$vsp = isset($_POST['vsp']) ? $_POST['vsp'] : "0.00";
$dealer = isset($_POST['dealer']) ? $_POST['dealer'] : "0";
$budget = isset($_POST['budget']) ? $_POST['budget'] : "0";
$coperate = isset($_POST['coperate']) ? $_POST['coperate'] : "0";
$total_stock=  isset($_POST['total_stock'])?$_POST['total_stock']:"0";


$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "not found";

$database_connction = database();

$sql_query = "insert into hardware_item_list(name,vsp,dealer_rate,budget_rete,corperate_rete,unit_of_measure,hardware_type_idhardware_type,user_login_iduser_login,total_stock,ast,sdt) value"
        . "('".$name."','".$vsp."','".$dealer."','".$budget."','".$coperate."','".$unit_of_measure."','".$hardware_type_id."','".$userid."','".$total_stock."','1',now())";

$database_connction->query($sql_query);

echo $database_connction->error;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

