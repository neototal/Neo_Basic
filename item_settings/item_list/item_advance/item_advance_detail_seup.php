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
        $_SESSION['title'] = "View Item In Advance";
        include_once '../../../Imports/header/basic_header.php';
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                load_item_details();
            });
            function load_item_details() {
                $.ajax({
                    url: "../list.php",
                    type: 'POST',
                    cache: false,
                    data: "",
                    success: function (data) {
                        alert(data);
                    }});

            }
        </script>
    </head>
    <body class="w3-theme-light">
        <?php
        include_once '../../../Imports/menu/main_menue.php';
        ?>







        <?php
        include_once '../../../Imports/footer/footer_system.php';
        ?>
    </body>
</html>
