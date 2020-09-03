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
<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>

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






























