<?php

include_once '../../Imports/session_manager/session_setup.php';
include_once '../../Imports/header/back_end_head_imports.php';


$search_value = isset($_POST['search_value']) ? $_POST['search_value'] : "";
$no_of_count = isset($_POST['no_of_count']) ? $_POST['no_of_count'] : "";
$stating_row_number = isset($_POST['stating_row_number']) ? $_POST['stating_row_number'] : "";

$json = array();

$database_connction = database();
$sql_query = "select * from others where ast='1' and name like '%" . $search_value . "%' LIMIT ".$no_of_count." OFFSET ".$stating_row_number;
//echo $sql_query;
$result = $database_connction->query($sql_query);

$int_count_of_per_page = (int) $count_of_per_page;
$int_no_of_row = $result->num_rows;

$no_of_pages = (int) ($int_no_of_row / $int_count_of_per_page);

$int_mode = ($int_no_of_row % $int_count_of_per_page);
if ($int_mode > 0) {
    $no_of_pages++;
}

echo $no_of_pages;
