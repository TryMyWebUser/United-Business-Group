<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user'))
    {
        header("Location: index.php");
        exit;
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
                <div class="">
                    <!-- Header Section starts -->
                    <?php include "temp/header.php" ?>
                    <!-- Header Section ends -->

                    <!-- Body main section starts -->
                    <main>
                        <div class="container-fluid mt-3">
                            <div class="row">

                                <div class="col-md-6 col-xxl-4">
                                    <div class="card project-connect-card">
                                        <div class="card-body pb-0">
                                            <div class="text-center">
                                                <h5 class="mb-2 f-s-24">Welcome, <span class="text-primary f-w-700">Admin.</span></h5>
                                                <p class="f-s-14 text-dark pb-0 txt-ellipsis-2">
                                                    Here's what's happening with your store today.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <!-- Body main section ends -->

            <?php include "temp/footer.php" ?>

    </body>
</html>