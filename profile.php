<?php
session_start();
if (!isset($_SESSION['uid']))
{
	header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Doan Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</head>
<body>

    <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">kDoan Store</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">
                        <span class="glyphicon glyphicon-home"></span> Home
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-modal-window"></span> Product
                    </a>
                </li>
                <li style="width:300px;top:10px;left:10px;">
                    <input placeholder="Search&hellip;" type="search" class="form-control" id="searchtxt"  />
                </li>
                <li style="top:10px;left:20px;">
                    <input type="submit" class="btn btn-primary" value="Search" id="searchbtn" />
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="cart_container">
                        <span class="glyphicon glyphicon-shopping-cart"></span>Cart
                        <span class="badge">0</span>
                    </a>
                    <ul class="dropdown-menu">
                        <div style="width:500px;">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="row" >
                                        <div class="col-md-1">Sl.No</div>
                                        <div class="col-md-2">Image</div>
                                        <div class="col-md-6">Name</div>
                                        <div class="col-md-3">Price in $</div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="cart_product">
                                        <!--get cart product-->
                                    </div>
                                    <!--div class="row">
                                        <div class="col-md-3">Sl.No</div>
                                        <div class="col-md-3">Image</div>
                                        <div class="col-md-3">Name</div>
                                        <div class="col-md-3">Price in $</div>
                                    </div-->

                                </div>

                                <div class="panel-footer"></div>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>Hi, <?php echo $_SESSION['name']; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="cart.php" style="color:blue;">
                                <span class="glyphicon glyphicon-shopping-cart"></span>Cart
                            </a>
                        </li>
                        <li>
                            <a href="#" style="color:blue;">Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php" style="color:blue;">Logout</a>
                        </li>
                    </ul>
                </li>
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
                        <div id="get_product">
                            <!-- get products-->
                        </div>

                    </div>
                    <div class="panel-footer">&copy; 2018</div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <ul class="pagination" id="pageno">
   <!--get page-->
                    </ul>
                </center>
            </div>
        </div>
    </div>


</body>
</html>