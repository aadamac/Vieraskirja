<?php

include 'db.php';


$name = $_POST['name'];
$message = $_POST['message'];

if (!empty($name) && !empty($message)) {
    $stmt = $pdo->prepare("INSERT INTO messages (name, message) VALUES (?, ?)");
    $stmt->execute([$name, $message]);
}
?>
