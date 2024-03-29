<?php
// define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'\app\views\Customer\navbar.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\common\editProfile.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
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
            <a href="<?=URLROOT?>/Employee"><div class="box7" style="color: #ffffff;background-color: #0b2f64;">
                    Employees
                </div></a>
            <a href="<?=URLROOT?>/AdminProject"><div class="box9">
                    Projects
            </div></a>
            <a href="<?=URLROOT?>/Package"><div class="box2">
                    Packages
            </div></a>
            <a href="<?=URLROOT?>/Product"><div class="box3">
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
            <a href="<?=URLROOT?>/AdminViewProfile"><div class="box5" style="color: #0b2f64;background-color: #ffffff;">
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
                <?php
                $results = $_SESSION['rows'];
                foreach($results as $row){
                    echo '
                    <a href="/ezolar/Employee/EmployeeDetails/' . $row -> empID . '">
    ';
    }
    ?>
                <img src="\ezolar\public\img\admin\back.png">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b>Edit Employee Profile</b>
            </div>
            <div class="dashboard-common-heading-image">
<!--                <a href=”” “text-decoration: none”>-->
                    <img src="\ezolar\public\img\admin\edit.png" alt="edit-icon">
<!--                </a>-->
            </div>

        </div>


    <?php
    $results = $_SESSION['rows'];
    foreach($results as $row){
        echo '
    
    <div class="form-background">

        <form class="form-container" action="/ezolar/Employee/editEmployee/' . $row -> empID . '" method="POST">
            <div class="form-inline">
                <div class="form-item-container-half">
                    <div class="form-item-text">
                        Name :
                        <span class="err-box" name="fullnameErr" id="fullname-err"></span>
                    </div>
                    <input class="form-item-input" name="name" id="name" type="text" value="' . $row -> name . '"  onkeyup="validateFullName()" required>
                </div>
                <div class="form-item-container-half">
                    <div class="form-item-text">
                        Tel No :
                        <span class="err-box" name="mobileErr" id="mobile-err"></span>
                    </div>
                    <input class="form-item-input" name="mobile" id="mobile" type="text" value="' . $row -> telno . '"  onkeyup="validateTelNo()" required>
                </div>
            </div>
            <div class="form-inline">
                <div class="form-item-container">
                    <div class="form-item-text">
                        Email :
                        <span class="err-box" name="emailErr" id="email-err"></span>
                    </div>
                    <input class="form-item-input" name="email" id="email" type="text" value="' . $row -> email . '" onkeyup="validateEmail()" required>
                </div>
            </div>
            <div class="form-inline">
                <div class="form-item-container">
                    <div class="form-item-text">
                        Bio :
                    </div>
                    <textarea class="form-item-input" name="bio" id="bio" rows="5" cols="50" >' . $row -> bio . ' </textarea>
                </div>
            </div>

            <div class="form-inline-button">
                <div class="cancel-btn">
                    <button class="form-cancel-btn" type="reset" value="reset" onclick="clearErrorMessage()">Cancel</button>
                </div>
                <div class="submit-btn">
                    <button type="submit" class="form-submit-btn" onclick="return validateEditProfile()">Submit</button>
                </div>
            </div>
        </form>
    </div>
    ';
    }
    ?>
    </div>

</div>
<script type="text/javascript" src="\ezolar\public\js\validation.js"></script>
</div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
</body>
</html>

