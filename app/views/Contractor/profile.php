<?php
// require_once(__ROOT__.'\app\views\Includes\header.php');
require_once(__ROOT__.'\app\views\Customer\navbar.php');
// require_once(__ROOT__.'\app\views\Includes\footer.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.Profile.css">
    <link rel="stylesheet" href="\ezolar\public\css\style.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>My Profile</title>
</head>
<body>
<div class = "body-container-main">    
<div class="body-container">
    <?php
        require_once(__ROOT__.'\app\views\Contractor\navigationpanel.php');
    ?>
    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-topic-left">
                <div class="common-main-left-img">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\customer\Person.png" alt="profile">
                    </a>
                </div>
                <div class="common-main-txt">
                    My Profile
                </div>
            </div>
            
        </div>

        <?php
        $mail = $_SESSION['user_email'];
        $results = $_SESSION['rows'];
        foreach($results as $row){
            echo '
    <div class="profile-container">
        <div class="profile-container-image">
            <div class="profile-container-content">

                    <img class="profile-img" src="/ezolar/public/img/user-pics/'.$row->profilePhoto.'" alt="profile">
<br>
                <div class="profile-container-txt">
                    <div class="profile-container-txt-name">
                        ' . $row -> name . '
                    </div>
                    <div class="profile-container-txt-type">
                        ' . $row -> bio . '
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-container-details">
            <div class="form-background">

                <form class="form-container" method="GET">
                    <div class="form-inline">

                        <div class="form-item-container">
                            <div class="form-item-text">
                                Email :
                            </div>
                            <input class="form-item-input" name="name" id="name" type="text" placeholder="' . $mail . '" readonly>
                        </div>

                        <div class="form-item-container">
                            <div class="form-item-text">
                                Contact Number :
                            </div>
                            <input class="form-item-input" name="nic" id="nic" type="text" placeholder="' . $row -> telno . '" readonly>
                        </div>
                        <div class="form-item-container">
                            <div class="form-item-container-half">
                                <div class="form-item-text">
                                    NIC Number :
                                </div>
                                <input class="form-item-input" name="nic" id="nic" type="text" placeholder="' . $row -> nic . '" readonly>
                            </div>
                            <div class="form-item-container-half">
                                <div class="form-item-text">
                                    Gender :
                                </div>
                                <input class="form-item-input" name="nic" id="nic" type="text" placeholder="' . $row -> gender . '" readonly>
                            </div>
                        </div>
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Bio :
                            </div>
                            <input class="form-item-input" name="nic" id="nic" type="text" placeholder="' . $row -> bio . '" readonly>
                        </div>

                    </div>

                </form>
                
                    <a href="'.URLROOT.'/user/editprofile">
                        <div class="edit-profile-btn">
                            <div class="edit-profile-btn-text">
                                Edit Profile
                            </div>
                        </div>
                    </a>
            </div>
        </div>
    </div>
';
        }
        ?>

    </div>
</div>
<div class = "f">
    <?php
        include_once(__ROOT__.'\app\views\Includes\footer.php');
    ?>
</div>
</div>
</body>
</html>
