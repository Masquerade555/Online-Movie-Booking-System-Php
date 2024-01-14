<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <title>Online Movie Booking System</title>
    <link rel="stylesheet" href="src/css/font-awesome-4.6.3/css/font-awesome.min.css">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="src/css/materialize.min.css"  media="screen,projection"/>
      <!-- animate css -->
      <link rel="stylesheet" href="src/css/animate.css-master/animate.min.css">
      <!-- My own style -->
      <link rel="stylesheet" href="src/css/style.css">
      <!-- Progress bar -->
      <link rel='stylesheet' href='src/css/nprogress.css'/>
</head>


<body>

<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    
}
else if($_SESSION['logged_in'] == 'True') {
    header('Location: index.php');
}

error_reporting(0);

?>






<div class="navbar-brand">
    <a href="index.php">
        <h1 class="navbar-heading">Online Movie Booking System</h1>
    </a>
</div>


<div class="container-fluid center-align sign">
    <div class="container">

        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#t1">Log In</a></li>
                    <li class="tab col s3"><a  href="#t2">Sign Up</a></li>
                </ul>
            </div>

            <div class="container forms">
                <div class="row">

                    <div id="t2" class="col s12 left-align">
                        <div class="card">
                            <div class="row">

                                <form class="col s12" action=""  method="POST" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">email</i>
                                            <input id="icon_prefix" type="text" name="email" class="validate" required>
                                            <label for="icon_prefix">Email</label>
                                        </div>

                                        

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="icon_prefix" type="text" name="username" class="validate" required>
                                            <label for="icon_prefix">UserName</label>
                                        </div>


                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">lock</i>
                                            <input id="icon_prefix" type="password" name="password" class="validate value1" required>
                                            <label for="icon_prefix">Password</label>
                                        </div>

                                        

                                        <div class="center-align">
                                            <button type="submit" id="confirmed" name="signup" class="btn meh button-rounded waves-effect waves-light ">Sign up</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="t1" class="col s12 left-align">

                        <div class="card">
                            <div class="row">
                                <form class="col s12" method="POST" action="">

                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">email</i>
                                        <input id="icon_prefix" type="text" name="emaillog" class="validate">
                                        <label for="icon_prefix">Email</label>
                                    </div>
                                    <div class="input-field col s12 meh">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="icon_prefix" type="password" name="passworddb" class="validate">
                                        <label for="icon_prefix">Password</label>
                                    </div>
                                    
                                    <div class="center-align">
                                        <button type="submit" name="login" class="btn button-rounded waves-effect waves-light ">Login</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
session_start();
if (isset($_POST['signup'])) {

    include 'connection.php';
  $email = $_POST['email'];
  $firstname = $_POST['username'];
  $password = $_POST['password'];


  //connecting & inserting data

  $query = "INSERT INTO users(email,
  username, password) VALUES ('$email', '$firstname',
  '$password')";
  

$run = mysqli_query($con,$query);

if($run)
{
    
    $_SESSION['firstname'] = $firstname;
    $_SESSION['email'] = $email;
    $_SESSION['logged_in']= 'True';
    echo "<script>alert('Sign up successfull now please Login')</script>";
    header("location: index.php");

}
else{
    echo "<script>alert('Sign up not successfull');</script>";
}
}

?>




<?php
session_start();
if(isset($_POST['login']))
{

    include 'connection.php';
    $email = $_POST['emaillog'];
$password = $_POST['passworddb'];
$query = "SELECT * FROM users WHERE email='$email' and password = '$password'";

$run = mysqli_query($con,$query);
$row = mysqli_fetch_array($run);
$totalrow = mysqli_num_rows($run);

$user_id = $row['id'];
  $user_email = $row['email'];
  $user_firstname= $row['username'];
if($totalrow == 1)
{
    $_SESSION['firstname'] = $user_firstname;
    $_SESSION['email'] = $user_email;
    $_SESSION['logged_in']= 'True';
header('location:index.php');
}
else
{
echo "<script>alert('username or password is incorrect')</script>";
}
}
?>




<!-- JQUERY FIRST -->
<script src="src/js/jquery-2.1.4.js"></script>
<!-- Typed Js -->
<script type="text/javascript" src="src/js/typed.js"></script>
<!-- Progress bar -->
<script src='src/js/nprogress.js'></script>
<!-- wow js-->
<script src="src/js/wow.min.js"></script>
<!-- Materialize Js -->
<script src="src/js/materialize.min.js"></script>
</body>
</html>
