<?php include "template.php";
/** @var $conn */
?>
<title>User Registration</title>
<h1 class='text-primary'>User Registration</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <!--Customer Details-->

            <div class="col-md-6">
                <h2>Account Details</h2>
                <p>Please enter wanted username and password:</p>
                <p>Email Address<input type="text" name="username" class="form-control" required="required"></p>
                <p>Password<input type="password" name="password" class="form-control" required="required"></p>

            </div>
            <div class="col-md-6">
                <h2>More Details</h2>
                <!--Product List-->
                <p>Please enter More Personal Details:</p>
                <p>First Name<input type="text" name="firstname" class="form-control" required="required"></p>
                <p>Last Name<input type="text" name="lastname" class="form-control" required="required"></p>
                <p>Phone Number<input type="text" name="phone" class="form-control" required="required"></p>
                <p>Address<input type="text" name="address" class="form-control" required="required"></p>
            </div>
        </div>
        <input type="submit" name="formSubmit" class="btn btn-primary" value="Submit">
    </div>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitiseData($_POST['username']);
    $password = sanitiseData($_POST['password']);
    $firstName = sanitiseData($_POST['firstname']);
    $lastName = sanitiseData($_POST['lastname']);
    $phoneNumber = sanitiseData($_POST['phone']);
    $address = sanitiseData($_POST['address']);

    $query = $conn->query("SELECT COUNT(*) FROM Customers WHERE EmailAddress='$username'");
    $data = $query->fetchArray();
    $numberOfUsers = (int)$data[0];
    if($numberOfUsers > 0) {
        echo 'sorry user already exists';
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sqlStmt = $conn->prepare("INSERT INTO Customers (EmailAdress, HashedPassword, FirstName, SecondName, PhoneNumber, Address) VALUES (:EmailAddress, :HashedPassword, :FirstName, :LastName, :PhoneNumber, :Address)");
        $sqlStmt->bindParam(':EmailAddress', $username);
        $sqlStmt->bindParam(':HashedPassword', $hashedPassword);
        $sqlStmt->bindParam(':FirstName', $firstName);
        $sqlStmt->bindParam(':LastName', $lastName);
        $sqlStmt->bindParam(':PhoneNumber', $phoneNumber);
        $sqlStmt->bindParam(':Address', $address);
        $sqlStmt->execute();
    }
}

?>