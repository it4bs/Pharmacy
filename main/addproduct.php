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
<form action="saveproduct.php" method="post">
<h4 style="text-align: center;"><i class="fa fa-plus"></i> Add new Product</h4>
<hr>
	<label for="bname">Product Code</label>
    <input type="text" id="bname"  name="code" required ='required'>
    <label for="gname">Generic Name</label>
    <input type="text" id="gname"   name="gen"  Required='true'/>
    <label for="pname">Product Name</label>
    <input type="text" id="pname"  name="name" Required='true'>
    <label for="adate">Date Arrival</label>
    <input type="date" id="adate" name="date_arrival" requred='true'>
    <label for="edate">Expiry Date</label>
    <input type="date" id="edate" name="exdate"  requred='true'>
    <label for="txt1">Selling Price </label>
    <input type="number" id="txt1" name="price"  onkeyup="sum();" requred='true'>
	<label for="txt2">Purchase Price </label>
    <input type="number" id="txt2" name="o_price" onkeyup="sum();" requred='true'>
	<label for="profit">Profit</label>
    <input type="number" id="txt3" name="profit" readonly>
	<label for="supplier">Choose Supplier</label>
    <select id="supplier" name="supplier">
	<option></option>
		<?php
			include('../connect.php');
			$result = $db->prepare("SELECT * FROM supliers");
				$result->bindParam(':userid', $res);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
				<option><?php echo $row['suplier_name']; ?></option>
			<?php
			}
		?>
    </select>
	<label for="txt11">Quantity:</label>
    <input type='number' id="txt11" min="0" name="qty" onkeyup="sum();" Required='true'>
    <input type='hidden' id="txt22" name="qty" Required >

	<button class="btn btn-success"><i class="fa fa-plus"></i>Add Product</button>
</form>
