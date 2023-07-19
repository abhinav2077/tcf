<?php
session_start();
$username = "";
$password_1 = "";

$db = mysqli_connect('localhost','root','','project');

if(isset($_POST['reg_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

    if(empty($username)){array_push($errors,"username is required");}
    if(empty($password_1)){array_push($errors,"password is required");}

    $user_check_query = "SELECT * FROM users WHERE username='$username' OR password_1='$password_1' LIMIT 1";

    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if($user){
        if($user['username']===$username){
            array_push($errors,"username already exists");
        }
    }

    if(count($errors)==0){
        $password = md5($password_1);
        $query = "INSERT INTO users (username,password_1) VALUES ('$username','$password_1')";
        mysqli_query($db,$query);
        $_SESSION['username']=$username;
        $_SESSION['success']="You are now logged in";
        header('location:index.html')
    }
}

if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

    if(empty($username)){
        array_push($errors,"username is required");
    }
    if(empty($password_2)){
        array_push($errors,"password is required");
    }

    if(count($errors) == 0){
        $password_2 = md5($password_2);
        $query = "SELECT * FROM users WHERE username = '$username' AND password_2 = '$password_2'";
        $results = mysqli_query($db,$query);
        if(mysqli_num_rows($results) == 1){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.html');
        }
        else{
            array_push($errors,"wrong username/password combination")
        }
    }
}
?>