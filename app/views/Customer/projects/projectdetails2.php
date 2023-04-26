<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    //  require_once(__ROOT__.'\app\views\Includes\header.php');
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
        require_once(__ROOT__.'\app\views\popupList\scheduleDatesUpdate.php');
        require_once(__ROOT__.'\app\views\popupList\payment.php');

            // calling popup for date selection
        if (isset($_GET['add-schedule-btn'])) {
            print_r("Shit");
            echo '
            <script>
                document.getElementById('."'id04'".').style.display='."'block'".';
            </script>
            
            ';
        }
            // calling popup for uploading payment reciept
        if (isset($_GET['make-payment-btn'])) {
            print_r("Shit");
            echo '
            <script>
                document.getElementById('."'id03'".').style.display='."'block'".';

            </script>
            
            ';
        }
        
    ?>

<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Customer Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>#"><div class="box7">
            Packages
        </div></a>
            <a href="<?=URLROOT?>/project"><div class="box2">
                    My Projects
                </div></a>
                <a href="<?=URLROOT?>/inquiry"><div class="box3">
                    Inquiries
                </div></a>
                <a href="<?=URLROOT?>/transaction"><div class="box4">
                    Transactions
                </div></a>
            </div>
            <div class="rest-bottom">
            <a href="<?=URLROOT?>/user/profile"><div class="box5">
                    Profile
                </div></a>
                <a href="<?=URLROOT?>/customersettings"><div class="box6">
                    Settings
                </div></a>
            </div>
        </div>
    </div>

    <div class="common-main-container">
        
            <div class="dashboard-common-heading-container">
                <div class="dashboard-common-heading-back-btn">
                    <a href="../" “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Back.png">
                    </a>
                </div>
                <div class="dashboard-common-heading-text">
                    <b>Ongoing Project Details</b>
                </div>
            </div>
        <div class="project-details-main-container">
            <div class="project-details-container">
                <div class="project-progress-bar-wrapper">
                    <div class="project-progress-bar-container">
                        <div class="project-progress-bar-bullet-container">
                        <a id="c1-link" href="<?=URLROOT?>/project/projectdetails/1?project_id=<?=$_GET['project_id']?>"><div id="circle-1" class="project-progress-bar-bullet-highlighted"></div></a>
                            <div class="project-progress-bar-bullet-text">Request</div>
                        </div>
                        <div class="project-progress-bar-bullet-container">
                        <a id="c2-link" href="<?=URLROOT?>/project/projectdetails/2?project_id=<?=$_GET['project_id']?>"><div id="circle-2"  class="project-progress-bar-bullet-highlighted"></div></a>
                            <div class="project-progress-bar-bullet-text">Inspection Scheduling</div>
                        </div>
                        <div class="project-progress-bar-bullet-container">
                        <a id="c3-link" href="<?=URLROOT?>/project/projectdetails/3?project_id=<?=$_GET['project_id']?>"><div id="circle-3" class="project-progress-bar-bullet"></div></a>
                            <div class="project-progress-bar-bullet-text">Inspection</div>
                        </div>
                        <div class="project-progress-bar-bullet-container">
                        <a id="c4-link" href="<?=URLROOT?>/project/projectdetails/4?project_id=<?=$_GET['project_id']?>"><div id="circle-4"  class="project-progress-bar-bullet"></div></a>
                            <div class="project-progress-bar-bullet-text">Payment & Scheduling</div>
                        </div>
                        <div class="project-progress-bar-bullet-container">
                            <a id="c5-link" href="<?=URLROOT?>/project/projectdetails/5?project_id=<?=$_GET['project_id']?>"><div id="circle-5"  class="project-progress-bar-bullet"></div></a>
                            <div class="project-progress-bar-bullet-text">Delivery & Installation</div>
                        </div>
                    </div>
                    <div class="project-progress-bar " style="background-color: #DE8500;" id="pro-bar1"></div>
                    <div class="project-progress-bar1" id="pro-bar2"></div>
                    <div class="project-progress-bar2" id="pro-bar3"></div>
                    <div class="project-progress-bar3" id="pro-bar4"></div>
                    
                </div>
                <div class="project-details-inline">
                    <div class="project-details-steps-container">
                    <span id="request-received" class="project-details-steps-text">Date Selection</span>
                        <span id="salesperson-assignment" class="project-details-steps-text">Date Confirmation</span>
                        <?php
                             if ($data['schedule'][0]->isConfirmed != 2) {
                                echo  '';
                            } else {
                                echo ' <p> Dates Not Available. Please Schedule Again.</p>';
                            }
                         ?>
                        <span id="payment-verify" class="project-details-steps-text">Engineer Assignment
                        <span class="project-details-steps-text" ></span>
                    </div>
                    <div class="project-details-info-container">
                        <b>Project No:</b> <?php echo $data['project'][0]->projectID ?> <br>
                        <b>Site Location:</b> <?php echo $data['project'][0]->siteAddress ?> <br>
                        <b>Package:</b><?php
                        if (($data['project'][0]->Package_packageID) == NULL) {
                            echo 'Pending ';
                        } else {
                            echo $data['project'][0]->Package_packageID;
                        }
                        
                        ?> <br>
                        <b>Salesperson:</b>
                        <?php
                        if (($data['project'][0]->Salesperson_Employee_empID) == NULL) {
                            echo 'Pending ';
                        } else {
                            echo $data['salesperson'][0]->name;
                        }
                        
                        ?> 
                        <br>
                        <b>Contractor ID:</b> 
                        <?php
                        if (empty($data['contractor'])) {
                            echo 'Not Assigned ';
                        } else {
                            echo $data['contractor'][0]->name;
                        }
                        
                        ?>  <br>
                        <b>Scheduled Dates:</b> 
                        <?php
                        if ($data['schedule'][0]->isConfirmed == 1) {
                            echo  $data['schedule'][0]->date;
                        } else {
                            echo ' None';
                        }
                        
                         ?>
                        <br>
                        
                        <?php
                        if (($data['project'][0]->status) == "C0" || ($data['project'][0]->status) == "C1" || ($data['project'][0]->status) == "C2") {
                           echo '<b>Engineer:</b> '
                            . $data['engineer'][0]->name . '<br>';
                        }
                        
                         ?>
                        
                    </div>
                </div>
                <div  class="project-details-btn-container">
                    <div class="add-schedule-btn" name="add-schedule-btn" id= "add-schedule-btn" onclick="document.getElementById('id04').style.display='block'">
                        <div class="add-schedule-btn-text">
                        Schedule 
                        </div>
                    </div>
                    <div class="make-inquiry-btn">
                        <div class="make-inquiry-btn-text">
                        <a href="/ezolar/project/">Send Inquiry</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-side-container">
                <div class = "project-salesperson-flip">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="flip-text-div">
                                <p><b>John Doe</b>(Salesperson)</p>
                            </div>
                            <div class="flip-img-div">
                                <img class="flip-img" src="\ezolar\public\img\user-pics\mee.jpeg" alt="Avatar">
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <h1>John Doe</h1>
                            <p>Architect & Engineer</p>
                            <p>We love that guy</p>
                        </div>
                    </div>
                </div>
                <div class = "project-engineer-flip">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="flip-text-div">
                                <p><b>John Doe</b>(Engineer)</p>
                            </div>
                            <div class="flip-img-div">
                                <img class="flip-img" src="\ezolar\public\img\user-pics\mee.jpeg" alt="Avatar">
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <h1>John Doe</h1>
                            <p>Architect & Engineer</p>
                            <p>We love that guy</p>
                        </div>
                    </div>
                </div>
                <div class = "project-contractor-flip">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="flip-text-div">
                                <p><b>John Doe</b>(Contractor)</p>
                            </div>
                            <div class="flip-img-div">
                                <img class="flip-img" src="\ezolar\public\img\user-pics\mee.jpeg" alt="Avatar">
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <h1>John Doe</h1>
                            <p>Architect & Engineer</p>
                            <p>We love that guy</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</div>
<?php 

    if (($data['project'][0]->status) == "B0") { ?>
        <script>

            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;
            document.getElementById('add-schedule-btn').style.display = "none";

            document.getElementById('c3-link').removeAttribute("href"); 
            document.getElementById('c3-link').style.cursor="default";
            document.getElementById('c4-link').removeAttribute("href"); 
            document.getElementById('c4-link').style.cursor="default";
            document.getElementById('c5-link').removeAttribute("href"); 
            document.getElementById('c5-link').style.cursor="default";  


        </script>
    <?php } elseif (($data['project'][0]->status) == "B1") { ?>
        <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;
            
            document.getElementById('c3-link').removeAttribute("href"); 
            document.getElementById('c3-link').style.cursor="default";
            document.getElementById('c4-link').removeAttribute("href"); 
            document.getElementById('c4-link').style.cursor="default";
            document.getElementById('c5-link').removeAttribute("href"); 
            document.getElementById('c5-link').style.cursor="default"; 


        </script>
        <?php 
        if ($data['schedule'][0]->isConfirmed == 1) { ?>
            <script>
                document.getElementById('add-schedule-btn').style.display = "none";
            </script>
        <?php } 
        
        ?>
        
        
    <?php } elseif (($data['project'][0]->status) == "C0") { ?>
        <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";
            document.getElementById("payment-verify").style.color = "#DE8500";
            document.getElementById("payment-verify").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;

            
            document.getElementById('c4-link').removeAttribute("href"); 
            document.getElementById('c4-link').style.cursor="default";
            document.getElementById('c5-link').removeAttribute("href"); 
            document.getElementById('c5-link').style.cursor="default"; 
            


        </script>
        
    <?php if (($data['inspectionpayment'][0]->isVerified) == 0) { ?>
        <script>
            document.getElementById('add-schedule-btn').style.display = "none";
        </script>
    <?php } 
    if (($data['inspectionpayment'][0]->isVerified) == 1) { ?>
        <script>
             document.getElementById('make-payment-btn').style.display = "none";
        </script>
    <?php } 
    if (($data['inspectionpayment'][0]->isVerified) == 2) { ?>
        <script>
            document.getElementById('add-schedule-btn').style.display = "none";
        </script>
    <?php } 

} if (($data['project'][0]->status) == "C0" || ($data['project'][0]->status) == "C1"  || ($data['project'][0]->status) == "F") { ?>
         <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";
            document.getElementById("payment-verify").style.color = "#DE8500";
            document.getElementById("payment-verify").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;
            document.getElementById('add-schedule-btn').style.display = "none";

            document.getElementById('pro-bar1').style.backgroundColor = "#DE8500";
            document.getElementById('circle-2').style.backgroundColor = "#DE8500";

            document.getElementById('pro-bar2').style.backgroundColor = "#DE8500";
            document.getElementById('circle-3').style.backgroundColor = "#DE8500";

            document.getElementById('c4-link').removeAttribute("href"); 
            document.getElementById('c4-link').style.cursor="default";
            document.getElementById('c5-link').removeAttribute("href"); 
            document.getElementById('c5-link').style.cursor="default";


            


        </script>

<?php } if (($data['project'][0]->status) == "D0" || ($data['project'][0]->status) == "D1") { ?>
         <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";
            document.getElementById("payment-verify").style.color = "#DE8500";
            document.getElementById("payment-verify").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;
            document.getElementById('add-schedule-btn').style.display = "none";

            document.getElementById('pro-bar1').style.backgroundColor = "#DE8500";
            document.getElementById('circle-2').style.backgroundColor = "#DE8500";

            document.getElementById('pro-bar2').style.backgroundColor = "#DE8500";
            document.getElementById('circle-3').style.backgroundColor = "#DE8500";

            document.getElementById('pro-bar3').style.backgroundColor = "#DE8500";
            document.getElementById('circle-4').style.backgroundColor = "#DE8500";

            
            document.getElementById('c5-link').removeAttribute("href"); 
            document.getElementById('c5-link').style.cursor="default";


            


        </script>

<?php } if (($data['project'][0]->status) == "E0" ) { ?>
         <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";
            document.getElementById("payment-verify").style.color = "#DE8500";
            document.getElementById("payment-verify").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;
            document.getElementById('add-schedule-btn').style.display = "none";

            document.getElementById('pro-bar1').style.backgroundColor = "#DE8500";
            document.getElementById('circle-2').style.backgroundColor = "#DE8500";

            document.getElementById('pro-bar2').style.backgroundColor = "#DE8500";
            document.getElementById('circle-3').style.backgroundColor = "#DE8500";

            document.getElementById('pro-bar3').style.backgroundColor = "#DE8500";
            document.getElementById('circle-4').style.backgroundColor = "#DE8500";

            document.getElementById('pro-bar4').style.backgroundColor = "#DE8500";
            document.getElementById('circle-5').style.backgroundColor = "#DE8500";

            
            document.getElementById('c5-link').removeAttribute("href"); 
            document.getElementById('c5-link').style.cursor="default";


            


        </script>

<?php } ?>

<div class = "f">
    <?php 
        $this->view('Includes/footer', $data);
    ?>
</div>
</body>
</html>