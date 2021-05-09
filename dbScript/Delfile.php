<html>
<head>
    <title>Название</title>
    <meta charset="utf-8">
    <link href="../css/mystyle.css" rel="stylesheet">
</head>
<body background="../bg.jpg">
<form action="Delfile.php" method="post">
    <div class="neomorphism-auth">
        <div for="title">Вы точно хотите удалить статью? </div>
        <div><input type="submit" value="Нет" name="No"></div>
        <div><input type="submit" value="Да" name="Del"></div>
        <input type="text" name="pgnum" style="display: none" value="<?php echo $_GET['page'];?>">

    </div>

</form>
</body>
</html>
<?php
include ('db.php');


if(isset($_POST['Del'])){
    $page = $_POST['pgnum'];
    delArticle($page);}
if(isset($_POST['No'])){
    $page = $_POST['pgnum'];
    header("Location: ../main.php?page=".$page);
}
?>