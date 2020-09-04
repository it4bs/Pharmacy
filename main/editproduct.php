<<<<<<< HEAD
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
</head>
<body>
=======
>>>>>>> 232f54eab7ba80b84f16c1c6a3f830d89a7d3e1d
<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<<<<<<< HEAD

<form action="saveeditproduct.php" method="post" autocomplete='off'>
<h4 style="text-align: center;"><i class="fa fa-edit"></i> Edit Product</h4>
<hr>
<input type="hidden" name="memi" value="<?php echo $id; ?>" />

    <label for="bname">Product Code</label>
    <input type="text" id="bname"  name="code" value="<?php echo $row['product_code']; ?>" required ='required'>
    <label for="gname">Generic Name</label>
    <input type="text" id="gname"   name="gen" value="<?php echo $row['gen_name']; ?>" Required='true'/>
    <label for="pname">Product Name</label>
    <input type="text" id="pname"  name="name" value="<?php echo $row['product_name']; ?>" Required='true'>
    <label for="adate">Date Arrival</label>
    <input type="date" id="adate" name="date_arrival" value="<?php echo $row['date_arrival']; ?>" requred='true'>
    <label for="edate">Expiry Date</label>
    <input type="date" id="edate" name="exdate" value="<?php echo $row['expiry_date']; ?>" requred='true'>
    <label for="txt1">Selling Price </label>
    <input type="number" id="txt1" name="price"  value="<?php echo $row['price']; ?>" onkeyup="sum();" requred='true'>
	  <label for="txt2">Purchase Price </label>
    <input type="number" id="txt2" name="o_price"  value="<?php echo $row['o_price']; ?>" onkeyup="sum();" requred='true'>
	  <label for="profit">Profit</label>
    <input type="number" id="txt3" name="profit" value="<?php echo $row['profit']; ?>" readonly>
    <label for="supplier">Choose Supplier</label>
    <select id="supplier" name="supplier">
		<option><?php echo $row['supplier']; ?></option>
		<?php
		$results = $db->prepare("SELECT * FROM supliers");
			$results->bindParam(':userid', $res);
			$results->execute();
			for($i=0; $rows = $results->fetch(); $i++){
		?>
			<option><?php echo $rows['suplier_name']; ?></option>
		<?php
		}
		?>
    </select>
	<label for="qty">Quantity Left :</label>
    <input type='number' id="qty" min="0" name="qty" value="<?php echo $row['qty']; ?>">
    <label for="sold">Quantity Sold :</label>
    <input type='number' id="sold" min="0" name="sold" value="<?php echo $row['qty_sold']; ?>" >
	<button class="btn btn-success"><i class="fa fa-edit"></i>Update Product</button>
  </form>

</body>
</html>

<?php } ?>






























=======
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditproduct.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Product</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Brand Name : </span><input type="text" style="width:265px; height:30px;"  name="code" value="<?php echo $row['product_code']; ?>" Required/><br>
<span>Generic Name : </span><input type="text" style="width:265px; height:30px;"  name="gen" value="<?php echo $row['gen_name']; ?>" /><br>
<span>Category / Description : </span><textarea style="width:265px; height:50px;" name="name" ><?php echo $row['product_name']; ?> </textarea><br>
<span>Date Arrival: </span><input type	="date" style="width:265px; height:30px;" name="date_arrival" value="<?php echo $row['date_arrival']; ?>" /><br>
<span>Expiry Date : </span><input type	="date" style="width:265px; height:30px;" name="exdate" value="<?php echo $row['expiry_date']; ?>" /><br>
<span>Selling Price : </span><input type="text" style="width:265px; height:30px;" id="txt1" name="price" value="<?php echo $row['price']; ?>" onkeyup="sum();" Required/><br>
<span>Original Price : </span><input type="text" style="width:265px; height:30px;" id="txt2" name="o_price" value="<?php echo $row['o_price']; ?>" onkeyup="sum();" Required/><br>
<span>Profit : </span><input type="text" style="width:265px; height:30px;" id="txt3" name="profit" value="<?php echo $row['profit']; ?>" readonly><br>
<span>Supplier : </span>
<select name="supplier" style="width:265px; height:30px; margin-left:-5px;" >
	<option><?php echo $row['supplier']; ?></option>
	<?php
	$results = $db->prepare("SELECT * FROM supliers");
		$results->bindParam(':userid', $res);
		$results->execute();
		for($i=0; $rows = $results->fetch(); $i++){
	?>
		<option><?php echo $rows['suplier_name']; ?></option>
	<?php
	}
	?>
</select><br>
<span>QTY Left: </span><input type="number" style="width:265px; height:30px;" min="0" name="qty" value="<?php echo $row['qty']; ?>" /><br>
<span>Quantity: </span><input type="number" style="width:265px; height:30px;" min="0" name="sold" value="<?php echo $row['qty_sold']; ?>" /><br>

<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>
>>>>>>> 232f54eab7ba80b84f16c1c6a3f830d89a7d3e1d
