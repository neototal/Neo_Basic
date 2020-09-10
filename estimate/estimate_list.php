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
        include_once '../Imports/header/session_setup.php';
        $_SESSION['pth'] = "../";
        $_SESSION['title'] = "Estimate List";
        include_once '../Imports/header/basic_header.php';
        ?>
    </head>
    <body class="w3-theme-light">
        <?php
        include_once '../Imports/menu/main_menue.php';
        ?>

        <script type="text/javascript">
        function go_to_settings(){
            window.location.href="estimate_settings.php";
        }
        </script>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h1 class="w3-header">Estimate List</h1>

                </div>
                <div class="col-lg-4">
                    <input type="text" onkeypress="main_loder()"  placeholder="search work" id="search_items_txt" class="w3-input w3-border w3-border-black ">
                </div>
                <div class="col-lg-1">
                    <button class="w3-theme-dark w3-round w3-input w3-hover-blue-grey" onclick="go_to_settings()"><span class="fa fa-cog"></span></button>
                </div>
                <div class="col-lg-2">
                    <button class="w3-theme-dark w3-button w3-input w3-hover-blue-grey">Create Estimate</button>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../system_dash_board.php">Home</a></li>
                        <li class="breadcrumb-item active">Estimate List</li>
                    </ul>
                </div>
            </div>

        </div>

        <?php
        include_once '../Imports/footer/footer_system.php';
        ?>
    </body>
</html>