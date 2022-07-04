<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <link rel="shortcut icon" type="image/png" href="img/logo.png" sizes="16x16">
</head>
<body>
    <nav class="user-home-header">
        <div class="user-left-navigation">
            <span><a href="userHome.php">home</a></span>
            <span><a href="complaints.php">add complaints</a></span>
            <span><a href="apply.php">apply</a></span>
        </div>
        <div class="user-right-navigation">
            <input type="button" value="log out" class="button-design2" onclick="navigate('index.php')">
        </div>
    </nav>
    <section id="how-to-use-section">
        <h1>how to complain?</h1>
        <div id="user-steps">
            <div id="user-first-step" class="classic-border">
                <img src="img/example1.jpg" alt="no image" class="classic-border">
                <p>First, look for the top navigation bar and click the add complaints. You will be redirected to the complaint page where you will see the complaint form with your full name and email.</p>
            </div>
            <div id="user-second-step" class="classic-border">
                <img src="img/example2.jpg" alt="no image" class="classic-border">
                <p>Input all the three parameters needed in order to submit your complaint. You can do unlimited complaints but once you get promoted to the managerial position, all of your complaints will be deleted.</p>
            </div>
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