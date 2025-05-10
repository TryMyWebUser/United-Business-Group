<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    // Redirect if the user is already logged in
    if (Session::get('login_user'))
    {
        header('Location: welcome.php');
        exit;
    }

    $error = "";

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // Check if both username and password keys exist in $_POST
        if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password']))
        {
            $username = $_POST['username'] ?? "";
            $password = $_POST['password'] ?? "";
            $error = User::login($username, $password);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
        <meta content="IE=edge" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        
        <title>Admin - Login</title>
        
        <link rel="apple-touch-icon" sizes="57x57" href="../assets/img/favicons/favicon-96x96.png" />
        <link rel="apple-touch-icon" sizes="60x60" href="../assets/img/favicons/favicon-96x96.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="../assets/img/favicons/favicon-96x96.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/favicons/favicon-96x96.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="../assets/img/favicons/favicon-96x96.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="../assets/img/favicons/favicon-96x96.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="../assets/img/favicons/favicon-96x96.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="../assets/img/favicons/favicon-96x96.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/favicon-96x96.png" />
        <link rel="icon" type="image/png" sizes="192x192" href="../assets/img/favicons/favicon-96x96.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-96x96.png" />
        <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicons/favicon-96x96.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-96x96.png" />
        
        <!--font-awesome-css-->
        <link href="assets/vendor/fontawesome/css/all.css" rel="stylesheet" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/" rel="preconnect" />
        <link crossorigin href="https://fonts.gstatic.com/" rel="preconnect" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet" />

        <!-- iconoir icon css  -->
        <link href="assets/vendor/ionio-icon/css/iconoir.css" rel="stylesheet" />

        <!-- tabler icons-->
        <link href="assets/vendor/tabler-icons/tabler-icons.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap css-->
        <link href="assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- App css-->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- Responsive css-->
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="app-wrapper d-block">
            <div class="">
                <!-- Body main section starts -->
                <main class="w-100 p-0">
                    <!-- Login to your Account start -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="login-form-container">
                                    <div class="mb-4">
                                        <a class="logo d-inline-block" href="index.php">
                                            <img alt="Logo" src="../assets/img/logo.png" width="250" />
                                        </a>
                                    </div>
                                    <div class="form_container">
                                        <form class="app-form rounded-control" method="POST">
                                            <div class="mb-3 text-center">
                                                <h3 class="text-primary-dark">Login to your Account</h3>
                                                <p class="f-s-12 <?= $error ? 'text-danger' : 'text-succes' ?>"><?= $error ?></p>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Username or Email Address</label>
                                                <input class="form-control" type="text" name="username" placeholder="Username or Email Address" required/>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input class="form-control" type="password" name="password" placeholder="Password" required/>
                                            </div>
                                            <button class="btn btn-light-primary w-100" type="submit" name="submit" role="button">Login</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Login to your Account end -->
                </main>
                <!-- Body main section ends -->
            </div>
        </div>
        <!-- latest jquery-->
        <script src="assets/js/jquery-3.6.3.min.js"></script>

        <!-- Bootstrap js-->
        <script src="assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>