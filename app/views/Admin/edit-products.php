<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'\app\views\Customer\navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\products-advanced.css">
    <title>My Projects</title>
</head>
<body>

<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Admin Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/Employee"><div class="box7" >
                    Employees
                </div></a>
            <a href="<?=URLROOT?>/AdminProject"><div class="box9">
                    Projects
            </div></a>
            <a href="<?=URLROOT?>/Package"><div class="box2">
                    Packages
            </div></a>
            <a href="<?=URLROOT?>/Product"><div class="box3" style="color: #ffffff;background-color: #0b2f64;">
                    Products
            </div></a>
            <a href="<?=URLROOT?>/Statistics/salesPerMonth"><div class="box4">
                    Reports
            </div></a>
            <a href="<?=URLROOT?>/AdminIssue"><div class="box8">
                    Issues
            </div></a>
            

        </div>
        <div class="rest-bottom">
            <a href="<?=URLROOT?>/AdminViewProfile"><div class="box5">
                Profile
            </div></a>
            <a href="<?=URLROOT?>/"><div class="box6">
                Settings
            </div></a>
            </div>
        </div>
    </div>
    <div class="common-main-container">
        <div class="dashboard-common-heading-and-background-container">
            <div class="dashboard-common-heading-container">
                <div class="dashboard-common-heading-back-btn">
                    <a href="/ezolar/Product/productDetailspage/<?php
                            $row = $_SESSION['row'];
                            echo $row -> productID;?>" “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Back.png">
                    </a>
                </div>
                <div class="dashboard-common-heading-text">
                    <b>Edit a Product</b>
                </div>
                <div class="dashboard-common-heading-image">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Products.png" alt="Products-icon">
                    </a>
                </div>
            </div>  
            <div class="form-background">
                <form class="form-container" action="/ezolar/Product/editProduct/<?php
                            $row = $_SESSION['row'];
                            echo $row -> productID;?>" method="POST">
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Product ID:<span style="color:red;">*</span> <span class="err-box" id="pid-err"></span>
                            </div>
                            <input class="form-item-input" name="product-id" id="product-id" type="text" value="<?php
                            $row = $_SESSION['row'];
                            echo $row -> productID;?>" disabled>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Product Name:<span style="color:red;">*</span> <span class="err-box" id="pname-err"></span>
                            </div>
                            <input class="form-item-input" name="product-name" id="product-name" type="text" value="<?php
                            $row = $_SESSION['row'];
                            echo $row -> productName;?>" required onkeyup="validateProductName()">
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Manufacturer: <span class="err-box" id="manuf-err"></span>
                            </div>
                            <input class="form-item-input" name="manufacturer" id="manufacturer" type="text" value="<?php
                            $row = $_SESSION['row'];
                            echo $row -> manufacturer;?>" onkeyup="validateManufacturer()">
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Product Type:
                            </div>
                            <select class="form-item-input-dropdown" name="product-type" id="product-type" disabled>
                                <option value="" selected disabled>Select Product Type</option>
                                <option value="inverter">Inverter</option>
                                <option value="panel">Solar Panels</option>
                                <option value="battery">Battery</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Price (Rs.):<span style="color:red;">*</span> <span class="err-box" id="price-err"></span>
                            </div>
                            <input class="form-item-input" name="price" id="price" type="text" value="<?php
                            $row = $_SESSION['row'];
                            echo $row -> cost;?>" required onkeyup="validatePrice()">
                        </div>
                        <div class="form-item-container-half">
                        <div class="form-item-text">
                                Reorder Level: <span class="err-box" id="reorder-err"></span>
                            </div>
                            <input class="form-item-input" name="reorder-level" id="reorder-level" type="text" value="<?php echo $_SESSION['row']->reorderLimit;?>" required onkeyup="validateReorder()">
                        </div>
                    </div>
                    <div class="form-inline" style="justify-content:center;">
                        <button class="form-submit-btn" type="submit" onclick="return validateForm()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="\ezolar\public\js\product_validation.js"></script>
    </div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
</body>
</html>