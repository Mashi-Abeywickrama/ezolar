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
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.project.css">
    <title>My Projects</title>
</head>
<body>
<?php

require_once(__ROOT__ . '\app\views\popupList\contractorPackage.php');
require_once(__ROOT__ . '\app\views\popupList\projectDpopup.php');
// calling popup for VIEW package

?>
<div class="body-container">
    <?php
        require_once(__ROOT__.'\app\views\Contractor\navigationpanel.php');
    ?>
    
    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-topic-left">
                <div class="common-main-left-img">

                        <img src="\ezolar\public\img\customer\projects.png" alt="project">

                </div>
                <div class="common-main-txt">
                    Assigned Projects
                </div>
            </div>
            
        </div>
        <div class="project-type">
            <a class="sub-topic" href="<?=URLROOT?>/contractor/projectrequests"><div class = "project-sub-topic">
            Project Requests
            </div></a>
            <a class="sub-topic" href="<?=URLROOT?>/project/COntractorAssignedProjects"style="color: #FFFFFF;"><div class = "project-sub-topic" style="background: #0B2F64; border: 3px solid #0B2F64;color: #FFFFFF; ">
            Accepted Projects
            </div></a>
            <a class="sub-topic" href="<?=URLROOT?>/contractor/completedprojects"><div class = "project-sub-topic">
            Completed Projects
            </div></a>

        </div>
        <div class="body-list-container">

            <?php
            $results = $data['rows'];
            foreach($results as $row){
                // if (!empty($row->status=="Z0")){
                // echo '<div class="no-projects-text">There are no ongoing projects...</div>';
                // break;
                // }
                // print_r($row);die;
                if($row->status!="Z0"){
                echo '<div class="project-box">
                        <span class="project-text-container">
                            <div class="project-text-container-inner">
                                <div class="project-text-no">Project No: ' .  $row -> projectID . '</div>
                                <div class="project-text-name"><b>Status : Awaiting for Installation</b></div>
                                <div class="project-text-no">Site Location: ' .  $row -> siteAddress . '</div>
                            </div>
                        </span>
                        <span class="project-details-btn-container">'; ?>
                            <div class="project-details-btn" onclick="location.href='?project_id=<?php echo  $row -> projectID?>'">
                                   <span class="project-details-btn-text">Package</span>
                            </div>
                            <div class="project-details-btn"> 
                                    <span class="project-details-btn-text"  onclick="location.href='?projectid=<?php echo  $row -> projectID?>'";>Other info</span>
                            </div>
                            <?php echo ' </span>
                        
                    </div>';}
            }
            ?>
            
        </div>
    </div>
</div>
<div class="f">
    <?php 
          $this->view('Includes/footer', $data);
          if (isset($_GET['project_id'])) {
            echo "<script> document.getElementById('id05').style.display='block'; </script>";
          }
          if (isset($_GET['projectid'])) {
            echo "<script> document.getElementById('projectD').style.display='block'; </script>";
          }
    ?>
</div>
</body>
</html>
