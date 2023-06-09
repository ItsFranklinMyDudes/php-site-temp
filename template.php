<?php session_start(); ?>

    <!doctype html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<!--Navbar to choose a page you want to go too-->
<nav class="navbar navbar-expand-sm bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"> <img src="images/maccas-logo.jpg" width="65rem" height="40rem"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>

                <?php
//                checks if the user has created an account
                if (isset($_SESSION["FirstName"])) {
                    echo '<li class="nav-item" ><a class="nav-link" href = "orderForm.php">Order Form </a ></li >';
                    echo '<li class="nav-item" ><a class="nav-link" href = "invoice.php">Invoices</a ></li >';
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
                }
//                checks if the user has admin perms
                if (isset($_SESSION["AccessLevel"])) {
                    if ($_SESSION["AccessLevel"] == 1) {
                        ?>
<!--                        drop down menu for admins, to edit the products-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Product Management
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="productAdd.php">Add Products</a></li>
                                <li><a class="dropdown-item" href="productList.php">Product List</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
        <?php
        //displays a welcome message when logged in and has a logout button
        if (isset($_SESSION["FirstName"])) {
            echo '<div class="bg-light">Welcome, ' . $_SESSION["FirstName"] . '!<a class="nav-link" href="logout.php">Logout</a></div>';
        }
        ?>
    </div>
</nav>
    <script src="js/bootstrap.bundle.min.js"></script>

<?php

//database connection
$conn = new SQLite3("DB") or die("Unable to open database");

//old orderform
$productNames = array("product1" => "Darth Vader Helmet", "product2" => "Grogu Plush", "product3" => "ROTJ Jigsaw", "product4" => "Aftermath", "product5" => "Alphabet Squadron");
$productPrices = array("product1" => 299.0, "product2" => 32.95, "product3" => 219.95, "product4" => 24.95, "product5" => 25.95);
//this function tells you when the page was updated with the exact time n data
function footer(): string
{
    date_default_timezone_set('Australia/Canberra');
    $filename = basename($_SERVER["SCRIPT_FILENAME"]);
    $footer = "This page was last modified: " . date("F d Y H:i:s.", filemtime($filename));
    return $footer;
}
//this function makes sure you can run scripts within the string
function sanitiseData($unsanitisedData): string
{
    $unsanitisedData = trim($unsanitisedData);
    $unsanitisedData = stripslashes($unsanitisedData);
    $sanitisedData = htmlspecialchars($unsanitisedData);
    return $sanitisedData;
}