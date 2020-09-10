<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <meta charset="UTF-8">
        <?php
        include_once 'Imports/header/session_setup.php';
        $_SESSION['pth'] = "";
        $_SESSION['title'] = "Home";
        include_once 'Imports/header/basic_header.php';
        ?>
    </head>
    <body>
        <?php
        include_once 'Imports/menu/main_menue.php';
        echo $userid." user id";
        ?>
        
       
        <?php
        include_once 'Imports/footer/footer_system.php';
        ?>
    </body>
</html>
