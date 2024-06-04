<!DOCTYPE html>
<html>
<head>
    <title>新規登録</title>
</head>
<body>
    <h1>新規登録</h1>
    <form action="register_process.php" method="post">
        名前: <input type="text" name="name" required><br>
        メールアドレス: <input type="email" name="email" required><br>
        パスワード: <input type="password" name="password" required><br>
        <input type="submit" value="登録">
    </form>
    <p>既に登録済みの方は<a href="login.php">ログイン</a></p>
</body>
</html>
