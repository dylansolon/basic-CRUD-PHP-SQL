<?php
require 'connection.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: index.php');
    exit();
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $sellingPrice = $_POST['selling_price'];
    $purchasePrice = $_POST['purchase_price'];

    $query = "UPDATE cars SET name = :name, brand = :brand, selling_price = :selling_price, purchase_price = :purchase_price WHERE id = :id";
    $response = $bdd->prepare($query);
    $response->execute([
        'name' => $name,
        'brand' => $brand,
        'selling_price' => $sellingPrice,
        'purchase_price' => $purchasePrice,
        'id' => $id
    ]);

    header("Location: show.php?id=$id");
    exit();
}

$query = "SELECT * FROM cars WHERE id=:id";
$response = $bdd->prepare($query);
$response->execute(['id' => $id]);
$data = $response->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
</head>
<body>
    <h2>Edit Car</h2>
    <form method="post" action="">
        <label for="name">Nom:</label>
        <input type="text" name="name" value="<?= $data['name'] ?>" required><br>

        <label for="brand">Marque:</label>
        <input type="text" name="brand" value="<?= $data['brand'] ?>" required><br>

        <label for="selling_price">Prix de vente:</label>
        <input type="text" name="selling_price" value="<?= $data['selling_price'] ?>" required><br>

        <label for="purchase_price">Prix d'achat:</label>
        <input type="text" name="purchase_price" value="<?= $data['purchase_price'] ?>" required><br>

        <button type="submit">Save Changes</button>
    </form>
    <button><a href='index.php' title='Back'>Back</a><br></button>
</body>
</html>
