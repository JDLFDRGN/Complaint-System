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
    <section id="manager-home-section">
        <div id="manager-recent-complaint" class="classic-border">
            <h3>Recent Complaints</h3>
            <?php
                $recentForward = getRecentForward($_SESSION['ID']);
                if($recentForward->num_rows != 0){
                    $transform = $recentForward->fetch_assoc();
                    echo "<p>$transform[details]</p>";
                }else echo "<p>No data available</p>";
            ?>
        </div>
        <div id="manager-admin-post">
            <?php
                $post = getAllData('post');
                if($post->num_rows == 0) echo "<h1 class='no-data'>No posts available</h1>";
                for($i=0;$i<$post->num_rows;$i++){
                    $transform = $post->fetch_assoc();

                    echo "<div class='post-container classic-border'>";
                    echo "<h3>From: Admin</h3>";
                    echo "<h3 class='post-header'>Subject: $transform[subject]</h3>";
                    echo "<h3 class='post-details'>Details: $transform[details]</h3>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>
    <footer class="footer2">
        <div class="copyright">
            &copy2020Chatime Online Complaint
        </div>
    </footer>
</body>
</html>