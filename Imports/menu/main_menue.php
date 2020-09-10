

<?php include_once $pth . 'Imports/menu/sub_menue_top.php'; ?>

<style type="text/css">
    a, u {
        text-decoration: none;
    }
    a {
        text-decoration: none !important;
    }
</style>
<div class="w3-bar w3-theme-l5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-12">
                <img class="w3-opacity-off" src="<?php echo $pth; ?>Imports/img/finalLogo.png" style="width: 40%;">
            </div>
            <div class="col-lg-9">

                <div class="w3-bar w3-mobile ">
                    <div class="w3-dropdown-hover w3-right ">
                        <button class="w3-button w3-theme-l5">Settings</button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-top" style="width: 250px;">
                            <a href="<?php echo $pth; ?>item_settings/technical_works.php" class="w3-bar-item w3-button">Technical Works</a>
                            <a href="<?php echo $pth; ?>item_settings/item_setup.php" class="w3-bar-item w3-button">Item List</a>
                            <a href="<?php echo $pth; ?>item_settings/hardware_items.php" class="w3-bar-item w3-button">Hardware List</a>
                            <a href="<?php echo $pth; ?>item_settings/others.php" class="w3-bar-item w3-button">Other List</a>
                            <a href="#" class="w3-bar-item w3-button">User Account Management</a>
                        </div>
                    </div>
                    <div class="w3-dropdown-hover w3-right ">
                        <button class="w3-button">Accounts</button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-top" style="width: 250px;">
                            <a href="#" class="w3-bar-item w3-button">Link 1</a>
                            <a href="#" class="w3-bar-item w3-button">Link 2</a>
                            <a href="#" class="w3-bar-item w3-button">Link 3</a>
                        </div>
                    </div>

                    <div class="w3-dropdown-hover w3-right ">
                        <button class="w3-button">Customer</button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-top" style="width: 250px;">
                            <
                            <a href="#" class="w3-bar-item w3-button">Create New</a>
                            <a href="#" class="w3-bar-item w3-button">Customer List</a>
                            <a href="#" class="w3-bar-item w3-button">Customer Outstanding</a>
                        </div>
                    </div>
                    <div class="w3-dropdown-hover w3-right ">
                        <button class="w3-button">Supplies</button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-top" style="width: 250px;">
                            <a href="#" class="w3-bar-item w3-button">Create New</a>
                            <a href="#" class="w3-bar-item w3-button">Supplies List</a>
                            <a href="#" class="w3-bar-item w3-button">Supplies Outstanding</a>
                        </div>
                    </div>

                    <div class="w3-dropdown-hover w3-right ">
                        <button class="w3-button">Invoice</button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-top" style="width: 250px;">
                            <a href="#" class="w3-bar-item w3-button">Create New</a>
                            <a href="#" class="w3-bar-item w3-button">Invoice List</a>
                            <a href="#" class="w3-bar-item w3-button">Customer Outstanding</a>
                        </div>
                    </div>

                    <div class="w3-dropdown-hover w3-right ">
                        <button class="w3-button">GRN</button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-top" style="width: 250px;">
                            <a href="#" class="w3-bar-item w3-button">Create New</a>
                            <a href="#" class="w3-bar-item w3-button">GRN List</a>
                            <a href="#" class="w3-bar-item w3-button">Supplies Outstanding</a>
                        </div>
                    </div>
                    <div class="w3-dropdown-hover w3-right ">
                        <button class="w3-button">Estimate</button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-top" style="width: 250px;">
                            <a href="#" class="w3-bar-item w3-button">Create New</a>
                            <a href="<?php echo $pth; ?>estimate/estimate_list.php" class="w3-bar-item w3-button">Estimate List</a>
                        </div>
                    </div>
                    <button class="w3-bar-item w3-right w3-button">Home</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    div {
        /*border: 1px black solid;*/
    }
</style>
<?php
//C:\xampp\htdocs\SecuriySoltuionsERP\Imports\menu\loader.php
include_once $pth . 'Imports/menu/loader.php';
include_once $pth . 'Imports/company/compay_loader.php';
?>
