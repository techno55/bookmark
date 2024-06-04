<!DOCTYPE html>
<html>
<head>
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="login_process.php" method="post">
        名前: <input type="text" name="name" required><br>
        メールアドレス: <input type="email" name="email" required><br>
        <input type="submit" value="ログイン">
    </form>
    <p>初めての方は<a href="register.php">新規登録</a></p>
</body>
</html>
