<?php
// データベース接続情報を設定
$servername = "localhost";
$username = "root"; // データベースのユーザー名
$password = ""; // データベースのパスワード
$dbname = "toeic_app_db"; // 作成したデータベース名

// データベース接続の作成
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続チェック
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // 接続失敗時にエラーメッセージを表示
}
?>
