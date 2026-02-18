<?php
$dsn = 'mysql:host=sql207.infinityfree.com;dbname=if0_41185474_videos;charset=utf8';
$username = 'if0_41185474';
$password = 'Lf1knlji5fBcBd1';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $title = $_POST['title'];
    $description = $_POST['description'];
    $youtubeLink = $_POST['youtube_link'];

    $stmt = $pdo->prepare('INSERT INTO videos (title, description, link) VALUES (?, ?, ?)');
    $stmt->execute([$title, $description, $youtubeLink]);

    echo "Video data saved successfully.";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
