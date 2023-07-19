<?php
include_once 'connection.php';
session_start();

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$mobile = $_POST['mobile'];

$query = "INSERT INTO registration (first_name, last_name, email, password, mobile) VALUE ('$first_name', '$last_name', '$email', '$pass', '$mobile')";

$result = mysqli_query($conn, $query);

if($result){

    $result = array(
        'success' => true,
        'msg'=> 'Data inserted successful...!'
    );
    echo json_encode($result);

    /*echo "<script>alert('Data insert successful...!!');window.location.href='show_add_to_cart.php';</script>";*/

}else{

    $result = array(
        'success'=> true,
        'msg'=> 'Sorry try again...!'
    );

    /*echo "<script>alert('Sorry try again...!!');window.location.href='show_add_to_cart.php';</script>";*/
}
