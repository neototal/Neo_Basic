<?php

include_once '../../Imports/session_manager/session_setup.php';
include_once '../../Imports/header/back_end_head_imports.php';


$search_value = isset($_POST['search_value']) ? $_POST['search_value'] : "";
$no_of_count = isset($_POST['no_of_count']) ? $_POST['no_of_count'] : "";
$stating_row_number = isset($_POST['stating_row_number']) ? $_POST['stating_row_number'] : "";
$sql_query_continue = "name like '%" . $search_value . "%' LIMIT " . $no_of_count . " OFFSET " . $stating_row_number;
if (isset($_SESSION['item_id'])) {
    $sql_query_continue = "iditem_list='" . $_SESSION['item_id'] . "'";
}

$json = array();

$database_connction = database();
$sql_query = "select * from item_list where ast='1' and ".$sql_query_continue;
//echo $sql_query;
$result = $database_connction->query($sql_query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['item_type_name'] = get_item_type_name($row['item_type_iditem_type']);
        $json[] = $row;
    }
} else {
    
}

echo json_encode($json);

function get_item_type_name($get_item_id) {
    $item_name = "Not Found";
    $database_connction = database();
    $sql_query = "select type_name from item_type where iditem_type='" . $get_item_id . "'";

    $result = $database_connction->query($sql_query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $item_name = $row['type_name'];
        }
    }
    return $item_name;
}
