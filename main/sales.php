<!DOCTYPE html>
<html>
	
<head>
  	<title> POS - Sales </title>
<link rel='icon' href='./img/pharmacy.png'/>
    <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">  
 <link href="css/bootstrap.css" rel="stylesheet">

  	<link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="styles.css" rel="stylesheet" type="text/css">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!--sa poip up-->
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="src/facebox.js" type="text/javascript"></script>
<?php
error_reporting(0);
	require_once('auth.php');
?>
	<!-- combosearch box-->	
	
	<script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>
</head>
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
<body>
<?php include('navfixed.php');?>
<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='cashier') {
?>
<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Cash</a>

<a href="../index.php">Logout</a>
<?php
}
if($position=='admin') {
?>  
<?php } ?>				
	<div>
		
			<ul class="breadcrumb">
			<a href="index.php"><li>Dashboard</li></a> /
			<li class="active">Sales</li>
			</ul>
<div>
<a  href="index.php"><button class="btn btn-warning back"><i class="fa fa-angle-left"></i> Back</button></a>
</div>
<form action="incoming.php" method="post" autocomplete="off">
											
<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<input type="hidden" name="discount" value="<?php echo $_GET['percent']; ?>" />

<input type="text" name="product" id='srch' autocomplete='off' class='form-control' required='required' style="width:350px; height:40px; float:left; margin-left:50px;margin-right:10px" list='list1'/>
<datalist name='product' id='list1'>
<?php
	include('../connect.php');
		$result = $db->prepare("SELECT * FROM products");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
				$toBeComparedDate = $row['expiry_date'];
				$today = (new DateTime())->format('Y-m-d');
				$expired = $toBeComparedDate > $today;
			if(($row['qty'] > 0) && ($expired)){	
				?>
			<option value="<?php echo $row['product_id'];?>"><?php echo $row['product_name']; }?></option>
		<?php 
				}
			?>
</datalist>
<input type="number" name="qty" value="1" min="1" max =<?php echo $qty1; ?> placeholder="Qty" required='required'>
<input type="hidden" name="date" value="<?php echo date("m/d/yy"); ?>" />
<Button type="submit" class="btn btn-info" style="width: 80px; height:40px; margin-top:-10px; margin-left:5px"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
</form>
	

<div class="container table-responsive py-5"> 
<table class="table table-bordered table-hover">
  <thead class="thead-dark">
  <tr>
  			<th>#</th>
			<th> Product code </th>
			<th> Product Name </th>
			<th> Category</th>
			<th> Price </th>
			<th> Quantity </th>
			<th> Total </th>
			<th> Action </th>
		</tr>
  </thead>
  <tbody>
  <?php
				$id=$_GET['invoice'];
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
				$result->bindParam(':userid', $id);
				$result->execute();
				for($i=1; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $i?></td>
			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['gen_name']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['qty']; ?></td>
			<td><?php echo $row['qty'] * $row['price']; ?></td>
			<td><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"><button class="btn btn-mini btn-danger"><i class="fa fa-times"></i>Remove</button></a></td>
			</tr>
			<?php
				}
			?>
			<tr>
			<td colspan="7"> Total Amount: </td>
			<td>
			<?php
			$sdsd=$_GET['invoice'];
			$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
			$resultas->bindParam(':a', $sdsd);
			$resultas->execute();
			for($i=0; $rowas = $resultas->fetch(); $i++){
			$total_amount=$rowas['sum(amount)'];
			echo formatMoney($total_amount, true);}?>
				</td>
			<tr>			
			
			</tr>
			<td colspan="7"> Total Quantity: </td>
			<td>
			<?php
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT sum(qty) FROM sales_order WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$qty=$rowas['sum(qty)'];
			}
			?>
				<h4>
				<?php
				echo $qty;
				?>
				</h4>
			</td>
			
		</tr>
		<tr>
		<td colspan  ='7'>Discount </td>
		<td>

		<form action="" method="post">
			  <input type="number" name="percent" id="percent" value='0' min='0' max='100' /></br>
			  <Button type="submit" name="disc1" value="Calculate Total" class = 'btn btn-primary'><i class="fa fa-calculator" aria-hidden="true"></i>Discount</button>
			</form> 
		<?php
			$percent=$_POST['percent'];
			$discount_value= ($total_amount / 100) *$percent;
			$final_price = $total_amount - $discount_value;	 
		 ?>
		 </td>
		</tr>
	
			<tr>
				<th colspan="7"><strong style="font-size: 15px; color: #222222;">Grand Total:</strong></th>
			<td colspan="3" style="font-size :25px; font-weight:bolder">
				<?php
				function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.1f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				echo formatMoney($final_price, true) .' PKR';
				?>
				</strong></td>
			</tr>		
			<tr>
			<td colspan="8">
			<a href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $final_price ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME']?>"><button class="btn btn-success"><i class="fa fa-money" aria-hidden="true"></i>Generate Bill</button></a>
			<a href="sales.php"><button class="btn btn-danger" style="margin-bottom: 0px;"><i class="fa fa-times" aria-hidden="true"></i>Cancle Invoice</button></a>
			</td>
			<tr>	
 </tbody>
 
</table>
</div>


<br>
</div>
</div>
</div>

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
<?php include('footer.php');?>
</html>