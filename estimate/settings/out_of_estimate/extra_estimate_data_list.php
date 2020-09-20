<?php

include_once '../../../Imports/session_manager/session_setup.php';
include_once '../../../Imports/header/back_end_head_imports.php';

$id = isset($_POST['id']) ? $_POST['id'] : "0";
$type_of_search = isset($_POST['type_id']) ? $_POST['type_id'] : "0";

$database_connction = database();
$database_connction_01 = database();
$database_connction_02 = database();
$database_connction_03 = database();
$database_connction_04 = database();
$sql_query = "select * from estimate_type where idEstimate_type='" . $id . "'";

$json = array();
$result = $database_connction->query($sql_query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
//        -------------------------------------------
        if ($row['item_list_state'] == "1") {
            $sql_quary_01 = "select * from item_type where iditem_type in(select item_type_iditem_type from estimate_setup_item_type where Estimate_type_idEstimate_type='" . $id . "' and estimate_in_state='0')";
            $result_01 = $database_connction_01->query($sql_quary_01);
            if ($result_01->num_rows > 0) {
                while ($row_01 = $result_01->fetch_assoc()) {
                    $data_seup_01 = array();
                    $data_seup_01['id'] = $row_01['iditem_type'];
                    $data_seup_01['name'] = $row_01['type_name'];
                    $data_seup_01['dis'] = "";
                    $data_seup_01['type'] = "Category item type";
//                    $data_seup_01['estimate_in_state']=$row_01['estimate_in_state'];

                    $json[] = $data_seup_01;
                }
            }
        }
//        -------------------------------------------
        if ($row['tecnical_works_state'] == "1") {
            $sql_quary_02 = "select * from tecnical_works where idtecnical_works in(select tecnical_works_idtecnical_works from estimate_setup_tecnical_works where Estimate_type_idEstimate_type='" . $id . "' and estimate_in_state='0')";
            $result_02 = $database_connction_02->query($sql_quary_02);
            if ($result_02->num_rows > 0) {
                while ($row_02 = $result_02->fetch_assoc()) {
                    $data_seup_02 = array();
                    $data_seup_02['id'] = $row_02['idtecnical_works'];
                    $data_seup_02['name'] = $row_02['name'];
                    $data_seup_02['dis'] = $row_02['dis'];
                    $data_seup_02['type'] = "Category tecnical works";
//                    $data_seup_02['estimate_in_state']=$row_02['estimate_in_state'];
                    $json[] = $data_seup_02;
                }
            }
        }

//        -------------------------------------------
        if ($row['other_work_state'] == "1") {
            $sql_quary_03 = "select * from others where idothers in(select others_idothers from estimate_setup_others where Estimate_type_idEstimate_type='" . $id . "' and estimate_in_state='0')";
            $result_03 = $database_connction_03->query($sql_quary_03);
            if ($result_03->num_rows > 0) {
                while ($row_03 = $result_03->fetch_assoc()) {
                    $data_seup_03 = array();
                    $data_seup_03['id'] = $row_03['idothers'];
                    $data_seup_03['name'] = $row_03['name'];
                    $data_seup_03['dis'] = $row_03['dis'];
                    $data_seup_03['type'] = "Category others";
//                    $data_seup_03['estimate_in_state']=$row_03['estimate_in_state'];
                    $json[] = $data_seup_03;
                }
            }
        }

//        -------------------------------------------
        if ($row['hardware_list'] == "1") {
            $sql_quary_04 = "select * from hardware_type where idhardware_type in(select hardware_type_idhardware_type from estimate_setup_hardware_item_type where Estimate_type_idEstimate_type='" . $id . "' and estimate_in_state='0')";
            $result_04 = $database_connction_04->query($sql_quary_04);
            if ($result_04->num_rows > 0) {
                while ($row_04 = $result_04->fetch_assoc()) {
                    $data_seup_04 = array();
                    $data_seup_04['id'] = $row_04['idhardware_type'];
                    $data_seup_04['name'] = $row_04['hardware_type'];
                    $data_seup_04['dis'] = "";
                    $data_seup_04['type'] = "Category hardware type";
//                    $data_seup_04['estimate_in_state']=$row_04['estimate_in_state'];
                    $json[] = $data_seup_04;
                }
            }
        }
    }
}

echo json_encode($json);

//function load_tecnical_works($id) {
//    $json = array();
//    $database = database();
//    $sql_quary = "select * from tecnical_works where idtecnical_works in(select tecnical_works_idtecnical_works from estimate_setup_tecnical_works where Estimate_type_idEstimate_type='" . $id . "')";
//    $result = $database->query($sql_quary);
//    if ($result->num_rows > 0) {
//        while ($row = $result->fetch_assoc()) {
//            $data_seup = array();
//            $data_seup['id'] = $row['idtecnical_works'];
//            $data_seup['name'] = $row['name'];
//            $data_seup['dis'] = $row['dis'];
//            $data_seup['type'] = "Category tecnical works";
//            $json[] = $data_seup;
//        }
//    }
//    echo json_encode($json);
////    return $json;
//}
//
//function load_other_works($id) {
//    $json = array();
//    $database = database();
//    $sql_quary = "select * from others where idothers in(select others_idothers from estimate_setup_others where Estimate_type_idEstimate_type='" . $id . "')";
//    $result = $database->query($sql_quary);
//    if ($result->num_rows > 0) {
//        while ($row = $result->fetch_assoc()) {
//            $data_seup = array();
//            $data_seup['id'] = $row['idothers'];
//            $data_seup['name'] = $row['name'];
//            $data_seup['dis'] = $row['dis'];
//            $data_seup['type'] = "Category others";
//            $json[] = $data_seup;
//        }
//    }
//    echo json_encode($json);
////    return $json;
//}
//
//function load_item_list($id) {
//    $json = array();
//    $database = database();
//    $sql_quary = "select * from item_type where iditem_type in(select item_type_iditem_type from estimate_setup_item_type where Estimate_type_idEstimate_type='" . $id . "')";
//    $result = $database->query($sql_quary);
//    if ($result->num_rows > 0) {
//        while ($row = $result->fetch_assoc()) {
//            $data_seup = array();
//            $data_seup['id'] = $row['iditem_type'];
//            $data_seup['name'] = $row['type_name'];
//            $data_seup['dis'] = "";
//            $data_seup['type'] = "Category item type";
//
//            $json[] = $data_seup;
//        }
//    }
//    echo json_encode($json);
////    return $json;
//}

function load_hardware_list($id) {
    $json = array();
    $database = database();
    $sql_quary = "select * from hardware_type where idhardware_type in(select hardware_type_idhardware_type from estimate_setup_hardware_item_type where Estimate_type_idEstimate_type='" . $id . "' and estimate_in_state='0')";
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
//    return $json;
}
