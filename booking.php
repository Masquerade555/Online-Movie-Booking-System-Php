<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['email']))
{
    header('location: sign.php');
}
$id = $_GET['id'];
//conditions
if ((!$_GET['id'])) {
    header('location: index.php');
}
include "connection.php";
$movieQuery = "SELECT * FROM movieTable WHERE movieID = $id";
$movieImageById = mysqli_query($con, $movieQuery);
$row = mysqli_fetch_array($movieImageById);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Book <?php echo $row['movieTitle']; ?> Now</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>

<body style="background-color:#6e5a11;">
    <div class="booking-panel" style="background-color: #000;">
        <div class="booking-panel-section booking-panel-section1">
            <h1 style="color: #fff;">RESERVE YOUR TICKET</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                echo '<img src="' . $row['movieImg'] . '" alt="">';
                ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4" style="background-color: #000; color: #fff;">
            <div class="title"><?php echo $row['movieTitle']; ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td style="color: #fff;">&nbsp; GENRE</td>
                        <td style="color: #fff;"><?php echo $row['movieGenre']; ?></td>
                    </tr>
                    <tr>
                        <td style="color: #fff;">&nbsp; DURATION</td>
                        <td style="color: #fff;"><?php echo $row['movieDuration']; ?></td>
                    </tr>
                    
                    <tr>
                        <td style="color: #fff;">&nbsp; ACTORS</td>
                        <td style="color: #fff;"><?php echo $row['movieActors']; ?></td>
                    </tr>
                  
  <!-- Modal -->
  <div class="modal m fade in" id="myModal" role="dialog">
    <div class="modal-dialog">
    
        <div class="modal-body">
        <embed style="width: 820px; height: 450px;" src="<?php echo $row['you_tube_link'];?>"></embed>
        </div>
      
    </div>
  </div>
                    <tr>
                        <td style="color: #fff;">&nbsp; Trailer</td>
                        <td><a data-toggle="modal" data-target="#myModal">View Trailer</a>
                        </td>
                        
                    </tr>

                    <tr>
                        <td style="color: #fff;">&nbsp; Description</td>
                        <td style="color: #fff;"><?php echo $row['moviedetails']; ?> </td>
                    </tr>
                 
                </table>
            </div>
            <div class="booking-form-container">
                <form action="verify.php" method="POST">


                    <select name="theatre" required>
                        <option value="" disabled selected>THEATRE</option>
                        <option value="main-hall">Main Hall</option>
                        <option value="vip-hall">VIP Hall</option>
                        <option value="private-hall">Private Hall</option>
                    </select>

                    <select name="type" required>
                        <option value="" disabled selected>TYPE</option>
                        <option value="3d">3D</option>
                        <option value="2d">2D</option>
                        <option value="imax">IMAX</option>
                    </select>

                    <select name="date" required>
                        <option value="" disabled selected>DATE</option>
                        <option value="<?php 
                        $date = date('d-m-y', strtotime("+1 days"));
                        echo $date;?>"><?php 
                        $date = date('d-m-y', strtotime("+1 days"));
                        echo $date;?></option>
                        <option value="<?php 
                        $date = date('d-m-y', strtotime("+2 days"));
                        echo $date;?>"><?php 
                        $date = date('d-m-y', strtotime("+2 days"));
                        echo $date;?></option>
                        <option value="<?php 
                        $date = date('d-m-y', strtotime("+3 days"));
                        echo $date;?>"><?php 
                        $date = date('d-m-y', strtotime("+3 days"));
                        echo $date;?></option>
                    </select>

                    <select name="hour" required>
                        <option value="" disabled selected>TIME</option>
                        <option value="09-00">09:00 AM</option>
                        <option value="12-00">12:00 AM</option>
                        <option value="15-00">03:00 PM</option>
                        <option value="18-00">06:00 PM</option>
                        <option value="21-00">09:00 PM</option>
                        <option value="24-00">12:00 PM</option>
                    </select>

                    <input style="color: #000;" type="text" value="<?php echo $_SESSION['firstname'] ?>" name="fName" readonly required>

                    <input style="color: #000;" placeholder="Enter your phone number" type="number" name="pNumber" required>

                    <input style="color: #000;" value="<?php echo $_SESSION['email'] ?>" type="email" name="email" readonly required>
                    <input type="hidden" name="movie_id" value="<?php echo $id; ?>">



                    <button type="submit" value="save" name="submit" class="form-btn">Book a seat</button>

                </form>
            </div>
        </div>
    </div>

    

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>