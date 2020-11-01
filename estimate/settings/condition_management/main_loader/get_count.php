<?php
include_once '../../../../Imports/session_manager/session_setup.php';
include_once '../../../../Imports/header/back_end_head_imports.php';

$database_connction=  database();

$showing_state=  isset($_POST['showing_state'])?$_POST['showing_state']:"";

$search_value = isset($_POST['search_value']) ? $_POST['search_value'] : "";
$count_of_per_page = isset($_POST['count_of_per_page']) ? $_POST['count_of_per_page'] : "";


$database_connction = database();
$sql_query = "select * from estimate_catergory where ast='1' and active_state='".$showing_state."' and name like '%" . $search_value . "%' ";
$result = $database_connction->query($sql_query);

$int_count_of_per_page = (int) $count_of_per_page;
$int_no_of_row = $result->num_rows;

$no_of_pages = (int) ($int_no_of_row / $int_count_of_per_page);

$int_mode = ($int_no_of_row % $int_count_of_per_page);
if ($int_mode > 0) {
    $no_of_pages++;
}

echo $no_of_pages;