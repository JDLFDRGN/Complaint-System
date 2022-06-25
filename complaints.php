<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Complaints</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <link rel="shortcut icon" type="image/png" href="img/logo.png" sizes="16x16">
</head>
<body>  
    <?php
        include 'query.php';
        session_start();
        if(isset($_POST['submit-add-complaint'])){
            $result = insertComplaint($_POST['detail'], $_POST['suggestion'], $_POST['number'], $_SESSION['ID']);
            if($result) echo "<script>alert('Complaint sent')</script>";
            else echo "<script>alert('Complaint not sent')</script>";
        }
    ?>
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
    <section id="add-complaint-section">
        <div id="complaint-let-us-know">
            <h1>complaints? let us know</h1>
        </div>
        <form id="complaint-add-form" method="post" class="classic-border">
            <div id="complainant-name">
                <label for=""><b>Name</b></label>
                <?php
                    $user = getSelectedRow($_SESSION['ID']);
                    $transform = $user->fetch_assoc();
                    $fullname = $transform['firstname'] . " " . $transform['lastname'];
                    echo "<input type='text' class='classic-border' value='$fullname' readonly>";
                ?>
            </div>
            <div id="complainant-email">
                <label for=""><b>Email</b></label>
                <?php
                    $user = getSelectedRow($_SESSION['ID']);
                    $transform = $user->fetch_assoc();
                    $email = $transform['email'];
                    echo "<input type='email' class='classic-border' value='$email' readonly>";
                ?>
            </div>
            <div id="complainant-complaint-details">
                <label for=""><b>What has happened?(complaint details)</b></label>
                <textarea cols="30" rows="5" class="classic-border" name="detail"></textarea>
            </div>
            <div id="complainant-suggestion">
                <label for=""><b>Suggestions on how can we make things right</b></label>
                <textarea cols="30" rows="5" class="classic-border" name="suggestion"></textarea>
            </div>
            <div id="complainant-mobile-number">
                <label for=""><b>Mobile number</b></label>
                <input type="tel" class="classic-border" name="number">
            </div>
            <input type="submit" value="SEND" class="modern-border button-design2" id="submit-add-complaint" name="submit-add-complaint">
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