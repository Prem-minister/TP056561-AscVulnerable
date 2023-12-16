<?php
include '../conn.php';

$username = $_POST["username"];
$user_id = $_POST["id"];

$update = "UPDATE vuln_users SET username = '" .$username. "' WHERE id =" .$user_id. ";";
$result = mysqli_query($conn, $update);

if (mysqli_affected_rows($conn)>0) {
    echo '<script>alert("Successfully username updated!")</script>';
    echo '<script>window.location.href="vuln_update_profile.php"</script>';  
} else {
    echo '<script>alert("Nothing updated")</script>';
    echo '<script>window.location.href="vuln_update_profile.php"</script>';
}

?>
