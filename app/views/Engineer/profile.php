<?php
require_once(__ROOT__.'\app\views\Customer\navbar.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.Profile.css">
    <link rel="stylesheet" href="\ezolar\public\css\engineer.dashboard.common.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>My Profile</title>
</head>
<body>
<div class="body-container">
    <div class="left-panel">
        <div class="sidebar-heading">
            <a class="sidebar-anchor" href="/ezolar/user/dashboard"><b>Engineer Dashboard</b></a>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a class="sidebar-anchor" href="/ezolar/EngineerProject"><div class="sidebar-link-container">
                    Assigned Projects
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerSchedule"><div class="sidebar-link-container">
                    My Schedule
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerIssue"><div class="sidebar-link-container">
                    Report an Issue
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerReport"><div class="sidebar-link-container">
                    My Performace Report
                </div></a>
            </div>

            <a class="sidebar-anchor" href="/ezolar/User/profile"><div class="sidebar-link-container-bottom-selected">
                <div class="sidebar-link-container">
                    Profile
                </div></a>
            <a class="sidebar-anchor" href=""><div class="sidebar-link-container">
                    Settings
                </div></a>
            </div>
        </div>
    </div>

<div class="common-main-container">
    <div class="dashboard-common-main-topic">
        <div class="common-main-left-img">
            <a href=”” “text-decoration: none”>
                <img src="\ezolar\public\img\customer\Person.png" alt="profile">
            </a>
        </div>
        <div class="common-main-txt">
            My Profile
        </div>

        <div class="common-main-right-img">
            <img src="\ezolar\public\img\profile.png" alt="profile">
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

                    <img class="profile-img" src="\ezolar\public\img\profile.png" alt="profile">
<br>
                <div class="profile-container-txt">
                    <div class="profile-container-txt-name">
                        ' . $row -> name . '
                    </div>    <br>
                    <div class="profile-container-txt-type">
                        ' . $row -> type . '
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
                        </div><br>

                        <div class="form-item-container">
                            <div class="form-item-text">
                                Contact Number :
                            </div>
                            <input class="form-item-input" name="nic" id="nic" type="text" placeholder="0' . $row -> telno . '" readonly>
                        </div>
                        <div class="form-item-container">
                            <div class="form-item-text">
                                NIC :
                            </div>
                            <input class="form-item-input" name="nic" id="nic" type="text" placeholder="' . $row -> nic . '" readonly>
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
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
    ?>
</div>
</body>
</html>
