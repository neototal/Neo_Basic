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
        $_SESSION['title'] = "Other";
        include_once '../Imports/header/basic_header.php';
        ?>
        <script type="text/javascript" src="others/add_new.js"></script>
    <body class="w3-theme-light">
        <?php
        include_once '../Imports/menu/main_menue.php';
        ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h1 class="w3-header">Other Items</h1>

                </div>
                <div class="col-lg-4">
                    <input type="text" onkeypress="main_loder()"  placeholder="search other items" id="search_items_txt" class="w3-input w3-border w3-border-black ">
                </div>
                <div class="col-lg-1">
                    <button class="w3-theme-dark w3-round w3-input w3-hover-blue-grey"><span class="fa fa-cog"></span></button>
                </div>
                <div class="col-lg-2">
                    <button class="w3-theme-dark w3-button w3-input w3-hover-blue-grey" onclick="add_new_work()">Add New</button>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../system_dash_board.php">Home</a></li>
                        <li class="breadcrumb-item active">Other Items</li>
                    </ul>
                </div>
            </div>

        </div>
<!-------------------------------------------------------------------------------------------------------------------------------------->
        
        
        <div class="container w3-margin-top w3-theme-l4 w3-padding-16 w3-card-2 w3-round" id="item_body">
            <script type="text/javascript">
                function remove_item(id) {
                    var sending_value = "id=" + id;
                    $.ajax({
                        url: "others/del.php",
                        type: 'POST',
                        cache: false,
                        data: sending_value,
                        success: function (data) {
                            main_loder();
                        }
                    });
                }

                $(document).ready(function () {
                    main_loder();
                });
                function main_loder() {
                    var get_per_page_count = document.getElementById("get_per_page_count");
                    var search_items_txt = document.getElementById("search_items_txt");
                    load_data(search_items_txt.value, get_per_page_count.value, "0");
                }

                function get_buttons() {
                    var search_items_txt = document.getElementById("search_items_txt");
                    var get_per_page_count = document.getElementById("get_per_page_count");

                    var sending_value = "search_value=" + search_items_txt.value + "&count_of_per_page=" + get_per_page_count.value;
//                    alert(sending_value);
                    $.ajax({
                        url: "others/get_count.php",
                        type: 'POST',
                        cache: false,
                        data: sending_value,
                        success: function (data) {
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
                        load_data(search_items_txt.value, parseInt(get_per_page_count.value + ""), i);
                    });

                    page_button_list.appendChild(btn);
                }
                function load_data(search_value, no_of_count, stating_row_number) {
                    var div_body = document.getElementById("item_body");
                    $(div_body).empty();

                    var sending_value = "search_value=" + search_value + "&no_of_count=" + no_of_count + "&stating_row_number=" + stating_row_number;
//                    alert(sending_value);
                    $.ajax({
                        url: "others/list.php",
                        type: 'POST',
                        cache: false,
                        data: sending_value,
                        success: function (data) {
//                            alert(data);
                            var json = eval(data);
                            for (var i = 0; i < json.length; i++) {
                                load_data_of_table(json[i].iditem_list, json[i].name, json[i].dis, json[i].unit_of_measher, div_body);
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



                function load_data_of_table(id, name, dis,  unit_for_mesure, div_body) {
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

                    var aA_col_03_b = document.createElement("b");
                    aA_col_03_b.appendChild(document.createTextNode(unit_for_mesure));
                    aA_col_03.appendChild(aA_col_03_b);

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
                    a_col_02.appendChild(btn_goble);


                    var a_col_03 = document.createElement("div");
                    a_col_03.setAttribute("class", "col-lg-1");

                    var btn_del = document.createElement("button");
                    btn_del.setAttribute("class", "w3-red w3-button w3-input w3-round");
                    btn_del.addEventListener("click", function () {
                        if (confirm("do you want to delete the record")) {
                            remove_item(id);
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
            </script>
            <!--            <div class="row">
                            <div class="col-lg-9">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <strong class="w3-large">IRPF</strong>
                                            <small><i>cameras</i></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            test test testtest test testtest test testtest test testtest test test
                                            test test testtest test testtest test testtest test testtest test test
                                            test test testtest test testtest test testtest test testtest test test
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <b>2 years warranty</b>
            
                                        </div>
                                    </div>
                                </div>
            
                            </div>
            
                            <div class="col-lg-1">
                                <button class="w3-theme-dark w3-button w3-input w3-round">
                                    <span class="fa fa-globe"></span>
                                </button>
                            </div>
            
                            <div class="col-lg-1">
                                <button class="w3-theme-dark w3-button w3-input w3-round">
                                    <span class="fa fa-edit"></span>
                                </button>
                            </div>
                            <div class="col-lg-1">
                                <button class="w3-red w3-button w3-input w3-round">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </div>
            
                        </div>-->

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <script type="text/javascript">


                    </script>
                </div>
                <div class="col-lg-8">
                    <div class="w3-bar w3-right-align w3-margin" id="page_button_list">
<!--                        <button  class="w3-button w3-theme-d2 w3-hover-blue-grey w3-round">&laquo;</button>
                        <button class="w3-button w3-theme-d2 w3-hover-blue-grey w3-round">1</button>
                        <button class="w3-button w3-theme-d2 w3-hover-blue-grey w3-round">2</button>
                        <button class="w3-button w3-theme-d2 w3-hover-blue-grey w3-round">3</button>
                        <button  class="w3-button w3-theme-d2 w3-hover-blue-grey w3-round">&raquo;</button>                       -->
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
        
        
        
        
<!-------------------------------------------------------------------------------------------------------------------------------------->
        <?php
        include_once './modal/modal_setup_items.php';
        include_once '../Imports/footer/footer_system.php';
        ?>
    </body>
</html>
