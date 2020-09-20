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
        include_once '../../Imports/header/session_setup.php';
        $_SESSION['pth'] = "../../";
        $_SESSION['title'] = "Estimate Settings | Create New";
        include_once '../../Imports/header/basic_header.php';
        ?>

    </head>
    <body class="w3-theme-light">
        <?php
        include_once '../../Imports/menu/main_menue.php';
        ?>
        <script type="text/javascript" src="create_estimate_type/item_type/js/item_type_list.js"></script>
        <script type="text/javascript" src="create_estimate_type/hardware_type/js/hardware_item_list.js"></script>
        <script type="text/javascript" src="create_estimate_type/tecnical_works/js/tecnical_works_list.js"></script>
        <script type="text/javascript" src="create_estimate_type/others/js/other_list.js"></script>
        <script type="text/javascript" src="create_estimate_type/js/create_new_estimate.js"></script>


        <script type="text/javascript">

            window.onbeforeunload = function () {
                return "Do you really want to leave this page?";
            };
            function remove_estimate_type_id() {
                console.log("test");
            }

            $(document).ready(function () {
                load_estimate_id();
                set_header_info();

                var search_btn = document.getElementById("search_value_btn");
                search_btn.addEventListener("click", function () {
                    load_estimate_data();
                });
                var cancel_search = document.getElementById("cancel_search");
                cancel_search.addEventListener("click", function () {
                    $("#search_value").val('');
                    load_estimate_data();
                });

                var modal_close_btn = document.getElementById("close");
                modal_close_btn.addEventListener("click", function () {
                    if (get_estimate_type_id == 0) {
                        not_set_id();
                    }
                });

            });

            function not_set_id() {
                window.location.href = "../estimate_settings.php";
            }
            function load_estimate_id() {
                $.ajax({
                    url: "create_estimate_type/load_estimate_id.php",
                    type: 'POST',
                    cache: false,
                    success: function (data) {
//                        alert(data);
                        get_estimate_type_id = parseInt(data);
//                        alert(get_estimate_type_id);
                        load_estimate_type();
                    }
                });
            }

            function set_header_info() {
                var setup_button_list = new Array();
                setup_button_list.push("Add Category");
                setup_button_list.push("Add Out Of Estimate List");

                var button_list = setup_button(setup_button_list);

                button_list[0].addEventListener("click", function () {
                    load_selection(1);

                });
                button_list[1].addEventListener("click", function () {
                    load_selection(0);

                });



            }
            function load_estimate_type() {
                var sending_value = "id=" + get_estimate_type_id;
//                alert(sending_value);
                if (get_estimate_type_id == 0) {
//                    alert('test');
                    onLoad_estimate();
                }
                $.ajax({
                    url: "create_estimate_type/list_estimate_type.php",
                    type: 'POST',
                    data: sending_value,
                    cache: false,
                    success: function (data) {
//                        alert(data);
                        var json = eval(data);
                        for (var i = 0; i < json.length; i++) {
                            load_main_body_data(json[i].id, "", json[i].name, json[i].dis);
                        }
                        load_estimate_data();
                    }

                });

            }
            var type_id = 0;
            function load_estimate_data() {
                var search = document.getElementById("search_value");
                
                if (search.value == "") {
//                    alert('test1');
                    document.getElementById("search_value_btn").style.display = "block";
                    document.getElementById("cancel_search").style.display = "none";
                } else {
                    document.getElementById("search_value_btn").style.display = "none";
                    document.getElementById("cancel_search").style.display = "block";
                }
                
                var sending_value = "id=" + get_estimate_type_id + "&search=" + search.value;
//                alert(sending_value);
                var div_body = document.getElementById("databody");
                $(div_body).empty();
                $.ajax({
                    url: "create_estimate_type/estimate_data_list.php",
                    type: 'POST',
                    data: sending_value,
                    cache: false,
                    success: function (data) {
//                        alert(data);
                        var json = eval(data);

                        for (var i = 0; i < json.length; i++) {
                            load_data_of_table(json[i].id, json[i].name, json[i].dis, div_body, json[i].type);
                        }
                        load_extra_estimate_data();
                        if (json.length == 0) {
                            var a_row = document.createElement("div");
                            a_row.setAttribute("class", "row w3-padding-16 w3-hover-gray");
                            var a_col_01 = document.createElement("div");
                            a_col_01.setAttribute("class", "col-lg-12");
                            var center_text = document.createElement("center");
                            center_text.appendChild(document.createTextNode("data not found"));
                            a_col_01.appendChild(center_text);
                            a_row.appendChild(a_col_01);
                            div_body.appendChild(a_row);

                            var button_body = document.getElementById("button_body");
                            $(button_body).empty();
                            var btn_cancel = document.createElement("button");
                            btn_cancel.setAttribute("class", "w3-theme-dark w3-button w3-input w3-round w3-red");
                            btn_cancel.appendChild(document.createTextNode("Cancel"));
                            btn_cancel.addEventListener("click", function () {
                                cancel_estimate_type();
                            });
                            button_body.appendChild(btn_cancel);
                            var button_body_02 = document.getElementById("button_body_02");
                            $(button_body_02).empty();

                        } else {
                            var button_body = document.getElementById("button_body");
                            $(button_body).empty();
                            var btn_finish = document.createElement("button");
                            btn_finish.setAttribute("class", "w3-theme-dark w3-button w3-input w3-round");
                            btn_finish.appendChild(document.createTextNode("Finish"));
                            btn_finish.addEventListener("click", function () {
                                finish_estimate_type();
                            });
                            button_body.appendChild(btn_finish);

                            var button_body_02 = document.getElementById("button_body_02");
                            $(button_body_02).empty();
                            var btn_cancel = document.createElement("button");
                            btn_cancel.setAttribute("class", "w3-theme-dark w3-button w3-input w3-round ");
                            btn_cancel.appendChild(document.createTextNode("Cancel"));
                            btn_cancel.addEventListener("click", function () {
                                if (confirm("do you want to save as drafts")) {
                                    window.onbeforeunload = null;
                                    window.location.href = "../estimate_settings.php";
                                } else {
                                    cancel_estimate_type();
                                }
                            });
                            button_body_02.appendChild(btn_cancel);

                            var button_body_03 = document.getElementById("button_body_03");
                            $(button_body_03).empty();
                            var btn_del = document.createElement("button");
                            btn_del.setAttribute("class", "w3-theme-dark w3-button w3-input w3-round w3-red");
                            btn_del.appendChild(document.createTextNode("Delete"));
                            btn_del.addEventListener("click", function () {
                                cancel_estimate_type();
                            });
                            button_body_03.appendChild(btn_del);
                        }
//                   
                    }
                });
            }

//            ---------------------------------------------------------------------------------------------------------------------------------

            function load_extra_estimate_data() {

                var sending_value = "id=" + get_estimate_type_id;
//                alert(sending_value);
                var div_body = document.getElementById("databody_02");
                $(div_body).empty();
                $.ajax({
                    url: "out_of_estimate/extra_estimate_data_list.php",
                    type: 'POST',
                    data: sending_value,
                    cache: false,
                    success: function (data) {
//                        alert(data);
                        var json = eval(data);

                        for (var i = 0; i < json.length; i++) {
                            load_data_of_table(json[i].id, json[i].name, json[i].dis, div_body, json[i].type);
                        }
                        if (json.length == 0) {
                            var a_row = document.createElement("div");
                            a_row.setAttribute("class", "row w3-padding-16 w3-hover-gray");
                            var a_col_01 = document.createElement("div");
                            a_col_01.setAttribute("class", "col-lg-12");
                            var center_text = document.createElement("center");
                            center_text.appendChild(document.createTextNode("data not found"));
                            a_col_01.appendChild(center_text);
                            a_row.appendChild(a_col_01);
                            div_body.appendChild(a_row);


                        } else {

                        }
//                   
                    }
                });
            }



//            --------------------------------------------------------------------------------------------------------------------------------------
            function load_data_of_table(id, name, dis, div_body, type_of_data) {

//                alert(id + " " + name + " " + dis + " " + type_of_data);
                var a_row = document.createElement("div");
                a_row.setAttribute("class", "row w3-padding-16 w3-hover-gray");
                var a_col_01 = document.createElement("div");
                a_col_01.setAttribute("class", "col-lg-10");

                var sub_container_fluid = document.createElement("div");
                sub_container_fluid.setAttribute("class", "container-fluid");

                var aA_sub_row_01 = document.createElement("div");
                aA_sub_row_01.setAttribute("class", "row");

                var aA_col_01 = document.createElement("div");
                aA_col_01.setAttribute("class", "col-lg-12");

                var aA_strong = document.createElement("strong");
                aA_strong.setAttribute("class", "w3-large");
                aA_strong.appendChild(document.createTextNode(name));
                aA_col_01.appendChild(aA_strong);
                aA_col_01.appendChild(document.createElement("br"));

                var aA_small = document.createElement("small");
                var aA_i = document.createElement("i");
                aA_i.appendChild(document.createTextNode(type_of_data));
                aA_small.appendChild(aA_i);
                aA_col_01.appendChild(aA_small);


                aA_sub_row_01.appendChild(aA_col_01);
                sub_container_fluid.appendChild(aA_sub_row_01);

                var aA_sub_row_02 = document.createElement("div");
                aA_sub_row_02.setAttribute("class", "row");

                var aA_col_02 = document.createElement("div");
                aA_col_02.setAttribute("class", "col-lg-12 w3-justify");
                aA_col_02.appendChild(document.createTextNode(dis));

                aA_sub_row_02.appendChild(aA_col_02);
                sub_container_fluid.appendChild(aA_sub_row_02);

                var aA_sub_row_03 = document.createElement("div");
                aA_sub_row_03.setAttribute("class", "row");

                var aA_col_03 = document.createElement("div");
                aA_col_03.setAttribute("class", "col-lg-12");



                aA_sub_row_03.appendChild(aA_col_03);
                sub_container_fluid.appendChild(aA_sub_row_03);

                a_col_01.appendChild(sub_container_fluid);

                var a_col_02 = document.createElement("div");
                a_col_02.setAttribute("class", "col-lg-1");
                var btn_goble = document.createElement("button");
                btn_goble.setAttribute("class", "w3-theme-dark w3-button w3-input w3-round");
                var span_btn_goble = document.createElement("span");
                span_btn_goble.setAttribute("class", "fa fa-globe");
                btn_goble.appendChild(span_btn_goble);
//                a_col_02.appendChild(btn_goble);


                var a_col_03 = document.createElement("div");
                a_col_03.setAttribute("class", "col-lg-1");

                var btn_del = document.createElement("button");
                btn_del.setAttribute("class", "w3-red w3-button w3-input w3-round");
                btn_del.addEventListener("click", function () {
                    if (confirm("do you want to delete the record")) {
                        remove_estimate_type_data(id, type_of_data);
                    }
                });
                var span_btn_del = document.createElement("span");
                span_btn_del.setAttribute("class", "fa fa-trash");
                btn_del.appendChild(span_btn_del);
                a_col_03.appendChild(btn_del);

                a_row.appendChild(a_col_01);
                a_row.appendChild(a_col_02);
                a_row.appendChild(a_col_03);



                div_body.appendChild(a_row);
                div_body.appendChild(document.createElement("hr"));

            }
            function remove_estimate_type_data(id, type_of_data) {
            }
            function finish_estimate_type() {
                var sending_value = "id=" + get_estimate_type_id;
//                alert(sending_value);
                $.ajax({
                    url: "create_estimate_type/finalizeing.php",
                    type: 'POST',
                    data: sending_value,
                    cache: false,
                    success: function (data) {
                        if (data == "ok") {
                            window.onbeforeunload = null;
                            window.location.href = "../estimate_settings.php";
                        }
                    }
                });
            }
            function cancel_estimate_type() {
                var sending_value = "id=" + get_estimate_type_id;
//                alert(sending_value);
                $.ajax({
                    url: "create_estimate_type/cancel_.php",
                    type: 'POST',
                    data: sending_value,
                    cache: false,
                    success: function (data) {
                        if (data == "ok") {
                            window.onbeforeunload = null;
                            window.location.href = "../estimate_settings.php";
                        }
                    }
                });
            }
        </script>

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="w3-header">Create New Estimate Type</h1>
                </div>
                <div class="col-lg-3">
                    <!--<button onclick="load_selection()" class="w3-theme-dark w3-button w3-input w3-hover-blue-grey">Add Category</button>-->
                </div>
            </div>
            <div class="row">
                <?php include_once '../../needs/setting_need/page_header_without_image.php'; ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../system_dash_board.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="estimate_list.php">Estimate List</a></li>
                        <li class="breadcrumb-item"><a href="../estimate_settings.php">Estimate Type Settings</a></li>
                        <li class="breadcrumb-item active">Create New Estimate Type</li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="container"><h3 class="w3-header">Estimate</h3></div>
        <div class="container w3-theme-l4 w3-padding-16 w3-round" id="databody">

        </div>
        <div class="container"><h3  class="w3-header">Extra Estimate</h3></div>
        <div class="container w3-theme-l4 w3-padding-16 w3-round" id="databody_02">

        </div>
        <div class="container w3-margin-top">
            <div class="row">              
                <div class="col-lg-2 w3-padding-8" id="button_body"></div>
                <div class="col-lg-2 w3-padding-8" id="button_body_02"></div>
                <div class="col-lg-2 w3-padding-8" id="button_body_03"></div>
                <div class="col-lg-6"></div>
            </div>
        </div>

        <?php
        include_once './create_estimate_type/modal.php';
        include_once '../../Imports/footer/footer_system.php';
        ?>
    </body>
</html>
