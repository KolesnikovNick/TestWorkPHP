<?php

session_start();

require_once("../data/connection.php");

if(!isset($_SESSION["session_username"])){
    header("Location: ../view/user_account_view.php");
}
if(isset($_GET["image_id"])){
        $id=$_GET["image_id"];
        $query = $db->query("DELETE FROM `images` WHERE `id`='$id'");
        header("Location: ../view/user_account_view.php");
}
else echo "No photo to delete!";