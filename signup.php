<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <link rel="shortcut icon" type="image/png" href="img/logo.png" sizes="16x16">
</head>
<body>
    <?php
        include 'query.php';

        if(isset($_POST['signup'])){
            if($_POST['password'] == $_POST['retype-password']){
                $date = date("m/d/Y");
                $result = insertUser($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $date);
                if($result == 1) echo "<script>alert('Signed up successfully!')</script>";
                else echo "<script>alert('Error occured!')</script>";
            }else
             echo "<script>alert('Passwords do not match!')</>";
        }
    ?>
    <section id="signup-section">
        <form id="signup-form" method="post" class="classic-border">
            <h2 id="signup-title">Sign Up</h2>
            <div id="signup-fullname">
                <input type="text" placeholder="Firstname" class="classic-border" name="firstname" required>
                <input type="text" placeholder="Lastname" class="classic-border" name="lastname" required>
            </div>
            <input type="email" id="signup-email" placeholder="Email" class="classic-border" name="email" required>
            <div id="signup-passwords">
                <input type="password" id="signup-password" placeholder="Password" class="classic-border" name="password" required>
                <input type="password" id="signup-retype-password" placeholder="Retype Password" class="classic-border" name="retype-password" required>
            </div>
           <div id="signup-show-passwords">
                <input type="checkbox" id="signup-show-password" onchange="passwordVisibility(this)">
                <label for="signup-show-password" style="margin-left: .5em;">Show password</label>
           </div>
           <div id="signup-buttons">
                <input type="button" value="Back" onclick="navigate('index.php')" class="modern-border button-design1">
                <input type="submit" value="Sign Up" class="modern-border button-design2" name="signup">
           </div>
        </form>
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