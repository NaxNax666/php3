<?php
include __DIR__."/../authcore/auth.php";
if (isset($_POST['signin'])) {


    $login = isset($_POST['login']) ?$_POST['login']: '';
    $password = isset($_POST['password']) ?$_POST['login']: '';

    if (checkAuth($login, $password)) {
        setcookie('login', $login, 0, '/');
        setcookie('password', $password, 0, '/');
        header('Location: ../main.php');
    } else {
        $error = 'Ошибка авторизации';
    }
}
if (isset($_POST['add'])) {

    $login = isset($_POST['login']) ?$_POST['login']: '';
    $password = isset($_POST['password']) ?$_POST['login']: '';
    signup($login,$password);
    if (checkAuth($login, $password)) {
        setcookie('login', $login, 0, '/');
        setcookie('password', $password, 0, '/');
        header('Location: ../main.php');
    }
    //header('Location: ../authcore/login.php');
}
if (isset($_COOKIE['login'])) {

    $login = $_COOKIE['login'];
} else {
    // присваиваем $login значение '' если $_COOKIE['login'] равен NULL
    $login = '';
}
if (isset($_COOKIE['password'])) {
    $password = $_COOKIE['password'];
} else {
    // присваиваем $password значение '' если $_COOKIE['password'] равен NULL
    $password = '';
}
if (checkAuth($login, $password)) {
    header('Location: ../main.php');
}
?>
<html>
<head>
    <title>Форма авторизации</title>
    <meta charset="utf-8">
    <link href="../css/mystyle.css" rel="stylesheet">
</head>
<body background="../bg.jpg">
    <form action="login.php" method="post">
        <div class="neomorphism-auth">
            <div>Имя пользователя:</div>
            <div><input type="text" name="login" id="login"></div>
            <div> Пароль:</div>
            <div><input type="password" name="password" id="password"></div>
            <div><input type="submit" value="Войти" name="signin"></div>
            <div><input type = "submit" value = "Зарегистрироваться" name = "add"></div>
            <?php if (isset($error)): ?>
                <span style="color: #ff0000;">
                    <?= $error ?>
                </span>
            <?php endif; ?>
        </div>
    </form>
</body>
</html>
