<?php
$db = new mysqli('localhost', 'root', '', 'testwork');

if(!$db){
    echo "Something is not right with database, please check it and try again!";
    die;
}
