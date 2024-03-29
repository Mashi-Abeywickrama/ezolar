<?php
//     define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'\app\views\Customer\navbar.php');
?>

<style>
    .item{ 
    display: flex;
    justify-content: center;
    align-items: center;
    max-height:500px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\storekeeper.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\admin\statistics.css">
    <title>My Projects</title>
</head>
<body>
<div class="body-container">
<div class="left-panel">
            <div class="sidebar-heading">
            <a class="sidebar-anchor" href="/ezolar/user/dashboard"><b>Storekeeper Dashboard</b></a>
            </div>
            <div class="sidebar-link-container-group">
                <div class="sidebar-link-container-top">
                    <a class="sidebar-anchor" href="/ezolar/Inventory"><div class="sidebar-link-container">
                        Inventory
                    </div></a>
                    <a class="sidebar-anchor" href="/ezolar/Product"><div class="sidebar-link-container">
                        Products
                    </div></a>
                    <a class="sidebar-anchor" href="/ezolar/Package"><div class="sidebar-link-container">
                        Packages
                    </div></a>
                    <a class="sidebar-anchor" href="/ezolar/Statistics/salesPerMonth"><div class="sidebar-link-container-selected">
                        Reports & Stats
                    </div></a>
                </div>

                <div class="sidebar-link-container-bottom">
                    <a class="sidebar-anchor" href="/ezolar/User/profile"><div class="sidebar-link-container">
                        Profile
                    </div></a>
                    <a class="sidebar-anchor" href=""><div class="sidebar-link-container">
                        Settings
                    </div></a>
                </div>
            </div>
        </div>
<div class="common-main-container">
<!--    --><?php //print_r($_SESSION) ;?>
    <div class="dashboard-common-heading-and-background-container" style="width: auto; max-width: none;">
        <div class="dashboard-common-heading-container">
            <div class="dashboard-common-heading-back-btn">
                <a href="/ezolar/Employee/Employees" “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\back.png" alt="back-icon">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b>Reports</b>
            </div>
            <div class="dashboard-common-heading-image">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\employees.png" alt="employees-icon">
                </a>
            </div>

        </div>

        <div class="wrapper">
            <div class="tabs_wrap">
                <ul>
                    <li data-tabs="sales" class="active">Sales</li>
                    <li data-tabs="packages">Packages</li>
                    <li data-tabs="schedules">Schedules</li>
                </ul>
            </div>
        </div>

        <div id="sales" class="sales">
            <div class="item">
                <canvas id="salesPerMonthChart"></canvas>
            </div>
        </div>
        <div id="packages" class="packages">
            <div class="item">
                <canvas id="packagesSoldChart"></canvas>
            </div>
        </div>
        <div id="schedules" class="schedules">
            <div class="item">
                <canvas id="SchedulesPerMonthChart"></canvas>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="\ezolar\public\js\tabMenu.js"></script>
<script type="text/javascript" src="\ezolar\public\js\statistics.js"
        data-labels="<?php echo htmlspecialchars(json_encode($_SESSION['labels'])); ?>"
        data-data="<?php echo htmlspecialchars(json_encode($_SESSION['data'])); ?>"
        data-packages="<?php echo htmlspecialchars(json_encode($_SESSION['packages-sold'])); ?>"
        data-inspection="<?php echo htmlspecialchars(json_encode($_SESSION['inspection'])); ?>"
        data-delivery="<?php echo htmlspecialchars(json_encode($_SESSION['delivery'])); ?>">
<?php unset($_SESSION['labels'],$_SESSION['data'],$_SESSION['packages-sold'],$_SESSION['inspection'],$_SESSION['delivery'])?>
</script>
</div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
</body>
</html>
