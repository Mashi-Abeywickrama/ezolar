<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  require_once(__ROOT__.'/app/helpers/session_helper.php');
  if (!array_key_exists('flagUpdate',$_SESSION)){
  $_SESSION['flagUpdate']=0;};

  class Product extends Controller {
    public function __construct(){ 
        $this->ProductModel = $this->model('ProductModel');
    }
    
    public function index(){
      if(!isLoggedIn()){
        redirect('login');
      }
      $rows  = $this->ProductModel-> getAllProducts();
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Products',
      ];

      if ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
        $this->view('Storekeeper/products', $data);
      }
      elseif ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Admin"){
        $this->view('Admin/products', $data);
      }

      
    }
    public function newProductPage(){
      if(!isLoggedIn()){

        redirect('login');
      }
      $data = [
        'title' => 'eZolar NewProduct',
      ];
      $rows = $this->ProductModel->getAllProducts();
      $_SESSION['rows'] = $rows;

      if ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
        $this->view('Storekeeper/add-products', $data);
      }
      elseif ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Admin"){
        $this->view('Admin/add-products', $data);
      }
      // $this->view('Storekeeper/add-products', $data);

    }
    public function newProduct(){
      if(!isLoggedIn()){

        redirect('login');
      }
        $product_Id = $_POST['product-id'];
        $name = $_POST['product-name'];
        $cost = $_POST['price'];
        $manufacturer = $_POST['manufacturer'];
        $quantity = 0;
        $reorderlimit = $_POST['reorder-level'];

        if ($reorderlimit == ''){
          if($_POST['product-type']=='panel'){
            $reorderlimit = 25;
          } else if ($_POST['product-type']=='battery') {
            $reorderlimit = 10;
          } else if ($_POST['product-type']=='inverter') {
            $reorderlimit = 5;
          } else {
            $reorderlimit = 0;
          }
        }
        
        
        $inputs = array($product_Id,$name,$cost,$manufacturer,$quantity,$reorderlimit);
        $this->ProductModel->addProduct($inputs);
        redirect('Product/');

    }

    public function productDetailspage($productID){
      if(!isLoggedIn()){

        redirect('login');
      }
        $row = $this->ProductModel->getProductDetails($productID);
        $_SESSION['row'] = $row;
        $data = [
          'title' => 'eZolar Product details',
        ];

        if ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
          $this->view('Storekeeper/product-details', $data);
        }
        elseif ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Admin"){
          $this->view('Admin/product-details', $data);
        }

        // $this->view('Storekeeper/product-details',$data);

    }

    public function editProduct($productId){
      if(!isLoggedIn()){
        redirect('login');
      }
        $name = $_POST['product-name'];
        $cost = $_POST['price'];
        $manufacturer = $_POST['manufacturer'];
        $reorderlimit = $_POST['reorder-level'];

        if ($reorderlimit == ''){
          $reorderlimit = NULL;
        }
        
        
        $inputs = array($productId,$name,$cost,$manufacturer,$reorderlimit);
        $this->ProductModel->editProduct($inputs);
        $_SESSION['flagUpdate'] = 1;
        redirect('Product/productDetailspage/'.$productId);

    }

    public function editProductPage($productID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $row = $this->ProductModel->getProductDetails($productID);
        $_SESSION['row'] = $row;
        $data = [
          'title' => 'eZolar Edit Product details',
        ];

        if ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
          $this->view('Storekeeper/edit-products', $data);
        }
        elseif ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Admin"){
          $this->view('Admin/edit-products', $data);
        }
        // $this->view('Storekeeper/edit-products',$data);
    }

    public function removeProduct($productID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $this->ProductModel->deleteProduct($productID);

      redirect('Product/');
    }

    public function uploadImage($productID){
      $target_dir = "C:/xampp/htdocs/ezolar/public/img/storekeeper/product-imgs/";
      $file_upload = false;
      // Checking whether a file is uploaded
      if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
          $filename = basename($_FILES["fileToUpload"]["name"]);
          $file_upload = true;
      } else {
          $filename = $_SESSION['user_pic'];
      }
      $target_file = $target_dir . $filename;
      
      
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      if($file_upload){
              // Check if image file is a actual image or fake image
              if (isset($_POST["submit"])) {
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if ($check !== false) {
                      echo "File is an image - " . $check["mime"] . ".";
                      $uploadOk = 1;
                  } else {
                      echo "File is not an image.";
                      $uploadOk = 0;
                  }
              }
              // Check file size
              if ($_FILES["fileToUpload"]["size"] > 500000) {
                  echo "Sorry, your file is too large.";
                  $uploadOk = 0;
              }
              // Allow certain file formats
              if (
                  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                  && $imageFileType != "gif"
              ) {
                  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                  $uploadOk = 0;
              }
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                  echo "Sorry, your file was not uploaded.";
                  // if everything is ok, try to upload file
              } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                      echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                      $this->ProductModel->changeimage($productID,$filename);
                  } else {
                      echo "Sorry, there was an error uploading your file.";
                  }
              }
      }
      redirect('Product/productDetailspage/'.$productID);
    }
}
