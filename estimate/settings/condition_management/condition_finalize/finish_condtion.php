<?php

include_once '../../../../Imports/session_manager/session_setup.php';
include_once '../../../../Imports/header/back_end_head_imports.php';
$id = isset($_POST['id']) ? $_POST['id'] : "";
$database_connction = database();
$sql_quary = "update estimate_catergory set active_state='1' where id='".$id."'";
$database_connction->query($sql_quary);
echo 'ok';
