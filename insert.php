<?php 
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');

	move_uploaded_file($_FILES['img']['tmp_name'], 'images/' . $_FILES['img']['name']);

	$query = mysqli_query($connect, 
		"INSERT INTO shop (name, price, img)
		VALUES ('" . $_POST['name'] . "','" . $_POST['price'] . "','images/" . $_FILES['img']['name'] . "')"); 

	header('Location: http://ann/shop/admin.php');

?>