function add_new_item_type() {
    
    var header = document.getElementById("modal_head");
    $(header).empty();
    header.appendChild(document.createTextNode("Add new Hardware Itme type"));

    var body = document.getElementById("modal_body_from");
    $(body).empty();

    var a_row = document.createElement("div");
    a_row.setAttribute("class", "row");

    var a_col_01 = document.createElement("div");
    a_col_01.setAttribute("class", "col-lg-12");

    var a_strong = document.createElement("strong");
    a_strong.appendChild(document.createTextNode("Name"));
    var input_text = document.createElement("input");
    input_text.setAttribute("class", "w3-input w3-border w3-border-black");
    input_text.setAttribute("placeholder", "add new hardware item type");
    input_text.addEventListener("keydown", function () {
        input_text.setAttribute("class", "w3-input w3-border w3-border-black");
        var error_id = document.getElementById("error_id");
        $(error_id).empty();
    })
    a_col_01.appendChild(a_strong);
    a_col_01.appendChild(input_text);

    a_row.appendChild(a_col_01);



    var footer = document.getElementById("modal_footer");
    $(footer).empty();

    var add_item_type_btn = document.createElement("button");
    add_item_type_btn.setAttribute("class", "w3-theme-dark w3-button w3-hover-blue-grey");

    add_item_type_btn.appendChild(document.createTextNode("add new"));

    footer.appendChild(add_item_type_btn);


    add_item_type_btn.addEventListener("click", function () {

        if (input_text.value != "") {
            add_data_to_item_type(input_text.value);
        } else {
            var error_id = document.getElementById("error_id");
            input_text.setAttribute("class", "w3-input w3-border w3-border-red");
            $(error_id).empty();
            error_id.appendChild(document.createTextNode("data not found"));
        }
    });


    body.appendChild(a_row);

}

function add_data_to_item_type(name) {
    var sending_value = "name=" + name;
    $.ajax({
        url: "hardware_item_list/type/add_new.php",
        type: 'POST',
        data: sending_value,
        cache: false,
        success: function (data) {
//            alert(data);
            var footer = document.getElementById("modal_footer");
            $(footer).empty();
            select_item_type();
        }
    });
}