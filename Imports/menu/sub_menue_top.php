<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
include_once $pth . 'Imports/DB/Database_conn.php';

$userid = isset($_SESSION['userid']) ?  $_SESSION['userid'] : NULL;


if (isset($userid)) {
    
} else {
    error();
}

function error() {

    $pth = isset($_SESSION['pth']) ? $pth = $_SESSION['pth'] : "";
//    header('Location: ' . $pth . 'index.php?error=Session has expiry login to system');
//    
//
    ?>
    <script type="text/javascript">
        window.location.replace("<?php echo $pth; ?>index.php?error=Session has expiry login to system");
    </script>
    <?php
}
?>
<style type="text/css">
    div{
        /*border: 1px black solid;*/
    }
    .image-preview {	
        width:150px;
        height:150px;
        border-bottom-left-radius: 4px;
        border-top-left-radius: 4px;
    }

    #targetLayer{
        float:left;
        width:150px;
        height:150px;
        text-align:center;
        line-height:150px;
        font-weight: bold;
        color: #C0C0C0;
        background-color: #F0E8E0;
        border-bottom-left-radius: 4px;
        border-top-left-radius: 4px;
    }
</style>
<script type="text/javascript">
    function logout() {
        if (confirm('Do you want to logout form system')) {
            window.location.href = "<?php echo $pth; ?>Login/Logout.php"
        }

    }

</script>
<div class="w3-bar w3-theme-dark container w3-margin-right w3-mobile">
    <button onclick="logout()" class="w3-bar-item w3-theme-dark w3-right w3-hover-blue-grey">  <i class="fa fa-sign-out w3-padding " style="font-size:20px"></i></button>
    <button onclick="logout()" class="w3-bar-item w3-theme-dark w3-right w3-hover-blue-grey">  <i class="fa fa-bell w3-padding " style="font-size:20px"></i></button>


</div>