<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) 
    {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $passwordx= ($_REQUEST['passwordx']);
        // $passwordx= mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM users WHERE username='$username' AND password='$passwordx'";
        $result = mysqli_query($con, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } 
      ?>  
       <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" autocomplete="off"/>
        <input type="password" class="login-input" name="passwordx" placeholder="Password" autocomplete="off"/>
        <input type="submit" value="Login" name="submit" class="login-button" autocomplete="off"/>
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
        </form>
</body>
</html>
