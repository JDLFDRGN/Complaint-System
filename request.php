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

        if(isset($_POST['respond-submit'])){
            $id = $_POST['applicant-id'];
            $morse = $_POST['applicant-morse'];
            
            if($morse == "confirm"){
                $result = deleteSelectedData($id);
                $result2 = updateSelectedData($id);
                $result3 = deleteComplaint($id);
                if($result && $result2 && $result3) echo "<script>alert('Application accepted')</script>";
                else echo "<script>alert('Error Application')</script>";
            }else echo "<script>alert('Invalid answer')</script>";
        }else if(isset($_POST['respond-submit2'])){
            $id = $_POST['applicant-id'];
            $morse = $_POST['applicant-morse'];

            if($morse == "confirm"){
                $result = deleteSelectedData($id);
                if($result) echo "<script>alert('Deleted succesfully')</script>";
                else echo "<script>alert('Not deleted successfully')</script>";
            }
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
    <section id="request-section" class="admin-section"> 
        <h1>All requests</h1>
        <div id="request-list" class="classic-border">
            <?php
                $applicant = getAllInnerJoins("users","applicant","userID");
                if($applicant->num_rows == 0) echo "<h1 class='no-data'>No requests available</h1>";
                for($i=0;$i<$applicant->num_rows;$i++){
                    $transform = $applicant->fetch_assoc();
                    $applicantNumber = $i+1;
                    $fullname = $applicantNumber . ". " .$transform['firstname'] . " " . $transform['lastname'];
                    echo "<div class='request-container' id='$transform[userID]'>";
                    echo "<div class='request-fullname'>$fullname</div>";
                    echo "<div class='request-buttons'><input type='button' value='Accept' class='request-accept button-design2'><input type='button' value='Delete' class='request-delete button-design2'></div>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>
    <form id="respond-form" method="post" class="classic-border hide-respond-form">
        <h1 id="respond-instruction">Decipher the morse code to accept the applicant. The code is seven lowercase letters.</h1>
        <h1>-.-. --- -. ..-. .. .-. --</h1>
        <input type="text" class="classic-border" name='applicant-morse' required> 
        <input type="text" id="applicant-id" style='display: none;' name='applicant-id'>
        <div id="respond-form-buttons">
            <input type="button" value="Cancel" class="modern-border button-design1" onclick="hideViewForm('#respond-form','hide-respond-form')">
            <input type="submit" value="Submit" class="modern-border button-design2" name='respond-submit' id="respond-submit">
        </div>
    </form>
    <footer class="footer2">
        <div class="copyright">
            &copy2020Chatime Online Complaint
        </div>
    </footer>
</body>
</html>