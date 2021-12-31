<?php
session_start();

require_once("../data/connection.php");

if(isset($_SESSION["session_username"])){
    header('Location: index.php');
}

if(isset($_POST["login"])){
    if(!empty($_POST["username"]) && !empty($_POST["password"])){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $query_res = $db->query("SELECT * FROM `users` WHERE `username`='$username' AND password='$password'");
        $numrows = $query_res->num_rows;
        if($numrows!=0){
            while($row=$query_res->fetch_assoc()){
                $dbUsername = $row['username'];
                $dbPassword = $row['password'];
            }
            if($username == $dbUsername && $password == $dbPassword){
                $_SESSION["session_username"] = $username;
                header('Location: ../index.php');
            }
            else echo "bad";
        }
        else {
            echo "Invalid password or username!";
        }
    }
    else echo "Shit happened";
}