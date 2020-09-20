<?php

include_once '../../Imports/session_manager/session_setup.php';

$id = isset($_POST['id']) ? $_POST['id'] : "";
//session_start();
$_SESSION['estiamte_id_type'] = $id . "";
if (isset($_SESSION['estiamte_id_type'])) {
//    echo $_SESSION['estiamte_id_type']."  ".$id;
    echo 'ok';
} else {
    echo 'id not found';
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

