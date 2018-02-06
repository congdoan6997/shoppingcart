<?php
    session_start();
if (isset($_SESSION['uid']))
{
	header('location:profile.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Doan Store</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</head>
<body>

	<div class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Doan Store</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-modal-window"></span> Product</a></li>
				<li style="width:300px;top:10px;left:10px;"><input placeholder="Search&hellip;" type="search" class="form-control" id="searchtxt" id=""></li>
				<li style="top:10px;left:20px;"><input type="submit" class="btn btn-primary" value="Search" id="searchbtn"></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">0</span>
					</a>
					<ul class="dropdown-menu">
						<div style="width:400px;">
							<div class="panel panel-success">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-3">Sl.No</div>
										<div class="col-md-3">Image</div>
										<div class="col-md-3">Name</div>
										<div class="col-md-3">Price in $</div>
									</div>
								</div>
								<div class="panel-body"></div>
								<div class="panel-footer"></div>
							</div>
						</div>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Sign In</a>
					<ul class="dropdown-menu">
						<div style="width:300px;">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-body">
									<label for="email">Email</label>
									<input placeholder="Email&hellip;" class="form-control" type="email" name="email" id="email" required>
									<label for="password">Password</label>
									<input placeholder="Password&hellip;" class="form-control" type="password" name="password" id="password" required>
									<p><br /></p>
									<a href="#" style="color:black;list-style:none;">Forgot password</a>
									<input type="submit" value="Login" style="float:right;" id="login" name="login" class="btn btn-success">
								</div>
								<div class="panel-footer"></div>
							</div>
						</div>
					</ul>
				</li>
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Out</a></li>
			</ul>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_category">
					<!--Get categories-->
				</div>
				<div id="get_brand">
					<!--Get brand-->
				</div>
				<!--div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#" ><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div>

				<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#" ><h4>Brands</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div-->

			</div>

			<div class="col-md-8">
                <div class="row">
                    <div class="col-md-12" id="product_add_msg">
                        <!-- Message product added-->
                    </div>
                </div>
				<div class="panel panel-info">
					<div class="panel-heading">Products</div>
					<div class="panel-body">
						<div id="get_product"></div>
						<!--div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Iphone X</div>
								<div class="panel-body">
									<img width="100%" src="product_images\iphone-x-64gb-1-400x460.png" alt="">
								</div>
								<div class="panel-heading">$.500.00
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>

							</div>
						</div-->
					</div>
					<div class="panel-footer">&copy; 2018</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>