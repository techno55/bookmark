<?php
session_start();
include 'config.php'; // データベース接続設定をインクルード

if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: login.php"); // ログインしていない場合はログインページにリダイレクト
    exit();
}

$name = $_SESSION['name'];
$sql = "SELECT * FROM results WHERE name = '$name' AND (result1 LIKE '%不正解%' OR result2 LIKE '%不正解%' OR result3 LIKE '%不正解%' OR result4 LIKE '%不正解%' OR result5 LIKE '%不正解%' OR result6 LIKE '%不正解%' OR result7 LIKE '%不正解%' OR result8 LIKE '%不正解%' OR result9 LIKE '%不正解%' OR result10 LIKE '%不正解%')";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>間違えた問題の復習</title>
</head>
<body>
    <h1>間違えた問題の復習</h1>
    <?php
    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>文法問題1: " . htmlspecialchars($row['grammar1']) . " (" . htmlspecialchars($row['result1']) . ")</li>";
            echo "<li>文法問題2: " . htmlspecialchars($row['grammar2']) . " (" . htmlspecialchars($row['result2']) . ")</li>";
            echo "<li>文法問題3: " . htmlspecialchars($row['grammar3']) . " (" . htmlspecialchars($row['result3']) . ")</li>";
            echo "<li>文法問題4: " . htmlspecialchars($row['grammar4']) . " (" . htmlspecialchars($row['result4']) . ")</li>";
            echo "<li>文法問題5: " . htmlspecialchars($row['grammar5']) . " (" . htmlspecialchars($row['result5']) . ")</li>";
            echo "<li>文法問題6: " . htmlspecialchars($row['grammar6']) . " (" . htmlspecialchars($row['result6']) . ")</li>";
            echo "<li>文法問題7: " . htmlspecialchars($row['grammar7']) . " (" . htmlspecialchars($row['result7']) . ")</li>";
            echo "<li>文法問題8: " . htmlspecialchars($row['grammar8']) . " (" . htmlspecialchars($row['result8']) . ")</li>";
            echo "<li>文法問題9: " . htmlspecialchars($row['grammar9']) . " (" . htmlspecialchars($row['result9']) . ")</li>";
            echo "<li>文法問題10: " . htmlspecialchars($row['grammar10']) . " (" . htmlspecialchars($row['result10']) . ")</li>";
        }
        echo "</ul>";
    } else {
        echo "間違えた問題はありません。";
    }
    $conn->close();
    ?>
    <a href="home.php">ホームに戻る</a>
</body>
</html>
