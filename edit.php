<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}
$uname = $_SESSION['username'];
include('db_conn.php');
$qry = $conn->query("select * from school where username='$uname'");
$row = $qry->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" value="">
        <input type="text" name="name" placeholder="Name" >
        <input type="text" name="username" placeholder="Username" >
     <input type="password" name="password" placeholder="Password" >
        <input type="submit" name="Update">
    </form>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $usname = $_POST['username'];
        $password = $_POST['password'];
        $upd = $conn->query("UPDATE school SET name='$name', username='$usname', password='$password' where username='$uname'");
    }
    ?>
</body>
</html>
