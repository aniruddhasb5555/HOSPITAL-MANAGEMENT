<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
</head>
<body>
<?php
  function EP($P){
      return chr(ord($P)+1);
  }

  function DP($P){
      return chr(ord($P)-1);
  }
  ?>
<?php
$aid=$_POST["AN"];
$pass=$_POST["AP"];
$servername = "localhost";
$username = "root";
$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn,"Auth");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$que="SELECT Pass FROM AA WHERE Aid='$aid'";
$result= mysqli_query($conn,$que);
$TEMP=mysqli_fetch_row($result);
$EP=$TEMP[0];
$EP[0]=DP($EP[0]);
if($pass==$EP){
    echo file_get_contents("ADMINPAGE.html");
}
else{
    echo"YOU HAVE ENTERED A WRONG PASSWORD";
}
?>

</body>
</html>

