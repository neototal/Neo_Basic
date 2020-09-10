<?php

include_once '../../Imports/session_manager/session_setup.php';
include_once '../../Imports/header/back_end_head_imports.php';


$search_value = isset($_POST['search_value']) ? $_POST['search_value'] : "";
$no_of_count = isset($_POST['no_of_count']) ? $_POST['no_of_count'] : "";
$stating_row_number = isset($_POST['stating_row_number']) ? $_POST['stating_row_number'] : "";

$json = array();

$database_connction = database();
$sql_query = "select * from hardware_item_list where ast='1' and name like '%" . $search_value . "%' LIMIT " . $no_of_count . " OFFSET " . $stating_row_number;
//echo $sql_query;
$result = $database_connction->query($sql_query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['item_type_name'] = get_item_type_name($row['hardware_type_idhardware_type']);
        $json[] = $row;
    }
} else {
    
}

echo json_encode($json);

function get_item_type_name($get_item_id) {
    $item_name = "Not Found";
    $database_connction = database();
    $sql_query = "select hardware_type from hardware_type where idhardware_type='" . $get_item_id . "'";

    $result = $database_connction->query($sql_query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $item_name = $row['hardware_type'];
        }
    }
    return $item_name;
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

