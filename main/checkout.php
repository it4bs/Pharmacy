<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;
font-family:'montserrat';
}

input[type=text],input[type=date],input[type=number], select, textarea {
  width: 100%;
  height:40px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 10px;
  /* resize: vertical; */
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
</style>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savesales.php" method="post">
<h4 style="text-align: center;"><i class="fa fa-money"></i>Add Payment</h4>
<hr>
	<input type="hidden" name="date" value="<?php echo date("m/d/yy"); ?>" /> 
	<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
    <input type="hidden" name="amount" value="<?php echo $_GET['total']; ?>" />
   	<input type="hidden" name="ptype" value="<?php echo $_GET['pt']; ?>" />
	<input type="hidden" name="cashier" value="<?php echo $_GET['cashier']; ?>" />
	<input type="hidden" name="profit" value="<?php echo $_GET['totalprof']; ?>" />
	<input type="text" size="25" value="" name="cname" id="country" class="form-control" autocomplete="off" placeholder="Enter Customer Name" />
	
	<?php
	$asas=$_GET['pt'];
		if($asas=='credit') {
		?>Due Date: <input type="date" name="due" placeholder="Due Date" style="width: 268px; height:30px; margin-bottom: 15px;" /><br>
		<?php
		}
		if($asas=='cash') {
		?>
		<input type="number" name="cash" placeholder="Amount"  required/><br>
		<?php
		}
	?>
	<button class="btn btn-success"><i class="fa fa-money"></i>Payment</button>
</form>
