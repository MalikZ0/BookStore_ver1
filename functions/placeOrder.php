<?php
    include 'functions.php';

    if(isset($_SESSION['auth']))
    {
        if(isset($_POST['placeOderBtn']))
        {
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
            $address = mysqli_real_escape_string($con, $_POST['address']);
            $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
            $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);

            if($name == "" || $phone == "" || $email == "" || $pincode == "" || $address == "" )
            {
                redirect("../user/checkout.php", "All fields are required");
            }

            $tracking_no = "GRSL".rand(1111,9999000).substr($phone,2);
            $user_id = $_SESSION['auth_user']['user_id'];

            $cart_items = getCartItems();
            $total_price = 0;
            foreach($cart_items as $item)
            {
                $total_price += $item['selling_prize'] * $item['product_qty'];
            }

            $insert_query = "INSERT INTO orders (tracking_no, user_id,	name, email, phone,	address, pincode, total_price,	
                      payment_mode, payment_id ) VALUES ('$tracking_no', '$user_id', '$name', '$email', '$phone', '$address', '$pincode',
                      '$total_price', '$payment_mode', '$payment_id')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run)
            {
                $order_id = mysqli_insert_id($con);
                foreach($cart_items as $item)
                {   
                    $prod_id = $item['product_id'];
                    $prod_qty = $item['product_qty'];
                    $selling_price = $item['selling_prize'];
                    $insert_items_query = "INSERT INTO order_items (order_id, prod_id, qty, price) 
                                           VALUES ('$order_id', '$prod_id', '$prod_qty', '$selling_price')";
                    $insert_items_query_run = mysqli_query($con, $insert_items_query);
                }

                $deleteCart_query = "DELETE FROM carts WHERE user_id='$user_id'";
                $deleteCart_query_run = mysqli_query($con, $deleteCart_query);
                redirectD("../user/completeOrder.php","Order Placed Successfully");
            }
            
        }
    }
    else
    {
        redirect("../user/index.php", "Login to continue");
    }
    
?>