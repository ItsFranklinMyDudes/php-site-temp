<?php include "template.php";
/**  @var $conn */
?>
<title>Edit Product</title>
<?php

if (isset($_GET["prodCode"])) {
    $prodCode = $_GET["prodCode"];
    $query = $conn->query("SELECT DISTINCT category FROM Products");
} else {
    header("location:index.php");
}

$query = $conn->query("SELECT * FROM products WHERE code='$prodCode'");
$prodData = $query->fetchArray();
$prodName = $prodData[1];
$prodPrice = $prodData[2];
$prodCategory = $prodData[3];
$prodQuantity = $prodData[4];
$prodImage = $prodData[5];
?>

<h1 class='text-primary'>Edit Product - <?= $prodName ?></h1>

<?php
// Check to see if User is Administrator (level 1)
// If they are, allow functionality, otherwise redirect them back to the front page.
if ($_SESSION['AccessLevel'] == 1) {
    ?>
    <form action="productEdit.php?prodCode=<?= $prodCode ?>" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <!--Customer Details-->
                <div class="col-md-6">
                    <h2>Products Details</h2>
                    <p>Product Name<input type="text" name="prodName" class="form-control" required="required"
                                          value="<?= $prodName ?>"></p>
                    <p>Product Category
                        <input type="text" name="prodCategory" class="form-control" required="required"
                               value="<?= $prodCategory ?>"></p>
                    </p>
                    <p>Quantity<input type="number" name="prodQuantity" class="form-control" required="required"
                                      value="<?= $prodQuantity ?>"></p>
                </div>
                <div class="col-md-6">
                    <h2>More Details</h2>
                    <!--Product List-->
                    <p>Price<input type="number" step="0.01" name="prodPrice" class="form-control" required="required"
                                   value="<?= $prodPrice ?>">
                    </p>
                    <p>Product Code<input type="text" name="prodCode" class="form-control" required="required"
                                          value="<?= $prodCode ?>"></p>
                    <p>Product Picture
                        <img src='images/productImages/<?= $prodImage ?>' width='100' height='100'>
                        <input type="file" name="prodImage" class="form-control" required="required"></p>
                </div>
            </div>
        </div>
        <input type="submit" name="formSubmit" value="Submit">
    </form>

    <?php
} else {
    header("location:index.php");
}
?>