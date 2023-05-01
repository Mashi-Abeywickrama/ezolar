<?php
require_once(__ROOT__.'\app\views\Customer\navbar.php');
require(__ROOT__.'\app\libraries\Calendar.php');

     $calendar = new Calendar();
     $calendar->setYear($_SESSION['row']['year']);
     $calendar->setMonth($_SESSION['row']['mon']);

     $calendar->create();

    $JSarrayString = "[";
    foreach ($_SESSION['rows'] as $S_item){
        //item = [date id, schedulte id, schedule type, project ID, site address]
        $item = "[";
        $item .= '"date-'.substr($S_item->date,0,4).'-'.substr($S_item->date,5,2).'-'.substr($S_item->date,8,2).'",';
        $item .= '"'.$S_item->scheduleID.'",';
        $item .= '"'.$S_item->type.'",';
        $item .= '"'.$S_item->Project_projectID.'",';
        $item .= '"'.$S_item->siteAddress.'"]';

        $JSarrayString .= $item.',';
    }
    $JSarrayString = substr_replace($JSarrayString, "]", -1)

>>>>>>> main
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>eZolar Dashboard</title>
</head>
<body>
<div class="body-container">
    <?php
        require_once(__ROOT__.'\app\views\Contractor\navigationpanel.php');
    ?>

    <div class="common-main-container">
        <div class="sec1">
            <div class="calendar">
                <div class="clandar-header-container">
                    <span class="calendar-header-text"><?php echo $calendar->getMonthName().' '.$calendar->getYear();
                    $nextMonth = $calendar->getNextMonth();
                    $nextMonthLink = '/ezolar/ContractorSchedule/browse/'.$nextMonth[1].'/'.$nextMonth[0];
                    $prevMonth = $calendar->getPrevMonth();
                    $prevMonthLink = '/ezolar/ContractorSchedule/browse/'.$prevMonth[1].'/'.$prevMonth[0];
                    ?></span>
                    <div class="calendar-month-btn-container">
                        <a href="<?php echo $prevMonthLink?>"><button class="calendar-month-btn"><img src="\ezolar\public\img\engineer\Back.png" alt="Back" class="calendar-month-btn-img"></button></a>
                        <a href="<?php echo $nextMonthLink?>"><button class="calendar-month-btn"><img src="\ezolar\public\img\engineer\Forward.png" alt="Back" class="calendar-month-btn-img"></button></a>
                    </div>
                </div>
                <table class="calendar-table">
                    <tr>
                        <?php foreach($calendar->getWeekDays() as $dayName){
                            echo '<th class="calendar-th">'.$dayName.'</th>';
                        };?>
                    </tr>
                    <?php 
                        $dateIDpref = 'date-'.$calendar->getYear().'-'.str_pad(strval($calendar->getMonth()),2,'0',STR_PAD_LEFT);
                        foreach ($calendar->getweeks() as $week){
                        echo '<tr>';
                        foreach ($week as $dayNo){
                            echo '<td class="calendar-td"><div class="calendar-date-container">'.$dayNo.'<div class="calendar-event-list-container" id="'.$dateIDpref.'-'.str_pad(strval($dayNo),2,'0',STR_PAD_LEFT).'"></div></div></td>';
                        }
                        echo '</tr>';
                    }?>

                    <script>
                        var schedule_items = <?php echo $JSarrayString;?>;
                        schedule_items.forEach(displayEvent);

                        function displayEvent(item){
                            var id = item[0];
                            var element = document.getElementById(id);
                            var event_list = element.innerHTML;
                            var className = "calendar-event-container";
                            if (item[2] == "Inspection"){
                                className += ' event-inspection';
                            } else if (item[2] == "Delivery") {
                                className += ' event-delivery';
                            } else {
                                className += ' event-pending';
                            }
                            var new_event = "<a href=\"/ezolar/Contractor/projectDetailsPage/"+item[3]+"\" class=\"calendar-event-anchor\"><div class=\""+className+"\">"+ item[2] +" : "+ item[3].toUpperCase() +"</div></a>"; 
                            
                            event_list = event_list + new_event;
                            element.innerHTML = event_list;
                        }
                    </script>
                </table>
            </div>

            
        </div>
        <div class="sec2">
            <div class="ongoing">
                <div class="text">
                    Pending Requests
                </div>
                <div class="count">
                    0
                </div>
            </div>
            <div class="completed">
                <div class="text">
                Ongoing Projects
                </div>
                <div class="count">
                    0
                </div>
            </div>
            <div class="cancelled">
                <div class="text">
                Completed Projects
                </div>
                <div class="count">
                    0
                </div>
            </div>
        </div>
    </div>
</div>
<div class = "f"> 
    <?php require_once(__ROOT__.'\app\views\Includes\footer.php'); ?>
</div>
<script type="text/javascript" src="\ezolar\public\js\validation.js"></script>
</body>
</html>