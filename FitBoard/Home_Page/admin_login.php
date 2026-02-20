<?php
session_start();

$dsn = 'mysql:host=sql207.infinityfree.com;dbname=if0_41185474_admin;charset=utf8';
$dbUser = 'if0_41185474';
$dbPassword = 'Lf1knlji5fBcBd1';

try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare('SELECT * FROM admin_users WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_email'] = $user['email'];
            header("Location: ../AdminDashboard/adminDashboard.html");
            exit();
        } else {
            echo '<div class="error-message">Unable to log you in. Unknown email or bad password.</div>';
        }
    }
} catch (PDOException $e) {
    echo '<div class="error-message">Database error: ' . $e->getMessage() . '</div>';
}
?>