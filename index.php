<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Noctyx/server/style/signup.css">
    <link href="server/style/overlay.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<body>
    <div class="container">
        <div class="left">
            <div class="lefttop">
                <div class="arrow-con">
                    <div class="arrow left-arrow" ><a href="./client/pages/login.php"><i class="fas fa-arrow-left"></i>
                    </a></div>
                </div>
            </div>
            <div class="leftbot">
                <img src="./client/assets/logo.png" alt="">
            </div>
        </div>  
        <div class="right">
            <div class="inner-right">
                <p>Sign Up</p>
                <form action="./server/php/signup.php" method="post">
                    <div class="form-group">
                        <div class="form-groupright">
                            <label for="fname">Firstname:</label>
                            <input type="text" id="fname" name="firstname" placeholder="Enter your first name" required>
                        </div>
                        <div class="form-groupright">
                            <label for="lname">Lastname:</label>
                            <input type="text" id="lname" name="lastname" placeholder="Enter your last name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-groupcenter">
                            <label for="uname">Username:</label>
                            <input type="text" id="uname" name="username" placeholder="Enter your username" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-groupright">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-groupright">
                            <label for="pass">Password:</label>
                            <input type="password" id="pass" name="password" placeholder="Enter your password" required>
                        </div>
                    </div>
                    
                    <div class="form-group2">
                        <button type="submit">Sign up</button>
                    </div>
                </form>
            </div>

        </div>  
    </div>    
    <div id="overlay" class="overlay">
    <div class="popup">
        <div class="popup-bg"></div>
            <p id="errorMessage">Sign-up was successful! You can now log in.</p>
        </div>
    </div>
    

    <script>
        // Function to show overlay
        function showOverlay(message) {
            const overlay = document.getElementById('overlay');
            const errorMessage = document.getElementById('errorMessage');

            errorMessage.textContent = message;
            overlay.classList.add('show'); // Show overlay

            // Hide the overlay after 3 seconds
            setTimeout(() => {
                overlay.classList.remove('show');
            }, 3000);
        }

        // Check if there's an error or success parameter in the URL
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');
        const success = urlParams.get('sign_up_success');

        if (error) {
            showOverlay(decodeURIComponent(error));
        }

        if (success) {
            showOverlay("Sign-up successful! Please log in.");
        }
    </script>
</body>
</html>
