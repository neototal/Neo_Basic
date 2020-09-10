<?php

$username = isset($_POST['us']) ? $username = $_POST['us'] : 'Not Found';
$password = isset($_POST['psw']) ? $password = $_POST['psw'] : 'Not Found';
$remember = isset($_POST['ps_ok']) ? $remember = $_POST['ps_ok'] : 'Not Found';

$LoginPageUrl="Location: ../index.php";
if ($username == 'Not Found') {
    header($LoginPageUrl.'?error=User name not found');
} else if ($password == 'Not Found') {
    header($LoginPageUrl.'?error=Password not found');
} else {
    include_once '../Imports/DB/Database_conn.php';
    $conn = database();
    $sql_query = "select * from user_login where user_name='" . $username . "' and password='" . $password . "' and ast='1'";
    $result = $conn->query($sql_query);
    if ($result->num_rows > 0) {
        while($row=$result->fetch_assoc()){
            if($row['active_state']=="0"){
                header($LoginPageUrl.'?error=Your account has deleted contact system administration department');
            }else if($row['account_state']=="0"){
                 header($LoginPageUrl.'?error=Your account has block contact system administration department');
            }else {
                session_start();
               $_SESSION['userid']=$row['iduser_login'];
               
                header('Location: ../system_dash_board.php');
            }
        }
    }else{
        header('Location: ../index.php?error=User name or password wrong try again');
    }
}


?>