<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $sellingPrice = $_POST['selling_price'];
    $purchasePrice = $_POST['purchase_price'];

    $query = "INSERT INTO cars (name, brand, selling_price, purchase_price) VALUES (:name, :brand, :selling_price, :purchase_price)";
    $response = $bdd->prepare($query);
    $response->execute([
        'name' => $name,
        'brand' => $brand,
        'selling_price' => $sellingPrice,
        'purchase_price' => $purchasePrice
    ]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
</head>
<body>
    <h2>Add Car</h2>
    <form method="post" action="">
        <label for="name">Nom:</label>
        <input type="text" name="name" required><br>

        <label for="brand">Marque:</label>
        <input type="text" name="brand" required><br>

        <label for="selling_price">Prix de vente:</label>
        <input type="text" name="selling_price" required><br>

        <label for="purchase_price">Prix d'achat:</label>
        <input type="text" name="purchase_price" required><br>

        <button type="submit">Add Car</button>
    </form>
    <button><a href='index.php' title='Back'>Back</a><br></button>
</body>
</html>
