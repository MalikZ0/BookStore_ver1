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


// helper functions - message
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}



?>
