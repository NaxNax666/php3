<?php
include ("db.php");
switch ($_GET['mode']) {
    case 0:
        ?>
        <html>
        <head>
            <title>Название</title>
            <meta charset="utf-8">
            <link href="../css/mystyle.css" rel="stylesheet">
        </head>
        <body background="../bg.jpg">
        <form action="DelAdd.php" method="post">
            <div class="neomorphism-auth">
                <div for="title">Название статьи </div>
                <div><input type="text" name="title" id="title"></div>
                <div><input type="submit" value="Создать" name="create"></div>
            </div>

        </form>
        </body>
        </html>


        <?php if(isset($_POST['create'])){
            createArticle($_POST['title']);
    }
        break;
    case 1:
        delArticle($_GET['page']);
        break;
}

?>
