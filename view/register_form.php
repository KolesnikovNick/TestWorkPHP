<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body class="p-3 mb-2 bg-dark text-white">
    <form method="post" id="register-form" action="../controller/register.php">
        <div class="container w-75 ">
            <div class="mb-3 col-4 mx-auto">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
        </div>
        <div class="container w-75">
            <div class="mb-3 col-4 mx-auto">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <div class="container w-75">
            <div class="mb-3 col-4 mx-auto">
                <label for="password_confirm" class="form-label">Repeat Password</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm">
            </div>
        </div>
        <div class="container w-75 text-center mt-5">
            <button type="submit" id="register" name="register" class="btn btn-success btn-lg">Register</button>
        </div>
        </form>
</body>

</html>