<?php
	include('../connect.php');
	$id=$_GET['id'];
	$c=$_GET['invoice'];
	$sdsd=$_GET['dle'];
	$qty=$_GET['qty'];
	$wapak=$_GET['code'];
	//edit qty
<<<<<<< HEAD
	$sql = "UPDATE products SET qty=qty+? , `qty_sold`=qty_sold - $qty WHERE product_id=?";
=======
	$sql = "UPDATE products 
			SET qty=qty+?
			WHERE product_id=?";
>>>>>>> 232f54eab7ba80b84f16c1c6a3f830d89a7d3e1d
	$q = $db->prepare($sql);
	$q->execute(array($qty,$wapak));

	$result = $db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: sales.php?id=$sdsd&invoice=$c");
?>