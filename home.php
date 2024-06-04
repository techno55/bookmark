<?php
session_start(); // セッションの開始
if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: login.php"); // ログインしていない場合はログインページにリダイレクト
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ホーム</title>
</head>
<body>
    <h1>ホーム</h1>
    <!-- ユーザーの名前を表示 -->
    <p>ようこそ、<?php echo htmlspecialchars($_SESSION['name']); ?> さん</p>
    <ul>
        <li><a href="post.php">テストに挑戦する</a></li> <!-- テストページへのリンク -->
        <li><a href="review.php">間違えた問題を復習する</a></li> <!-- 間違えた問題の復習ページへのリンク -->
        <li><a href="results.php">過去のテスト結果を見る</a></li> <!-- 過去のテスト結果ページへのリンク -->
    </ul>
    <a href="logout.php">ログアウト</a> <!-- ログアウトページへのリンク -->
</body>
</html>
