<?php
session_start();
include('db.php');
if(isset($_POST['category'])){
    $category_query = "SELECT * FROM categories";
    $run_query = mysqli_query($con,$category_query);
    echo "
            <div class='nav nav-pills nav-stacked'>
                <li class='active'><a><h4>Categories</h4></a></li>
        ";
    if (mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            $cat_id = $row["cat_id"];
            $cat_name = $row["cat_title"];
            echo "
                    <li><a href='#' class='category' cid='$cat_id'>$cat_name</a></li>
                ";
        }
    }
    echo "</div>";
}

if(isset($_POST['brand'])){
    $brand_query = "SELECT * FROM brands";
    $run_query = mysqli_query($con,$brand_query);
    echo "
            <div class='nav nav-pills nav-stacked'>
                <li class='active'><a><h4>Brands</h4></a></li>
        ";
    if (mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            $brand_id = $row["brand_id"];
            $brand_name = $row["brand_title"];
            echo "
                    <li><a href='#' class='brand' bid='$brand_id'>$brand_name</a></li>
                ";
        }
    }
    echo "</div>";
}

if(isset($_POST['product'])){
    $limit = 6;
    if (isset($_POST['set_page']))
    {
        $pageNumber = $_POST['page'];
        $start = ($pageNumber-1)*6;
        $product_query ="select * from products  limit $start,$limit";
    }else
    {
        $product_query ="select * from products  limit 0,$limit";
    }    

    
    $run_query = mysqli_query($con,$product_query);;
    if(mysqli_num_rows($run_query) > 0){
        while ($row= mysqli_fetch_array($run_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_title'];
            $product_price = $row['product_price'];
            $product_image = 'product_images/'.$row['product_image'];
            echo "
                <div class='col-md-4'>
                    <div class='panel panel-info'>
                        <div class='panel-heading'>$product_name</div>
                        <div class='panel-body'>
                            <img width='80%' height='300' src='$product_image'>
                        </div>
                        <div class='panel-heading'>$.$product_price
                            <button style='float:right;' pid='$product_id' id='product' class='btn btn-danger btn-xs' >AddToCart</button>
                        </div>
                    </div>
                    </div>
                ";
        }
    }
}


if(isset($_POST['get_selected_category']) || isset($_POST['get_selected_brand']) || isset($_POST['search'])){
    if(isset($_POST['get_selected_brand'])){
        $bid = $_POST['brand_id'];
        $sql = "select * from products where product_brand = '$bid' limit 0,9";
    }else if(isset($_POST['get_selected_category'])){
        $cid = $_POST['cat_id'];
        $sql = "select * from products where product_cat = '$cid' limit 0,9";
    }else{
        $keyword = $_POST['searchtxt'];
        $sql = "select * from products where product_keywords like '%$keyword%'";
    }

    $run_query = mysqli_query($con,$sql);
    if(mysqli_num_rows($run_query) > 0){
        while ($row= mysqli_fetch_array($run_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_title'];
            $product_price = $row['product_price'];
            $product_image = 'product_images/'.$row['product_image'];
            echo "
                <div class='col-md-4'>
                    <div class='panel panel-info'>
                        <div class='panel-heading'>$product_name</div>
                        <div class='panel-body'>
                            <img width='80%' height='300' src='$product_image'>
                        </div>
                        <div class='panel-heading'>$.$product_price
                            <button style='float:right;' pid='$product_id' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
                        </div>
                    </div>
                    </div>
                ";
        }
    }

}

if (isset($_POST['userLogin']))
{

    $email = mysqli_real_escape_string($con, $_POST['userEmail']);
    //$email = $_POST['userPass'];
    $pass = md5($_POST['userPass']);
    $sql = "SELECT * FROM `user_info` WHERE email ='$email' and password = '$pass'";
    $run_query = mysqli_query($con,$sql);
    if(mysqli_num_rows($run_query) == 1){
        $row = mysqli_fetch_array($run_query);
        $_SESSION['uid']= $row['user_id'];
        $_SESSION['name'] = $row['first_name'];
        echo "Buicongdoan97";
        //header('location:profile.php');
    }
}

if(isset($_POST['addProduct'])){
    $qId = $_POST['pId'];
    if (isset( $_SESSION['uid']))
    {
        $user_id = $_SESSION['uid'];
        $sql = "SELECT * FROM `cart` WHERE `p_id`= '$qId' AND `user_id`= '$user_id'";
        $run_query  = mysqli_query($con,$sql);
        if (mysqli_num_rows($run_query) > 0)
        {
            //echo "product is already added into the cart Continue Shopping...";
            echo "
            <div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Product is already added into the cart Continue Shopping...</strong>
			</div>
";
        }else
        {
            $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `user_id`, `qty`)
        VALUES ('$qId','0','$user_id','1')";
            if (mysqli_query($con,$sql))
            {
                echo "
            <div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Product is Added</strong>
			</div>
            ";
            }

        }
    }else
    {
        echo "
            <div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Sign In!!!</strong>
			</div>
            ";
    }
}

    if(isset($_POST['get_cart_product'])){
        $uid = $_SESSION['uid'];
        $sql = "SELECT * FROM `user_info` WHERE `user_id` = '$uid'";
        $run_query = mysqli_query($con,$sql);
        if(mysqli_num_rows($run_query) > 0 ){
            $sql = "SELECT * FROM `cart`,products WHERE cart.p_id = products.product_id AND cart.user_id = '$uid'";
            $run_query = mysqli_query($con,$sql);
            if(mysqli_num_rows($run_query) > 0){
                $i = 1;
                while ($row = mysqli_fetch_array($run_query))
                {
                    $product_image = $row['product_image'];
                    $product_name = $row['product_title'];
                    $product_price = $row['product_price'];
                    echo "
                                    <div class='row' style='margin-bottom : 10px;'>
                                        <div class='col-md-1'>$i</div>
                                        <div class='col-md-2'>
                                            <image src ='product_images/$product_image' width ='60px' height = '50px'></image>
                                        </div>
                                        <div class='col-md-6'>$product_name</div>
                                        <div class='col-md-3'>$.$product_price</div>
                                    </div>
                        ";
                    $i++;
                }

            }

        }
    }

if(isset($_POST['cart_checkout'])){
    $uid = $_SESSION['uid'];
   // $uid ='1';
    $sql = "SELECT * FROM `user_info` WHERE `user_id` = '$uid'";
    $run_query = mysqli_query($con,$sql);
    if(mysqli_num_rows($run_query) > 0 ){
        $sql = "SELECT * FROM `cart`,products WHERE cart.p_id = products.product_id AND cart.user_id = '$uid'";
        $run_query = mysqli_query($con,$sql);
        if(mysqli_num_rows($run_query) > 0){
            $total = 0;
            while ($row = mysqli_fetch_array($run_query))
            {
                $product_id = $row['p_id'];
                $product_image = $row['product_image'];
                $product_name = $row['product_title'];
                $product_price = $row['product_price'];
                $product_count = $row['qty'];
                $all_price = $product_price* $product_count;
                $total += $all_price;
                echo "
                            <div class='row'>
                            <div class='col-md-2'>
                                <div class='btn-group'>
                                    <a href=''  remove_id='$product_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
                                    <a href=''  update_id='$product_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
                                </div>

                            </div>
                            <div class='col-md-2'>
                                <image src='product_images/$product_image' width='60px' height='50px'></image>
                            </div>
                            <div class='col-md-2'>$product_name</div>
                            <div class='col-md-2'>
                                <input type='text' class='form-control price' pid='$product_id' id='price-$product_id' value='$product_price' disabled/>
                            </div>
                            <div class='col-md-2'>
                                <input type='text' class='form-control qty'  pid='$product_id' id='qty-$product_id' value='$product_count'  />
                            </div>
                            <div class='col-md-2'>
                                <input type='text' class='form-control total' pid='$product_id' id='total-$product_id' value='$all_price' disabled />
                            </div>
                        </div>
                        ";
            }

            echo "
                        <div class='row'>
                            <div class='col-md-8'></div>
                            <div class='col-md-4'><strong>Total: $total $</strong></div>
                        </div>
";

        }

    }
}

if (isset($_POST['remove_form_cart']))
{
    $product_id = $_POST['product_id'];
    $uid = $_SESSION['uid'];
    $sql = "DELETE FROM `cart` WHERE `p_id`= '$product_id' AND user_id = '$uid'";
    $run_query = mysqli_query($con,$sql);
    if ($run_query)
    {
    	echo "
                <div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Product is Removed from Cart Continue Shopping</strong>
			</div>
            ";
    }

}

if (isset($_POST['update_form_cart']))
{
    $product_id = $_POST['product_id'];
    $uid = $_SESSION['uid'];
    $count = $_POST['count'];
    $sql = "UPDATE `cart` SET `qty`='$count' WHERE `p_id`='$product_id' AND `user_id`='$uid'";
    $run_query = mysqli_query($con,$sql);
    if ($run_query)
    {
        echo "
                <div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Product is Updated from Cart Continue Shopping</strong>
			</div>
            ";
    }


}

if (isset($_POST['page']))
{
	$sql = "select * from products";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    $pageno = ceil($count/6);
    for ($i = 1; $i <= $pageno; $i++)
    {
    	echo "

                 <li><a href='#' id='page' page='$i' >$i</a></li>

";
    }

}




?>