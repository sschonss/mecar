<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">


    <title>Login - Mecar</title>
</head>

<body>

    <div class="container">
        <div class="logar">
            <h2>MECAR</h2>

            <form action="autenticar.php" method="post">
                <form class="row g-3">
                    <div>
                        <label for="inputEmail" class="form-label">User</label>
                        <input type="text" class="form-control" id="user">
                    </div>
                    <div>
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <br>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>

            </form>
        </div>
    </div>


    <script src="js/bootstrap.js"></script>

</body>

</html>