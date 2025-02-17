<?php

include 'db.php';


$stmt = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC");
$messages = $stmt->fetchAll();

foreach ($messages as $msg) {
    echo "<div class='alert alert-info'>";
    echo "<strong>" . htmlspecialchars($msg['name']) . ":</strong> " . htmlspecialchars($msg['message']);
    echo "<br><small><em> (" . $msg['created_at'] . ")</em></small>";
    echo "</div>";
}
?>
