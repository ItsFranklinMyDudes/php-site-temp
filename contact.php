<!doctype html>
<?php include "template.php" ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1>Contact Us</h1>
<div class="container-fluid">
    <h1 class="text-primary">Please Send us a Message</h1>
    <form action="contact.php" method="post">
        <div class="mb-3">
            <label for="contactEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="contactEmail" name="contactEmail"
                   placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="contactMessage" class="form-label">Message</label>
            <textarea class="form-control" id="contactMessage" name="contactMessage" rows="3"></textarea>
        </div>
        <button type="submit" name="formSubmit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php

if (isset($_POST['formSubmit'])) {
    $userEmail = sanitiseData($_POST['contactEmail']);
    $userMessage = sanitiseData($_POST['contactMessage']);
    echo $userEmail;
    echo '<br>';
    echo $userMessage;
}


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $formError = false;
    if (empty($_POST['inputEmail'])) {
        $formError = true;
        echo "Enter an email address.";
    }
    if (empty($_POST['inputMessage'])) {
        $formError = true;
        echo "Enter a message to submit.";
    }
    if ($formError == false) {
        $emailAddress = $_POST["inputEmail"];
        $messageSubmitted = $_POST["inputMessage"];

        echo $emailAddress;
        echo '<p>';
        echo $messageSubmitted;
    }
}
?>
<br>
<?php echo footer() ?>
</body>
<script src="js/bootstrap.bundle.min.js" ></script>
</html>