<!DOCTYPE html>
<html>
<head>
<title>RUN A QUERY</title>
<link rel="stylesheet" href="common.css">
</head>
<body>

<?php
$QU=$_POST["QUE"];
trim($QU);
?>

<?php
$servername = "localhost";
$username = "root";
$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn,"aniruddha_HM");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$result=mysqli_query($conn,$QU);
if($result){
   echo"OUTPUT <br /> <br />";
   $rc=mysqli_num_rows($result);
   $cc=mysqli_num_fields($result);
   $row=mysqli_fetch_array($result,MYSQLI_NUM);
   echo"
   <table border='5px'>";
   print"<tr align='center'>";
   while ($fieldinfo=mysqli_fetch_field($result))
   {
    print"<td >$fieldinfo->name </td>";
   }
        for($i=0;$i<$rc;$i++){
            print"<tr align='center' >";
            for($j=0;$j<$cc;$j++){
                print"<td>$row[$j]</td>";
            }
            $row=mysqli_fetch_array($result,MYSQLI_NUM);
        }
    echo"</table><br /><br />";
    echo"<a href='ADMINPAGE.html'>Click here to go back to admin page</a>";
   }

else{
    echo"Could not connect to database <br />";
    echo file_get_contents("ADMINPAGE.html");
}

?>


</body>
</html>

