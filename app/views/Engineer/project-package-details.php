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
    <link rel="stylesheet" href="\ezolar\public\css\engineer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\engineer.projects.css">
    <link rel="stylesheet" href="\ezolar\public\css\packages-advanced.css">
    <title>My Projects</title>
</head>
<body>
<div class="body-container">
    <div class="left-panel">
        <div class="sidebar-heading">
        <a class="sidebar-anchor" href="/ezolar/user/dashboard"><b>Engineer Dashboard</b></a>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a class="sidebar-anchor" href="/ezolar/EngineerProject"><div class="sidebar-link-container-selected">
                    Assigned Projects
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerSchedule"><div class="sidebar-link-container">
                    My Schedule
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerIssue"><div class="sidebar-link-container">
                    Report an Issue
                </div></a>
            </div>

            <a class="sidebar-anchor" href="/ezolar/User/profile"><div class="sidebar-link-container-bottom">
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
    <div class="dashboard-common-heading-container" style="width:100%;">
            <div class="dashboard-common-heading-back-btn">
                <a href="/ezolar/EngineerProject/projectDetailsPage/<?php echo $_SESSION['PackMod']['Info']->projectID?>" “text-decoration: none”>
                    <img src="\ezolar\public\img\storekeeper\Back.png">
                </a>
            </div>
            <div class="dashboard-common-heading-text" style="display:flex; flex-direction:column; justify-content:center; align-items:start;">
                <div class="dashboard-common-heading-text" style="padding:unset;">
                    <b>Modify Package</b>
                </div>
                <div class="dashboard-common-heading-text" style="font-size:16px; padding:unset;">
                    <?php echo 'Base Package : '.$_SESSION['PackMod']['Info']->name; ?>
                </div>
            </div>
            <div class="dashboard-common-heading-image">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\engineer\Projects.png" alt="Products-icon">
                </a>
            </div>
        </div>  
        <div class="form-table-container" style="width:100%;">
                    <div class="form-table-header-container">
                        <span class="form-table-header-text inventory-col1">Product Name</span>  <span class="form-table-header-text inventory-col2">Price per item</span><span class="form-table-header-text inventory-col3">Quantity</span> <span class="form-table-header-text inventory-col4">Price</span>
                    </div>
                    <div class="form-table-body-container">
                                                <?php
                        $results = $_SESSION['PackMod']['Content'];
                        $counter = 0;
                        $contentTotalPrice = 0;
                        foreach($results as $item){
                            if ($counter == 1){
                                $styleClass = 'form-table-row-container alt-row-colors';
                            }else{
                                $styleClass = 'form-table-row-container';
                            };
                            echo '<div class="'.$styleClass.'">
                            <span class="form-table-row-text inventory-col1">'.$item -> productName .'</span> 
                            <span class="form-table-row-text inventory-col2">'.$item -> cost.'</span> 
                            <span class="form-table-row-text inventory-col3">'.$item -> productQuantity.'</span>
                            <span class="form-table-row-text inventory-col4">'.strval((int)$item -> cost*$item->productQuantity).'</span>
                            </div>';
                            $counter = ($counter+1)%2;
                            $contentTotalPrice += (int)$item -> cost*(int)$item->productQuantity;
                        }
                        ?>
                    </div>
                    <div class="form-table-total-container">
                        <div class="form-table-total-text"><b>Total Product Cost</b></div>
                        <div class="form-table-total-text"><b><?php echo $contentTotalPrice; ?></b></div>
                    </div>
                </div>
                <div class="form-table-container" style="width:100%;">
                    <div class="form-table-header-container">
                        <span class="form-table-header-text extras-col1">Service</span>  <span class="form-table-header-text extras-col2">Price</span>
                    </div>
                    <div class="form-table-body-container" style="height:100px;">
                                                <?php
                        $results = $_SESSION['PackMod']['Extras'];
                        $counter = 0;
                        $extraTotalPrice = 0;
                        foreach($results as $item){
                            if ($counter == 1){
                                $styleClass = 'form-table-row-container alt-row-colors';
                            }else{
                                $styleClass = 'form-table-row-container';
                            };
                            echo '<div class="'.$styleClass.'">
                            <span class="form-table-row-text extras-col1">'.$item -> description .'</span> 
                            <span class="form-table-row-text extras-col2">'.$item -> price.'</span>
                            </div>';
                            $counter = ($counter+1)%2;
                            $extraTotalPrice += (int)$item -> price;
                        }
                        ?>
                    </div>
                    <div class="form-table-total-container">
                        <div class="form-table-total-text"><b>Total Service Cost</b></div>
                        <div class="form-table-total-text"><b><?php echo $extraTotalPrice; ?></b></div>
                    </div>
                </div>
                <div class="form-table-subtotal-container">
                        <div class="form-table-subtotal-text"><b>Total Cost</b></div>
                        <div class="form-table-subtotal-text"><b><?php echo $contentTotalPrice+$extraTotalPrice; ?></b></div>
                </div>
                <div class="form-button-container" style="justify-content:center;">
                <a href="/ezolar/EngineerProject/projectModifyPackPage/<?php echo $_SESSION['PackMod']['Info']->projectID; ?>"><button class="form-submit-btn">Modify Package</button></a>
                <a href="/ezolar/EngineerProject/assignPackagePage/<?php echo $_SESSION['PackMod']['Info']->projectID; ?>"><button class="form-submit-btn">Change Base Package</button></a>
            </div>
            <?php unset($_SESSION['PackMod']) ?>
        </div>
    </div>
    </div>
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
    ?>
</div>
</body>
</html>