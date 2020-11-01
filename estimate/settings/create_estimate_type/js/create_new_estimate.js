function onLoad_estimate_catergory() {
//    alert('test');

    var modal_head = document.getElementById("modal_head");
    $(modal_head).empty();
    modal_head.appendChild(document.createTextNode("Select Wizard Category "));

    var modal_body_from = document.getElementById("modal_body_from");
    $(modal_body_from).empty();


    var a_row = document.createElement("div");
    a_row.setAttribute("class", "row");

    var a_col_01 = document.createElement("div");
    a_col_01.setAttribute("class", "col-lg-8");

    var input_text = document.createElement("input");
    input_text.setAttribute("class", "w3-input w3-border w3-border-black");
    input_text.setAttribute("placeholder", "search category of estimate");
    a_col_01.appendChild(input_text);

    var a_col_02 = document.createElement("div");
    a_col_02.setAttribute("class", "col-lg-4");

    var a_reload = document.createElement("button");
    a_reload.setAttribute("class", "w3-theme-dark w3-button w3-input w3-hover-blue-grey w3-round");
    a_reload.addEventListener("click", function () {
        load_cat("", b_container_body);
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
//    alert("test1");
    load_cat("", b_container_body);
    input_text.addEventListener("keydown", function () {
        load_cat(this.value, b_container_body);
    });

    b_row.appendChild(b_col_01);


    modal_body_from.appendChild(a_row);
    modal_body_from.appendChild(b_row);


    var modal_footer = document.getElementById("modal_footer");
    $(modal_footer).empty();
    modal_footer.style.display = "none";
    $("#myModal").modal('show');
}

function load_cat(search_value, body_div) {
//    alert("test");
    $(body_div).empty();
    var search_values = "name=" + search_value;
//    alert(search_values);
    $.ajax({
        url: "condition_management/catertory_estimate/load_data.php",
        type: 'POST',
        data: search_values,
        cache: false,
        success: function (data) {
//            alert(data);
            var json = eval(data);
            for (var i = 0; i < json.length; i++) {
                load_catergory_to_table(json[i].id, json[i].name, json[i].dis, body_div);
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
function load_catergory_to_table(id, name, dis, body_div) {
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
        onLoad_estimate(id);
        a_div_row.remove();
    });

    a_div_col_02.appendChild(a_btn_select);
    a_div_row.appendChild(a_div_col_02);
    body_div.appendChild(a_div_row);

}

function onLoad_estimate(cat_id) {
    var modal_head = document.getElementById("modal_head");
    $(modal_head).empty();
    modal_head.appendChild(document.createTextNode("Cerate Estimate Wizard"));


    var modal_body_from = document.getElementById("modal_body_from");
    $(modal_body_from).empty();


    var a_row = document.createElement("div");
    a_row.setAttribute("class", "row");
    var a_col = document.createElement("div");
    a_col.setAttribute("class", "col-lg-12");
    var a_input = document.createElement("input");
    a_input.setAttribute("class", "w3-input w3-border w3-border-black");
    a_input.setAttribute("placeholder", "ahd camera pack with cat cable example for packaging name");
    a_col.appendChild(document.createTextNode("Estimate Packageing name"));
    a_col.appendChild(a_input);
    a_row.appendChild(a_col);

    var b_row = document.createElement("div");
    b_row.setAttribute("class", "row w3-margin-top");
    var b_col = document.createElement("div");
    b_col.setAttribute("class", "col-lg-12");
    var b_textarea = document.createElement("textarea");
    b_textarea.style.height = "100px";
    b_textarea.setAttribute("class", "w3-input w3-border-black w3-border");
    b_textarea.setAttribute("placeholder", "Note :");
    b_col.appendChild(document.createTextNode("Description"));
    b_col.appendChild(b_textarea);
    b_row.appendChild(b_col);

    modal_body_from.appendChild(a_row);
    modal_body_from.appendChild(b_row);


    var modal_footer = document.getElementById("modal_footer");
    $(modal_footer).empty();
    var error = document.getElementById("error_id");
    $(error).empty();

    var footer_button = document.createElement("button");
    footer_button.setAttribute("class", "w3-button w3-border w3-theme-dark w3-round");
    footer_button.appendChild(document.createTextNode("Create Estimate"));
    footer_button.addEventListener("click", function () {
        setup_data(a_input, b_textarea, cat_id, error);
    });

    modal_footer.appendChild(footer_button);

    modal_footer.style.display = "block";




    $("#myModal").modal('show');
}
function setup_data(obj_input, obj_text, cat_id, error_id) {
    if (obj_input.value == "") {
        error_id.appendChild(document.createTextNode("package name field cant be empty"));
        obj_input.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_input.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_input.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else if (obj_text.value == "") {
        error_id.appendChild(document.createTextNode("descrption field cant be empty"));
        obj_text.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_text.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_text.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else {
        var sending_value = "name=" + obj_input.value + "&dis=" + obj_text.value + "&cat_id=" + cat_id;
//                    alert(sending_value);
        $.ajax({
            url: "create_estimate_type/add_estimate_types.php",
            type: 'POST',
            cache: false,
            data: sending_value,
            success: function (data) {
                get_estimate_type_id = data;
                load_selection(1);
                load_estimate_type();
            }
        });
    }
}

var get_estimate_type_id = 0;
var get_estimate_in_out_state = 0;
function load_selection(in_out_state) {
    get_estimate_in_out_state = in_out_state;
    var modal_body_from = document.getElementById("modal_body_from");
    $(modal_body_from).empty();

    var modal_head = document.getElementById("modal_head");
    $(modal_head).empty();

    var modal_footer = document.getElementById("modal_footer");
    $(modal_footer).empty();
    modal_footer.style.display = "none";

    var error = document.getElementById("error_id");
    $(error).empty();


    if (in_out_state == 1) {
        modal_head.appendChild(document.createTextNode("Select category for estimate "));
    } else {
        modal_head.appendChild(document.createTextNode("Select category for Out Of Estimate "));
    }


    var a_row = document.createElement("div");
    a_row.setAttribute("class", "row");
    var a_col = document.createElement("div");
    a_col.setAttribute("class", "col-lg-12 w3-margin-top");
    var a_button = document.createElement("button");
    a_button.setAttribute("class", "w3-button w3-theme-dark w3-input w3-hover-blue-grey w3-round w3-padding");
    a_button.appendChild(document.createTextNode("To select item list"));
    a_button.addEventListener("click", function () {
        item_list();
    });
    a_col.appendChild(a_button);
    a_row.appendChild(a_col);

    var b_row = document.createElement("div");
    b_row.setAttribute("class", "row");
    var b_col = document.createElement("div");
    b_col.setAttribute("class", "col-lg-12 w3-margin-top");
    var b_button = document.createElement("button");
    b_button.setAttribute("class", "w3-button w3-theme-dark w3-input w3-hover-blue-grey w3-round w3-padding");
    b_button.appendChild(document.createTextNode("To select hardware item list"));
    b_button.addEventListener("click", function () {
        hardware_item_list();
    });
    b_col.appendChild(b_button);
    b_row.appendChild(b_col);

    var c_row = document.createElement("div");
    c_row.setAttribute("class", "row");
    var c_col = document.createElement("div");
    c_col.setAttribute("class", "col-lg-12 w3-margin-top");
    var c_button = document.createElement("button");
    c_button.setAttribute("class", "w3-button w3-theme-dark w3-input w3-hover-blue-grey w3-round w3-padding");
    c_button.appendChild(document.createTextNode("To select tecnical works"));
    c_button.addEventListener("click", function () {
        tecnical_work_list();
    });
    c_col.appendChild(c_button);
    c_row.appendChild(c_col);


    var d_row = document.createElement("div");
    d_row.setAttribute("class", "row");
    var d_col = document.createElement("div");
    d_col.setAttribute("class", "col-lg-12 w3-margin-top");
    var d_button = document.createElement("button");
    d_button.setAttribute("class", "w3-button w3-theme-dark w3-input w3-hover-blue-grey w3-round w3-padding");
    d_button.appendChild(document.createTextNode("To select other list"));
    d_button.addEventListener("click", function () {

        other_list();
    })
    d_col.appendChild(d_button);
    d_row.appendChild(d_col);



    modal_body_from.appendChild(a_row);
    modal_body_from.appendChild(b_row);
    modal_body_from.appendChild(c_row);
    modal_body_from.appendChild(d_row);

    $("#myModal").modal('show');
}
