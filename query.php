<?php
    include 'connect.php';
    function insertUser($firstname, $lastname, $email, $pass, $date){   
        global $connect;
        $query = "INSERT INTO users(firstname,lastname,email,password,userType,dateJoined) VALUES('$firstname','$lastname','$email','$pass','normal','$date');";
        return $connect->query($query);
    }
    function insertComplaint($detail, $suggestion, $number, $id){
        global $connect;
        $query = "INSERT INTO complaint(details,suggestion,number,userID) VALUES('$detail','$suggestion','$number','$id');";
        return $connect->query($query);
    }
    function insertApplicant($id){
        global $connect;
        $query = "INSERT INTO applicant(userID) VALUES($id);";
        return $connect->query($query);
    }
    function insertForward($complaintID, $managerID){
        global $connect;
        $query = "INSERT INTO forward(complaintID,userID) VALUES('$complaintID', '$managerID');";
        return $connect->query($query);
    }
    function insertPost($subject, $details){
        global $connect;
        $query = "INSERT INTO post(subject, details) VALUES('$subject', '$details');";
        return $connect->query($query);
    }
    function getAllData($table){
        global $connect;
        $query = "SELECT * FROM $table;";
        return $connect->query($query);
    }
    function getSelectedData($type){
        global $connect;
        $query = "SELECT * FROM users WHERE userType = '$type';";
        return $connect->query($query);
    }
    function deleteSelectedData($id){
        global $connect;
        $query = "DELETE FROM applicant WHERE userID = $id";
        return $connect->query($query);
    }
    function deleteComplaint($id){
        global $connect;
        $query = "DELETE FROM complaint WHERE userID = $id";
        return $connect->query($query);
    }
    function updateSelectedData($id){
        global $connect;
        $query = "UPDATE users SET userType = 'manager' WHERE userID = $id;";
        return $connect->query($query);
    }
    function getRecentData($table, $sortBy){    
        global $connect;
        $query = "SELECT * FROM $table ORDER BY $sortBy DESC LIMIT 1;";
        return $connect->query($query);
    }
    function getSelectedRow($id){
        global $connect;
        $query = "SELECT * FROM users WHERE userID = '$id';";
        return $connect->query($query);
    }
    function getAllInnerJoins($table1, $table2, $id){
        global $connect;
        $query = "SELECT * FROM $table1 INNER JOIN $table2 ON $table1.$id = $table2.$id;";
        return $connect->query($query);
    }
    function getForward($id){
        global $connect;
        $query = "SELECT * FROM forward INNER JOIN complaint ON forward.complaintID = complaint.complaintID INNER JOIN users ON complaint.userID = users.userID WHERE forward.userID = $id";
        return $connect->query($query);
    }
    function getRecentForward($id){
        global $connect;
        $query = "SELECT * FROM forward INNER JOIN complaint ON forward.complaintID = complaint.complaintID INNER JOIN users ON complaint.userID = users.userID WHERE forward.userID = $id ORDER BY complaint.complaintID DESC LIMIT 1";
        return $connect->query($query);
    }
?>