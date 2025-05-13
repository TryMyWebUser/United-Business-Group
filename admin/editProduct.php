<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user'))
    {
        header("Location: index.php");
        exit;
    }

    $conn = Database::getConnect();
    $pro = Operations::getProduct($conn);

    $error = "";

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // Check if both username and password keys exist in $_POST
        if (isset($_POST['submit']) && isset($_POST['pro_cate']) && isset($_POST['cate']) && isset($_POST['title']))
        {
            $getID = $_GET['edit_id'];
            $img = $_FILES['img'] ?? "";
            $title = $_POST['title'] ?? "";
            $dec = $_POST['dec'] ?? "";
            $price = $_POST['price'] ?? "";
            $pro_cate = $_POST['pro_cate'] ?? "";
            $brand = $_POST['brand'] ?? "";
            $gst = $_POST['gst'] ?? "";
            $pkt = $_POST['pkt'] ?? "";
            $cate = $_POST['cate'] ?? "";

            $error = User::updateProducts($img, $title, $dec, $price, $pro_cate, $brand, $gst, $pkt, $cate, $conn, $getID);
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
                        <!-- Flash message -->
                        <div class="card card-body pb-0">
                            <p class="<?= $error ? 'text-danger' : 'text-success' ?> m-0">
                                <?= $error ?: "" ?>
                            </p>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                                            <!-- Title -->
                                            <div class="mb-3">
                                                <label class="form-label">Title *</label>
                                                <input type="text" class="form-control" name="title" placeholder="Enter Title" value="<?= htmlspecialchars($pro['title']) ?>" required>
                                                <div class="invalid-feedback">Please enter a title.</div>
                                            </div>

                                            <!-- Description -->
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="dec" rows="4" placeholder="Enter Description"><?= htmlspecialchars($pro['dec']) ?></textarea>
                                            </div>

                                            <!-- Price -->
                                            <div class="mb-3">
                                                <label class="form-label">Price</label>
                                                <input type="text" class="form-control" name="price" placeholder="Enter Price" value="<?= htmlspecialchars($pro['price']) ?>">
                                            </div>

                                            <!-- Product Category -->
                                            <div class="mb-3">
                                                <label class="form-label">Product Category *</label>
                                                <input type="text" class="form-control" name="pro_cate" placeholder="Enter Product Category" value="<?= htmlspecialchars($pro['product-cate']) ?>" required>
                                                <div class="invalid-feedback">Please enter the product category.</div>
                                            </div>

                                            <!-- Brand -->
                                            <div class="mb-3">
                                                <label class="form-label">Brand</label>
                                                <input type="text" class="form-control" name="brand" placeholder="Enter Brand" value="<?= htmlspecialchars($pro['brand']) ?>">
                                            </div>

                                            <!-- GST -->
                                            <div class="mb-3">
                                                <label class="form-label">GST (%)</label>
                                                <input type="text" class="form-control" name="gst" placeholder="Enter GST Percentage" value="<?= htmlspecialchars($pro['gst']) ?>">
                                            </div>

                                            <!-- Packet / Counts -->
                                            <div class="mb-3">
                                                <label class="form-label">COUNTS / PKT</label>
                                                <input type="text" class="form-control" name="pkt" placeholder="Enter Packet Size or Count" value="<?= htmlspecialchars($pro['counts-pkt']) ?>">
                                            </div>

                                            <!-- Category Dropdown -->
                                            <div class="mb-3">
                                                <label class="form-label">Category *</label>
                                                <select class="form-control" name="cate" required>
                                                    <option value="" disabled>Select Category</option>
                                                    <?php $cateList = Operations::getCategoryChecker($conn);
                                                    foreach ($cateList as $c) { ?>
                                                        <option value="<?= $c['category'] ?>" <?= $c['category'] === $pro['product-cate'] ? 'selected' : '' ?>>
                                                            <?= $c['category'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">Please select a category.</div>
                                            </div>

                                            <!-- Image Upload -->
                                            <div class="mb-3">
                                                <label class="form-label">Image Upload <?= $pro['img'] ? '' : '*' ?></label><br>
                                                <?php if ($pro['img']) { ?>
                                                    <img src="<?= $pro['img'] ?>" alt="Current image" class="mb-2" style="width:6rem; box-shadow:0 0 0 2px #0001; border-radius:5px;">
                                                <?php } ?>
                                                <input type="file" class="form-control" name="img" accept="image/*" <?= $pro['img'] ? '' : 'required' ?>>
                                                <div class="invalid-feedback">Please upload an image.</div>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <button type="submit" name="submit" class="btn btn-primary">
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "temp/footer.php"; ?>

        <!-- Bootstrap validation (same as Add page) -->
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