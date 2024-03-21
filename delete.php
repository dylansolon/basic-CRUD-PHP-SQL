<?php
require 'connection.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: index.php');
    exit();
}

$id = $_GET['id'];

$query = "DELETE FROM cars WHERE id = :id";
$response = $bdd->prepare($query);
$response->execute(['id' => $id]);

header("Location: index.php");
exit();

?>
