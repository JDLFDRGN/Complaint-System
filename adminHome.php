<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <link rel="shortcut icon" type="image/png" href="img/logo.png" sizes="16x16">
</head>
<body>  
    <?php
        include 'query.php';

        if(isset($_POST['post-submit'])){
            $subject = $_POST['subject'];
            $details = $_POST['details'];

            $result = insertPost($subject, $details);
            if($result) echo "<script>alert('Posted successfully')</script>";
            else echo "<script>alert('Error occured')</script>";
        }
    ?>
    <aside id="admin-sidebar">
        <h1>Admin</h1>
        <div id="admin-navigations">
            <div id="admin-home" onclick="navigate('adminHome.php')"><img src="img/icon/home.svg"><span>Home</span></div>
            <div id="admin-complaints" onclick="navigate('inbox.php')"><img src="img/icon/mail.svg"><span>Inbox</span></div>
            <div id="admin-requests" onclick="navigate('request.php')"><img src="img/icon/request.svg"><span>Requests</span></div>
            <div id="admin-logout" class="logout" onclick="navigate('admin.php')"><img src="img/icon/logout.svg"><span>Logout</span></div>
        </div>
    </aside>
    <section id="admin-section1" class="admin-section">
        <div id="admin-accounts">
            <div id="admin-total-users" class="classic-border">
                <h1><a href="#admin-section2">all users</a></h1>
            </div>
            <div id="admin-total-managers" class="classic-border">
                <h1><a href="#admin-section3">all managers</a></h1>
            </div>
        </div>
        <div id="admin-introduction1">
            <div id="admin-update">
                <div id="admin-new-user-container">
                    <h3>New user</h3>
                    <?php
                        $result = getRecentData("users","userID");
                        if($result->num_rows != 0){
                            $transform = $result->fetch_assoc();
                            $fullname = $transform['firstname'] . " " . $transform['lastname'];
                            echo "<input type='text' value='$fullname' readonly class='classic-border'>";
                        }else echo "<input type='text' value='No data available' readonly class='classic-border'>";                  
                    ?>
                </div>
                <div id="admin-new-complaint-container">
                    <h3>Recent complaint</h3>
                    <?php
                        $result = getRecentData("complaint","complaintID");
                        if($result->num_rows != 0){
                            $transform = $result->fetch_assoc();
                            $details = $transform['details'];
                            echo "<textarea cols='30' rows='10' readonly class='classic-border'>$details</textarea>";
                        }else echo "<input type='text' value='No data available' readonly class='classic-border'>"; 
                    ?>
                </div>
            </div>
            <div id="admin-post">
                <form id="admin-post-form" method="post" class="classic-border">
                    <h3>Anything in mind?</h3>
                    <div id="admin-post-form-inputs">
                        <input type="text" placeholder="Subject" name="subject">
                        <input type="text" placeholder="Details" name="details">
                        <input type="submit" value="Post" id="admin-submit-post" class="classic-border button-design1" name="post-submit">
                    </div>                   
                </form>
            </div>
        </div>
    </section>
    <section id="admin-section2" class="admin-section">
        <div id="admin-registered-user">
            <h1>Registered User</h1>
        </div>
        <div id="admin-user-list">
            <div class="admin-list-header">
                <h1 class="classic-border">User List</h1>
            </div>
            <?php
                $users = getSelectedData('normal');
                if($users->num_rows == 0) echo "<h1 class='no-data'>User List is empty</h1>";
                
                for($i=0;$i<$users->num_rows;$i++){
                    $transform = $users->fetch_assoc();
                    $number = $i + 1;
                    $fullname = $transform['firstname'] . " " . $transform['lastname'];
                    echo "<div class='admin-user' id='$transform[userID]'>";
                    echo "<h4 class='admin-user-fullname'>$number. $fullname</h4>";
                    echo "<button type='button' class='admin-view-user button-design2'>View</button>";
                    echo "<div class='admin-user-email' style='display: none;'>$transform[email]</div>";
                    echo "<div class='admin-user-password' style='display: none;'>$transform[password]</div>";
                    echo "<div class='admin-user-date' style='display: none;'>$transform[dateJoined]</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>
    <section id="admin-section3" class="admin-section">
        <div id="admin-registered-manager">
            <h1>Registered Manager</h1>
        </div>
        <div id="admin-manager-list">
            <div class="admin-list-header">
                <h1>Manager List</h1>
            </div>
            <?php
                $users = getSelectedData('manager');
                if($users->num_rows == 0) echo "<h1 class='no-data'>Manager List is empty</h1>";
                for($i=0;$i<$users->num_rows;$i++){
                    $transform = $users->fetch_assoc();
                    $number = $i + 1;
                    $fullname = $transform['firstname'] . " " . $transform['lastname'];
                    echo "<div class='admin-user' id='$transform[userID]'>";
                    echo "<h4 class='admin-user-fullname'>$number. $fullname</h4>";
                    echo "<button type='button' class='admin-view-user button-design2'>View</button>";
                    echo "<div class='admin-user-email' style='display: none;'>$transform[email]</div>";
                    echo "<div class='admin-user-password' style='display: none;'>$transform[password]</div>";
                    echo "<div class='admin-user-date' style='display: none;'>$transform[dateJoined]</div>";
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
    <div id="admin-user-view-popup" class="admin-hide-view-form classic-border">
        <div id="admin-user-fullname-header">
            <h1 id="admin-user-view-fullname">Full Name</h1>
        </div>
        <div id="admin-user-credentials">
            <div id="admin-user-view-email">Username</div>
            <div id="admin-user-view-password">Password</div>
            <div id="admin-user-view-date">Date Joined</div>
            <div id="admin-user-view-buttons">
                <input type="button" value="Back" class="modern-border button-design2" onclick="hideViewForm('#admin-user-view-popup','admin-hide-view-form')">
            </div>
        </div>
    </div>
</body>
</html>