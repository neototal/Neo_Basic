<?php

include_once '../../../Imports/session_manager/session_setup.php';
include_once '../../../Imports/header/back_end_head_imports.php';

$id = isset($_POST['id']) ? $_POST['id'] : "0";

$database_connction = database();
$sql_query = "select * from estimate_type where idEstimate_type='" . $id . "'";

$json = array();
$result = $database_connction->query($sql_query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['tecnical_works_state'] == "1") {
            array_unshift($json, load_tecnical_works($id));
        }
        if ($row['other_work_state'] == "1") {
            array_unshift($json, load_other_works($id));
        }
        if ($row['item_list_state'] == "1") {
            load_item_list($id);
        }
        if ($row['hardware_list'] == "1") {
             load_hardware_list($id);
        }
    }
}
//echo json_encode($json);

function load_tecnical_works($id) {
    $json = array();
    $database = database();
    $sql_quary = "select * from tecnical_works where idtecnical_works in(select tecnical_works_idtecnical_works from estimate_setup_tecnical_works where Estimate_type_idEstimate_type='" . $id . "')";
    $result = $database->query($sql_quary);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data_seup = array();
            $data_seup['id'] = $row['idtecnical_works'];
            $data_seup['name'] = $row['name'];
            $data_seup['dis'] = $row['dis'];
            $data_seup['type'] = "Category tecnical works";
            $json[] = $data_seup;
        }
    }
    echo json_encode($json);
    return $json;
}

function load_other_works($id) {
    $json = array();
    $database = database();
    $sql_quary = "select * from others where idothers in(select others_idothers from estimate_setup_others where Estimate_type_idEstimate_type='" . $id . "')";
    $result = $database->query($sql_quary);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data_seup = array();
            $data_seup['id'] = $row['idothers'];
            $data_seup['name'] = $row['name'];
            $data_seup['dis'] = $row['dis'];
            $data_seup['type'] = "Category others";
            $json[] = $data_seup;
        }
    }
    echo json_encode($json);
//    return $json;
}

function load_item_list($id) {
    $json = array();
    $database = database();
    $sql_quary = "select * from item_type where iditem_type in(select item_type_iditem_type from estimate_setup_item_type where Estimate_type_idEstimate_type='" . $id . "')";
    $result = $database->query($sql_quary);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data_seup = array();
            $data_seup['id'] = $row['iditem_type'];
            $data_seup['name'] = $row['type_name'];
            $data_seup['dis'] = "";
            $data_seup['type'] = "Category item type";

            $json[] = $data_seup;
        }
    }
    echo json_encode($json);
    return $json;
}

function load_hardware_list($id) {
    $json = array();
    $database = database();
    $sql_quary = "select * from hardware_type where idhardware_type in(select hardware_type_idhardware_type from estimate_setup_hardware_item_type where Estimate_type_idEstimate_type='" . $id . "')";
    $result = $database->query($sql_quary);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data_seup = array();
            $data_seup['id'] = $row['idhardware_type'];
            $data_seup['name'] = $row['hardware_type'];
            $data_seup['dis'] = "";
            $data_seup['type'] = "Category hardware type";
            $json[] = $data_seup;
        }
    }
    echo json_encode($json);
    return $json;
}
