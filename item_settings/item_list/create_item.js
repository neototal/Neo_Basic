function create_item(id, name) {
    var header = document.getElementById("modal_head");
    $(header).empty();
    header.appendChild(document.createTextNode("Create item for " + name));

    var body = document.getElementById("modal_body_from");
    $(body).empty();

    var a_div_row = document.createElement("div");
    a_div_row.setAttribute("class", "row");

    var a_div_col_01 = document.createElement("div");
    a_div_col_01.setAttribute("class", "col-lg-12");

    var a_input_text_name = document.createElement("input");
    a_input_text_name.setAttribute("class", "w3-input w3-border w3-border-black");
    a_input_text_name.setAttribute("placeholder", "neo vision irpf camera 20m example cameara name hear");

    a_div_col_01.appendChild(document.createTextNode("Name"));
    a_div_col_01.appendChild(a_input_text_name);
    a_div_row.appendChild(a_div_col_01);


    a_div_row.appendChild(a_div_col_01);



    var b_div_row = document.createElement("div");
    b_div_row.setAttribute("class", "row w3-margin-top");

    var b_div_col_01 = document.createElement("div");
    b_div_col_01.setAttribute("class", "col-lg-6");

    var b_input_text_modal_no = document.createElement("input");
    b_input_text_modal_no.setAttribute("class", "w3-input w3-border w3-border-black");
    b_input_text_modal_no.setAttribute("placeholder", "ds-seirpf-20 example modal no hear");
    b_input_text_modal_no.setAttribute("type", "text");

    b_div_col_01.appendChild(document.createTextNode("Modal no"));
    b_div_col_01.appendChild(b_input_text_modal_no);

    var b_div_col_02 = document.createElement("div");
    b_div_col_02.setAttribute("class", "col-lg-6");

    var b_input_text_warranty = document.createElement("input");
    b_input_text_warranty.setAttribute("class", "w3-input w3-border w3-border-black");
    b_input_text_warranty.setAttribute("placeholder", "2 years example warranty");
    b_input_text_warranty.setAttribute("type", "text");

    b_div_col_02.appendChild(document.createTextNode("Warranty Info"));
    b_div_col_02.appendChild(b_input_text_warranty);

    b_div_row.appendChild(b_div_col_01);
    b_div_row.appendChild(b_div_col_02);


    var c_row = document.createElement("div");
    c_row.setAttribute("class", "row");

    var c_col_01 = document.createElement("div");
    c_col_01.setAttribute("class", "col-lg-6");

    c_col_01.appendChild(document.createTextNode("VSP Price (LKR)"));

    var c_input_text_vsp = document.createElement("input");
    c_input_text_vsp.setAttribute("class", "w3-input w3-border w3-border-black");
    c_input_text_vsp.setAttribute("type", "number");
    c_input_text_vsp.setAttribute("placeholder", "0000.00 example price hear");

    c_col_01.appendChild(c_input_text_vsp);



    var c_col_02 = document.createElement("div");
    c_col_02.setAttribute("class", "col-lg-6");
    var c_input_serial_state = document.createElement("input");
    c_input_serial_state.setAttribute("class", "w3-radio w3-margin");
    c_input_serial_state.setAttribute("type", "checkbox");
    c_col_02.appendChild(c_input_serial_state);
    c_col_02.appendChild(document.createTextNode("Avalible Serial Number"));


    c_row.appendChild(c_col_01);
    c_row.appendChild(c_col_02);

    var d_row = document.createElement("div");
    d_row.setAttribute("class", "row");

    var d_col_01 = document.createElement("div");
    d_col_01.setAttribute("class", "col-lg-4");
    d_col_01.appendChild(document.createTextNode("Dealer Rate %"));

    var d_input_text_dealer = document.createElement("input");
    d_input_text_dealer.setAttribute("type", "number");
    d_input_text_dealer.setAttribute("class", "w3-border-black w3-border w3-input");
    d_input_text_dealer.setAttribute("placeholder", "10% rate hear ");

    d_col_01.appendChild(d_input_text_dealer);


    var d_col_02 = document.createElement("div");
    d_col_02.setAttribute("class", "col-lg-4");
    d_col_02.appendChild(document.createTextNode("Budget Rate %"));

    var d_input_text_budget = document.createElement("input");
    d_input_text_budget.setAttribute("type", "number");
    d_input_text_budget.setAttribute("class", "w3-border-black w3-border w3-input");
    d_input_text_budget.setAttribute("placeholder", "20% rate hear ");

    d_col_02.appendChild(d_input_text_budget);


    var d_col_03 = document.createElement("div");
    d_col_03.setAttribute("class", "col-lg-4");
    d_col_03.appendChild(document.createTextNode("Corporate Rate %"));

    var d_input_text_cooperate = document.createElement("input");
    d_input_text_cooperate.setAttribute("type", "number");
    d_input_text_cooperate.setAttribute("class", "w3-border-black w3-border w3-input");
    d_input_text_cooperate.setAttribute("placeholder", "70% rate hear ");

    d_col_03.appendChild(d_input_text_cooperate);


    d_row.appendChild(d_col_01);
    d_row.appendChild(d_col_02);
    d_row.appendChild(d_col_03);


    var e_row = document.createElement("div");
    e_row.setAttribute("class", "row");

    var e_col_01 = document.createElement("div");
    e_col_01.setAttribute("class", "col-lg-12");

    e_col_01.appendChild(document.createTextNode("Description"));

    var e_text_dis = document.createElement("textarea");
    e_text_dis.setAttribute("class", "w3-input w3-border w3-border-black");
    e_text_dis.setAttribute("placeholder", "Note :");
    e_text_dis.style.height = "100px";
    e_col_01.appendChild(e_text_dis);

    e_row.appendChild(e_col_01);

    var f_row = document.createElement("div");
    f_row.setAttribute("class", "row");

    var f_col_01 = document.createElement("div");
    f_col_01.setAttribute("class", "col-lg-6");

    f_col_01.appendChild(document.createTextNode("Opeing stock"));

    var f_text_opening_stock = document.createElement("input");
    f_text_opening_stock.setAttribute("class", "w3-input w3-border-black w3-border");
    f_text_opening_stock.setAttribute("type", "number");
    f_text_opening_stock.setAttribute("placeholder", "10 example opening stock ");

    f_col_01.appendChild(f_text_opening_stock);

    f_row.appendChild(f_col_01);

    var f_col_02 = document.createElement("div");
    f_col_02.setAttribute("class", "col-lg-6");

    f_col_02.appendChild(document.createTextNode("Warranty  Risk %"));

    var f_text_warranty_risk = document.createElement("input");
    f_text_warranty_risk.setAttribute("class", "w3-input w3-border-black w3-border");
    f_text_warranty_risk.setAttribute("type", "number");
    f_text_warranty_risk.setAttribute("placeholder", "5% risk for Warranty  risk ");
    f_col_02.appendChild(f_text_warranty_risk);
    f_row.appendChild(f_col_02);


    body.appendChild(a_div_row);
    body.appendChild(document.createElement("hr"));
    body.appendChild(e_row);
    body.appendChild(document.createElement("hr"));
    body.appendChild(b_div_row);
    body.appendChild(document.createElement("hr"));
    body.appendChild(c_row);
    body.appendChild(document.createElement("hr"));
    body.appendChild(d_row);
    body.appendChild(document.createElement("hr"));
    body.appendChild(f_row);

    var footer = document.getElementById("modal_footer");
    $(footer).empty();

    var btn_save = document.createElement("button");
    btn_save.setAttribute("class", "w3-theme-dark w3-button w3-round");
    btn_save.appendChild(document.createTextNode("create new item"));
    btn_save.addEventListener("click", function () {
        add_data(id, a_input_text_name, e_text_dis, b_input_text_modal_no, b_input_text_warranty, c_input_text_vsp, c_input_serial_state, d_input_text_dealer, d_input_text_budget, d_input_text_cooperate, f_text_opening_stock,f_text_warranty_risk);
    });

    $("#error_id").empty();

    footer.appendChild(btn_save);
}

function add_data(id_item, obj_name, obj_dis, obj_modal_no, obj_warranty, obj_vsp_price, obj_avalible_serial_no_check, obj_dealer_rate, obj_budget_rate, obj_coperate_rate, obj_open_stock,obj_warranty_risk) {
    var error_id = document.getElementById("error_id");
//    alert(obj_vsp_price.value);
    if (obj_name.value == "") {
        error_id.appendChild(document.createTextNode("name field cant be empty"));
        obj_name.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_name.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_name.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else if (obj_vsp_price.value == "") {
        error_id.appendChild(document.createTextNode("vsp price field cant be empty"));
        obj_vsp_price.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_vsp_price.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_vsp_price.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else if (obj_warranty.value == "") {
        error_id.appendChild(document.createTextNode("warranty field cant be empty"));
        obj_warranty.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_warranty.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_warranty.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else if (obj_dealer_rate.value == "") {
        error_id.appendChild(document.createTextNode("rates field cant be empty"));
        obj_dealer_rate.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_dealer_rate.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_dealer_rate.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else if (obj_budget_rate.value == "") {
        error_id.appendChild(document.createTextNode("rates field cant be empty"));
        obj_budget_rate.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_budget_rate.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_budget_rate.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else if (obj_coperate_rate.value == "") {
        error_id.appendChild(document.createTextNode("rates field cant be empty"));
        obj_coperate_rate.setAttribute("class", "w3-border-red w3-red w3-border w3-input");
        obj_coperate_rate.addEventListener("keydown", function () {
            $(error_id).empty();
            obj_coperate_rate.setAttribute("class", "w3-input w3-border-black w3-border");
        });
    } else {
        var serial_no_avalible = "0";
        if ($(obj_avalible_serial_no_check).prop("checked")) {
            serial_no_avalible = "1";
        }
        var sending_values = "item_type_id=" + id_item + "&name=" + obj_name.value + "&dis=" + obj_dis.value + "&modal_no=" + obj_modal_no.value + "&warranty=" + obj_warranty.value +
                "&vsp_price=" + obj_vsp_price.value + "&serial_no_avalible=" + serial_no_avalible + "&dealer_rate=" + obj_dealer_rate.value + "&budget_rate=" + obj_budget_rate.value +
                "&coperate_rate=" + obj_coperate_rate.value + "&open_stock=" + obj_open_stock.value+"&warranty_risk="+obj_warranty_risk.value;

        $.ajax({
            url: "item_list/add_new.php",
            type: 'POST',
            data: sending_values,
            cache: false,
            success: function (data) {
                main_loder();
                $("#myModal").modal('hide');
            }
        });
    }
}