<?php 
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
	if($_FILES['img']['name']!=null){
		move_uploaded_file($_FILES['img']['tmp_name'], 'images/' . $_FILES['img']['name']);
		$query = mysqli_query($connect, "
			UPDATE shop 
			SET name='". $_POST['name'] . "', price='" . $_POST['price'] . "', img='images/" . $_FILES['img']['name'] . "'
			WHERE id=" . $_POST['id'] . "
			"); 
		header('Location: http://ann/shop/admin.php');
	} else {
		$query = mysqli_query($connect, "
			UPDATE shop 
			SET name='". $_POST['name'] . "', price='" . $_POST['price'] . "'
			WHERE id=" . $_POST['id'] . "
			"); 
		header('Location: http://ann/shop/admin.php');
	}
?>