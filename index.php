<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="./css/login.css">

    <!-- <script src="./js/login.js"></script> -->

    <title>Login</title>
</head>

<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="./controller/comp_user.php" id="login" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" id="correo" name="mail" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password" id="passw" name="pass" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field button">
                        <input type="submit" id="button" value="LogIn">
                    </div>
                    
                </form>

            </div>
        </div>
    </div>
    <!-- <input type="hidden" id="session" name="log" value="<?php echo $_GET["log"]; ?>" /> -->

    <script src="../js/valid-form.js"></script>
    <script src="../js/valid-session.js"></script>
    
</body>
</html>



</body>
</html>