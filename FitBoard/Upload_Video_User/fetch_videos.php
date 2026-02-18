<?php
$dsn = 'mysql:host=sql207.infinityfree.com;dbname=if0_41185474_videos;charset=utf8';
$username = 'if0_41185474';
$password = 'Lf1knlji5fBcBd1';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query('SELECT id, title, description, youtube_link FROM videos');
    $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($videos);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
