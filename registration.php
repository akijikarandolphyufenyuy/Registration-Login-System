<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <script>
        function validate()
        {
            var dat=document.getElementById('pas').value;
                var bet=document.getElementById('cpas').value;
                if(dat!=bet)
                {
                    document.getElementById('vert').innerHTML="Please Verify Password";
                    return false;
                }
                return true;
          }
         
    </script>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $passwordx = stripslashes($_REQUEST['passwordx']);
        $passwordx= mysqli_real_escape_string($con, $passwordx);
        
        $query    = "INSERT INTO users (username,email, password) VALUES ('$username','$email','$passwordx')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post" onsubmit="return validate()">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autocomplete="off" require />
        <input type="text" class="login-input" name="email" placeholder="Email Adress" autocomplete="off">
        <input type="password" class="login-input" id="pas" name="passwordx" placeholder="Password" autocomplete="off">
        <input type="password" class="login-input" id="cpas" name="Confirm Password" placeholder="Confirm Password" autocomplete="off">
        <p id="vert" style="font-family:sans-serif;text-align:center"></p>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </form>
<?php
    }
?>
</body>
</html>
