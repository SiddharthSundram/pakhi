<?php
    // constants
    define("PROJECT_NAME","Pakhi - A massanger for you");

    // connection work
   $connect = mysqli_connect("localhost","root","","pakhi") or die("connection to database is failded");

    // session 
    session_start();

    // redirect fun
    function redirect($page){
        echo "<script>window.open('$page','_self')</script>";
    }

    // alert fun
    function alert($msg){
        echo "<script>alert('$msg')</script>";
    }

    if(isset($_SESSION['account'])){
        $email = $_SESSION['account'];
        $query = mysqli_query($connect,"SELECT * from accounts where email='$email'");

        $getUserData = mysqli_fetch_array($query);


    // getmy user id 
        $myUserId = $getUserData['user_id'];

    }
    

?>