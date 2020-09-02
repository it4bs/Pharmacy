<!DOCTYPE html>
<html>
<head>

<link rel='icon' href='./img/pharmacy.png'/>
    <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta name="author" content="pharmacys"> 
  <title>Admin Dashboard</title> 
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="css/font-awesome.css" rel="stylesheet" type="text/css"> 
  <link href="styles.css" rel="stylesheet" type="text/css">
  <link href="../style.css" rel="stylesheet" type="text/css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
	<?php
    require_once('auth.php');
    include('../connect.php');
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
    </head>

	<body>
	<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='cashier') {
?>
<h3>your are <?php echo $position?></h3>
<?php
}
else if($position=='admin') {
?>
	<?php include('navfixed.php');?>
<?php
}
?>

    
   
    
    <div class="container-2">
     <div id="page-wrapper">   
      <div class="row">
     <div class="col-md-12">
      <div class="page-title">
    	  <ol class="breadcrumb">  
    	     <h2 class="h2-breadcrumb">Dashboard<small>Content Overview</small></h2>
        </ol>
       </div>
      </div>
     </div> 
                                
        <div class="row" >
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-orange">
                                <i class="fa fa-line-chart card" aria-hidden="true"></i>
                                </div>
                                
                            </a>
                            <div class="circle-tile-content dark-orange">
                                <div class="circle-tile-description text-faded">
                                    Products
                                </div>
                                <div class="circle-tile-number text-faded">
                                <?php
                                    $resultas = $db->prepare("SELECT count(product_id) FROM products");
                                    $resultas->execute();
                                    for($i=0; $rowas = $resultas->fetch(); $i++){
                                    $products_count=$rowas['count(product_id)'];
                                }
                                echo $products_count;
                                ?>
                                    <span id="sparklineA"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">View All <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-green">
                                <i class="fa fa-users card" aria-hidden="true"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-green">
                                <div class="circle-tile-description text-faded">
                                    Registerd Users
                                </div>
                                <div class="circle-tile-number text-faded">
                                <?php
                                    $resultas = $db->prepare("SELECT COUNT(customer_id) FROM `customer`");
                                    $resultas->execute();
                                    for($i=0; $rowas = $resultas->fetch(); $i++){
                                    $customers=$rowas['COUNT(customer_id)'];
                                }
                                echo $customers;
                                ?>
                                <span id="sparklineA"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">View All <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                        <a href="supplier.php">
                                <div class="circle-tile-heading dark-pink">
                                <i class="fa fa-truck card" aria-hidden="true"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-pink">
                                <div class="circle-tile-description text-faded">
                                supplier
                                </div>
                                <div class="circle-tile-number text-faded">
                                <?php
                                    $resultas = $db->prepare("SELECT count(suplier_id) FROM supliers");
                                    $resultas->execute();
                                    for($i=0; $rowas = $resultas->fetch(); $i++){
                                    $suplier_count=$rowas['count(suplier_id)'];
                                }
                                echo $suplier_count;
                                ?>
                                </div>
                                <a href="supplier.php" class="circle-tile-footer">View All <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-gray">
                                <i class="fa fa-exclamation-triangle card" aria-hidden="true"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-gray">
                                <div class="circle-tile-description text-faded">
                                    Low Stock Alerts
                                </div>
                                <div class="circle-tile-number text-faded">
                                <?php
                                    $resultas = $db->prepare("SELECT count(product_id) FROM products where qty < 10");
                                    $resultas->execute();
                                    for($i=0; $rowas = $resultas->fetch(); $i++){
                                    $low_stock=$rowas['count(product_id)'];
                                }
                                echo $low_stock;
                                ?>
                                </div>
                                <a href="#" class="circle-tile-footer">View All <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue">
                                <i class="fa fa-ban card" aria-hidden="true"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Expired Products
                                </div>
                                <div class="circle-tile-number text-faded">
                                <?php
                                    $resultas = $db->prepare("SELECT count(product_id) FROM products where qty < 10");
                                    $resultas->execute();
                                    for($i=0; $rowas = $resultas->fetch(); $i++){
                                    $Expired=$rowas['count(product_id)'];
                                }
                                echo $Expired;
                                ?>
                                    <span id="sparklineB"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">View All <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-purple">
                                <i class="fa fa-money card" aria-hidden="true"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-purple">
                                <div class="circle-tile-description text-faded">
                                    Revenue Earned
                                </div>
                                <div class="circle-tile-number text-faded">
                                <?php
                                    $resultas = $db->prepare("SELECT SUM(amount)FROM sales");
                                    $resultas->execute();
                                    for($i=0; $rowas = $resultas->fetch(); $i++){
                                    $revenue=$rowas['SUM(amount)'];
                                }
                                echo $revenue . ' PKR';
                                ?>
                                    <span id="sparklineC"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">View All <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
					</div>
				</div>
    </div><!-- page-wrapper END-->
   </div><!-- container-1 END-->
    
<script src="js/jquery-3.1.1.js"></script>
<script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".sidebar-toggle").click(function(){
            $(this).hide();
            
           $("#user-profil").show();
            
           $("#hide-btn").show();
            
           $(".container-2").css("width", "85%");
            
             
        });
        
        $("#hide-btn").click(function(){
            $(this).hide();
            
           $("#user-profil").hide();
            
           $(".sidebar-toggle").show();
            
           $(".container-2").css("width", "100%");
            
             
        });
    });
</script>  
</body>
</html>