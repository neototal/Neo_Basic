<?php

include_once '../../Imports/session_manager/session_setup.php';
include_once '../../Imports/header/back_end_head_imports.php';

$id=  isset($_POST['id'])?$_POST['id']:"";

$_SESSION['item_id']=$id;