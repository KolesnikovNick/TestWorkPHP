<?php
session_start();

require_once("../data/connection.php");

if(isset($_SESSION["session_username"])){
    header('Location: index.php');
}

if(isset($_POST["register"])){
    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $password_confirm = htmlspecialchars($_POST['password_confirm']);
        if($password==$password_confirm){
        $query = $db->query("SELECT * FROM `users` WHERE `username`='$username'");
        $numrows = $query->num_rows;
        if($numrows==0){
            $sql= $db->query("INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')");
            header("Location: ../view/login_form.php");
        }
        else echo "Password and password confirmation are not the same";    
    }
    else echo "Something is not right with your info, please check it up";
    }
    else echo "Post request is not 'register'";
}