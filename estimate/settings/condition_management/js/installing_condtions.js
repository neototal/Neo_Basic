
function installing_condtion_load() {
    var installing_body = document.getElementById("installing_body");
    $(installing_body).empty();

    var search_value_btn_close = document.getElementById("search_value_btn_close");
    var installing_condition_search_value_btn = document.getElementById("installing_condition_search_value_btn");

    var installing_condition_search_value_text = document.getElementById("installing_condition_search_value_text");


    if (installing_condition_search_value_text.value == "") {
        search_value_btn_close.style.display = "none";
        installing_condition_search_value_btn.style.display = "block";
    } else {
        search_value_btn_close.style.display = "block";
        installing_condition_search_value_btn.style.display = "none";
    }

    var sending_value = "name=" + $("#installing_condition_search_value_text").val() + "&id=" + get_cat_id;
//                    alert(sending_value);
    $.ajax({
        url: "create_new_condition/list_installing_condition.php",
        type: 'POST',
        data: sending_value,
        cache: false,
        success: function (data) {
//                            alert(data);
            var json = eval(data);
            for (var i = 0; i < json.length; i++) {
                table_body(json[i].id, json[i].dis, installing_body,1);
            }

            if (json.length == 0) {
                var center = document.createElement("center");
                var b = document.createElement("b");
                b.appendChild(document.createTextNode("data not found"));
                center.appendChild(b);
                installing_body.appendChild(center);
            }

        }
    });
}

function installing_condtion_setup() {
    var header = document.getElementById("modal_head");
    $(header).empty();
    header.appendChild(document.createTextNode("Create New Installation Condition"));

    var body = document.getElementById("modal_body_from");
    $(body).empty();

    var a_row = document.createElement("div");
    a_row.setAttribute("class", "row w3-margin-bottom");
    var a_col_01 = document.createElement("div");
    a_col_01.setAttribute("class", "col-lg-12");
    a_col_01.appendChild(document.createTextNode("Condition description"));
    a_row.appendChild(a_col_01);
    body.appendChild(a_row);


    var b_row = document.createElement("div");
    b_row.setAttribute("class", "row");
    var b_col_01 = document.createElement("div");
    b_col_01.setAttribute("class", "col-lg-12");
    var textarea = document.createElement("textarea");
    textarea.setAttribute("class", "w3-input w3-border w3-border-black");
    textarea.setAttribute("placeholder", "Note :");
    textarea.style.height = "100px";

    b_col_01.appendChild(textarea);
    b_row.appendChild(b_col_01);
    body.appendChild(b_row);

    var c_row = document.createElement("div");
    c_row.setAttribute("class", "row");
    var c_col_01 = document.createElement("div");
    c_col_01.setAttribute("class", "col-lg-12 w3-text-red");
    c_row.appendChild(c_col_01);
    body.appendChild(c_row);

    var footer = document.getElementById("modal_footer");
    $(footer).empty();
    var btn = document.createElement("button");
    btn.setAttribute("class", "w3-button w3-theme-dark w3-round");
    btn.appendChild(document.createTextNode("Create Condition"));
    footer.appendChild(btn);

    btn.addEventListener("click", function () {
        installing_condtion_save(textarea, c_col_01);
    });
    textarea.addEventListener("keydown", function () {
        textarea.setAttribute("class", "w3-input w3-border w3-border-black");
        $(c_col_01).empty();
    });

    $("#myModal").modal('show');
}

function installing_condtion_save(nameObj, errorObj) {
    if (nameObj.value == "") {
        nameObj.setAttribute("class", "w3-input w3-border w3-border-red");
        errorObj.appendChild(document.createTextNode("field cant be empty"));
    }
    var sending_value = "name=" + nameObj.value + "&id=" + get_cat_id;

    $.ajax({
        url: "create_new_condition/save_installing_condition.php",
        type: 'POST',
        data: sending_value,
        cache: false,
        success: function (data) {

            installing_condtion_load();
            $("#myModal").modal('hide');
        }
    });

}
function installing_del(id,div_row){
    var sending_value="id="+id;
    $.ajax({
        url:"create_new_condition/del_installing.php",
        type: 'POST',
        data: sending_value,
        cache: false,
        success: function (data) {
//            div_row.remove();
            installing_condtion_load();
        }
    });
}

