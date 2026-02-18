<?php
$dsn = 'mysql:host=sql207.infinityfree.com;dbname=if0_41185474_videos;charset=utf8';
$username = 'if0_41185474';
$password = 'Lf1knlji5fBcBd1';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->query('SELECT * FROM videos');
    $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($videos);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
