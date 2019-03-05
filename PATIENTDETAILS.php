<!DOCTYPE html>
<html>
<head>
<title>Patient Details</title>
<link rel="stylesheet" href="common.css">
</head>
<body>

<?php
$Pid=$_SESSION["pid"];
$servername = "localhost";
$username = "root";
$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn,"aniruddha_HM");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$que="SELECT * FROM PATIENT WHERE Pid='$Pid'";
$result= mysqli_query($conn,$que);
if($result){
    echo"<h1>PATIENT DETAILS</h1><br />";
    $row=mysqli_fetch_array($result,MYSQLI_NUM);
    print"<table>
            <tr>
                <td>PATIENT ID :</td>
                <td>$Pid</td>
            </tr>
            <tr>
                <td>First Name :</td>
                <td>$row[1]</td>
            </tr>
            <tr>
                <td>Middle Name :</td>
                <td>$row[2]</td>
            </tr>
            <tr>
                <td>Last Name :</td>
                <td>$row[3]</td>
            </tr>
            <tr>
                <td>Sex :</td>
                <td>$row[4]</td>
            </tr>
            <tr>
                <td>Age :</td>
                <td>$row[5]</td>
            </tr>
            <tr>
                <td>Contact Number :</td>
                <td>$row[6]</td>
            </tr>
            <tr>
                <td>Email id :</td>
                <td>$row[7]</td>
            </tr>
            <tr>
                <td>Address :</td>
                <td>$row[8]</td>
            </tr>
        </table>";

}
else{
    echo"SOMETHING WENT WRONG";
}
?>

</body>
</html>

