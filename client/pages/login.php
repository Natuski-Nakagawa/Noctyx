<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../server/style/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
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
                            <div>
                                <input type="checkbox" name="Remember me">
                                <label2 for="remember">Remember me</label2>
                            </div>
                            <div>
                                <a href="#" >Forgot password</a>
                            </div>
                        </div>
                        <div class="form-group3">
                            <div class="rightbut">
                                <button type="submit">Log in</button>
                            </div>
                            <div class="leftbut">
                                <a href="/noctyx/index.php" class="leftbut-button">Sign up</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="inner-left-bot">
                    <img src="../assets/socials.png" alt="">
                </div> 
            </div>
        </div>
        <div class="right">
            <img src="../assets/logo.png" alt="">
        </div>
    </div>
</body>
</html>