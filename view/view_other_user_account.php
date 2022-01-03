<?php

ob_start();

session_start();

if(!isset($_SESSION["session_username"])){
header("location: view/login_form.php");
}

if($_GET["username"]==$_SESSION["session_username"]){
    header("location: ../view/user_account_view.php");
}
include "../data/connection.php";
$username = $_GET['username'];
$query = $db->query("SELECT * FROM `images` WHERE `image_user` = '$username' ORDER BY `image_date` DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title><?php echo $_GET['username']?>'s account</title>
</head>

<body class="bg-dark">
    <header class="position-fixed top-0 end-0">
        <div class="row">
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION["session_username"]?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="../view/user_account_view.php" role="button">My images</a></li>
                    <li><a class="dropdown-item" href="../index.php">Home page</a></li>
                    <li><a class="dropdown-item" href="../controller/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        </div>
    </header>
    <div class="row">
        <h1 class="text-light text-center p-2"><?php echo $_GET['username']?>'s images</h1>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php while($rows = $query->fetch_assoc()): ?>
            <div class="col">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($rows['image_data']) ?>"
                    class="img-fluid shadow-1-strong rounded mb-3 align-middle" alt="" />
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>