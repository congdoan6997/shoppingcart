$(document).ready(function () {
    cat();
    brand();
    product();
    cart_checkout();
    page();
    function cat() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { category: 1 },
            success: function (data) {
                $("#get_category").html(data);
            }
        })
    };
    function brand() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { brand: 1 },
            success: function (data) {
                $("#get_brand").html(data);
            }
        })
    };
    function product() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { product: 1 },
            success: function (data) {
                $("#get_product").html(data);
            }
        })
    };

    $('body').delegate(".category", "click", function (event) {
        event.preventDefault();
        var cid = $(this).attr("cid");
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { get_selected_category: 1, cat_id: cid },
            success: function (data) {
                $("#get_product").html(data);
            }

        })
    });

    $('body').delegate(".brand", "click", function (event) {
        event.preventDefault();
        var bid = $(this).attr("bid");
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { get_selected_brand: 1, brand_id: bid },
            success: function (data) {
                $("#get_product").html(data);
            }
        })
    });

    $('body').delegate("#product", "click", function (e) {
        e.preventDefault();
        var q_id = $(this).attr("pid");
        $.ajax({
            type: "POST",
            url: "action.php",
            data: { addProduct: 1, pId: q_id },            
            success: function (response) {
                $("#product_add_msg").html(response);
            }
        });
    });

    $("#searchbtn").click(function () {
        
        var keyword = $("#searchtxt").val();
        if (keyword != "") {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: { search: 1, searchtxt: keyword },
                success: function (data) {
                    $("#get_product").html(data);
                }
            })
        }

    });
    $("#signup_btn").click(function (event) {
        event.preventDefault();
        $.ajax({
            url: "register.php",
            method: "POST",
            data: $("form").serialize(),
            success: function (data) {
                $("#signup_msg").html(data);
            }
        })

    });
    $("#login").click(function (e) {
        e.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();
        $.ajax({
            type: "POST",
            url: "login.php",
            data: { userLogin: 1, userEmail: email, userPass: password },
            success: function (rep) {
                if (rep == "Buicongdoan97") {
                    //window.location.href("profile.php");
                    window.location.assign("profile.php");
                }
            }
        });

    });
    $("#cart_container").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "action.php",
            data: {get_cart_product:1, }, 
            success: function (response) {
                $("#cart_product").html(response);
            }
        });

    });
    function cart_checkout() {
        $.ajax({
            type: "POST",
            url: "action.php",
            data: {cart_checkout:1},
            success: function (response) {
                $("#cart_checkout").html(response);
            }
        });
    }
    $("body").delegate(".qty", "keyup", function (e) {
        e.preventDefault();
        var pid = $(this).attr("pid");
        var qty = $("#qty-" + pid).val();
        var price = $("#price-" + pid).val();

        var total = qty * price;
        $("#total-" + pid).val(total);
    })
    $("body").delegate(".remove", "click", function (e) {
        e.preventDefault();
        var pid = $(this).attr("remove_id");
        $.ajax({
            type: "POST",
            url: "action.php",
            data: { remove_form_cart: 1, product_id: pid },
            success: function (response) {
                $("#cart_msg").html(response);
                cart_checkout();
            }
        });

    })
    $("body").delegate(".update", "click", function (e) {
        e.preventDefault();
        var pid = $(this).attr("update_id");
        var qty = $("#qty-" + pid).val();
        //var price = $("#price-" + pid).val();
        $.ajax({
            type: "POST",
            url: "action.php",
            data: {update_form_cart:1,product_id:pid,count:qty},
            success: function (response) {
                $("#cart_msg").html(response);
                cart_checkout();
            }
        });

    })

    function page() {
        $.ajax({
            type: "POST",
            url: "action.php",
            data: {page:1},
            success: function (response) {
                $("#pageno").html(response);
            }
        });
    }
    $("body").delegate("#page", "click", function (e) {
        e.preventDefault();
        var page = $(this).attr("page");
        $.ajax({
            type: "POST",
            url: "action.php",
            data: { product:1,set_page:1,page : page},
   
            success: function (response) {
                $("#get_product").html(response);
            }
        });
    })
})