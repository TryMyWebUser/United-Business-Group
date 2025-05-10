<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user'))
    {
        header("Location: index.php");
        exit;
    }

    $error = "";

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // Check if both username and password keys exist in $_POST
        if (isset($_POST['submit']) && isset($_POST['category']))
        {
            $cate = $_POST['category'] ?? "";
            $error = User::setCategory($cate);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
        <meta content="IE=edge" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />

        <?php include "temp/head.php" ?>

    </head>

    <body>
        <div class="app-wrapper">
            <!-- Menu Navigation starts -->
            <?php include "temp/sideheader.php" ?>
            <!-- Menu Navigation ends -->

            <div class="app-content" style="height: 100vh;">
                <!-- Header Section starts -->
                <?php include "temp/header.php" ?>
                <!-- Header Section ends -->

                <div class="body-wrapper mt-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-body">
                                    <form class="form-horizontal" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label">Category</label>
                                            <input type="text" class="form-control" placeholder="Enter Category Name" name="category" required>
                                        </div>
                                        <p class="<?= $error ? 'text-danger' : 'text-success' ?>"><?= $error ?></p>
                                        <div class="col-12">
                                            <div class="d-md-flex align-items-center">
                                                <div class="ms-auto mt-3 mt-md-0">
                                                    <button type="submit" name="submit" class="btn btn-primary hstack gap-6">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

        <?php include "temp/footer.php"; ?>
        
    </body>
</html>