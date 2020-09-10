          function add_new_work() {
                $("#myModal").modal('show');

                var iHead = document.getElementById("modal_head");
                $(iHead).empty();

                var iBody = document.getElementById("modal_body_from");
                $(iBody).empty();

                var iFooter = document.getElementById("modal_footer");
                $(iFooter).empty();

                var iError = document.getElementById("error_id");
                $(iError).empty();

                iHead.appendChild(document.createTextNode("Add new work"));

                var a_row = document.createElement("div");
                a_row.setAttribute("class", "row w3-margin-top");

                var a_col_01 = document.createElement("div");
                a_col_01.setAttribute("class", "col-lg-12");

                var a_input = document.createElement("input");
                a_input.setAttribute("class", "w3-input w3-border w3-border-black");
                a_input.setAttribute("type", "text");
                a_input.setAttribute("placeholder", "camera installing example technical work");
                a_input.addEventListener("keydown", function () {
                    a_input.setAttribute("class", "w3-input w3-border w3-border-black");
                    $(iError).empty();
                });

                a_col_01.appendChild(document.createTextNode("Technical Work Name"));
                a_col_01.appendChild(a_input);
                a_row.appendChild(a_col_01);

                var b_row = document.createElement("div");
                b_row.setAttribute("class", "row w3-margin-top");

                var b_col_01 = document.createElement("div");
                b_col_01.setAttribute("class", "col-lg-12");
                b_col_01.appendChild(document.createTextNode("Description"));

                var b_text_dis = document.createElement("textarea");
                b_text_dis.setAttribute("class", "w3-input w3-border w3-border-black");
                b_text_dis.setAttribute("placeholder", "Note :");
                b_text_dis.style.height = "100px";
                b_col_01.appendChild(b_text_dis);



                b_row.appendChild(b_col_01);

                var c_row = document.createElement("div");
                c_row.setAttribute("class", "row w3-margin-top");
                var c_col_01 = document.createElement("div");
                c_col_01.setAttribute("class", "col-lg-6");
                c_col_01.appendChild(document.createTextNode("VSP Price (LKR)"));

                var c_input_text_vsp = document.createElement("input");
                c_input_text_vsp.setAttribute("class", "w3-input w3-border w3-border-black");
                c_input_text_vsp.setAttribute("type", "number");
                c_input_text_vsp.setAttribute("placeholder", "0000.00 example price hear");

                c_input_text_vsp.addEventListener("keydown", function () {
                    c_input_text_vsp.setAttribute("class", "w3-input w3-border w3-border-black");
                    $(iError).empty();
                });

                c_col_01.appendChild(c_input_text_vsp);
                c_row.appendChild(c_col_01);

                var c_col_02 = document.createElement("div");
                c_col_02.setAttribute("class", "col-lg-6");
                c_col_02.appendChild(document.createTextNode("Unit for mesure"));

                var c_input_text_unit_of_mesure = document.createElement("input");
                c_input_text_unit_of_mesure.setAttribute("type", "text");
                c_input_text_unit_of_mesure.setAttribute("class", "w3-input w3-border w3-border-black");
                c_input_text_unit_of_mesure.setAttribute("placeholder", "per camera example hear")
                c_col_02.appendChild(c_input_text_unit_of_mesure);
                c_row.appendChild(c_col_02);




                var d_row = document.createElement("div");
                d_row.setAttribute("class", "row w3-margin-top");

                var d_col_01 = document.createElement("div");
                d_col_01.setAttribute("class", "col-lg-4");
                d_col_01.appendChild(document.createTextNode("Dealer Rate %"));

                var d_input_text_dealer = document.createElement("input");
                d_input_text_dealer.setAttribute("type", "number");
                d_input_text_dealer.setAttribute("class", "w3-border-black w3-border w3-input");
                d_input_text_dealer.setAttribute("placeholder", "10% rate hear ");

                d_input_text_dealer.addEventListener("keydown", function () {
                    d_input_text_dealer.setAttribute("class", "w3-input w3-border w3-border-black");
                    $(iError).empty();
                });

                d_col_01.appendChild(d_input_text_dealer);


                var d_col_02 = document.createElement("div");
                d_col_02.setAttribute("class", "col-lg-4");
                d_col_02.appendChild(document.createTextNode("Budget Rate %"));

                var d_input_text_budget = document.createElement("input");
                d_input_text_budget.setAttribute("type", "number");
                d_input_text_budget.setAttribute("class", "w3-border-black w3-border w3-input");
                d_input_text_budget.setAttribute("placeholder", "20% rate hear ");

                d_input_text_budget.addEventListener("keydown", function () {
                    d_input_text_budget.setAttribute("class", "w3-input w3-border w3-border-black");
                    $(iError).empty();
                });

                d_col_02.appendChild(d_input_text_budget);


                var d_col_03 = document.createElement("div");
                d_col_03.setAttribute("class", "col-lg-4");
                d_col_03.appendChild(document.createTextNode("Corporate Rate %"));

                var d_input_text_cooperate = document.createElement("input");
                d_input_text_cooperate.setAttribute("type", "number");
                d_input_text_cooperate.setAttribute("class", "w3-border-black w3-border w3-input");
                d_input_text_cooperate.setAttribute("placeholder", "70% rate hear ");

                d_input_text_cooperate.addEventListener("keydown", function () {
                    d_input_text_cooperate.setAttribute("class", "w3-input w3-border w3-border-black");
                    $(iError).empty();
                });

                d_col_03.appendChild(d_input_text_cooperate);


                d_row.appendChild(d_col_01);
                d_row.appendChild(d_col_02);
                d_row.appendChild(d_col_03);


                iBody.appendChild(a_row);
                iBody.appendChild(b_row);
                iBody.appendChild(c_row);
                iBody.appendChild(d_row);


                var btn_save = document.createElement("button");
                btn_save.setAttribute("class", "w3-button w3-theme-dark w3-round");
                btn_save.appendChild(document.createTextNode("create new work"));

                btn_save.addEventListener("click", function () {
                    save_data(a_input, b_text_dis, c_input_text_vsp, d_input_text_dealer, d_input_text_budget, d_input_text_cooperate, c_input_text_unit_of_mesure, iError);
                });

                iFooter.appendChild(btn_save);



            }
            function save_data(obj_name, obj_dis, obj_vsp, obj_delar, obj_budget, obj_copurate, obj_unit, error_id) {
                if (obj_name.value == "") {
                    obj_name.setAttribute("class", "w3-input w3-border w3-border-red w3-red");
                    error_id.appendChild(document.createTextNode("name field cant be empty"));
                } else if (obj_vsp.value == "") {
                    obj_vsp.setAttribute("class", "w3-input w3-border w3-border-red w3-red");
                    error_id.appendChild(document.createTextNode("vsp price field cant be empty"));
                } else if (obj_delar.value == "") {
                    obj_delar.setAttribute("class", "w3-input w3-border w3-border-red w3-red");
                    error_id.appendChild(document.createTextNode("dealer price rate field cant be empty"));
                } else if (obj_budget.value == "") {
                    obj_budget.setAttribute("class", "w3-input w3-border w3-border-red w3-red");
                    error_id.appendChild(document.createTextNode("budget price rate field cant be empty"));
                } else if (obj_copurate.value == "") {
                    obj_copurate.setAttribute("class", "w3-input w3-border w3-border-red w3-red");
                    error_id.appendChild(document.createTextNode("corporate price rate field cant be empty"));
                } else {
                    var sending_value = "name=" + obj_name.value + "&dis=" + obj_dis.value + "&vsp=" + obj_vsp.value + "&delar=" + obj_delar.value + "&budget=" + obj_budget.value + "&copurate=" + obj_copurate.value + "&unit=" + obj_unit.value;
                    $.ajax({
                        url: "tecnial_works/add_new.php",
                        type: 'POST',
                        data: sending_value,
                        cache: false,
                        success: function (data) {
                            $("#myModal").modal('hide');
                            main_loder();
                        }
                    });
                }

            }/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


