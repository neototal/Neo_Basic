function create_item(id, name) {
    var header = document.getElementById("modal_head");
    $(header).empty();
    header.appendChild(document.createTextNode("Create Hardware Item for " + name));


    var body = document.getElementById("modal_body_from");
    $(body).empty();

    var a_div_row = document.createElement("div");
    a_div_row.setAttribute("class", "row");

    var a_div_col_01 = document.createElement("div");
    a_div_col_01.setAttribute("class", "col-lg-12");

    var a_input_text_name = document.createElement("input");
    a_input_text_name.setAttribute("class", "w3-input w3-border w3-border-black");
    a_input_text_name.setAttribute("placeholder", "1/2 inch name example size hear");

    a_div_col_01.appendChild(document.createTextNode("Sub item classification"));
    a_div_col_01.appendChild(a_input_text_name);
    a_div_row.appendChild(a_div_col_01);


    a_div_row.appendChild(a_div_col_01);


    var b_div_row = document.createElement("div");
    b_div_row.setAttribute("class", "row w3-margin-top");

    var b_div_col_01 = document.createElement("div");
    b_div_col_01.setAttribute("class", "col-lg-6");

    var b_input_text_unit = document.createElement("input");
    b_input_text_unit.setAttribute("class", "w3-input w3-border w3-border-black");
    b_input_text_unit.setAttribute("placeholder", "Box example unit of measure");
    b_input_text_unit.setAttribute("type", "text");

    b_div_col_01.appendChild(document.createTextNode("Unit Of Measure"));
    b_div_col_01.appendChild(b_input_text_unit);

    var b_div_col_02 = document.createElement("div");
    b_div_col_02.setAttribute("class", "col-lg-6");

    var b_input_text_vsp = document.createElement("input");
    b_input_text_vsp.setAttribute("class", "w3-input w3-border w3-border-black");
    b_input_text_vsp.setAttribute("placeholder", "00 example of vsp");
    b_input_text_vsp.setAttribute("type", "number");

    b_div_col_02.appendChild(document.createTextNode("VSP - LKR"));
    b_div_col_02.appendChild(b_input_text_vsp);

    b_div_row.appendChild(b_div_col_01);
    b_div_row.appendChild(b_div_col_02);


    var c_row = document.createElement("div");
    c_row.setAttribute("class", "row");

    var c_col_01 = document.createElement("div");
    c_col_01.setAttribute("class", "col-lg-4");
    c_col_01.appendChild(document.createTextNode("Dealer Rate %"));

    var c_input_text_dealer = document.createElement("input");
    c_input_text_dealer.setAttribute("type", "number");
    c_input_text_dealer.setAttribute("class", "w3-border-black w3-border w3-input");
    c_input_text_dealer.setAttribute("placeholder", "10% rate hear ");

    c_col_01.appendChild(c_input_text_dealer);


    var c_col_02 = document.createElement("div");
    c_col_02.setAttribute("class", "col-lg-4");
    c_col_02.appendChild(document.createTextNode("Budget Rate %"));

    var c_input_text_budget = document.createElement("input");
    c_input_text_budget.setAttribute("type", "number");
    c_input_text_budget.setAttribute("class", "w3-border-black w3-border w3-input");
    c_input_text_budget.setAttribute("placeholder", "20% rate hear ");

    c_col_02.appendChild(c_input_text_budget);


    var c_col_03 = document.createElement("div");
    c_col_03.setAttribute("class", "col-lg-4");
    c_col_03.appendChild(document.createTextNode("Corporate Rate %"));

    var c_input_text_cooperate = document.createElement("input");
    c_input_text_cooperate.setAttribute("type", "number");
    c_input_text_cooperate.setAttribute("class", "w3-border-black w3-border w3-input");
    c_input_text_cooperate.setAttribute("placeholder", "70% rate hear ");

    c_col_03.appendChild(c_input_text_cooperate);

    c_row.appendChild(c_col_01);
    c_row.appendChild(c_col_02);
    c_row.appendChild(c_col_03);

    var d_row = document.createElement("div");
    d_row.setAttribute("class", "row");

    var d_col_01 = document.createElement("div");
    d_col_01.setAttribute("class", "col-lg-12");

    var d_input_total = document.createElement("input");
    d_input_total.setAttribute("class", "w3-border w3-border-black w3-input");
    d_input_total.setAttribute("placeholder", "0 example of stock");

    d_col_01.appendChild(document.createTextNode("Opening stock"));
    d_col_01.appendChild(d_input_total);


    d_row.appendChild(d_col_01);


    body.appendChild(a_div_row);
    body.appendChild(document.createElement("hr"));
    body.appendChild(b_div_row);
    body.appendChild(document.createElement("hr"));
    body.appendChild(c_row);
    body.appendChild(document.createElement("hr"));
    body.appendChild(d_row);


    var footer = document.getElementById("modal_footer");
    $(footer).empty();

    var btn_save = document.createElement("button");
    btn_save.setAttribute("class", "w3-theme-dark w3-button w3-round");
    btn_save.appendChild(document.createTextNode("create new item"));
    btn_save.addEventListener("click", function () {
        add_data(a_input_text_name, b_input_text_unit, id, b_input_text_vsp, c_input_text_dealer, c_input_text_budget, c_input_text_cooperate, d_input_total);
    });

    $("#error_id").empty();

    footer.appendChild(btn_save);
}
function add_data(obj_name, obj_unit_of_measure, type_of_hardware_id, obj_vsp, obj_dealer, obj_budget, obj_coperate, obj_total_stock) {
    var error_id = document.getElementById("error_id");
    if (obj_name.value == "") {
        error_id.appendChild(document.createTextNode("name field cant be empty"));
        obj_name.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_name.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_name.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else if (obj_unit_of_measure.value == "") {
        error_id.appendChild(document.createTextNode("unit of measure field cant be empty"));
        obj_unit_of_measure.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_unit_of_measure.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_unit_of_measure.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else if (obj_vsp.value == "") {
        error_id.appendChild(document.createTextNode("vsp value cant be empty"));
        obj_vsp.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_vsp.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_vsp.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else if (obj_dealer.value == "") {
        error_id.appendChild(document.createTextNode("Dealer value cant be empty"));
        obj_dealer.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_dealer.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_dealer.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else if (obj_budget.value == "") {
        error_id.appendChild(document.createTextNode("Budget field cant be empty"));
        obj_budget.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_budget.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_budget.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else if (obj_coperate.value == "") {
        error_id.appendChild(document.createTextNode("Corporate field cant be empty"));
        obj_coperate.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_coperate.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_coperate.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else {
        var sending_value = "type_id=" + type_of_hardware_id + "&name=" + obj_name.value + "&unit_of_measure=" + obj_unit_of_measure.value +
                "&vsp=" + obj_vsp.value + "&dealer=" + obj_dealer.value + "&budget=" + obj_budget.value + "&coperate=" + obj_coperate.value + "&total_stock=" + obj_total_stock.value;
        $.ajax({
            url: "hardware_item_list/add_new.php",
            type: 'POST',
            data: sending_value,
            cache: false,
            success: function (data) {
                main_loder();
                if (data == "") {
                    $("#myModal").modal('hide');
                }else{
                    error_id.appendChild(document.createTextNode(data));
                }
            }
        });
    }
}
