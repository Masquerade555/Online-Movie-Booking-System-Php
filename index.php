<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Online Movie Booking System</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body bgcolor="#000">
    <?php
    session_start();
    if(!isset($_SESSION['email']))
    {
        header('location: sign.php');
    }
    
    include "connection.php";
    $sql = "SELECT * FROM movieTable";
    ?>
    <header></header>
    <div id="home-section-1" class="movie-show-container">
        <h1>Currently Showing</h1>
        <h3 style="color: #fff;">Book a movie now</h3>

        <div class="movies-container">

            <?php
            if ($result = mysqli_query($con, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="row">';
                    for ($i = 0; $i <= 5; $i++) {
                        $row = mysqli_fetch_array($result);
                        echo '<div class="col-md-6">'; // Assuming you are using Bootstrap for grid layout
                        echo '<div class="movie-box">';
                        echo '<img height="300" width="300" src="' . $row['movieImg'] . '" alt=" ">';
                        echo '<div class="movie-info ">';
                        echo '<h3>' . $row['movieTitle'] . '</h3>';
                        echo '<a href="booking.php?id=' . $row['movieID'] . '"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        
                        if (($i + 1) % 2 == 0 && $i < 5) {
                            echo '</div><div class="row">';
                        }
                    }
                    echo '</div>';
                    mysqli_free_result($result);
                } else {
                    echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            }
            

            // Close connection
            mysqli_close($con);
            ?>
        </div>
    </div>

    <div id="home-section-2" class="services-section">
        <h1>How it works</h1>
        <h3 style="color: #fff;">3 Simple steps to book your favourit movie!</h3>

        <div class="services-container">
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-video"></i>
                </div>
                <h2>1. Choose your favourite movie</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-credit-card"></i>
                </div>
                <h2>2. Pay for your tickets</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-theater-masks"></i>
                </div>
                <h2>3. Pick your seats & Enjoy watching</h2>
            </div>
            <div class="service-item"></div>
            <div class="service-item"></div>
        </div>
    </div>
    <footer></footer>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>