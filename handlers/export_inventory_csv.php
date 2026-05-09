<?php
include('../classes/Users.php');

$usersObj = new Users();
$result = $usersObj->getAllProducts();

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="inventory_export.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['Product Name', 'Category', 'Price', 'Quantity']);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [
            $row['product_name'] ?? '',
            $row['category'] ?? '',
            $row['price'] ?? '0',
            $row['stock'] ?? '0'
        ]);
    }
}

fclose($output);
