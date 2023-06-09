<?php
/**  @var $conn */

if (isset($_POST['login'])) {
//removes all scripts so it doesnt ruin the data
    $username = sanitiseData($_POST['username']);
    $password = sanitiseData($_POST['password']);

//searchs the database for the email
    $query = $conn->query("SELECT COUNT(*) as count, * FROM Customers WHERE `EmailAddress`='$username'");
    $row = $query->fetchArray();
    $count = $row['count'];
//if there is no data with the email it will create data
    if ($count > 0) {
//        if the hashed password matchs the email
        if (password_verify($password, $row['HashedPassword'])) {
            $_SESSION["FirstName"] = $row['FirstName'];
            $_SESSION['EmailAddress'] = $row['EmailAddress'];
            $_SESSION['AccessLevel'] = $row['AccessLevel'];
            $_SESSION['CustomerID'] = $row['CustomerID'];
//            returns to the main page once logged in
            header("location:index.php");
        } else {
            echo "<div class='alert alert-danger'>Invalid username or password</div>";
        }
//        else print this
    } else {
        echo "<div class='alert alert-danger'>Invalid username or password</div>";
    }
}
?>
