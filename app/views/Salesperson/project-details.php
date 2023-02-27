<?php
//  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'/app/views/Includes/header.php');
require_once(__ROOT__.'/app/views/Includes/navbar.php');
require_once(__ROOT__.'/app/views/Includes/footer.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\project-details.css">
    <title>My Projects</title>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-heading">
        <b>Salesperson Dashboard</b>
    </div>
    <div class="sidebar-link-container-group">
        <div class="sidebar-link-container-top">
            <a href="">
                <div class="sidebar-link-container-selected">
                    Assigned Projects
                </div>
            </a>

            <div class="sidebar-link-container">
                Inquiries
            </div>

            <div class="sidebar-link-container">
                Inspection Schedule
            </div>

            <div class="sidebar-link-container">
                Delivery Schedule
            </div>

            <a href="/ezolar/Employee/EngineersAndContractors">
                <div class="sidebar-link-container">
                    Engineers & Contractors
                </div>
            </a>
        </div>

        <div class="sidebar-link-container-bottom">
            <a href=""><div class="sidebar-link-container">
                    Profile
                </div></a>
            <div class="sidebar-link-container">
                Settings
            </div>
        </div>
    </div>
</div>

<div class="common-main-container">
<!--    <div class="dashboard-common-main-topic">-->
<!--        <div class="common-main-left-img">-->
<!--            <a href=”#” “text-decoration: none”>-->
<!--                <img src="\ezolar\public\img\customer\projects.png" alt="project">-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="common-main-txt">-->
<!--            Assigned Projects-->
<!--        </div>-->
<!---->
<!--        <div class="common-main-right-img">-->
<!--            <img src="\ezolar\public\img\profile.png" alt="profile">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="dashboard-common-heading-container">-->
<!--        <div class="dashboard-common-heading-back-btn">-->
<!--            <a href=”” “text-decoration: none”>-->
<!--                <img src="\ezolar\public\img\storekeeper\Back.png">-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="dashboard-common-heading-text">-->
<!--            <b>Project Details</b>-->
<!--        </div>-->
<!--    </div>-->
    <div class="dashboard-common-heading-and-background-container">
        <div class="dashboard-common-heading-container">
            <div class="dashboard-common-heading-back-btn">
                <a href="/ezolar/Project/SalespersonViewProjects" “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\back.png" alt="back-icon">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b>project Details</b>
            </div>
            <div class="dashboard-common-heading-image">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\salesperson\assignedProjects.png" alt="assigned-projects-icon">
                </a>
            </div>

        </div>
        <div class="dashboard-main-container">
        <div class="project-progress-bar-wrapper">
            <div class="project-progress-bar-container">
                <div class="project-progress-bar-bullet-container">
                    <div class="project-progress-bar-bullet"></div>
                    <div class="project-progress-bar-bullet-text">Request Recieved</div>
                </div>
                <div class="project-progress-bar-bullet-container">
                    <div class="project-progress-bar-bullet"></div>
                    <div class="project-progress-bar-bullet-text">Inspection Scheduling</div>
                </div>
                <div class="project-progress-bar-bullet-container">
                    <div class="project-progress-bar-bullet"></div>
                    <div class="project-progress-bar-bullet-text">Inspection</div>
                </div>
                <div class="project-progress-bar-bullet-container">
                    <div class="project-progress-bar-bullet"></div>
                    <div class="project-progress-bar-bullet-text">Payment & Scheduling</div>
                </div>
                <div class="project-progress-bar-bullet-container">
                    <div class="project-progress-bar-bullet"></div>
                    <div class="project-progress-bar-bullet-text">Delivery & Installation</div>
                </div>
            </div>
            <div class="project-progress-bar"></div>
        </div>
        <div class="project-details-inline">
            <div class="project-details-steps-container">
                <span class="project-details-steps-text-colored"><img src="\ezolar\public\img\customer\projectStepTick2.png" class="project-details-steps-tick">Make Request</span>
                <span class="project-details-steps-text"><img src="\ezolar\public\img\customer\projectStepTick1.png" class="project-details-steps-tick">Await Request Processing</span>
                <span class="project-details-steps-text"><img src="\ezolar\public\img\customer\projectStepTick1.png" class="project-details-steps-tick">Request Response</span>
            </div>
            <div class="project-details-info-container">
                <b>Project No:</b> 123556 <br>
                <b>Site Location:</b> 158, Puhulyaya Road, Ambalantota <br>
                <b>Package:</b> Pending <br>
                <b>Contractor:</b> Pending <br>
                <b>Status:</b> Ongoing <br>
                <b>Scheduled Dates:</b> None<br>
            </div>
        </div>
        <div class="project-details-btn-container">
            <div class="add-project-btn">
                <div class="add-project-btn-text">
                    <a href="/ezolar/project/requestProjectPage">Make Payment</a>
                </div>
            </div>
            <div class="add-project-btn">
                <div class="add-project-btn-text">
                    <a href="/ezolar/project/requestProjectPage">Schedule</a>
                </div>
            </div>
            <div class="add-project-btn">
                <div class="add-project-btn-text">
                    <a href="/ezolar/project/requestProjectPage">Send Inquiry</a>
                </div>
            </div>
        </div>
        </div>
    </div>

</div>
</body>
</html>
