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

        if(isset($_POST['forward-submit'])){
            $managerID = $_POST['manager-id'];
            $complaintID = $_POST['complaint-id'];
            
            $result = insertForward($complaintID, $managerID);

            if($result) echo "<script>alert('Forwarded successfully')</script>";
            else echo "<script>alert('Error occured')</script>";
        }

    ?>
    <aside id="admin-sidebar">
        <h1>Admin</h1>
        <div id="admin-navigations">
            <div id="admin-home" onclick="navigate('adminHome.php')">Home</div>
            <div id="admin-complaints" onclick="navigate('inbox.php')">Inbox</div>
            <div id="admin-requests" onclick="navigate('request.php')">Requests</div>
            <div id="admin-logout" class="logout" onclick="navigate('index.php')">Logout</div>
        </div>
    </aside>
    <section id="inbox-section" class="admin-section">
        <?php
            $complaint = getAllInnerJoins('users','complaint','userID');
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
                echo "<input type='button' value='forward' class='inbox-forward-button modern-border button-design2'>";
                echo "</div>";
                echo "</div>";
            }
        ?>
    </section>
    <form id="forward-form" method="post" class="classic-border hide-forward-form">
        <h1>Select Manager:</h1>
        <select name="manager-id">
            <?php
                $manager = getSelectedData('manager');
                for($i=0;$i<$manager->num_rows;$i++){
                    $transform = $manager->fetch_assoc();
                    echo "<option value='$transform[userID]'>$transform[firstname] $transform[lastname]</option>";
                }
            ?>
        </select>
        <input type="text" id="complaint-id" name="complaint-id" style="display: none;">
        <div id="forward-buttons">
            <input type="button" value="Cancel" class="modern-border button-design1" onclick="hideViewForm('#forward-form','hide-forward-form')">
            <input type="submit" value="Forward" class="modern-border button-design2" name="forward-submit">
        </div>
    </form>
    <footer class="footer2">
        <div class="copyright">
            &copy2020Chatime Online Complaint
        </div>
    </footer>
</body>
</html>