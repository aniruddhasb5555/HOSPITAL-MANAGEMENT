<!DOCTYPE html>
<html>
<head>
<title>ADD EMPLOYEE DETAILS</title>
</head>
<body>

<?php
$ID=$_POST["EID"];
$FN=$_POST["FN"];
$MN=$_POST["MN"];
$LN=$_POST["LN"];
$Salary=$_POST["Salary"];
$SEX=$_POST["sex"];
$CNO=$_POST["Cno"];
$EE=$_POST["emailid"];
?>

<?php
$servername = "localhost";
$username = "root";
$conn = mysqli_connect("localhost", "root");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn,"aniruddha_HM");
$que="INSERT INTO EMPLOYEE (`Eid`, `EFN`, `EMN`, `ELN`, `Sex`, `Salary`, `Emailid`) VALUES ('$ID','$FN','$MN','$LN','$SEX','$Salary','$EE')";
if(mysqli_query($conn,$que)){
    $que="INSERT INTO `EMPLOYEE_CNOS` (`Eid`, `Cno`) VALUES ('$ID',$CNO)";
    if(mysqli_query($conn,$que)){
        echo"SUCESSFULLY ENTERED THE EMPLOYEE DETAILS <br />";
    }
   else{
       echo"Could not enter cno<br/>";
   }
   echo file_get_contents("ADMINPAGE.html");
}
else{
    echo"Could not connect to database <br />";
    echo("Error description: " . mysqli_error($conn));
    echo file_get_contents("ADMINPAGE.html");
}

?>


</body>
</html>

