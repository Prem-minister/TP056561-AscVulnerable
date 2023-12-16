<?php
include '../conn.php';
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = 'SELECT * FROM vuln_users WHERE username="' . $username . '" AND password ="' . $password . '"';
    $result = mysqli_query($conn, $query);
 
    if($result && mysqli_num_rows($result) >= 1){
        $valid_user = mysqli_fetch_assoc($result);
        if($valid_user["username"] == "admin"){
            setcookie('admin','a1b2c3d4e5f6a7b8c9d0e1f2a3b4c5d6', time() + (86400 * 30), '/');
            echo '<script>alert("Logged in as admin")</script>';
            echo '<script>window.location.href="../Admin/vuln_admin.php"</script>';
        }else{
            $_SESSION["uid"] = $valid_user["id"];
            echo '<script>alert("Successful Login")</script>';
            echo '<script>window.location.href="../User/vuln_update_profile.php"</script>';
        }
    }else{
        echo '<script>alert("Login Failed")</script>';
        echo '<script>window.location.href="vuln_login.html"</script>';
    }
}

?>

//vulnerable to admin" -- , " or ""="

