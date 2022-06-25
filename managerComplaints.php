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
    ?>
    <aside id="manager-sidebar">
        <div id="manager-account">
            <img src="img/icon/manager.svg">
            <?php
                $manager = getSelectedRow($_SESSION['ID']);
                $transform = $manager->fetch_assoc();
                $fullname = $transform['firstname'] . " " . $transform['lastname'];
                echo "<div id='manager-name'>Mngr. $fullname</div>";
            ?>
        </div>
        <div id="manager-home" class="manager-navigation" onclick="navigate('managerHome.php')"><img src="img/icon/home.svg"><span>Home</span></div>
        <div id="manager-complaints" class="manager-navigation" onclick="navigate('managerComplaints.php')"><img src="img/icon/mail.svg"><span>Complaints</span></div>
        <div id="manager-logout" class="manager-navigation" onclick="navigate('manager.php')"><img src="img/icon/logout.svg"><span>Logout </span></div>
    </aside>
    <section id="manager-complaint-section">
        <?php
            $complaint = getForward($_SESSION['ID']);
            if($complaint->num_rows == 0) echo "<h1 class='no-data move-to-right'>No complaints available</h1>";
            for($i=0;$i<$complaint->num_rows;$i++){
                $transform = $complaint->fetch_assoc();
                
                echo "<div class='inbox-row'>";
                echo "<div id='$transform[complaintID]' class='inbox-container classic-border'>";
                echo "<div class='inbox-information'>";
                echo "<div class='inbox-name-container'><h3>Name:</h3><p>$transform[firstname] $transform[lastname]</p></div>";
                echo "<div class='inbox-detail-container'><h3>Complaint:</h3><p>$transform[details]</p></div>";
                echo "<div class='inbox-suggestion-container'><h3>Suggestion:</h3><p>$transform[suggestion]</p></div>";
                echo "<div class='inbox-number-container'><h3>Number:</h3><p>$transform[number]</p></div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        ?>
    </section>
    <footer class="footer2">
        <div class="copyright">
            &copy2020Chatime Online Complaint
        </div>
    </footer>
</body>
</html>