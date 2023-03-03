<?php include "template.php" ?>
    <title>Invoice</title>
    <body>

<?php
// Read the contents of the file
$currentRow = 1;
if (($handle = fopen("orders.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

        $cusNameFirst = $data[0];
        $cusNameSecond = $data[1];
        echo "<a href='invoice.php?invoiceNumber=$currentRow'>" . $cusNameFirst . " " . $cusNameSecond . "<br>" . "</a>";
        $currentRow++;
    }
    fclose($handle);
}
?>