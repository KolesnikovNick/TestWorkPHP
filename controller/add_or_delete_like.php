<?php 
session_start();

require_once("../data/connection.php");

if(!isset($_SESSION["session_username"])){
    header("Location: ../view/user_account_view.php");
}
$username=$_POST['username'];
$imageId=$_POST['imageId'];

$query = $db->query("SELECT * FROM `likes` WHERE `user_name`='$username' AND `id_photo`='$imageId'");
$numrows = $query->num_rows;
if($numrows==0){
    $db->query("INSERT INTO `likes` (`user_name`, `id_photo`) VALUES ('$username','$imageId')");    
}
else{
   $db->query("DELETE FROM `likes` WHERE `user_name`='$username' AND `id_photo`='$imageId'");
}

