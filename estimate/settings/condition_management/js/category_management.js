function check_id_avable() {
    $.ajax({
        url: "create_new_condition/checking_id.php",
        type: 'POST',
        cache: false,
        success: function (data) {
//            alert(data + " id chekc line 7");
            var json = eval(data);
            for (var i = 0; i < json.length; i++) {
                get_cat_id = json[i].id;
                $("#heading_cat").empty();
                document.getElementById("heading_cat").appendChild(document.createTextNode(json[i].name.charAt(0).toUpperCase() + json[i].name.slice() + " Conditions"));
            }
            if (json.length == 0) {
                setup_cat();
//                finish_btn();
            } else {
//                alert(get_cat_id+" cat id");
                condition_list_load();
            }
        }
    });

}

var get_cat_id = 0;

function setup_cat() {
    var modal_head = document.getElementById("modal_head");
    $(modal_head).empty();
    modal_head.appendChild(document.createTextNode("Setup Category"));

    var modal_body_from = document.getElementById("modal_body_from");
    $(modal_body_from).empty();

    var a_row = document.createElement("div");
    a_row.setAttribute("class", "row");
    var a_col_01 = document.createElement("div");
    a_col_01.setAttribute("class", "col-lg-12");
    a_col_01.appendChild(document.createTextNode("Category Name"));
    a_row.appendChild(a_col_01);
    modal_body_from.appendChild(a_row);

    var b_row = document.createElement("div");
    b_row.setAttribute("class", "row");
    var b_col_01 = document.createElement("div");
    b_col_01.setAttribute("class", "col_lg_12");

    var b_input = document.createElement("input");
    b_input.setAttribute("class", "w3-input w3-border w3-border-black");
    b_input.setAttribute("placeholder", "network setup example hear");

    b_col_01.appendChild(b_input);

    b_col_01.appendChild(b_row);
    modal_body_from.appendChild(b_col_01);

    var c_row = document.createElement("div");
    c_row.setAttribute("class", "row");
    var c_col_01 = document.createElement("div");
    c_col_01.setAttribute("class", "col-lg-12 w3-text-red w3-center");
    c_row.appendChild(c_col_01);
    modal_body_from.appendChild(c_row);



    b_input.addEventListener("keydown", function () {
        this.setAttribute("class", "w3-border w3-border-black w3-input");
        $(c_col_01).empty();
    });


    var modal_footer = document.getElementById("modal_footer");
    $(modal_footer).empty();
    var btn_save = document.createElement("button");
    btn_save.setAttribute("class", "w3-button w3-theme-dark w3-round");
    btn_save.appendChild(document.createTextNode("Create Category"));
    btn_save.addEventListener("click", function () {
        save_cat(b_input, c_col_01);
    });
    modal_footer.appendChild(btn_save);
    $("#myModal").modal('show');

}
function save_cat(nameObj, errorObj) {
    if (nameObj.value == "") {
        nameObj.setAttribute("class", "w3-border w3-border-red w3-input");
        errorObj.appendChild(document.createTextNode("name field cant be empty"));
    } else {
        var sending_value = "name=" + nameObj.value;

        $.ajax({
            url: "create_new_condition/save.php",
            type: 'POST',
            data: sending_value,
            cache: false,
            success: function (data) {
//                            alert(data);fg
                if (data == "Already added try another name") {
                    nameObj.setAttribute("class", "w3-border w3-border-red w3-input");
                    errorObj.appendChild(document.createTextNode(data));
                } else {
                    get_cat_id = parseInt(data);
                    if (get_cat_id > 0) {
                        $("#myModal").modal('hide');
                        $("#heading_cat").empty();
                        document.getElementById("heading_cat").appendChild(document.createTextNode(nameObj.value.charAt(0).toUpperCase() + nameObj.value.slice() + " Conditions"));
                    }
                }
            }
        });

    }
}