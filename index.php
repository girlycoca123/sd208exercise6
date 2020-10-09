<?php
session_start();
$bookmark = isset($_SESSION["book"])?$_SESSION["book"]:array();
 if (isset($_POST['addBookmark'])){
     array_push($bookmark,[$_POST['bookmark'],$_POST['url']]);
     $_SESSION['book']=$bookmark;
 }
 if(isset($_POST['clear'])){
    $_SESSION['book']=[];
 }
 if(isset($_POST['x'])){
     array_splice($_SESSION['book'],$_POST['id'],1);
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class= "body">
    <form action="index.php" method="POST" class ="form">
        <label for="bookmark">Bookmark : </label>
        <br>
        <input type="text" name="bookmark" id="bookmark"><br><br>
        <label for="url">URL : </label>
        <br>
        <input type="text" name="url" id="url"><br><br>
        <br>
     <ul>
         <li><button type="submit" class="btn" name="addBookmark">Add Bookmark</button></li>
         <li><button type="submit" class="clear" name ="clear">clear</button></li>
     </ul>
        <?php if (isset($_SESSION['book'])):?>
            <ul class="ul">
                <?php for ($id =0;$id< count($_SESSION['book']);$id++): ?>
                    <li>
                    <a target="blank" href="<?php echo $_SESSION['book'][$id][1]?>">
                    <?php echo $_SESSION['book'][$id][0]?></a>
                    <input type="submit" class="close" value="x" name="x">
                    <input type="hidden" name ="id" value="<?php echo $id;?>">
                </li>
                <?php endfor ?>
        </ul>
        <?php endif ?>
    </form>
</body>
</html>
