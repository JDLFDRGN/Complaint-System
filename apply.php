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
    <?php
        include 'query.php';
        session_start();

        $application = getAllData('applicant');
        for($i=0;$i<$application->num_rows;$i++){
            $transform = $application->fetch_assoc();
            if($transform['userID'] == $_SESSION['ID']){
                echo "<script>alert('Application is already pending'); history.back();</script>";
                break;
            }
        }

        if(isset($_POST['apply-submit']) && $_POST['apply-radio'] == 'yes'){
            $result = insertApplicant($_SESSION['ID']);
            if($result) echo "<script>alert('Submitted successully!'); window.location='userHome.php'</script>";
            else echo "<script>alert('Not submitted successfully!')</script>";
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
    <section id="apply-section">
        <form id="apply-form" method="post" class="classic-border">
            <?php
                $user = getSelectedRow($_SESSION['ID']);
                $transform = $user->fetch_assoc();
                $fullname = $transform['firstname'] . " " . $transform['lastname'];
                echo "<h1 id='apply-question'>Hello $fullname, are you sure you want to apply for managerial position?</h1>";
            ?>
            <div id="apply-radio-answers">
                <div id="apply-radio-yes">
                    <input type="radio" name="apply-radio" id="radio-yes" value="yes" checked>
                    <label for="radio-yes">YES</label>
                </div>
                <div id="apply-radio-no">
                    <input type="radio" name="apply-radio" id="radio-no" value="no">
                    <label for="radio-no">NO</label>
                </div>
            </div>
           <input type="submit" value="Submit" class="modern-border button-design2" id="apply-submit-button" name="apply-submit">
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