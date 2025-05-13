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
        if (isset($_POST['submit']) && isset($_POST['pro_cate']) && isset($_POST['cate']) && isset($_POST['title']) && isset($_FILES['img']))
        {
            $img = $_FILES['img'] ?? "";
            $title = $_POST['title'] ?? "";
            $dec = $_POST['dec'] ?? "";
            $price = $_POST['price'] ?? "";
            $pro_cate = $_POST['pro_cate'] ?? "";
            $brand = $_POST['brand'] ?? "";
            $gst = $_POST['gst'] ?? "";
            $pkt = $_POST['pkt'] ?? "";
            $cate = $_POST['cate'] ?? "";

            $error = User::setProducts($img, $title, $dec, $price, $pro_cate, $brand, $gst, $pkt, $cate);
        } else {
            $error = "Invalid form submission";
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

            <div class="app-content">
                <!-- Header Section starts -->
                <?php include "temp/header.php" ?>
                <!-- Header Section ends -->

                <div class="body-wrapper">
                    <div class="container-fluid">
                        <div class="card card-body pb-0">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="d-sm-flex align-items-center justify-space-between">
                                        <p class="<?= $error ? 'text-danger' : 'text-success' ?> p-0 m-0"><?= $error ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- start Default Basic Forms -->
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                                            <div class="mb-3">
                                                <label class="form-label">Title *</label>
                                                <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                                                <div class="invalid-feedback">Please enter a title.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="dec" rows="4" placeholder="Enter Description"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Price</label>
                                                <input type="text" class="form-control" name="price" placeholder="Enter Price">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Product Category *</label>
                                                <input type="text" class="form-control" name="pro_cate" placeholder="Enter Product Category" required>
                                                <div class="invalid-feedback">Please enter the product category.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Brand</label>
                                                <input type="text" class="form-control" name="brand" placeholder="Enter Brand">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">GST (%)</label>
                                                <input type="text" class="form-control" name="gst" placeholder="Enter GST Percentage">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">COUNTS / PKT</label>
                                                <input type="text" class="form-control" name="pkt" placeholder="Enter Packet Size or Count">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Category *</label>
                                                <select class="form-control" name="cate" required>
                                                    <option value="" selected disabled>Select Category</option>
                                                    <?php $cate = Operations::getCategory(); foreach ($cate as $c) { ?>
                                                    <option value="<?= $c['category'] ?>"><?= $c['category'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">Please select a category.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Image Upload *</label>
                                                <input type="file" class="form-control" name="img" accept="image/*" required>
                                                <div class="invalid-feedback">Please upload an image.</div>
                                            </div>

                                            <div class="col-12">
                                                <div class="d-md-flex align-items-center">
                                                    <div class="ms-auto mt-3 mt-md-0">
                                                        <button type="submit" name="submit" class="btn btn-primary hstack gap-6">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- Bootstrap Validation Script -->
                                        <script>
                                            (() => {
                                                'use strict';
                                                const forms = document.querySelectorAll('.needs-validation');
                                                Array.from(forms).forEach(form => {
                                                    form.addEventListener('submit', event => {
                                                        if (!form.checkValidity()) {
                                                            event.preventDefault();
                                                            event.stopPropagation();
                                                        }
                                                        form.classList.add('was-validated');
                                                    }, false);
                                                });
                                            })();
                                        </script>
                                    </div>
                                </div>
                                <!-- end Default Basic Forms -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <?php include "temp/footer.php"; ?>
        
    </body>
</html>