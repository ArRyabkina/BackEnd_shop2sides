<?php 
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
	$query = mysqli_query($connect, "DELETE FROM shop WHERE id=" . $_POST['id'] . ""); 
	header('Location: http://ann/shop/admin.php');
?>