<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
     require_once(__ROOT__.'\app\views\Customer\navbar.php');
     require_once(__ROOT__.'\app\views\Includes\navbar.php');
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\customer.settings.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>eZolar Dashboard</title>
</head>
<body>
    <!-- <p>Working</p> -->
    <div class="dashboard-container">
        <div class="dashboard-container-main">
           <div class="main-txt">
                Contractor Dashboard
           </div>
        </div>

        <a href="<?=URLROOT?>/project/COntractorAssignedProjects"><div class="dashboard-container-content">
           <div class="dashboard-container-txt">
               My Projects
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\customer\Projects.png" alt="Projects Image">
           </div>
        </div></a>

        <a href="<?=URLROOT?>/ContractorSchedule"><div class="dashboard-container-content">
           <div class="dashboard-container-txt">
            My Schedule
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\customer\Calendar.png" alt="Schedule">
           </div>
        </div></a>

        <a href="<?=URLROOT?>/Contractor/reportissue"><div class="dashboard-container-content">
           <div class="dashboard-container-txt">
                Report an Issue
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\customer\Issue.png" alt="Issues">
           </div>
        </div></a>
        <a href="<?=URLROOT?>/contractor/reports"><div class="dashboard-container-content">
           <div class="dashboard-container-txt">
                Your Activity
           </div>
           <div class="dashboard-container-img" style="    display: flex;
               width: 5rem;
               height: 100%;
               align-items: center;
               justify-content: flex-end;">
                <img src="\ezolar\public\img\customer\analytics.png" style="width:50%" alt="Issues">
           </div>
        </div></a>

        <a href="<?=URLROOT?>/user/profile"><div class="dashboard-container-content">
           <div class="dashboard-container-txt">
                Profile
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\customer\Person.png" alt="profile">
           </div>
        </div></a>
        
        <a href="<?=URLROOT?>/contractor/settings"> <div class="dashboard-container-content">
           <div class="dashboard-container-txt">
                Settings
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\setting\Setting.png" alt="Settings Image">
           </div>
        </div></a>
    </div>
</body>
</html>