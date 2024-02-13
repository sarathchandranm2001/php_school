<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}
$uname=$_SESSION['username'];
include('db_conn.php');
$qry=$conn->query("select * from school where username='$uname'");
$row=$qry->fetch_assoc();

$id=$row['id'];
$qry1=$conn->query("select * from tbl_mark where id=$id");



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>My Profile</h1>
    <h3>Hello <?php echo $row['name'] ?></h3><br>
    <h2>MARKS</h2><br>

    <a href="logout.php">logout</a><br>
    <a href="edit.php">Edit Profile</a><br>
    
    <table border="3">
        <tr>
            <th>id</th>
            <th>java</th>
            <th>python</th>
        </tr>
  
  
    <?php
    while($row1=$qry1->fetch_assoc())
    {
        echo '<tr>
        <td>';echo $row1['id']; echo '</td>
        <td>';echo $row1['java']; echo '</td>
        <td>';echo $row1['python']; echo '</td>
         </tr>';
    
    }
    ?>
        </table> 
</body>
</html>