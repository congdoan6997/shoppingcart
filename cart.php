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
            </ul>
        </div>
    </div>
    <p><br /></p>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="cart_msg">
                <!--get cart message-->
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Cart Checkout</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-2"><strong>Action</strong></div>
                            <div class="col-md-2"><strong>Product Image</strong></div>
                            <div class="col-md-2"><strong>Product Name</strong></div>
                            <div class="col-md-2"><strong>Product Price</strong></div>
                            <div class="col-md-2"><strong>Quantity</strong></div>
                            <div class="col-md-2"><strong>Price in $</strong></div>
                        </div>

                        <div id="cart_checkout">
                            <!--get cart info-->
                        </div>
                        <!--div class="row">
        <div class="col-md-2">
            <div class="btn-group">
                <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                <a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
            </div>

        </div>
        <div class="col-md-2">
            <image src='product_images/$product_image' width='60px' height='50px'></image>
        </div>
        <div class="col-md-2">Product Name</div>
        <div class="col-md-2">
            <input type="text" class="form-control" value="5000" disabled/>
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" value="1"  />
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" value="5000" disabled />
        </div>
    </div-->

                        <!--div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4"><strong>Total: 5000 $</strong></div>
                        </div-->
                    </div>
                    <div class="panel-footer"></div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>

</body>
</html>