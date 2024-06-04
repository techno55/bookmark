<?php
// セッションを開始する
session_start();

// ユーザーがログインしているかどうかを確認する
if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
    // ログインしている場合はホームページにリダイレクト
    header("Location: home.php");
} else {
    // ログインしていない場合はログインページにリダイレクト
    header("Location: login.php");
}
exit();
?>
