<!DOCTYPE html>
<html>
<head>
<title>Patient Login</title>
<link rel="stylesheet" href="common.css">
</head>
<body>

<?php
$Pid = $_POST["PN"];
$pass = $_POST["PP"];
$servername = "localhost";
$username = "root";
$conn = mysqli_connect('localhost', 'root');
mysqli_select_db($conn, "Auth");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$que = "SELECT Password FROM Auu WHERE Pid='$Pid'";
$result = mysqli_query($conn, $que);
$TEMP = mysqli_fetch_row($result);
if ($pass == $TEMP[0]) {
    session_start();
    $_SESSION["pid"] = $Pid;
    mysqli_select_db($conn, "aniruddha_HM");
    $que = "SELECT * FROM PATIENT WHERE Pid='$Pid'";
    $result = mysqli_query($conn, $que);
    if ($result) {
        print "<h1>PATIENT DETAILS</h1>";
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        print "<table>
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
        echo "<h1>PRESCRIPTIONS</h1>";
        $que = "SELECT Pdate,MedName,Quantity,Cost,Quantity*Cost AS Totalamount FROM PRESCRIPTION NATURAL JOIN PHARMACY WHERE Pid='$Pid' ORDER BY Pdate";
        $c = 1;
        $ar = array();
        $result = mysqli_query($conn, $que);
        if ($result) {
            $rc = mysqli_num_rows($result);
            $cc = mysqli_num_fields($result);
            if ($rc != 0) {
                $cd = '';
                for ($i = 0; $i < $rc; $i++) {
                    $row = mysqli_fetch_array($result, MYSQLI_NUM);
                    if ($cd != $row[0]) {
                        if ($c == 1) {
                            $c += 1;
                            $sum = 0;
                        } else {
                            echo "</table>";
                            echo "<h3>THE TOTAL AMOUNT IS : $sum</h3>";
                            $sum = 0;
                        }
                        $cd = $row[0];
                        echo "<h2>Prescription Date : $cd</h2>";
                        echo "
                        <table>
                            <tr align='center'>";
                        $fieldinfo = mysqli_fetch_field($result);
                        if ($c == 2) {
                            $c += 1;
                            while ($fieldinfo = mysqli_fetch_field($result)) {
                                echo "<td >$fieldinfo->name </td>";
                                $ar[] = $fieldinfo->name;
                            }
                        } else {
                            foreach ($ar as $temp) {
                                echo "<td>$temp</td>";
                            }
                        }
                        echo "</tr><tr>";
                    }
                    for ($j = 1; $j < $cc; $j++) {
                        echo "<td>$row[$j]</td>";
                    }
                    $sum += $row[4];
                    echo "</tr>";

                }
                echo "</table><h3>THE TOTAL AMOUNT IS : $sum</h3>";

            } else {
                print "NO PRESCRIPTION PRESCRIBED BY DOCTOR YET";
            }
        } else {
            print "SOMETHIG WENT WRONG WHILE LOADING PRESCRIPTION";
        }

    } else {
        echo "SOMETHING WENT WRONG";
    }
} else {
    echo "YOU HAVE ENTERED A WRONG PASSWORD";
}
?>

</body>
</html>

