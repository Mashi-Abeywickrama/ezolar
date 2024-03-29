<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__ . '/app/helpers/session_helper.php');

class Statistics extends Controller
{
    public function __construct()
    {
        $this->StatisticsModel = $this->model('statisticsModel');
    }

    public function index()
    {

    }

    public function salesPerMonth(){
        if (!isLoggedIn()) {
            redirect('login');
        }

        $data = $this->StatisticsModel->salesPerMonth();
        $previousData = $this->StatisticsModel->salesPerMonthPreviousYear();
        $data1 = $this->StatisticsModel->packageSales();
        $inspection = $this->StatisticsModel->inspectionPerMonth();
        $delivery = $this->StatisticsModel->deliveriesPerMonth();
        $labels = array('January','February','March','April','May','June','July','August','September','October','November','December');
        $_SESSION['data'] = $data;
        $_SESSION['previous-data'] = $previousData;
        $_SESSION['labels'] = $labels;
        $_SESSION['packages-sold'] = $data1;
        $_SESSION['inspection'] = $inspection;
        $_SESSION['delivery'] = $delivery;
        $data = [
            'title' => 'ezolar sales statistics',
        ];
        if ($this->StatisticsModel->getUserRole($_SESSION['user_email']) == "Admin"){
            $this->view('Admin/statistics', $data,$data1);
        } else if ($this->StatisticsModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
            $this->view('Storekeeper/statistics', $data,$data1);
        }
    }

    public function packageSales(){
        if (!isLoggedIn()) {
            redirect('login');
        }

        $data = $this->StatisticsModel->packageSales();
        $_SESSION['packages-sold'] = $data;
        $data = [
            'title' => 'ezolar package sale statistics',
        ];
        if ($this->StatisticsModel->getUserRole($_SESSION['user_email']) == "Admin"){
            $this->view('Admin/statistics', $data);
        } else if ($this->StatisticsModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
            $this->view('Storekeeper/statistics', $data);
        }
    }  

}
