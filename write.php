<?php
session_start();
include 'config.php'; // データベース接続設定をインクルード

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name']; // POSTリクエストから名前を取得

    // 正誤判定とスコア計算
    $score = 0;
    $grammar_results = [];
    $result_results = [];
    for ($i = 0; $i < 10; $i++) {
        if (isset($_POST['grammar' . $i])) {
            $user_answer = $_POST['grammar' . $i];
            $correct_answer = $_POST['answer' . $i];
            $result = $user_answer == $correct_answer ? '正解' : '不正解'; // 正誤判定
            if ($result == '正解') {
                $score++; // 正解ならスコアをインクリメント
            }
            $grammar_results[] = $user_answer;
            $result_results[] = $result;
        } else {
            $grammar_results[] = "未回答";
            $result_results[] = "不正解"; // 回答がない場合の処理
        }
    }

    // 試験回数をカウント
    $sql = "SELECT COUNT(*) as count FROM results WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $attempt_count = $row['count'] + 1;

    // デバッグ情報の表示
    echo "<pre>";
    print_r($grammar_results);
    print_r($result_results);
    echo "</pre>";

    // データを保存
    $stmt = $conn->prepare("INSERT INTO results (name, grammar1, result1, grammar2, result2, grammar3, result3, grammar4, result4, grammar5, result5, grammar6, result6, grammar7, result7, grammar8, result8, grammar9, result9, grammar10, result10, score, attempt_count) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssssssssii", $name, 
                      $grammar_results[0], $result_results[0], 
                      $grammar_results[1], $result_results[1], 
                      $grammar_results[2], $result_results[2], 
                      $grammar_results[3], $result_results[3], 
                      $grammar_results[4], $result_results[4], 
                      $grammar_results[5], $result_results[5], 
                      $grammar_results[6], $result_results[6], 
                      $grammar_results[7], $result_results[7], 
                      $grammar_results[8], $result_results[8], 
                      $grammar_results[9], $result_results[9], 
                      $score, $attempt_count);

    if (!$stmt->execute()) {
        echo "エラー: " . $stmt->error; // エラーメッセージの表示
    }

    $stmt->close();
    $conn->close();

    $_SESSION['attempt_count'] = $attempt_count; // セッションに試験回数を保存

    // 結果ページにリダイレクト
    header("Location: read.php");
    exit();
}
?>
