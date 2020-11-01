<?php

include_once '../../../../Imports/session_manager/session_setup.php';
include_once '../../../../Imports/header/back_end_head_imports.php';

$name = isset($_POST['name']) ? $_POST['name'] : "";


$database_connction_01 = database();
$sql_quary_01 = "select * from estimate_catergory where ast='1' and name='" . $name . "'";
$result_01 = $database_connction_01->query($sql_quary_01);

if ($result_01->num_rows > 0) {
    echo 'Already added try another name';
} else {

    $database_connction = database();
    $sql_query = "insert into estimate_catergory(name,ast,sdt,user_login_iduser_login,installing_state,general_state,payment_state,active_state) values('" . $name . "','1',now(),'" . $userid . "','0','0','0','0')";

    $database_connction->query($sql_query);
    $id = $database_connction->insert_id;
    $_SESSION['id'] = $id;
    echo $_SESSION['id'];
}


