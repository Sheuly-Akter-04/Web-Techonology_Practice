<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>View Profile</title>
</head>
<style type="text/css">
table, th, td {
  padding: 5px;
}
table {
  border-spacing: 15px;
}
</style>
<body>
<form method="POST" action="">
    <?php
        include '../dbcon.php';

        $id = intval($_GET['userid']);
//        $id = $_GET['userid'];
        $selectquery = "select * from user where userid='$id'";
        $newquery = mysqli_query($con,$selectquery);
        $result = mysqli_fetch_assoc($newquery);
        
    ?>
    <table border="3" align="center" width=65%;">
        <tr>
            <td align="left" colspan="3">
                <img src="logo.png" align="left" height="65" width="150" border="1"><b><center>PHP RESTAURANT</center></b> 
                <div align="right">
                <a href="managerdashboard.php">Home |</a>
                <a href="index.php">Logout |</a>
                <a href="managerdashboard.php">Back </a>
                </div>
            </td>
        </tr>


        <tr>
            <td width="65%" rowspan="3">
               <fieldset>
               <legend><b>Profile</b></legend>
               <table>
                <tr>
                   <td>User ID : <?php echo $result['userid'] ?> </td>
                       <td></td>
                       <td></td>
                   </tr>
                   <tr>
                   <td>Name : <?php echo $result['name'] ?> </td>
                       <td></td>
                       <td></td>
                   </tr>
                   <tr>
                   <td>Email : <?php echo $result['email'] ?></td>
                       <td></td>
                       <td></td>
                   </tr>
                   <tr>
                   <td>User Name : <?php echo $result['username'] ?></td>
                       <td></td>
                       <td></td>
                   </tr>
                   <tr>
                   <td> Gender : <?php echo $result['gender'] ?> </td>
                       <td> </td>
                       <td></td>
                   </tr>
                   <tr>
                   <td>Date of Birth : <?php echo $result['dob'] ?> </td>
                       
                       <td></td>
                    </tr>
                   <tr>
                   <td>
                   <?php
                        include '../dbcon.php';

                        $selectquery = "select * from user";
                        $query = mysqli_query($con,$selectquery);
                        $nums = mysqli_num_rows($query);

                        if($res = mysqli_fetch_array($query))
                        {
                            ?>
                    <li><a href="editprofile.php?userid=<?php echo $res['userid'] ?>">Edit Profile</a></li>
                    <li><a href="changepassword.php?userid=<?php echo $res['userid'] ?>">Change Password</a></li>
                    <?php
                                }
                    ?>
                   </td>

                       <td></td>
                       <td></td>
                   </tr>

               </table>
           </fieldset>
        </td>
    </tr>
    <tr></tr>
    <tr></tr>
        <tr>
            <td align="center" colspan="2" >
                Copyright &#169; 2021
            </td>
        </tr>
    </table>
</form>
</body>

</html>
