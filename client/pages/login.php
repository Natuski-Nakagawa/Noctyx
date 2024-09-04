<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../server/style/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
    <link href="../../server/style/overlay.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="left">
            <div class="inner-left">
                <div class="inner-left-top">
                    <p>Welcome!</p>
                </div>
                <div class="inner-left-mid">
                    <form action="../../server/php/tologin.php" method="post">
                        <div class="form-group">
                            <label for="uname">Username:</label>
                            <input type="text" id="uname" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password:</label>
                            <input type="password" id="pass" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="form-group2">
                            <div class="fg2-left">
                                <input type="checkbox" name="Remember me">
                                <label for="remember">Remember me</label>
                            </div>
                            <div class="fg2-right">
                                <a href="#" >Forgot password</a>
                            </div>
                        </div>
                        <div class="form-group3">
                            <div class="rightbut">
                                <button type="submit">Log in</button>
                            </div>
                            <div class="leftbut">
                            <button type="button" onclick="window.location.href='http://192.168.0.209:8888/';">Sign up</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="right">
            <img src="../assets/logo.png" alt="">
        </div>
    </div>

    <div id="overlay" class="overlay">
    <div class="popup">
            <p id="errorMessage">Sign-up was successful! You can now log in.</p>
        </div>
    </div>

    <div id="overlay" class="overlay">
    <div class="popup">
        <p id="errorMessage">Error message here</p>
    </div>
    </div>

    <script src="../../server/script/notif.js">

    </script>  `
</body>
</html>