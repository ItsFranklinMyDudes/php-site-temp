<!doctype html>
<?php include "template.php" ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1>Heading</h1>
<div class="container-fluid">
    <h1 class="text-primary">Please Send us a Message</h1>
    <form action="contact.php" method="post">
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="name@example.com">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="inputMessage" class="form-label">Message</label>
            <textarea type="text" class="form-control" id="inputMessage" name="inputMessage"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formError = false;
    if (empty($_POST['inputEmail'])) {
        $formError = true;
        echo "Enter an email address.";
        echo "<br>";
    }
    if (empty($_POST['inputMessage'])) {
        $formError = true;
        echo "Enter a message to submit.";
    }
    if ($formError == false) {
        $emailAddress = sanitiseData($_POST["inputEmail"]);
        $messageSubmitted = sanitiseData($_POST["inputMessage"]);

       $csvFile = fopen( 'contact.scv', 'a');
       fwrite($csvFile, $emailAddress.", ".$messageSubmitted."\n");
       fclose($csvFile);
    }
}
?>
</body>
<script src="js/bootstrap.bundle.min.js" ></script>
</html>