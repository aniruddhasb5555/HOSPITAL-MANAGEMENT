<!DOCTYPE html>
<html>
<head>
<title>Form processing</title>
</head>
<body>

<?php
$FN=$_POST["FN"];
$MN=$_POST["MN"];
$LN=$_POST["LN"];
$AGE=$_POST["Age"];
$AGE=intval($AGE);
$SEX=$_POST["sex"];
$CNO=$_POST["Cno"];
$EE=$_POST["emailid"];
$Addre=$_POST["Address"];
$ANO=$_POST["ANO"];
$SECRECTA=$_POST["SA"];
$PASS=$_POST["psw"];
$ADMITTED="FALSE";
$DESCR="NOT YET";
?>

<?php
$servername = "localhost";
$username = "root";
$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn,"Auth");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$que="SELECT MAX(Pid) FROM Auu";
$result= mysqli_query($conn,$que);
$rowcount=mysqli_num_rows($result);
$TEMP=mysqli_fetch_row($result);
$ID=(int)$TEMP[0]+1;
mysqli_free_result($result);
$que="INSERT INTO Auu (`Pid`, `Password`, `ID`, `SA`) VALUES ($ID,$PASS,$ANO,$SECRECTA)";
if(mysqli_query($conn,$que)){
    mysqli_select_db($conn,"aniruddha_HM");

    $que="INSERT INTO PATIENT (`Pid`, `Fname`, `Mname`, `Lname`, `Sex`, `Age`, `Cno`, `Pemail`, `Address`, `Admitted`, `Description`) VALUES ('$ID','$FN','$MN','$LN','$SEX','$AGE','$CNO','$EE','$Addre','$ADMITTED','$DESCR')";

    if(mysqli_query($conn,$que)){
        echo "SUCESSFULLY REGISTERED <br /> PATIENT LOG IN ID IS $ID<br />";
        echo file_get_contents("ADMINPAGE.html");
    }
    else{
        echo"Could not connect to database 2 \n";
        echo("Error description: " . mysqli_error($conn));
    }
}
else{
    echo"Could not connect to database";
}

?>


</body>
</html>

