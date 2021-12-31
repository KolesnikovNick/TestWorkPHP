<?php

ob_start();

session_start();

if(!isset($_SESSION["session_username"])){
header("location: view/login_form.php");
}

include "data/connection.php";
$user = $_SESSION["session_username"];
$query = $db->query("SELECT * FROM `images` ORDER BY RAND()");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">   </script>
    <!--<script src="js/sendJSONInfo.js"></script> -->
    <title>Document</title>
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
                    <li><a class="dropdown-item" href="view/user_account_view.php" role="button">My images</a></li>
                    <li><a class="dropdown-item" href="index.php">Home page</a></li>
                    <li><a class="dropdown-item" href="controller/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>
    <?php while($rows = $query->fetch_assoc()): ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 offset-5">
                <p class="text-light"><a href="#" class="btn btn-light"
                        role="button"><?php echo $rows['image_user'] ?></a>
                </p>
            </div>
            <div class="col-12 offset-5">
                <a href="view/view_other_user_account.php?username=<?php echo $rows['image_user'] ?>">
                <img src="data:image/jpeg;base64, <?php echo base64_encode($rows['image_data']) ?>"
                    class="w-50 d-flex shadow-1-strong rounded mb-4" alt="" /></a>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <a class="btn btn-danger" href="#" id="<?php echo $rows['id'] ?>" onclick="likeButton(this);">Like</a>
            </div>
            <div>
            <p class="text-light"><?php
            $id = $rows['id'];
            $likesQuery = $db->query("SELECT COUNT(*) AS Count FROM `likes` WHERE `id_photo`='$id'");
            $row = $likesQuery->fetch_array();
            echo $row["Count"];
            ?></p>
            </div>
            <div class="col-8 offset-7">
                <p class="text-light"> <?php echo $rows['image_date'] ?> </p>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <footer>

    </footer>
</body>

</html>
<script>
function likeButton(element){
    var imageId=element.id;
    var username=<?php echo json_encode($user); ?>;
    console.log(username);
    console.log(element);
    $.ajax({
        type:'POST',
        url:'controller/add_or_delete_like.php',
        data:{"username":username, "imageId":imageId},
        success: function(msg){
        alert( "Data Saved: " + msg );
  }
    })
}
</script>