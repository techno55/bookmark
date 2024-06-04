<?php
session_start(); // セッションの開始
session_unset(); // セッション変数をすべて解除
session_destroy(); // セッションを破壊
header("Location: login.php"); // ログインページにリダイレクト
exit();
?>
