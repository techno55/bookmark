<?php
session_start();
include 'config.php'; // データベース接続設定をインクルード

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // パスワードをハッシュ化

    // ユーザーが既に存在するかどうかをチェック
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "このメールアドレスは既に登録されています。<br>";
        echo "<a href='register.php'>戻る</a>";
    } else {
        // 新規ユーザーを登録
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            echo "登録が完了しました。<br>";
            echo "<a href='login.php'>ログイン</a>";
        } else {
            echo "登録に失敗しました。<br>";
            echo "<a href='register.php'>戻る</a>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
