<!DOCTYPE html>
<html>
<head>
<title>ADD EMPLOYEE DETAILS</title>
</head>
<body>

<?php
$ID = $_POST["EID"];
$REID = $_POST["REID"];
if ($ID != $REID) {
    echo "Eid Entered did not match";
    echo file_get_contents("ADMINPAGE.html");
} 
else {
    $servername = "localhost";
    $username = "root";
    $conn = mysqli_connect('localhost', 'root');
    mysqli_select_db($conn, "aniruddha_HM");
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $que="DELETE FROM EMPLOYEE_CNOS WHERE Eid='$ID'";
    if (mysqli_query($conn, $que)) {
        $que = "DELETE FROM EMPLOYEE WHERE Eid='$ID'";
        if (mysqli_query($conn, $que)) {
        echo "SUCESSFULLY DELETED THE EMPLOYEE TUPLE <br />";
        }
        else{
            echo"Could not delete EINFO <br />";
        }
        echo file_get_contents("ADMINPAGE.html");
    } else {
        echo "Could not connect to database <br />";
        echo("Error description: " . mysqli_error($conn));
        echo file_get_contents("ADMINPAGE.html");
    }
}
?>


</body>
</html>

