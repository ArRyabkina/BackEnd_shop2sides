<?php 
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
	$query = mysqli_query($connect, 'SELECT * FROM trash');
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
	<div class="p-4 text-center header">
		<p class="text-light">Корзина</p>
	</div>
		<div class="col-6 mx-auto goods">
			<div class="col-12 pt-3 pl-3">
				<div class="row">
					<?php 
						$totalPrice = 0;
						for($i = 0; $i < $query->num_rows; $i++){
							echo '<div class="col-4">';
							$res = $query->fetch_assoc();
							$totalPrice = $totalPrice + $res['price'];
							echo '<img src="' . $res['img'] . '" class="w-100">'; 
							echo '<p>' . $res['name'] . '</p>';
							echo '<p>' . $res['price'] . ' рублей</p>';
							
						?>
						<form action="delete-trash.php" method="POST">
							<?php 
								echo '<input name="id" type="hidden" value="' . $res['id'] . '">'
							?>
							<button class="btn btn-danger">
								Убрать
							</button>
						</form>
						<?php 
							echo '<hr width="50%" size="1px" color="grey">';
						 ?>
					<?php  echo '</div>'; } ?>
				</div>
			</div>
			<div class="col-12 bg-dark text-white h-100">
				<div class="text-center">
					<div class="row">
						<h5 class="m-4">
							В итоге 
						</h5>
						<h1 class="m-2 text-warning">
							<?php echo $totalPrice; ?> рублей
						</h1>
					</div>
				</div>
				<div class="col-5 p-3">
					<button class="btn btn-success w-100">Купить</button>
				</div>
			</div>
		</div>
</body>
</html>