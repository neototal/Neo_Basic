<?php

include_once '../../Imports/session_manager/session_setup.php';
include_once '../../Imports/header/back_end_head_imports.php';

$get_userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "Not Found";

$get_name = isset($_POST['name']) ? $_POST['name'] : "";
$get_modal_no = isset($_POST['modal_no']) ? $_POST['modal_no'] : "";
$get_dis = isset($_POST['dis']) ? $_POST['dis'] : "";
$get_serial_no_state = isset($_POST['serial_no_avalible']) ? $_POST['serial_no_avalible'] : "";
$get_vsp_price = isset($_POST['vsp_price']) ? $_POST['vsp_price'] : "";
$get_deler_price_rate = isset($_POST['dealer_rate']) ? $_POST['dealer_rate'] : "";
$get_budget_price_rate = isset($_POST['budget_rate']) ? $_POST['budget_rate'] : "";
$get_corperate_price_rate = isset($_POST['coperate_rate']) ? $_POST['coperate_rate'] : "";
$get_total_stock = isset($_POST['open_stock']) ? $_POST['open_stock'] : "";
$get_warranty = isset($_POST['warranty']) ? $_POST['warranty'] : "";
$get_warranty_risk = isset($_POST['warranty_risk']) ? $_POST['warranty_risk'] : "";

$get_item_type_id = isset($_POST['item_type_id']) ? $_POST['item_type_id'] : "";

$database = database();

$sql_query = "insert into item_list(name,modal_no,dis,serial_no_state,vsp_price,delar_reate_precentage,budget_precentage,corperate_precentage,total_stock,ast,sdt,warranty_dis,user_login_iduser_login,item_type_iditem_type,warranty_risk)values(" .
        "'" . $get_name . "','" . $get_modal_no . "','" . $get_dis . "','" . $get_serial_no_state . "','" . $get_vsp_price . "','" . $get_deler_price_rate . "','" . $get_budget_price_rate . "','" . $get_corperate_price_rate . "','" . $get_total_stock . "','1',now(),'" . $get_warranty . "','" . $userid . "','" . $get_item_type_id . "','".$get_warranty_risk."')";

$database->query($sql_query);
echo $database->error;
