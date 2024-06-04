<!DOCTYPE html>
<html>
<head>
    <title>TOEIC 文法問題模擬試験</title>
</head>
<body>
    <h1>TOEIC 文法問題模擬試験</h1>
    <?php
    session_start();
    
    // 問題セットを定義
    $questions = [
        ["question" => "He _______ (be) a teacher.", "choices" => ["is", "are", "am"], "answer" => "is"],
        ["question" => "They _______ (go) to the market.", "choices" => ["go", "goes", "going"], "answer" => "go"],
        ["question" => "She _______ (have) a car.", "choices" => ["have", "has", "having"], "answer" => "has"],
        ["question" => "We _______ (be) friends.", "choices" => ["is", "are", "am"], "answer" => "are"],
        ["question" => "I _______ (go) home.", "choices" => ["go", "goes", "going"], "answer" => "go"],
        ["question" => "You _______ (have) a book.", "choices" => ["have", "has", "having"], "answer" => "have"],
        ["question" => "He _______ (do) his homework.", "choices" => ["do", "does", "doing"], "answer" => "does"],
        ["question" => "They _______ (play) soccer.", "choices" => ["play", "plays", "playing"], "answer" => "play"],
        ["question" => "She _______ (eat) dinner.", "choices" => ["eat", "eats", "eating"], "answer" => "eats"],
        ["question" => "I _______ (read) a book.", "choices" => ["read", "reads", "reading"], "answer" => "read"]
    ];

    // 問題をランダムにシャッフル
    shuffle($questions);

    // フォームに問題を表示
    echo '<form action="write.php" method="post">';
    echo '名前: <input type="text" name="name" value="' . htmlspecialchars($_SESSION['name']) . '" readonly><br>';
    
    foreach ($questions as $index => $question) {
        echo ($index + 1) . '. ' . $question['question'] . '<br>'; // 問題文を表示
        foreach ($question['choices'] as $choice) {
            echo '<input type="radio" name="grammar' . $index . '" value="' . $choice . '"> ' . $choice . '<br>'; // 選択肢を表示
        }
        echo '<input type="hidden" name="answer' . $index . '" value="' . $question['answer'] . '">'; // 正解を隠しフィールドに設定
    }

    echo '<input type="submit">'; // 送信ボタン
    echo '</form>';
    ?>
</body>
</html>
