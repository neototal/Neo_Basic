<?php
include_once './session_setup.php';
if(!isset($_SESSION['userid'])){
    echo 'logout'; 
}else{
    echo 'ok---'.$_SESSION['userid'];
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

