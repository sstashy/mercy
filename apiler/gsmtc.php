<?php

header('Content-Type: application/json');

$connection = new PDO("mysql:host=localhost; dbname=gsmdata; charset=utf8", 'root', '');

$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


$statement = $connection->prepare("SELECT * FROM gsmdata WHERE GSM = :gsm");

$statement->bindParam(':gsm', $_GET['gsm']);

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'data' => $result]);

?>