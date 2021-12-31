<?php

session_start();
unset($_SESSION["session_username"]);
session_destroy();
header("Location: ../view/login_form.php");
exit;