<?php

session_start();

require_once("../data/connection.php");

if(!isset($_SESSION["session_username"])){
    header("Location: ../view/login_form.php");
}

if(isset($_POST["submit_image"])){
    if(!empty($_FILES["image"]["name"])){
        $img_data = file_get_contents($_FILES['image']['tmp_name']);
        $img_data = $db->escape_string($img_data);
        $img_name = ($_FILES['image']['name']);
        $img_user = $_SESSION["session_username"];
        $img_date = date('Y-m-d h:m:s');
        $query = $db->query("INSERT INTO `images` (`image_data`, `image_name`, `image_date`, `image_user`) VALUES ('$img_data', '$img_name', '$img_date', '$img_user')");
        header("Location: ../view/user_account_view.php");
    }
    else echo "No photo";
}