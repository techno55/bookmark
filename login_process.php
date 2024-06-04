<?php
session_start(); // セッションの開始
include 'config.php'; // データベース接続設定をインクルード

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name']; // POSTリクエストから名前を取得
    $email = $_POST['email']; // POSTリクエストからメールアドレスを取得

    // ユーザー情報をデータベースから取得するためのSQLクエリ
    $sql = "SELECT * FROM users WHERE name = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email); // クエリにパラメータをバインド
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['name'] = $name; // セッションに名前を保存
        $_SESSION['email'] = $email; // セッションにメールアドレスを保存
        header("Location: home.php"); // ログイン成功時にホームページにリダイレクト
        exit();
    } else {
        echo "ログイン情報が正しくありません。<br>"; // ログイン失敗時のメッセージ
        echo "<a href='login.php'>戻る</a>"; // ログインページへのリンク
    }

    $stmt->close(); // ステートメントを閉じる
    $conn->close(); // データベース接続を閉じる
}
?>
