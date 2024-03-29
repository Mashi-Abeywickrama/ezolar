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
    <link rel="stylesheet" href="\ezolar\public\css\customer.transaction.css">
    <script
			src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
			integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer">
    
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

    <title>My transactions</title>
</head>
<body>
    <!-- Let's write a function in JS to download the transaction details -->
    <script>
        function exportpdf()
        {
            
            const front = document.getElementById("transaction-detail-box");
		    html2canvas(front).then((canvas) => {
			let base64image = canvas.toDataURL('image/png');
			//console.log(base64image);
			let pdf = new jsPDF('1', 'mm' , [420, 220]); 
			pdf.addImage(base64image, 'PNG', 10, 10, 400,200);
            // var filename = 'transaction'+ '.pdf'; 
			pdf.save('transaction'  + '.pdf');
            });
        }
        // const doc = new jsPDF();
        // Generate a random number for the file name
        // const random = Math.floor(Math.random() * 1000000001);
        // const filename = 'transaction' + random + '.pdf';
        // Use doc.fromHTML() method to add the HTML content to the PDF document
        // doc.fromHTML(targetDiv, 15, 15, {
        //   'width': 170
        // }, function() {
        //   Download the PDF file
        //   doc.save(filename);
        // });
    </script>
    
<div class="body-container">
    <?php
        require_once(__ROOT__.'\app\views\Customer\navigationpanel.php');
    ?>

    <div class="common-main-container">
        <div class="dashboard-common-heading-container">
            <div class="dashboard-common-heading-back-btn">
                <a href="<?=URLROOT?>/transaction" “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\back.png">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b>Transaction</b>
            </div>

        </div>

        <div class="body-list-container">
            
            <div class="transaction-detail-box" id = "transaction-detail-box">
                <div class = "transaction-detail-box-inner-boarder">
                    <?php
                    
                    echo '
                        <div class="transaction-d-text"><b>Invoice</b></div>
                        <hr></hr>
                        <div class="transaction-d-text2"><b>Invoice ID : </b>' . $data['transcaction'][0] -> receiptID . '</div>
                        <div class="transaction-d-text2"><b>Project ID: </b>' .  $data['transcaction'][0] -> Project_projectID . '</div>
                        <div class="transaction-d-text2"><b>Verification: </b>' .  $data['transcaction'][0] -> isVerified . '</div>
                        <div class="transaction-d-text2"><b>Verified By: </b>' .  $data['transcaction'][0] -> Salesperson_Employee_empID . '</div>
                        <div class="transaction-d-text2"><b>Uploaded Time: </b>' .  $data['transcaction'][0] -> uploadedTime . '</div>
                    ';

                    if (empty( $data['transcaction'][0] -> Package_packageID) == false ||  $data['transcaction'][0] -> receiptPurpose == "Order Confirmation" ){
                        echo '
                            <div class="transaction-d-text2"><b>Package : </b>' . $data['transcaction'][0] -> Package_packageID . '</div>
                            <div class="transaction-d-text2"><b>Package Info</b></div>
                            
                            ';
                            ?>
                        <table style="width:75%">
                            <tr>
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                            </tr>
                            <?php 

                            $totalCost = 0;
                            foreach ($data['product'] as $row) {
                                echo '
                                <tr>
                                    <td>'.$row ->productID.'</td>
                                    <td>'.$row ->productName.'</td>
                                    <td>'.$row ->productQuantity.'</td>
                                </tr>';
                                $product = ($row ->productQuantity)*($row ->cost);
                                $totalCost = $totalCost + $product;
                            }
                            ?>    
                        </table>
                        <div class="transaction-d-text2"><b>Total Cost:</b>Rs.<?php echo $totalCost?></div>

                    <?php }
                    echo'<div class="transaction-d-text2"><b>Description: </b>' .  $data['transcaction'][0] -> receiptPurpose . '</div>';
                    ?>
                    <hr></hr>
                    <div class="transaction-d-text"><b>Thank You!</b></div>
            </div>
            </div>
            <div class="transaction-details-download-btn" onclick="exportpdf()">  
                <span class="transaction-details-btn-text">Download</span>
                <span class="download-img-c"><img class="download-img" src="\ezolar\public\img\customer\download.png" alt="Download-transaction">
                </span>
            </div>
        </div>
    </div>
</div>
<div class = "f">
    <?php 
          $this->view('Includes/footer', $data);
    ?>
</div>
</body>

</html>
