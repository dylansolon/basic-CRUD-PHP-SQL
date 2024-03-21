<?php
require 'connection.php';
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
            <td>Id</td>
            <td>Nom</td>
            <td>Marque</td>
            <td>Prix</td>
            <td>Action</td>
        </tr>
        <?php 
        $query = "SELECT * FROM cars ORDER BY selling_price DESC";
        $response = $bdd->query($query);
        $datas = $response->fetchAll();

        foreach($datas as $data) {?>
            <tr>
                <td><?= $data['id']?></td>
                <td><a href='show.php?id=<?= $data['id']?>' title='<?= $data['name']?>'><?= $data['name']?></a></td>
                <td><?= $data['brand']?></td>
                <td><?= $data['selling_price']?></td>
                <td>
                    <a href='edit.php?id=<?= $data['id']?>' title='Edit'>Edit</a>
                    <a href='delete.php?id=<?= $data['id']?>' title='Delete'>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    
    <button><a href='add.php' title='Add Car'>Add Car</a></button>
</body>
</html>
