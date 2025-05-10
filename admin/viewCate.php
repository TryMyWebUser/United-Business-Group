<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user'))
    {
        header("Location: index.php");
        exit;
    }

    $category = Operations::getCategory();

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
                                <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                                    <h4 class="mb-0 fs-5">Catefory Name Card</h4>
                                </div>
                            </div>

                            <?php
                                if (!empty($category)) {
                                    foreach ($category as $cate) {
                            ?>
                            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                                <div class="card w-100">
                                    <div class="p-4 h-100">
                                        <div class="row">
                                            <div class="col-8 col-md-9">
                                                <div>
                                                    <a href="javascript:void(0)" class="card-title link-primary fw-semibold text-dark"><?= $cate['category']; ?></a>
                                                    <p class="card-subtitle mt-1">
                                                        <a href="deleteCate.php?delete_id=<?= $cate['id']; ?>">
                                                            <button type="button" class="btn btn-square btn-outline-danger ms-1 p-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32"><path fill="currentColor" d="M13.5 6.5V7h5v-.5a2.5 2.5 0 0 0-5 0m-2 .5v-.5a4.5 4.5 0 1 1 9 0V7H28a1 1 0 1 1 0 2h-1.508L24.6 25.568A5 5 0 0 1 19.63 30h-7.26a5 5 0 0 1-4.97-4.432L5.508 9H4a1 1 0 0 1 0-2zM9.388 25.34a3 3 0 0 0 2.98 2.66h7.263a3 3 0 0 0 2.98-2.66L24.48 9H7.521zM13 12.5a1 1 0 0 1 1 1v10a1 1 0 1 1-2 0v-10a1 1 0 0 1 1-1m7 1a1 1 0 1 0-2 0v10a1 1 0 1 0 2 0z"/></svg>
                                                            </button>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } } else { echo "<p>Category Not Found</p>"; } ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php include "temp/footer.php"; ?>
        
    </body>
</html>