<?php
include $_SERVER['DOCUMENT_ROOT']."/kursach/dbScript/dbconfig.php";
function checkAuth($login, $password)
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
function getUserLogin()
{
    $loginFromCookie = isset($_COOKIE['login']) ? $_COOKIE['login']: '';
    $passwordFromCookie = isset($_COOKIE['password']) ? $_COOKIE['password']: '';

    if (checkAuth($loginFromCookie, $passwordFromCookie)) {
        return $loginFromCookie;
    }

    return null;
}

function signup($login,$password){
    global $db_name,$db_adress,$db_password,$db_login;
    $mysqli = new mysqli($db_adress, $db_login, $db_password, $db_name);
    $password = password_hash($password,PASSWORD_DEFAULT);
    $query  = "INSERT INTO users (username,parol) VALUES ('".$login."','".$password."');";
    $mysqli->query($query);
    $mysqli->close();

}



