<?php
$insert = false;
if(isset($_POST['firstname'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $email = $_POST['email'];
    $sql = "INSERT INTO `iclinic`.`support` (`firstname`, `lastname`, `city`, `state`, `zip`, `email`, `dt`) VALUES ('$firstname', '$lastname', '$city', '$state', '$zip', '$email', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>





<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>iClinic-Support</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="Frontpage.php">iClinic</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="Frontpage.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="About.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"
                            href="https://timesofindia.indiatimes.com/topic/Online-doctor-consultation">Latest
                            Updates</a>
                        <a class="dropdown-item"
                            href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019">Covid 19</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="Support.php">Support</a>
                        <a class="dropdown-item" href="WriteForUs.php">Write For Us</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ContactUs.php">Contact Us</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

    </nav>

    <div class="container-fluid">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Support</h1>
                <p class="lead">Fill this form with your information and we will reach you shortly.
                </p>
            </div>
        </div>

        <?php
        if($insert == true){
        echo "<p  class=bg-success >Thanks for submitting this form. We are happy to help you!</p>";
        }
    ?>


        <form action="Support.php" method="post">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationDefault01">First name</label>
                    <input type="text" name="firstname" class="form-control" id="firstname"
                        placeholder="Enter your Firstname" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationDefault02">Last name</label>
                    <input type="text" name="lastname" class="form-control" id="lastname"
                        placeholder="Enter your Lastname" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationDefault03">City</label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="Enter City" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationDefault04">State</label>
                    <select class="custom-select" name="state" id="state" placeholder="Select your State" required>
                        <option selected disabled>Choose...</option>
                        <option>MAHARASHTRA</option>
                        <option>GOA</option>
                        <option>MADHYA PRADESH</option>
                        <option>JHARKHAND</option>
                        <option>RAJASTHAN</option>
                        <option>GUJRAT</option>
                        <option>HARYANA</option>
                        <option>PUNJAB</option>
                        <option>KARNATAKA</option>

                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationDefault05">Zip</label>
                    <input type="text" name="zip" class="form-control" id="zip" placeholder="Enter your Zip" required>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your Email"
                    aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">

                    </label>
                </div>
            </div>
            <button class="btn btn-primary" >Submit form</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>