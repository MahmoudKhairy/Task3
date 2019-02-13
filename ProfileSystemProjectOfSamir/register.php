
<?php
session_start();
include 'ConnDB.php';
        if(isset($_POST['Rsubmit']))
        {
        echo"submit succses";
         $fullname=$_POST['Rfullname'];
         $email=$_POST['Remail'];
         $username=$_POST['Rusername'];
         $password=$_POST['Rpassword'];
         $address=$_POST['address'];
         $age=$_POST['age'];
         $university=$_POST['univer'];
         $faculty=$_POST['faculty'];
         $acceptun= $acceptfn=$accepte=$acceptp=$acceptad=$acceptage=$acceptuniver=$acceptfac=false;
         $usernameerr=$emailerr=$passerr=$fullnameerr=$aderr=$agerr=$facultyerr=$univererr="";
         //كده احنا خدنا ال اليوزر كتبه
//_______________________________________check Username __________________________
         
             if (preg_match("/^[a-z\d_]{5,20}$/i" , $username ))
            {
             $acceptun=true;
             $query1= mysqli_query($connDb, "SELECT * FROM users WHERE username LIKE'$username'")or die(mysqli_error($connDb));
             if(mysqli_num_rows($query1) == true)
                {
                $usernameerr="This username is found , please choose another name";
                $acceptun=false;
                //echo'error2';
                }
             else 
                {
              //  $usernameValid="Valid username";
                $acceptun=true;
               // echo'error_2';
                }           
            }
         else
            {
             $usernameerr="*Invalid username, name must contain letter and number";
             $acceptun=false;
             //echo'error2';
             }
//__________________________________________check email ______________________________
             if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) 
            {
               // echo'email accept 1';
                $accepte = true;
                $query2 = mysqli_query($connDb, "SELECT * FROM users WHERE email LIKE '$email'")or die(mysqli_error($connDb));
                if (mysqli_num_rows($query2) == true)
                    {
                    $emailerr = "This Email is found , please choose another name";
                    $accepte = false;
                   // echo'email found';
                    }
                else 
                    {
                    $emailvalid = "Valid Email";
                    $accepte = true;
                 //   echo'email accept 2';
                    }
            } 
            else 
            {
                $emailerr = "*Invalid Email,  example123@abcd.com";
                $accepte = false;
                //echo'email not accept';
            }
//____________________________________________check password____________________ _________________
             
             if (preg_match("/^[a-zA-Z0-9]\w{7,15}$/" , $password))
                    
            {
//The password's first character must be a letter,
// it must contain at least 8 characters and no more than 16 characters and no characters other than letters,
// numbers and the underscore may be used
                //$passwordmess="Good Password";
                $acceptp=true;
                //echo'error_4';
            }
         else
             {
             $passerr="*Weak Password,Please use letters,numbers and underscore";
             $acceptp=false;
             //echo'error4';
             }
             
//___________________________________________check fullname____________________________________
              if (preg_match("/^[a-zA-Z ]*$/" , $fullname))
            {
                $acceptfn=true;
               // echo'error_5';
            }        
             else
             {
                $fullnameerr='*Invalid name, name must contain letter and whitespace';
                $acceptfn=false;
                //echo'error5';
             }
//______________________________________________address______________________________
        /*     if(preg_match("/[^A-Za-z0-9]+/",$address))
                {
                   $acceptad=true;
                }
            else
                {
                   $aderr="*Invalid address use letter only"; 
                   $acceptad=false;
                }*/
//_____________________________________________age________________________________________
                if(preg_match("/^[0-9]+$/",$age))
                {
                   $acceptage=true;
                 //  echo'error_6';
                }
            else
                {
                   $agerr="*Invalid Age use number only max 100 and min 5 only"; 
                   $acceptage=false;
                   //echo'error6';
                }
                
//_____________________________________________University________________________________________
                if(preg_match("/^[a-zA-Z ]*$/",$university))
                {
                   $acceptuniver=true;
                   //echo'error_7';
                }
            else
                {
                   $univererr="*Invalid , use integer only"; 
                   $acceptuniver=false;
                   //echo'error7';
                }
                
//_____________________________________________Faculty________________________________________
                if(preg_match("/^[a-zA-Z ]*$/",$faculty))
                {
                   $acceptfac=true;
                   //echo'error_8';
                }
            else
                {
                   $facultyerr="*Invalid , use integer only"; 
                   $acceptfac=false;
                   //echo'error8';
                }
                //  &&$acceptfn==true  && $acceptad==true&& $acceptage==true &&$acceptuniver==true&&$acceptfac==true
             if ($acceptp==true && $accepte==true && $acceptun==true  &&$acceptfn==true && $acceptage==true &&$acceptuniver==true&&$acceptfac==true)
             {
                // echo"all accept";
                 $_SESSION['admin']=$username;
                 $GoToDB="INSERT INTO users(fullname,username,email,password,address,age,university,faculty)VALUES('$fullname','$username','$email','$password','$address','$age','$university','$faculty')";
                 mysqli_query($connDb, $GoToDB)or die(mysqli_error($connDb));
                
                  header("Location: profile.php");
                  
                  
             }
       
         }
?>
<html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>IEEE Task3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/register.css" />
    </head>

    <body>
        <div class="container"></div>
        <div class="logo">
            <img src="images/1-Logo2x.png">
        </div>
        <div class="registerbox">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                <div class="inputBox">
                    <input type="text" name="Rusername" placeholder="Username" required>
                </div>
                <div class="inputBox">
                    <input type="email" name="Remail" placeholder="Email" required>
                </div>
                <div class="inputBox">
                    <input type="password" name="Rpassword" placeholder="Password" required>
                </div>
                <div class="inputBox">
                    <input type="text" name="Rfullname" placeholder="Full Name" required>
                </div>
                <div class="inputBox">
                    <input type="text" name="address" placeholder="Address" required>
                </div>
                <div class="inputBox">
                    <input type="number" name="age" placeholder="Age" maxlength="2" min="0" max="99" required>
                </div>
                <div class="inputBox">
                    <input type="text" name="univer" placeholder="University" required>
                </div>
                <div class="inputBox">
                    <input type="text" name="faculty" placeholder="Faculty" required>
                </div>
                <p class="error">
                    <?php
                    echo($usernameerr) ;
                    echo($emailerr);
                    echo($passerr);
                    echo($fullnameerr);
                   // echo($aderr);
                    echo($agerr);
                    echo($facultyerr);
                    echo($univererr);
                    
                    ?>
                </p>
                <input type="submit" name="Rsubmit" value="Register">
            </form>
        </div>
    </body>

</html>