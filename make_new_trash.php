<?php 
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
	$query = mysqli_query($connect, "
			INSERT INTO
			  trash(name, img, price)
			SELECT
			  name, 
			  img, 
			  price
			FROM
			  shop
			WHERE
			 	id='" . $_POST['id'] . "'
		"); 
	header('Location: http://ann/shop/index.php');
?>