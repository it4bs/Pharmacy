<!DOCTYPE html>
<html>
<head>
  	<title> POS - Sales </title>
<link rel='icon' href='./img/download.png'/>
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
<script type="text/javascript">
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<?php
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
<!-- side Navbar original-->
<div class="container-1" id="user-profil">                  
<ul id="side" class="nav navbar-nav-1 side-nav">
    
 <li>  
  <img class="img-circle" src="./img/download.png" alt="user image">
    <p class="welcome"><i class="fa fa-key"></i> Welcome 
    <span class="last-name">Admin</span>
    <a href="#"><i class="fa fa-log-out"></i></a>
    </p>    
 </li>
  <li class="dashboard">
   <a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
 </li>
    
    <li class="panel">
       <a class="active" href="sales.php">
       <i class="fa fa-bar-chart-o"></i> Sales
       </a>
    </li>
    <li class="panel">
           <a href="products.php">
           <i class="fa fa-bar-chart-o"></i> Products
           </a>
    </li>


    
    <li class="panel">
     <a href="supplier.php">
      <i class="fa fa-calendar"></i> Suppliers
     </a>
    </li>
    
    <li class="panel">
   <a href="staff.php">
   <i class="fa fa-clipboard"></i> Staff </a>
</li>
    
    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#edit">
   <i class="fa fa-edit"></i> Report <i class="fa fa-caret-down pull-right"></i>
   </a>
    
  <ul class="collapse nav" id="edit">
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Daily Report</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Specific Product Report</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Sale Report </a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Sale Return Report </a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Purchase Report </a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Stock Report </a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Narcotics Report </a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Dead Item Report </a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Expiry Report </a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Reorder Report </a>
    </li>
  </ul>
</li>
    
  <li class="panel">
   <a class="active" href="finance.php"><i class="fa fa-inbox"></i> Finance</a>
</li>
    
    <li class="panel">
   <a class="active" href="about.php"><i class="fa fa-cogs"></i> About</a>
</li>           
</ul>      
    </div><!-- end of side Navbar -->    
<?php } ?>				
	<div>
		
			<ul class="breadcrumb">
			<a href="index.php"><li>Dashboard</li></a> /
			<li class="active">Sales</li>
			</ul>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
													
<form action="incoming.php" method="post" >
											
<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<select name="product" style="width:650px; "class="chzn-select" required>
<option></option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM products");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['product_id'];?>"><?php echo $row['product_code']; ?> - <?php echo $row['gen_name']; ?> - <?php echo $row['product_name']; ?> | Expires at: <?php echo $row['expiry_date']; ?></option>
	<?php
				}
			?>
</select>
<input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
<input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
<input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
<Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Add</button>
</form>
<table class="table table-bordered" id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th> Product Name </th>
			<th> Generic Name </th>
			<th> Category / Description </th>
			<th> Price </th>
			<th> Qty </th>
			<th> Amount </th>
			<th> Profit </th>
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
			<td hidden><?php echo $row['product']; ?></td>
			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['gen_name']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td>
			<?php
			$ppp=$row['price'];
			echo formatMoney($ppp, true);
			?>
			</td>
			<td><?php echo $row['qty']; ?></td>
			<td>
			<?php
			$dfdf=$row['amount'];
			echo formatMoney($dfdf, true);
			?>
			</td>
			<td>
			<?php
			$profit=$row['profit'];
			echo formatMoney($profit, true);
			?>
			</td>
			<td width="90"><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a></td>
			</tr>
			<?php
				}
			?>
			<tr>
			<th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<td> Total Amount: </td>
			<td> Total Profit: </td>
			<th>  </th>
		</tr>
			<tr>
				<th colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
				<?php
				function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
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
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(amount)'];
				echo formatMoney($fgfg, true);
				}
				?>
				</strong></td>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
			<?php 
				$resulta = $db->prepare("SELECT sum(profit) FROM sales_order WHERE invoice= :b");
				$resulta->bindParam(':b', $sdsd);
				$resulta->execute();
				for($i=0; $qwe = $resulta->fetch(); $i++){
				$asd=$qwe['sum(profit)'];
				echo formatMoney($asd, true);
				}
				?>
		
				</td>
				<th></th>
			</tr>
		
	</tbody>
</table><br>
<a rel="facebox" href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?>&totalprof=<?php echo $asd ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME']?>"><button class="btn btn-success btn-large btn-block"><i class="icon icon-save icon-large"></i> SAVE</button></a>
<div class="clearfix"></div>
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