<?php
$mysql = new mysqli ("localhost", "root", "", "task_php");
$mysql->query("SET NAMES 'utf8'");

if(isset($_POST["name"])){
  
    $name = $_POST["name"];
}
if(isset($_POST["bio"])){
  
    $bio = $_POST["bio"];
}
if(isset($_POST["add"]))
{
 $mysql->query("INSERT INTO `user` (`name`, `bio`) VALUES ('$name', '$bio')");
  
}
?>
<!DOCTYPE html>
<html>
<head>
<title>HASAN.COM</title>
<meta charset="utf-8" />
</head>
<body>
<h3>Добавление пользователя</h3>
<form method="POST">
    <p>Имя:<br> <input type="text" name="name" /></p>
    <p>Биография:<br> <textarea name="bio" cols="20" rows="7"></textarea></p>
    <input type="submit" name="add" value="Добавить"><br>
    <hr/>
    <?php
    $result = $mysql->query("SELECT * FROM `user`");
       function printResult($result){
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo "Id".$row['id'].'</br><input type="button" name="delete" value="Удалить" method="get">';
                if(isset($_GET['delete'])){
                    $mysql->query("DELETE FROM `user` WHERE $row [`id`]");
                }
                echo "Name".$row['name'] . ".   .";
                echo "Bio:".$row['bio'];
        
            }
        }
    }
    printResult($result);
    
    ?>
</form>
</body>
</html>