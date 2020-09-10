function other_list() {
    var header = document.getElementById("modal_head");
    $(header).empty();
    header.appendChild(document.createTextNode("Select Others works"));

    var body = document.getElementById("modal_body_from");
    $(body).empty();

    var footer = document.getElementById("modal_footer");
    $(footer).empty();
    var a_row = document.createElement("div");
    a_row.setAttribute("class", "row");

    var a_col_01 = document.createElement("div");
    a_col_01.setAttribute("class", "col-lg-8");

    var input_text = document.createElement("input");
    input_text.setAttribute("class", "w3-input w3-border w3-border-black");
    input_text.setAttribute("placeholder", "search technical works");
    a_col_01.appendChild(input_text);

    var a_col_02 = document.createElement("div");
    a_col_02.setAttribute("class", "col-lg-4");

    var a_reload = document.createElement("button");
    a_reload.setAttribute("class", "w3-theme-dark w3-button w3-input w3-hover-blue-grey w3-round");
    a_reload.addEventListener("click", function () {
        load_others_list(this.value, b_container_body);
    });
    var add_span = document.createElement("span");
    add_span.setAttribute("class", "fa fa-refresh");
    a_reload.appendChild(add_span);
    a_col_02.appendChild(a_reload);

    a_row.appendChild(a_col_01);
    a_row.appendChild(a_col_02);

    var b_row = document.createElement("div");
    b_row.setAttribute("class", "row");
    var b_col_01 = document.createElement("div");
    b_col_01.setAttribute("class", "col-lg-12");

    var b_container_body = document.createElement("div");
    b_container_body.setAttribute("class", "container-fluid w3-theme-light w3-round w3-margin-top ");

    b_col_01.appendChild(b_container_body);
    load_others_list("", b_container_body);
    input_text.addEventListener("keydown", function () {
        load_others_list(this.value, b_container_body);
    });

    b_row.appendChild(b_col_01);


    body.appendChild(a_row);
    body.appendChild(b_row);



}

function load_others_list(search_value, body_div) {
    $(body_div).empty();
    var search_values = "search=" + search_value;
    $.ajax({
        url: "create_estimate_type/others/select_others_list.php",
        type: 'POST',
        data: search_value,
        cache: false,
        success: function (data) {
            alert(data);
            var json = eval(data);

            for (var i = 0; i < json.length; i++) {
                load_tecnical_works_to_table(json[i].idtecnical_works, json[i].name, body_div);
            }
            if (json.length == 0) {
                var a_div_row = document.createElement("div");
                a_div_row.setAttribute("class", "row ");
                var a_div_col_01 = document.createElement("div");
                a_div_col_01.setAttribute("class", "col-lg-12 w3-margin");

                var a_center = document.createElement("center");
                a_center.appendChild(document.createTextNode("data not found"));
                a_div_col_01.appendChild(a_center);

                a_div_row.appendChild(a_div_col_01);

                body_div.appendChild(a_div_row);
            }
        }
    });
}
function load_others_to_table(id, name, body_div) {
    var a_div_row = document.createElement("div");
    a_div_row.setAttribute("class", "row w3-hover-gray w3-border-bottom w3-border-top w3-border-black");

    var a_div_col_01 = document.createElement("div");
    a_div_col_01.setAttribute("class", "col-lg-8 w3-margin-top");
    a_div_col_01.appendChild(document.createTextNode(name));
    a_div_row.appendChild(a_div_col_01);

    var a_div_col_02 = document.createElement("div");
    a_div_col_02.setAttribute("class", "col-lg-4");

    var a_btn_select = document.createElement("button");
    a_btn_select.setAttribute("class", "w3-theme-dark w3-button w3-hover-blue-grey w3-margin w3-round");
    a_btn_select.appendChild(document.createTextNode("select"));
    a_btn_select.addEventListener("click", function () {
        save_update_tecnical_work(id, a_div_row, body_div);
        a_div_row.remove();
    });

    a_div_col_02.appendChild(a_btn_select);
    a_div_row.appendChild(a_div_col_02);
    body_div.appendChild(a_div_row);

}
function save_update_tecnical_work(id, div_row, body_div) {
    var sending_value = "id=" + id;
    $.ajax({
        url: "create_estimate_type/others/set_estimate_type_others.php",
        type: 'POST',
        data: sending_value,
        cache: false,
        success: function (data) {
            load_estimate_type();
            load_others_list("", body_div);
        }
    });
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


