<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));

class Contractor extends Controller
{
    public function __construct()
    {
       $this->userModel = $this->model('userModel');
      $this->projectModel = $this->model('ProjectModel');
      $this->issueModel = $this->model('IssueModel');
    }
    public function index(){

        if(!isLoggedIn()){
  
          redirect('login');
        }
        $data = [
          'title' => 'eZolar My Schedule',
        ];
        $this->view('Contractor/dashboard', $data);
      }
  
    public function reportIssue()
    {
      if(!isLoggedIn()){
  
        redirect('login');
      }
      $rows = $this->projectModel->getContractorProjects($this->projectModel->getUserID([$_SESSION['user_email']]));
    $_SESSION['rows'] = $rows;
    // print_r($rows);die;
        $data = [
            'title' => 'eZolar Login',
        ];

        $this->view('Contractor/reportissue', $data);
    }

    public function newIssue(){
      if(!isLoggedIn()){
  
        redirect('login');
      }
      $contractor_info = $this->issueModel->getUser([$_SESSION['user_email']]);
      $UserID = $contractor_info -> userID;
      // print_r($_POST);die;
      $project_ID = $_POST['project-id'];
      $topic = $_POST['topic-box'];
      $message = $_POST['msg-box'];
      
      
      $inputs = array($UserID,$project_ID,$topic,$message);
      $this->issueModel->addIssue($inputs);
      redirect('User/dashboard');
      
    }
    public function ongoingprojects()
    {
      if(!isLoggedIn()){
  
        redirect('login');
      }
        $data = [
            'title' => 'eZolar Login',
        ];
        $this->view('Contractor/acceptedProjects', $data);
    }
    public function projectrequests()
    {
      if(!isLoggedIn()){
  
        redirect('login');
      }
      $rows = $this->projectModel->getContractorProjectsRequest($this->projectModel->getUserID([$_SESSION['user_email']]));
    // print_r($rows);die();

      
        $data = [
            'title' => 'eZolar Login',
            'project' => $rows,
        ];
        $this->view('Contractor/projectRequests', $data);
    }

    //get contractors completed projects
    public function completedprojects(){
      if(!isLoggedIn()){
  
        redirect('login');
      }
      if (isset($_GET['project_id'])) {
        $product = $this->projectModel->getproduct($_GET['project_id']);
      }
      if (isset($_GET['projectid'])) {
        $project = $this->projectModel->getProjectDetailsCustomer($_GET['projectid']);
        $salesperson = $this->projectModel->getSalesPersonDetails($_GET['projectid']);
        $schedule = $this->projectModel->getdSchedule($_GET['projectid']);
        // print_r($salesperson);die();
        $engineer = $this->projectModel->getEngineer($_GET['projectid']);
        $data = [
          'title' => 'eZolar COntractor Assigned Projects',
          'project' => $project,
          'schedule' => $schedule,
          'salesperson' => $salesperson,
          'engineer' => $engineer

        ];
      }
      $rows = $this->projectModel->getContractorProjects($this->projectModel->getUserID([$_SESSION['user_email']]));
    // print_r($rows);die;
    $_SESSION['rows'] = $rows;
    
    if (isset($_GET['project_id'])) {
      $data = [
        'title' => 'eZolar Contractor Completed Projects',
        'product' => $product,
        'rows' => $rows,
      ];
    }
    if(!isset($_GET['project_id']) && !isset($_GET['projectid'])){
      $data = [
        'title' => 'eZolar Contractor Completed Projects',
        'rows' => $rows
      ];
    }
      $this->view('Contractor/completedProjects', $data);
    }


    public function schedule(){
      if(!isLoggedIn()){
  
        redirect('login');
      }
        $data = [
            'title' => 'eZolar Login',
        ];
        if ($this->userModel->getUserRole($_SESSION['user_email'])=='Contractor'){
        $this->view('Contractor/schedule', $data);
        }
        else{
        $this->view('Customer/error', 'Access Denied');
        }
    }

    public function projectdetails($id)
    {
      //  print_r($id);die();
      if(!isLoggedIn()){
  
        redirect('login');
      }

        $product = $this->projectModel->getproduct($id);
        $project = $this->projectModel->getProjectDetails($id);
        $cus_details = $this->userModel->getProfile($project[0]->customerID,'Customer');
        
        // print_r($cus_details);die();
        $salesperson = $this->projectModel->getSalesPersonDetails($id);
        $schedule = $this->projectModel->getdSchedule($id);
        
        $engineer = $this->projectModel->getEngineer($id);
        // print_r($product);die();
        $data = [
          'title' => 'eZolar COntractor Assigned Projects',
          'product' => $product,
          'project' => $project,
          'schedule' => $schedule,
          'salesperson' => $salesperson,
          'engineer' => $engineer,
          'cus_details' => $cus_details

        ];
      
        if ($this->userModel->getUserRole($_SESSION['user_email'])=='Contractor'){
          $this->view('Contractor/projectDetails', $data);
        }

        else{
          $this->view('Customer/error', 'Access Denied');
        }
    }

    public function reject_project($scheduleID,$project_ID) {
      
        $con_id =$this->projectModel->getUserID([$_SESSION['user_email']]);
        $res = $this->projectModel->rejectScheduleCon($scheduleID,$con_id);
        if ($res) {
          redirect('contractor/projectrequests');
        }
    }

    public function accept_project($scheduleID,$project_ID) {
        $con_id =$this->projectModel->getUserID([$_SESSION['user_email']]);
        $res = $this->projectModel->acceptScheduleCon($scheduleID,$con_id);
        $scheContr = $this->projectModel->getConCount($project_ID);

    if (empty($scheContr)) {
      $scheduleConCheck = $this->projectModel->getDeliveryScheduleDetails($project_ID);
      
    if ($scheduleConCheck == -3) {
      $schedule = $this->projectModel->getdSchedule($project_ID);
      $schedule = $schedule[0]->scheduleID;
      
      $scheduleDates = $this->projectModel->getDeliveryScheduleDates($project_ID);
      
      $check = $this->projectModel->checkContractor($scheduleDates[0]->requested_date);
      
      if ($check == -1) {
        $check2 = $this->projectModel->checkContractor($scheduleDates[1]->requested_date);
        if ($check2 == -1) {
          $check3 = $this->projectModel->checkContractor($scheduleDates[2]->requested_date);
          if ($check3 == -1) {
            $results = $this->projectModel->rejectSchedule($schedule);
          } else {
            $results = $this->projectModel->addNewScheduleCon($schedule, $check3, $scheduleDates[2]->requested_date);
          }
          
        }else{
          $results = $this->projectModel->addNewScheduleCon($schedule, $check2, $scheduleDates[1]->requested_date);
        }
      }
      else{
        $results = $this->projectModel->addNewScheduleCon($schedule, $check, $scheduleDates[0]->requested_date);
      }
    }else if ($scheduleConCheck > 0){
        $results = $this->projectModel->addCon($project_ID,$scheduleConCheck);

    }
    }
        if ($res) {
          redirect('contractor/projectrequests');
        }
    }

    public function reports()
    {
      if(!isLoggedIn()){
  
        redirect('login');
      }
        $con_id =$this->projectModel->getUserID([$_SESSION['user_email']]);
        $res = $this->projectModel->getReport($con_id);
        $res2 = $this->projectModel->getReport2();
        // print_r($res);die();
        $data = [
            'title' => 'Contractor Reports',
            'completed' => $res,
            'total' => $res2
        ];
      if ($this->userModel->getUserRole($_SESSION['user_email'])=='Contractor'){
        $this->view('Contractor/reports', $data);
      }
      
      else {
        $this->view('Customer/error', 'Access Denied');
      }
    }
    
    public function settings()
    {
        if(!isLoggedIn()){

            redirect('login');
        
        }
        $data = [
            'title' => 'eZolar Settings',
        ];
        if ($this->userModel->getUserRole($_SESSION['user_email'])=='Contractor'){
          $this->view('Contractor/settings', $data);
        }
        
        else {
          $this->view('Customer/error', 'Access Denied');
        }
        

    }
}