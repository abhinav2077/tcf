<?php
session_start();
include_once 'connection.php';

if(isset($_REQUEST['log_email']) && $_REQUEST['log_email']!=''){
    $log_email = $_REQUEST['log_email'];
    $log_pass = $_REQUEST['log_pass'];

    $query = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$log_email'");
    $result = mysqli_fetch_array($query);

    if($result['email']==$log_email && $result['password']==$log_pass){
        $_SESSION['registration'] = [
            'id' => $result['id'],
            'email' => $result['email'],
            'first_name' => $result['first_name'],
            'last_name' => $result['last_name'],
            'password' => $result['password'],
            'mobile' => $result['mobile'],
        ];

        $result = array(
            'success' => true,
            'msg' => 'Log in successful...!'
        );
        echo json_encode($result);

       // echo "<script>alert('Log in successful...!');window.location.href='dashboard.php';</script>";
    }else{

        $result = array(
            'success' => true,
            'msg' => 'Invalid username and password...!'
        );
       // echo "<script>alert('Invalid username and password...!')</script>";
    }
}

?>