<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <style>
        *{
            background-color:#a3b1c0;
        }
      ul{
        list-style-type: none;
      }
      #back{
        margin-left:-60px;
      }
      p a {
        float:right;
        text-decoration:none;
        padding:12px;
        background-color:#55a1ff;
        border-radious:10px;
        color:white;
       
      }
      a:hover{
        background-color:black;
      }
      li{ 
        float: left;
        padding:12px;
        color:white;
        font-size:23px;
      } 
    </style>
    <?php

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'Loginsystem');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

$conn->close();
?>
  <ul>
        <li><img src="<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture" style="width: 150px;height:100px;border-radius:50%">
            <form method="POST" action="upload.php" enctype="multipart/form-data">
            Change Profile Picture<br>
            <input type="file" name="profile_picture" id="back">
            <input type="submit" value="Upload">
             </form>
        </li>
       <li>Hey, <?php echo htmlspecialchars($_SESSION['username']); ?>!</li>
       <li>You are in user dashboard page.</li>
      
       <p><a href="logout.php" class="right">Logout</a></p>
    </ul>
    <br><br>
    
</body>
</html>

   