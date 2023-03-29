<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-sm bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./images/maccas-logo.jpg" width="100" height="50"></a>
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
                <li class="nav-item">
                    <a class="nav-link" href="orderForm.php">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="invoiceList.php">Invoice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <style>
                    nav-item {

                    }
                    float: left;
                </style>
        </div>
    </div>
</nav>

</body>
<style>
</style>
<?php
session_start();
$conn = new SQLite3('DB') or die('couldnt open the DB');

$productNames = array("product1" => "Cheeseburger", "product2" => "BigMac", "product3" => "McFlurry", "product4" => "Chips", "product5" => "Coke");
$productPrices = array("product1" => 4.4, "product2" => 7.3, "product3" => 4, "product4" => 2, "product5" => 3.2);
function footer(): string
{
    date_default_timezone_set('Australia/Canberra');
    $filename = basename($_SERVER["SCRIPT_FILENAME"]);
    $footer = "This page was last modified: " . date("F d Y H:i:s.", filemtime($filename));
    return $footer;
}

function sanitiseData($unsanitisedData): string
{
    $unsanitisedData = trim($unsanitisedData);
    $unsanitisedData = stripslashes($unsanitisedData);
    $sanitisedData = htmlspecialchars($unsanitisedData);
    return $sanitisedData;
}

?>
</html>
