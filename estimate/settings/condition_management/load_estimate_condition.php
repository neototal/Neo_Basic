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
        unset($_SESSION['id']);
        include_once '../../../Imports/header/basic_header.php';
        ?>

    </head>
    <body class="w3-theme-light">
        <?php
        include_once '../../../Imports/menu/main_menue.php';
        ?>

        <script type="text/javascript">
            function create_new() {
                window.location.href = "create_new_condition.php";
            }

            $(document).ready(function () {
                showing_state = 1;
                main_loder(showing_state);
            });
            var showing_state = 1;
            function main_loder(showing_state_id) {
                showing_state = showing_state_id;
                var heading_small = document.getElementById("heading_small");
                $(heading_small).empty();


                var get_per_page_count = document.getElementById("get_per_page_count");
                var search_items_txt = document.getElementById("search_items_txt");
                load_data(search_items_txt.value, get_per_page_count.value, "0", showing_state);
            }

            function get_buttons() {
                var search_items_txt = document.getElementById("search_items_txt");
                var get_per_page_count = document.getElementById("get_per_page_count");
//                alert(search_items_txt.value);
                if (search_items_txt.value == "") {
//                    alert('test1');
                    document.getElementById("search_value_btn").style.display = "block";
                    document.getElementById("search_value_btn_close").style.display = "none";
                } else {
                    document.getElementById("search_value_btn").style.display = "none";
                    document.getElementById("search_value_btn_close").style.display = "block";
                }

                var sending_value = "search_value=" + search_items_txt.value + "&count_of_per_page=" + get_per_page_count.value + "&showing_state=" + showing_state;
//                alert(sending_value);
                $.ajax({
                    url: "main_loader/get_count.php",
                    type: 'POST',
                    cache: false,
                    data: sending_value,
                    success: function (data) {
//                        alert(data);
                        var page_button_list = document.getElementById("page_button_list");
                        $(page_button_list).empty();
                        for (var i = 0; i < parseInt(data); i++) {
                            setUp_buttons(i);
                        }
                    }
                });

            }

            function setUp_buttons(i) {

                var page_button_list = document.getElementById("page_button_list");
                var get_per_page_count = document.getElementById("get_per_page_count");

                var search_items_txt = document.getElementById("search_items_txt");

                var btn = document.createElement("button");
                btn.setAttribute("class", "w3-button w3-theme-d2 w3-hover-blue-grey w3-round w3-margin-right");
                btn.appendChild(document.createTextNode(i + 1));
                i = i * parseInt(get_per_page_count.value + "");
                btn.addEventListener("click", function () {
                    load_data(search_items_txt.value, parseInt(get_per_page_count.value + ""), i, showing_state);
                });

                page_button_list.appendChild(btn);
            }
            function load_data(search_value, no_of_count, stating_row_number, showing_state) {
                var div_body = document.getElementById("item_body");
                $(div_body).empty();
                var search_items_txt = document.getElementById("search_items_txt");
                var sending_value = "search_value=" + search_items_txt.value + "&showing_state=" + showing_state + "&no_of_count=" + no_of_count + "&stating_row_number=" + stating_row_number;
//                    alert(sending_value);
                $.ajax({
                    url: "main_loader/list.php",
                    type: 'POST',
                    cache: false,
                    data: sending_value,
                    success: function (data) {
//                            alert(data);
                        var json = eval(data);
                        for (var i = 0; i < json.length; i++) {
                            load_data_of_table(json[i].id, json[i].name, "", div_body);
                        }
                        if (json.length == 0) {
                            var a_row = document.createElement("div");
                            a_row.setAttribute("class", "row");
                            var a_col = document.createElement("div");
                            a_col.setAttribute("class", "col-lg-12 w3-center-align");
                            a_col.appendChild(document.createTextNode("data not found"));
                            a_row.appendChild(a_col);
                            div_body.appendChild(a_row);
                        }
                        get_buttons();

                    }
                });
            }



            function load_data_of_table(id, name, dis, div_body) {
                var a_row = document.createElement("div");
                a_row.setAttribute("class", "row");
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


                sub_container_fluid.appendChild(aA_sub_row_03);

                a_col_01.appendChild(sub_container_fluid);

                var a_col_02 = document.createElement("div");
                a_col_02.setAttribute("class", "col-lg-1");
                var btn_goble = document.createElement("button");
                btn_goble.setAttribute("class", "w3-theme-dark w3-button w3-input w3-round");
                var span_btn_goble = document.createElement("i");
                span_btn_goble.setAttribute("class", "fa fa-globe");
                btn_goble.appendChild(span_btn_goble);
                btn_goble.setAttribute("title", "view recode");
                btn_goble.addEventListener("click", function () {
                    estimate_cat(id);
                });
                a_col_02.appendChild(btn_goble);


                var a_col_03 = document.createElement("div");
                a_col_03.setAttribute("class", "col-lg-1");

                var btn_del = document.createElement("button");
                btn_del.setAttribute("class", "w3-red w3-button w3-input w3-round");
                btn_del.addEventListener("click", function () {
                    if (confirm("do you want to delete the record")) {
                        remove_cat(id);
                    }
                });
                var span_btn_del = document.createElement("i");
                span_btn_del.setAttribute("class", "fa fa-trash");
                btn_del.setAttribute("title", "delete recode");
                btn_del.appendChild(span_btn_del);
                a_col_03.appendChild(btn_del);

                a_row.appendChild(a_col_01);
                a_row.appendChild(a_col_02);
                a_row.appendChild(a_col_03);



                div_body.appendChild(a_row);
                div_body.appendChild(document.createElement("hr"));

            }
            function remove_cat(cat_id) {
                var sending_values = "id=" + cat_id;
                $.ajax({
                    url: "main_loader/remove.php",
                    type: 'POST',
                    data: sending_values,
                    cache: false,
                    success: function (data) {
//                        alert(data);
                        main_loder(showing_state);
                    }
                });

            }
            function estimate_cat(cat_id) {
                var sending_value = "id=" + cat_id;
//                alert(sending_value);
                $.ajax({
                    url: "main_loader/set_cat_id.php",
                    type: 'POST',
                    data: sending_value,
                    cache: false,
                    success: function (data) {
                        if (data == "ok") {
                            window.location.href = "create_new_condition.php";
                        } else {
                            alert(data);
                        }
                    }
                });
            }
            function draft_estimate_types() {
                showing_state = 0;
                main_loder(0);
                var heading_small = document.getElementById("heading_small");
                $(heading_small).empty();
                heading_small.appendChild(document.createTextNode("Draft Estimate Type"));
            }
            function estimate_type_active() {
                showing_state = 1;
                main_loder(1);
                var heading_small = document.getElementById("heading_small");
                $(heading_small).empty();
            }
            function cancel_search() {
                $("#search_items_txt").val('');
                main_loder();
            }
        </script>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="w3-header">Category Type & Conditions<br> <small id="heading_small" class="w3-text-red">gfd</small></h1>

                </div>
                <div class="col-lg-5">
                    <!--<input type="text"  placeholder="search estimate type"  class="w3-input w3-border w3-border-black ">-->
                    <div class="input-group">
                        <input type="text" class="form-control" id="search_items_txt"  autocomplete="off" placeholder="search estimate type">
                        <span class="input-group-btn">
                            <button class="btn btn-default" id="search_value_btn" onclick="main_loder()" title="search" ><span class="fa fa-search"></span></button>
                            <button class="btn btn-default" id="search_value_btn_close" onclick="cancel_search()" style="display: none;"  title="cancel search" ><i class="fa fa-times" aria-hidden="true"></i></button>
                        </span>

                    </div>
                </div>
                <!--                <div class="col-lg-1">
                                    <button class="w3-button w3-input w3-round w3-theme-dark w3-margin-right" title="Search" onclick="main_loder()"><i class="fa fa-search"></i></button>
                                </div> -->
                <div class="col-lg-1">
                    <div class="w3-dropdown-hover w3-hide-small" style="width: 100%;">
                        <button class="w3-button w3-round  w3-theme-dark w3-input" title="Advance Search" ><i class="fa fa-cogs"></i></button>
                        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width: 300px">
                            <button class="w3-button w3-bar-item" onclick="estimate_type_active()" >Show Category Type List</button>
                            <button class="w3-button w3-bar-item" onclick="draft_estimate_types()">Show Draft Category Type</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6"></div>
                <div class="col-lg-3">

                </div>
                <div class="col-lg-3">
                    <button onclick="create_new()" class="w3-theme-dark w3-round w3-button w3-input w3-hover-blue-grey"> Create New Estimate Type</button>
                </div>


            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../system_dash_board.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="estimate_list.php">Estimate List</a></li>
                        <li class="breadcrumb-item active">Category Type & Condition Settings</li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="container w3-margin-top w3-theme-l4 w3-padding-16 w3-card-2 w3-round" id="item_body">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <script type="text/javascript">


                    </script>
                </div>
                <div class="col-lg-8">
                    <div class="w3-bar w3-right-align w3-margin" id="page_button_list">

                    </div>
                </div>
                <div class="col-lg-2">
                    <select class="w3-input w3-section" id="get_per_page_count" onchange="main_loder()">
                        <option value="10">Per page 10</option>
                        <option value="20">Per page 20</option>
                        <option value="30">Per page 30</option>
                        <option value="50">Per page 50</option>
                    </select>
                </div>
            </div>
        </div>





        <?php
        include_once './modal.php';
        include_once '../../../Imports/footer/footer_system.php';
        ?>
    </body>
</html>
