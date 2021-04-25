<?php
include $_SERVER['DOCUMENT_ROOT']."/dbScript/dbconfig.php";
function checkAuth($login, $password)//функция проверки авторизации
{
    if(abs(strcmp($login,''))==0||abs(strcmp($password,''))==0){
        return false;
    }
    global $db_name,$db_adress,$db_password,$db_login;

    $mysqli = new mysqli($db_adress, $db_login, $db_password, $db_name);
    $query  = "select * from users where username='".$login."';";
    $res=$mysqli->query($query);
    $data = $res->fetch_assoc();
    $mysqli->close();
    if(password_verify($password, $data['parol'])){
        return true;
    }
    return false;
}
function signup($login,$password)//функция регистрации
{
    if(abs(strcmp($login,''))==0||abs(strcmp($password,''))==0){
        echo 'Ошибка';
    }
    else {
        global $db_name, $db_adress, $db_password, $db_login;
        $mysqli = new mysqli($db_adress, $db_login, $db_password, $db_name);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username,parol) VALUES ('" . $login . "','" . $password . "');";
        $mysqli->query($query);
        $mysqli->close();
    }

}
function getUserLogin()
{
    $loginFromCookie = isset($_COOKIE['login']) ? $_COOKIE['login']: '';
    $passwordFromCookie = isset($_COOKIE['password']) ? $_COOKIE['password']: '';

    if (checkAuth($loginFromCookie, $passwordFromCookie)) {
        return $loginFromCookie;
    }

    return null;
}


