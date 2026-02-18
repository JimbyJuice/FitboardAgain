<?php
$dsn = 'mysql:host=sql207.infinityfree.com;dbname=if0_41185474_videos;charset=utf8';
$username = 'if0_41185474';
$password = 'Lf1knlji5fBcBd1';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];

    $stmt = $db->prepare('DELETE FROM videos WHERE id = ?');
    $stmt->execute([$id]);

    echo 'Video deleted successfully';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
