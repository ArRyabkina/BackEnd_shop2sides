<?php 
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<img src="images/logo.png" class="logo-img w-25">
    <a href="trash.php"><img src="images/trash.gif" class="trash-img"></a>
	<div class="p-4 text-center header">
		<p class="text-muted">
			Каталог игр 
		</p>
		<form method="POST" action="index.php">
			<input type="text" name="search">
			<button class="btn btn-primary">Искать</button>
		</form>
	</div>
	<div class="mx-auto col-6 goods">
		<div class="row">
			<?php
				if($_POST['search']!=NULL){
					$query = mysqli_query($connect, 'SELECT * FROM shop WHERE name = "' . $_POST['search'] . '"');
				} else {
					$query = mysqli_query($connect, 'SELECT * FROM shop ');

				}
				for($i = 0; $i < $query->num_rows; $i++){
					$res = $query->fetch_assoc();
					?>
					<div class="col-4 mt-3 box-games">
						<?php
						echo '<img src="' . $res['img'] . '" class="w-100">'; ?>
						<?php  
							echo '<h5>' . $res['name'] . '</h5>';
						?>
						<?php 
							echo '<p>' . $res['price'] . '</p>';
						 ?>
						<form action="make_new_trash.php" method="POST">
							<input type="hidden" name="id" <?php echo "value='" . $res['id'] . "'" ?>>
							<button class="btn btn-warning w-100">
								Добавить в корзину
							</button>
						</form>
					</div>
			<?php 
				}
			 ?>
		</div>
	</div>
</body>
</html>
