<?php
session_start();
include ('../config/dbcon.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getBy($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    return $query_run = mysqli_query($con, $query);
}

function getAllOrders(){
    global $con;
    $query = "SELECT * FROM orders WHERE status='0' ";
    return $query_run = mysqli_query($con, $query);
}

function checkTrackingNo2($tracking_no)
{
    global $con;
    $query = "SELECT * FROM orders WHERE tracking_no='$tracking_no' ";
    return $query_run = mysqli_query($con, $query);
}

function getAllOrderHistory(){
    global $con;
    $query = "SELECT * FROM orders WHERE status!='1' ";
    return $query_run = mysqli_query($con, $query);
}

// user side
function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='1' ";
    return $query_run = mysqli_query($con, $query);
}

function getByIDActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='1' ";
    return $query_run = mysqli_query($con, $query);
}

function getBySlugActive($table, $slug)
{
    global $con;
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status='1' LIMIT 1 ";
    return $query_run = mysqli_query($con, $query);
}

function getProductByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id='$category_id' AND status='1'";
    return $query_run = mysqli_query($con, $query);
}

function getCartItems()
{
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.product_id, c.product_qty, p.id as pid, p.name, p.image, p.selling_prize 
              FROM carts c, products p WHERE c.product_id=p.id AND c.user_id='$user_id' ORDER BY c.id DESC";
    return $query_run = mysqli_query($con, $query);
}

function getOders()
{
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY id DESC";
    return $query_run = mysqli_query($con, $query);
}

function checkTrackingNo($tracking_no)
{
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$user_id' AND tracking_no='$tracking_no' ";
    return $query_run = mysqli_query($con, $query);
}

function getTrending()
{
    global $con;
    $query = "SELECT * FROM products WHERE trending='1' ";
    return $query_run = mysqli_query($con, $query);
}

// helper functions - message
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

function redirectD($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    die();
}

?>
