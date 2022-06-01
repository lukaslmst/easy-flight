<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="form-style.css" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bod">
    <?php

    $logged_in = false;

    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {

        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";

        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {

            $_SESSION['username'] = $username;

            $user = "login"; 
            setcookie($user, $username, time() + (86400 * 30), "/");

            $logged_in = true;
            header("Location: ../index.php?username=$username");
            
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <div class="navbar">

            <div class="logo">
            </div>

            <div class="right-items-nav" style="text-decoration: none; color:white">
                <a href="../index.php" style="text-decoration: none; color:white">
                    <p>Home</p>
                </a>
                <a href="../about.php" style="text-decoration: none; color:white">
                    <p>About</p>
                </a>
                <a href="../contact.php" style="text-decoration: none; color:white">
                    <p>Contact</p>
                </a>

                <button><a href="login.php" style="text-decoration: none; color:white" id="btn">Sign in</a></button>

            </div>

        </div>
        <form class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" />
            <input type="password" class="login-input" name="password" placeholder="Password" />
            <input type="submit" value="Login" name="submit" class="login-button" />
            <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
        </form>
    <?php
    }
    ?>
</body>

</html>