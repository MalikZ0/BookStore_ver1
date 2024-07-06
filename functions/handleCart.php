<?php
session_start();
include ('../config/dbcon.php');

if (isset($_SESSION['auth']))
{   
    if (isset($_POST['scope']))
    {
        $scope = $_POST['scope'];
        switch ($scope) 
        {
            case "add":
                $p_id = $_POST['p_id'];
                $p_qty = $_POST['p_qty'];
                $user_id = $_SESSION['auth_user']['user_id'];
                
                $check_cart = "SELECT * FROM carts WHERE user_id='$user_id' AND product_id='$p_id' ";
                $check_cart_run = mysqli_query($con, $check_cart);

                if(mysqli_num_rows($check_cart_run) > 0)
                {
                    echo 'existing';
                }
                else
                {

                
                    $insert_query = "INSERT INTO carts (user_id, product_id, product_qty) VALUES ('$user_id', '$p_id', '$p_qty')";
                    $insert_query_run = mysqli_query($con, $insert_query);

                    if($insert_query_run)
                    {
                        echo 201;
                    }
                    else{
                        echo 500;
                    }
                }
                break;
            case "update":
                $p_id = $_POST['p_id'];
                $p_qty = $_POST['p_qty'];
                $user_id = $_SESSION['auth_user']['user_id'];

                $check_cart = "SELECT * FROM carts WHERE user_id='$user_id' AND product_id='$p_id' ";
                $check_cart_run = mysqli_query($con, $check_cart);

                if(mysqli_num_rows($check_cart_run) > 0)
                {
                    $update_query = "UPDATE carts SET product_qty='$p_qty' WHERE product_id='$p_id' AND user_id='$user_id'";
                    $update_query_run = mysqli_query($con, $update_query);

                    if($update_query_run)
                    {
                        echo 200;
                    }
                    else{
                        echo 500;
                    }
                }
                else
                {
                    echo 'Something went wrong';
                }  

                break;
            case "delete":
                $cart_id = $_POST['cart_id'];
                $user_id = $_SESSION['auth_user']['user_id'];

                $check_cart = "SELECT * FROM carts WHERE id='$cart_id' AND user_id='$user_id' ";
                $check_cart_run = mysqli_query($con, $check_cart);

                if(mysqli_num_rows($check_cart_run) > 0)
                {
                    $delete_query = "DELETE FROM carts WHERE id='$cart_id' AND user_id='$user_id'";
                    $delete_query_run = mysqli_query($con, $delete_query);

                    if($delete_query_run)
                    {
                        echo 200;
                    }
                    else{
                        echo 500;
                    }
                }
                else
                {
                    echo 'Something went wrong';
                }

                break;
            default :
                echo 500;
        }
    }
}
else
{
    echo 401;
}
?>