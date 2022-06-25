<?php
    include 'query.php';
    session_start();

    $adminUsername = "admin";
    $adminPassword = "admin123";
    
    if(isset($_POST['login-user'])){
        $users = getSelectedData('normal');
        for($i=0;$i<$users->num_rows;$i++){
            $transform = $users->fetch_assoc();
            if($_POST['email'] == $transform['email'] && $_POST['password'] == $transform['password']){
                $_SESSION['ID'] = $transform['userID'];
                header('Location: userHome.php');
                break;
            }
        }
        echo "<script>alert('Invalid email or password!'); window.location = 'index.php';</script>";
    }else if(isset($_POST['login-manager'])){
        $managers = getSelectedData('manager');
        for($i=0;$i<$managers->num_rows;$i++){
            $transform = $managers->fetch_assoc();
            if($_POST['email'] == $transform['email'] && $_POST['password'] == $transform['password']){
                $_SESSION['ID'] = $transform['userID'];
                header('Location: managerHome.php');
                break;
            }
        }
        echo "<script>alert('Invalid email or password!'); window.location = 'manager.php';</script>";
    }else{
        if($_POST['email'] == $adminUsername && $_POST['password'] == $adminPassword) header('Location: adminHome.php');
        else echo "<script>alert('Invalid email or password!'); window.location = 'admin.php';</script>";
    }
?>