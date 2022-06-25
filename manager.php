<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <link rel="shortcut icon" type="image/png" href="img/logo.png" sizes="16x16">
</head>
<body>
    <nav class="login-header">
        <h2 class="login-header-title">Chatime Online Complaint</h2>
    </nav>  
    <section class="login-section">
        <form method="post" id="login-form-manager" class="login-form" action="validate.php">
            <div class="login-for">
                <h1 class="modern-border">MANAGER</h1>
            </div>
            <div class="login-inputs">
                <input type="email" placeholder="Email" name="email" class="classic-border input-highlight">
                <input type="password" placeholder="Password" name="password" class="classic-border input-highlight">
            </div>      
            <div class="login-buttons">
                <input type="submit" value="log in" class="modern-border button-design2" name="login-manager">
            </div>      
        </form>
        <div class="login-navigate">
            <input type="button" value="admin" class="modern-border button-design2" onclick="navigate('admin.php')">
            <input type="button" value="user" class="modern-border button-design2" onclick="navigate('index.php')">
        </div>
    </section>
    <footer class="footer1">
        <div class="copyright">
            &copy2020Chatime Online Complaint
        </div>
        <div class="follow-us">
            <p>FOLLOW US</p>
            <div class="follow-us-image">
                <img src="img/icon/facebook.svg">
                <img src="img/icon/instagram.svg">
                <img src="img/icon/twitter.svg">
            </div>
        </div>
        <div class="privacy-policy">
            PRIVACY POLICY
        </div>
    </footer>
</body>
</html>