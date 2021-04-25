<?php
    include("dbconfig.php");

    function db_edit($editor, $page)//функция изменения статьи
    {
        global $db_name,$db_adress,$db_password,$db_login;
        echo "<script>alert();</script>";
        $mysqli = new mysqli($db_adress, $db_login, $db_password, $db_name);
        $query  = "Update content set text='".$editor."'where id =".$page.";";
        $mysqli->query($query);
        $mysqli->close();
        //header("Location: main.php");
    }
    function db_readText($page)//функция получения содержания статьи
    {
        global $db_name,$db_adress,$db_password,$db_login;
        $mysqli = new mysqli($db_adress, $db_login, $db_password, $db_name);
        $query  = "Select * from content where id =".$page.";";
        $res=$mysqli->query($query);
        while ($data = $res->fetch_assoc()) {
            echo $data['text'];
        }
        $mysqli->close();


    }
    function db_readHeader($page)//функция получения заголовка статьи
    {
        global $db_name,$db_adress,$db_password,$db_login;
        $mysqli = new mysqli($db_adress, $db_login, $db_password, $db_name);
        $query  = "Select * from content where id =".$page.";";
        $res=$mysqli->query($query);
        while ($data = $res->fetch_assoc()) {
            echo '<div class="hedlow">'.$data['title'].'</div>';
        }
        $mysqli->close();
    }
    function createMenu()//функция получения меню сайта
    {
        global $db_name,$db_adress,$db_password,$db_login;
        $mysqli = new mysqli($db_adress, $db_login, $db_password, $db_name);
        $query  = "Select * from content;";
        $res=$mysqli->query($query);
        $data = $res->fetch_assoc();
        //echo '';
        while ($data = $res->fetch_assoc()) {

            echo '<div class="neomorphism-article"><a href="?page='.$data["id"].'">'.$data["title"].'</a></div>';
        }
        //echo '';
        $mysqli->close();
    }
    function delArticle($page)//функция удаления статьи
    {
        global $db_name,$db_adress,$db_password,$db_login;
        echo "<script>alert();</script>";
        $mysqli = new mysqli($db_adress, $db_login, $db_password, $db_name);
        $query  = "Delete from content where id=".$page.";";
        $mysqli->query($query);
        $mysqli->close();
        header("location: ../main.php");
    }
    function createArticle($title)//функция добавления статьи
    {
        global $db_name,$db_adress,$db_password,$db_login;
        $mysqli = new mysqli($db_adress, $db_login, $db_password, $db_name);
        $query  = "INSERT INTO content (id, title, text) VALUES (NULL, '".$title."', '');";
        $mysqli->query($query);
        $query  = "select * from content where title='".$title."';";
        $res=$mysqli->query($query);
        $data = $res->fetch_assoc();
        $mysqli->close();
        header("Location: ../main.php?page=".$data['id']);
    }
?>