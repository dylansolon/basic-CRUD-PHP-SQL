<?php
require 'connection.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: index.php');
    exit();
}

$query = "SELECT * FROM cars WHERE id=:id" ;

$response = $bdd->prepare($query);
$response->execute([
    'id' => $_GET['id']
]);

$data = $response->fetch();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table>
        <tr>
            <td>Nom</td>
            <td>Marque</td>
            <td>Prix de vente</td>
            <td>Prix d'achat</td>
        </tr>
        <tr>
            <td><?= $data['name']?> </td>
            <td><?= $data['brand']?></td>
            <td><?= $data['selling_price']?></td>
            <td><?= $data['purchase_price']?></td>
        </tr>
    </table>
<button><a href='index.php' title='back'>Back</a><br></button>
</body>
</html>