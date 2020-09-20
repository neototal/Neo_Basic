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
            function go_to_settings() {
                window.location.href = "estimate_settings.php";
            }
        </script>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="w3-header">Estimate List</h1>

                </div>
                <div class="col-lg-5">
                    <!--<input type="text"  placeholder="search estimate type"  class="w3-input w3-border w3-border-black ">-->
                    <div class="input-group">
                        <input type="text" class="form-control" id="search_items_txt"  autocomplete="off" placeholder="search from estimate number">
                        <span class="input-group-btn">
                            <button class="btn btn-default" id="search_value_btn" onclick="main_loder()" title="search" ><span class="fa fa-search"></span></button>
                            <button class="btn btn-default" id="search_value_btn_close" onclick="cancel_search()" style="display: none;"  title="cancel search" ><i class="fa fa-times" aria-hidden="true"></i></button>
                        </span>

                    </div>
                </div>
                <div class="col-lg-1">                    
                    <div class="w3-dropdown-hover w3-hide-small" style="width: 100%;">
                        <button class="w3-theme-dark w3-input w3-button w3-round w3-hover-blue-grey" title="advance search"><i class="fa fa-cogs" aria-hidden="true"></i></button>
                        <div class="w3-dropdown-content w3-card-2 w3-bar-block" style="width: 300px;">
                            <button class="w3-button w3-bar-item">Pending estimate</button>
                            <button class="w3-button w3-bar-item">expired estimate</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8"></div>
                <div class="col-lg-1">
                    <button class="w3-theme-dark w3-round w3-input w3-hover-blue-grey" title="settings" onclick="go_to_settings()"><i class="fa fa-wrench" aria-hidden="true"></i></button>

                </div>
                <div class="col-lg-3">
                    <button class="w3-theme-dark w3-button w3-input w3-hover-blue-grey">Create New Estimate</button>
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


    </div>

    <?php
    
    include_once '../Imports/footer/footer_system.php';
    ?>
</body>
</html>
