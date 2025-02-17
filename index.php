<?php

$pdo = new PDO("mysql:host=localhost;dbname=guestbook", "root", ""); 


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);
    
    if (!empty($name) && !empty($message)) {
        $stmt = $pdo->prepare("INSERT INTO messages (name, message) VALUES (?, ?)");
        $stmt->execute([$name, $message]);
    }
}


$stmt = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC");
$messages = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vieraskirja</title>
</head>
<body>
    <h2>Vieraskirja</h2>
    
    <form method="post">
        <input type="text" name="name" placeholder="Nimesi" required><br>
        <textarea name="message" placeholder="Kirjoita viestisi" required></textarea><br>
        <button type="submit">Lähetä</button>
    </form>

    <h3>Viestit:</h3>
    <?php if (count($messages) > 0): ?>
        <?php foreach ($messages as $msg): ?>
            <p><strong><?= htmlspecialchars($msg['name']) ?>:</strong> <?= htmlspecialchars($msg['message']) ?> <em>(<?= $msg['created_at'] ?>)</em></p>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Ei viestejä vielä.</p>
    <?php endif; ?>
</body>
</html>
