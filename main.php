<html>
<head>
<meta charset="ISO-8859-1">
    <?php
    require __DIR__ . '/authcore/auth.php';
    $login = getUserLogin();
    if ($login === null){
        header('Location: authcore/login.php');
    }
    ?>
    <script src="ckeditor4/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <script type="text/javascript" src="jsScript/openEditor.js"></script>
    <link href="css/mystyle.css" rel="stylesheet">

    <?php
    //$login='admin';
    if (!isset($_GET['page']))
    {

    $_GET['page']=1;
    }
    include("dbScript/db.php");
    ?>

</head>
<body background="bg.jpg">
<table>
    <tr >
        <td colspan="2" height="150px">
            <a href="main.php"><img src="CSS3_logo.png" height="100%" align="left"></a>
            <img src="html5.png" height="100%" align="left">
            <div class = "hed" >Информационный портал<br> "Немного о разметке"</div>
            <div class = "neomorphism-exit"><a href="authcore/logout.php">Выйти</a></div>
            <?php
            if(strcmp($login, 'admin') == 0 ){
            echo'<div class = "neomorphism-add"><a href="dbScript/DelAdd.php?page='.$_GET['page'].'">Добавить статью</a></div>
            <div class = "neomorphism-del"><a href="dbScript/Delfile.php?page='.$_GET['page'].'">Удалить статью</a></div>';
            }
            ?>

        </td>
    </tr>
    <tr>
        <td width="20%" height="600px" valign="top">

            <?php
            createMenu();
            ?>
            <!--<input type="radio" name="pgnum" value="2" class="input4"> <font class="fothtext">25 </font>-->
        </td>
        <td width="80%" height="600px" valign="top">
            <?php db_readHeader($_GET['page']);?>
            <!--ссылка, при нажатии вызывающая js функцию-->
            <?php
            if(strcmp($login, 'admin') == 0 ) {
                echo'<div class = "neomorphism-edit" ><a id = "div1" href = "#" onclick = "generate()" > [править]</a ></div >';
            }
            ?>
            <hr>
            <!--форма, отправляющая запросы на сервер-->
            <form action="main.php" method="POST" id="Form">
                <!--скрытый элемент формы, передающий серверу номер текущей
                статьи-->
                <input type="text" name="page" style="display: none" value="<?php echo $_GET['page'];?>">
            </form>
            <!--скрипт, проверяющий нажатие на кнопки и обновляющий
            страницу-->
            <?php
            if (isset($_POST['sub'])) db_edit($_POST['editor'], $_POST['page']);
            //if (isset($_POST['del'])) header("Location: /?page=".$_POST['page']);?>

            <div id="div2" ><?php db_readText($_GET['page']);?></div>





            <!--блок, в который выводится статья из базы данных-->


        </td>
    </tr>
</table>



<?php


?>

</body>
</html>
