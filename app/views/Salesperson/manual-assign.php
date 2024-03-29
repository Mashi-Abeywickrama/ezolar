<?php
require_once(__ROOT__.'\app\views\Customer\navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\payment-history.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\assigned-projects.css">
    <title>My Projects</title>
</head>
<body>

<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Salesperson Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/SalespersonProject"><div class="box7">
                    Assigned Projects
                </div></a>
            <a href="<?=URLROOT?>/Inquiry/getSalespersonInquiries"><div class="box2">
                    Inquiries
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/InspectionSchedule"><div class="box3">
                Inspection Schedule
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/DeliverySchedule"><div class="box4">
                Delivery Schedule
            </div></a>
            
            <a href="<?=URLROOT?>/Employee/EngineersAndContractors"><div class="box8">
            Engineers & Contractors
            </div></a>
            <a href="<?=URLROOT?>/SalespersonReports"><div class="box9">
            Reports
            </div></a>

        </div>
        <div class="rest-bottom">
            <a href="<?=URLROOT?>/user/profile"><div class="box5">
                Profile
            </div></a>
            <a href="<?=URLROOT?>/"><div class="box6">
                Settings
            </div></a>
            </div>
        </div>
    </div>

<div class="common-main-container">
    <div class="dashboard-common-main-topic" style="display:flex; justify-content:start; align-items:center;">

        <div class="common-main-left-img">
            <a href="<?=URLROOT?>/SalespersonProject/projectDetailsPage/<?php echo $_SESSION['rows']['projID']?>" style= “text-decoration: none”>
                <img src="\ezolar\public\img\storekeeper\Back.png" alt="Back Button">
            </a>
        </div>
        <div class="common-main-txt" style="margin-left: 2%;">
            Manual Assign : <?php echo strtoupper($_SESSION['rows']['projID'])?>
        </div>


        <!-- List of inspection schedules of a project -->
    </div class="inspection-list-container">
        <div class="category-container">
            <div class="category-btn" id="inspection-list-btn">Inspections</div>
            <div class="category-btn" id="delivery-list-btn">Delivery</div>
        </div>
        <div class="payment-list-container" id="inspection-list">
            <h2>Inspection Schedules</h2>
            <?php
            $results = $_SESSION['rows']['inspection'];
            if (count($results)<=0){
                echo '<div class="no-payments-text">No Inspection Schedules for this project.</div>';
            } else {
                foreach($results as $row){
                    $isComplete = "";
                    $display = "";
                    if($row->isCompleted){
                        $isComplete = "disabled";
                        $display = 'style="display:none;"';
                    } 
                    echo '<form class="project-box" action="/ezolar/SalespersonProject/changeScheduleDate/'.$row->scheduleID.'/'.$row->Project_projectID.'" method="POST">
                                <div class="project-text-container" style="flex-direction:column;">
                                    <div class="project-text-container-inner" style="flex-direction:row;">
                                        <div class="project-text-no">Engineer Name:</div>
                                        <div class="project-text-name"><b>' . $row -> name . '</b></div>
                                    </div>
                                    </br>
                                    <div class="project-text-container-inner" style="flex-direction:row;">
                                    <div class="project-text-no">Scheduled date:</div>
                                    <input class="form-item-input" name="schedule-date" id="schedule-date" type="date" value="'. substr($row->date,0,10).'" '.$isComplete.'>
                                    </div>
                                </div>
                                <div class="schedule-btn-container" style="padding:5px;width:auto;margin=0;">
                                    <button type="submit" '.$display.'>
                                        <div class="schedule-btn">
                                            <div class="project-details-btn-text">Change Date</div>
                                        </div>
                                    </button>
                                </div>
                        </form>';
                }
            }
            ?>

            <?php 
            $status = $_SESSION['rows']['status'];
            if($status == "Z0"){
                echo '        
                <form class="add-inspection" action="/ezolar/SalespersonProject/addNewSchedule/'.$_SESSION['rows']['projID'].'/'.$row->empID.'" method="POST">
                <h3>Add Troubleshoot Inspection</h3>
                <div class="add-schedule-container">
                    <input class="schedule-form-item-input" name="schedule-date" id="schedule-date" type="date">
                    <button type="submit" class="add-inspection-button">Add Inspection</button>
                </div>
                </form>';
            }
        ?>
        </div>


        <!-- List of delivery schedules of a project -->
        <div class="payment-list-container" id="delivery-list">
        <h2>Delivery Schedules</h2>
            <?php
            $results = $_SESSION['rows']['delivery'];
            if (count($results)<=0){
                echo '<div class="no-payments-text">No Delivery Schedules for this project.</div>';
            } else {
                foreach($results as $row){
                    $isComplete = "";
                    $display = "";
                    if($row->isCompleted){
                        $isComplete = "disabled";
                        $display = 'style="display:none;"';
                    } 
                        echo '<form class="project-box" action="/ezolar/SalespersonProject/changeScheduleDate/'.$row->scheduleID.'/'.$row->Project_projectID.'" method="POST">
                        <div class="project-text-container" style="flex-direction:column;">
                            <div class="project-text-container-inner" style="flex-direction:row;">
                                <div class="project-text-no">Contractor Name:</div>
                                <div class="project-text-name"><b>' . $row -> name . '</b></div>
                            </div>
                            </br>
                            <div class="project-text-container-inner" style="flex-direction:row;">
                            <div class="project-text-no">Scheduled date:</div>
                            <input class="form-item-input" name="schedule-date" id="schedule-date" type="date" value="'. substr($row->date,0,10).'" '.$isComplete.'>
                            </div>
                        </div>
                        <div class="schedule-btn-container" style="padding:5px;width:auto;margin=0;">
                            <button type="submit" '.$display.'>
                                <div class="schedule-btn">
                                    <div class="project-details-btn-text">Change Date</div>
                                </div>
                            </button>
                        </div>
                        </form>';
                }
            }
            ?>
        </div>

    </div>
</div>
        </div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
<?php unset($_SESSION['projectID'], $_SESSION['rows'])?>
<script>
    var inspection_list_btn = document.getElementById("inspection-list-btn");
    var delivery_list_btn= document.getElementById("delivery-list-btn");

    var inspection_list = document.getElementById("inspection-list");
    var delivery_list = document.getElementById("delivery-list");
    var all_list = document.getElementsByClassName("payment-list-container");
    Array.from(all_list).forEach(hideList);
    inspection_list_btn.classList.add('select');
    inspection_list.classList.remove('hide');
    inspection_list.classList.add('select');

    function hideList(list){
        list.classList.remove('select');
        list.classList.add('hide');
    }

    function selectList(list){
        Array.from(all_list).forEach(hideList);
        list.classList.remove('hide');
        list.classList.add('select');
    }

    inspection_list_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        delivery_list_btn.classList.remove('select');
        selectList(inspection_list);
    });
    delivery_list_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        inspection_list_btn.classList.remove('select');
        selectList(delivery_list);
    })
</script>
</body>
</html>

