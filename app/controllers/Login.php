<?php

  class Login extends Controller {
    public function __construct(){ 
    }
    
    public function index(){
      $data = [
        'title' => 'eZolar Login',
      ];
     
      $this->view('Includes/header', $data);
      $this->view('Includes/footer', $data);
      $this->view('Includes/navbar', $data);
      $this->view('Authentication/login', $data);
    }

  }