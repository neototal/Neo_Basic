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
        include_once '../../../Imports/header/session_setup.php';
        $_SESSION['pth'] = "../../../";
        $_SESSION['title'] = "Estimate Settings | Create New Type";
        include_once '../../../Imports/header/basic_header.php';
        ?>
        <script type="text/javascript" src="js/category_management.js"></script>
        <script type="text/javascript" src="js/installing_condtions.js"></script>
        <script type="text/javascript" src="js/general_condition.js"></script>
        <script type="text/javascript" src="js/payment_condition.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                check_id_avable();
                finish_btn_();
                del_btn_();
                cancel_btn_();
                var modal_close_btn = document.getElementById("close");
                modal_close_btn.addEventListener("click", function () {
                    if (get_cat_id == 0) {
                        not_set_id();
                    }
                });
            });
            window.onbeforeunload = function () {
                return "Do you really want to leave this page?";
            };
            function not_set_id() {
                window.location.href = "load_estimate_condition.php";
            }
            function condition_list_load() {
                installing_condtion_load();
                general_condtion_load();
                payment_condtion_load();

            }

            function cancel_search(close_btn, input_type, other_btn, type_of_condition) {
                $("#" + input_type).val('');
                document.getElementById(other_btn).style.display = "block";

                close_btn.style.display = "none";
                if (type_of_condition == 1) {
                    installing_condtion_load();
                } else if (type_of_condition == 2) {
                    general_condtion_load();
                } else if (type_of_condition == 3) {
                    payment_condtion_load();
                }

            }
            function table_body(id, name, body_div, type_id) {
                var row = document.createElement("div");
                row.setAttribute("class", "row w3-margin");

                var col_01 = document.createElement("div");
                col_01.setAttribute("class", "col-lg-1");
                var li = document.createElement("li");
                li.setAttribute("class", "fa fa-circle");
                col_01.appendChild(li);

                var col_02 = document.createElement("div");
                col_02.setAttribute("class", "col-lg-9");
                col_02.appendChild(document.createTextNode(name));

                var col_03 = document.createElement("div");
                col_03.setAttribute("class", "col-lg-1");

                var btn_01 = document.createElement("button");
                btn_01.setAttribute("class", "w3-button w3-theme-dark w3-round");
                btn_01.setAttribute("title", "view");
                var span_01 = document.createElement("span");
                span_01.setAttribute("class", "fa fa-globe");
                btn_01.appendChild(span_01);

//                col_03.appendChild(btn_01);

                var col_04 = document.createElement("div");
                col_04.setAttribute("class", "col-lg-1");

                var btn_02 = document.createElement("button");
                btn_02.setAttribute("class", "w3-button w3-red w3-round");
                btn_02.setAttribute("title", "delete the record");
                var span_02 = document.createElement("span");
                span_02.setAttribute("class", "fa fa-trash");
                btn_02.appendChild(span_02);

                btn_02.addEventListener("click", function () {
                    if (confirm("do you want to delete the record?")) {
                        if (type_id == 1) {
//                        installing
                            installing_del(id, row);
                        } else if (type_id == 2) {
                            general_del(id, row);
                        } else if (type_id == 3) {
                            payment_del(id, row);
                        }
                    }
                });

                col_04.appendChild(btn_02);

                row.appendChild(col_01);
                row.appendChild(col_02);
                row.appendChild(col_03);
                row.appendChild(col_04);

                body_div.appendChild(row);
                body_div.appendChild(document.createElement("hr"));
            }



            function finish_btn_() {
//alert('test -1');
                var finish_btn = document.createElement("button");
                finish_btn.setAttribute("class", "w3-button w3-theme-dark w3-input w3-round");
                finish_btn.appendChild(document.createTextNode("Finish"));
                finish_btn.addEventListener("click", function () {
                    finish_doc();
                });

                var btn_body = document.getElementById("btn_body_01");
                $(btn_body).empty();
                btn_body.appendChild(finish_btn);

            }
            function finish_doc() {
                var sending_value = "id=" + get_cat_id;

                $.ajax({
                    url: "condition_finalize/finish_condtion.php",
                    type: 'POST',
                    data: sending_value,
                    cache: false,
                    success: function (data) {
                        if (data == "ok") {
                            window.onbeforeunload = null;
                            window.location.href = "load_estimate_condition.php";
                        }
                    }
                });
            }
            function del_btn_() {
//                alert('test del_1');
                var del_btn = document.createElement("button");
                del_btn.setAttribute("class", "w3-button w3-red w3-input w3-round");
                del_btn.appendChild(document.createTextNode("Delete"));

                del_btn.addEventListener("click", function () {
                    if (confirm("Do you want to delete the record?")) {
                        del_doc();
                    }
                });
//                alert('test del');
                var btn_body = document.getElementById("btn_body_03");
                $(btn_body).empty();
                btn_body.appendChild(del_btn);
            }
            function  del_doc() {
                var sending_value = "id=" + get_cat_id;
                $.ajax({
                    url: "condition_finalize/remove_condtion.php",
                    type: 'POST',
                    data: sending_value,
                    cache: false,
                    success: function (data) {
                        if (data == "ok") {
                            window.onbeforeunload = null;
                            window.location.href = "load_estimate_condition.php";
                        }
                    }
                });
            }
            function cancel_btn_() {
                var cancel_btn = document.createElement("button");
                cancel_btn.setAttribute("class", "w3-button w3-theme-dark w3-input w3-round");
                cancel_btn.appendChild(document.createTextNode("Cancel"));
                cancel_btn.addEventListener("click", function () {
                    if (confirm("do you need to save as draft file")) {
                        window.onbeforeunload = null;
                        window.location.href = "load_estimate_condition.php";
                    } else {
                        del_doc();
                    }
                });
//                alert('test cancel');
                var btn_body = document.getElementById("btn_body_02");
                $(btn_body).empty();
                btn_body.appendChild(cancel_btn);

            }

        </script>

    </head>
    <body class="w3-theme-light">
        <?php
        include_once '../../../Imports/menu/main_menue.php';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="w3-header" id="heading_cat">Networking Conditions</h1>
                </div>
                <div class="col-lg-3  ">
                    <!--<button onclick="load_selection()" class="w3-theme-dark w3-button w3-input w3-hover-blue-grey">Add Category</button>-->
                </div>
            </div>
            <div class="row">

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../../../system_dash_board.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="../../estimate_list.php">Estimate List</a></li>
                        <li class="breadcrumb-item"><a href="../estimate_settings.php">Category Condition Settings</a></li>
                        <li class="breadcrumb-item active">Create New Category & Condition</li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="container w3-theme-l4 w3-padding-16 w3-round" >
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="w3-header">Installation Condition</h3>
                </div>
                <div class="col-lg-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="installing_condition_search_value_text"  autocomplete="off" placeholder="search from category name">
                        <span class="input-group-btn">
                            <button class="btn btn-default w3-round" id="installing_condition_search_value_btn" onclick="installing_condtion_load()" title="search" ><span class="fa fa-search"></span></button>
                            <button class="btn btn-default" id="search_value_btn_close" onclick="cancel_search(this, 'installing_condition_search_value_text', 'installing_condition_search_value_btn', 1)" style="display: none;"  title="cancel search" ><i class="fa fa-times" aria-hidden="true"></i></button>
                        </span>

                    </div>
                </div>
                <div class="col-lg-1">
                    <button class="btn btn-default form-control  w3-theme-dark w3-round w3-hover-blue-grey" onclick="installing_condtion_setup()" title="add new "><span class="fa fa-plus"></span></button>
                </div>

            </div>
            <hr>
            <script type="text/javascript">


            </script>
            <div class="row w3-margin">
                <div class="col-lg-12 w3-padding-16">
                    <div class="container-fluid" id="installing_body">
                        <center>
                            <b>Data Not Found</b>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="container w3-theme-l4 w3-padding-16 w3-round" >
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="w3-header">General Condition</h3>
                </div>
                <div class="col-lg-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="general_condition_search_value_text"  autocomplete="off" placeholder="search from category name">
                        <span class="input-group-btn">
                            <button class="btn btn-default w3-round" id="general_condition_search_value_btn" onclick="general_condtion_load()" title="search" ><span class="fa fa-search"></span></button>
                            <button class="btn btn-default" id="general_search_value_btn_close" onclick="cancel_search(this, 'general_condition_search_value_text', 'general_condition_search_value_btn', 2)" style="display: none;"  title="cancel search" ><i class="fa fa-times" aria-hidden="true"></i></button>
                        </span>

                    </div>
                </div>
                <div class="col-lg-1">
                    <button class="btn btn-default form-control  w3-theme-dark w3-round w3-hover-blue-grey" onclick="general_condtion_setup()" title="add new "><span class="fa fa-plus"></span></button>
                </div>

            </div>
            <hr>
            <div class="row w3-margin">
                <div class="col-lg-12 w3-padding-16">
                    <div class="container-fluid" id="general_body">
                        <center>
                            <b>Data Not Found</b>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="container w3-theme-l4 w3-padding-16 w3-round" >
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="w3-header">Payment Condition</h3>
                </div>
                <div class="col-lg-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="payment_condition_search_value_text"  autocomplete="off" placeholder="search from category name">
                        <span class="input-group-btn">
                            <button class="btn btn-default w3-round" id="payment_condition_search_value_btn" onclick="payment_condtion_load()" title="search" ><span class="fa fa-search"></span></button>
                            <button class="btn btn-default" id="payment_search_value_btn_close" onclick="cancel_search(this, 'payment_condition_search_value_text', 'payment_condition_search_value_btn', 3)" style="display: none;"  title="cancel search" ><i class="fa fa-times" aria-hidden="true"></i></button>
                        </span>

                    </div>
                </div>
                <div class="col-lg-1">
                    <button class="btn btn-default form-control  w3-theme-dark w3-round w3-hover-blue-grey" onclick="payment_condtion_setup()" title="add new "><span class="fa fa-plus"></span></button>
                </div>

            </div>
            <hr>
            <div class="row w3-margin">
                <div class="col-lg-12 w3-padding-16">
                    <div class="container-fluid" id="payment_body">
                        <center>
                            <b>Data Not Found</b>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <div class="container w3-margin-top">
            <div class="row">              
                <div class="col-lg-2 w3-padding-8" id="btn_body_01"></div>
                <div class="col-lg-2 w3-padding-8" id="btn_body_02"></div>
                <div class="col-lg-2 w3-padding-8" id="btn_body_03"></div>
                <div class="col-lg-6"></div>
            </div>
        </div>




        <?php
        include_once './modal.php';
        include_once '../../../Imports/footer/footer_system.php';
        ?>
    </body>
</html>
