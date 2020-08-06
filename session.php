<?php
include('database.php');
session_start();

$user_check = $_SESSION['user_id'];

$ses_sql = mysqli_query($conn,"select username from users where id = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['username'];

if(!isset($_SESSION['user_id'])){
    header("location:login.php");
    die();
}
?>