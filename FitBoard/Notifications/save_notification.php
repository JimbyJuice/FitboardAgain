<?php
header('Content-Type: application/json');

$dsn = 'mysql:host=sql207.infinityfree.com;dbname=if0_41185474_fitboard_notifications;charset=utf8';
$username = 'if0_41185474';
$password = 'Lf1knlji5fBcBd1';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $stmt = $pdo->prepare('UPDATE notifications SET subject = :subject, message = :message WHERE id = :id');
        $stmt->execute(['subject' => $subject, 'message' => $message, 'id' => $id]);

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
