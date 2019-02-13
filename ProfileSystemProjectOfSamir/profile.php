<?php
session_start();
include 'ConnDB.php';
$USERA=$_SESSION['admin'];
$conn_email= mysqli_query($connDb, "SELECT email FROM users WHERE username ='$USERA'") or die("Error: " . mysqli_error($connDb));
$conn_ad= mysqli_query($connDb, "SELECT address FROM users WHERE username ='$USERA'") or die("Error: " . mysqli_error($connDb));
$conn_age= mysqli_query($connDb, "SELECT age FROM users WHERE username ='$USERA'") or die("Error: " . mysqli_error($connDb));
$conn_fac= mysqli_query($connDb, "SELECT faculty FROM users WHERE username ='$USERA'") or die("Error: " . mysqli_error($connDb));
$conn_unvir= mysqli_query($connDb, "SELECT university FROM users WHERE username ='$USERA'") or die("Error: " . mysqli_error($connDb));
$conn_fn= mysqli_query($connDb, "SELECT fullname FROM users WHERE username ='$USERA'") or die("Error: " . mysqli_error($connDb));
//<?php echo($conn_ad);


?>
<html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>IEEE Task3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/profile.css" />
    </head>

    <body>
        <div class="container"></div>
        <div class="logo">
            <img src="images/profile.png">
        </div>
        <div class="profilebox">
            <form name="">
                <div class="inputBox">
                    <label>Fullname</label>
                    <input type="text" name="" value="<?php echo $conn_fn;?>" readonly>
                </div>
                <div class="inputBox">
                    <label>Username</label>
                    <input type="text" name="" value="<?php echo($_SESSION['admin']); ?>" readonly>
                </div>
                <div class="inputBox">
                    <label>Email</label>
                    <input type="text" name="" value="<?php echo $conn_email ;?>" readonly>
                </div>
                <div class="inputBox">
                    <label>Address</label>
                    <input type="text" name="" value="<?php echo($conn_ad);?>" readonly>
                </div>
                <div class="inputBox">
                    <label>Age</label>
                    <input type="text" value="<?php echo($conn_age);?>" readonly>
                </div>
                <div class="inputBox">
                    <label>University</label>
                    <input type="text" vale="<?php echo($conn_unvir);?>" readonly>
                </div>
                <div class="inputBox">
                    <label>Faculty</label>
                    <input type="text" value="<?php echo($conn_fac);?>" readonly>
                </div>
            </form>
        </div>
    </body>

</html>