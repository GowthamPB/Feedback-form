<?php
$insert=false;
if(isset($_POST['email'])){
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password);
    if(!$con){
        die("Connection failed with error ".mysqli_connect_error());
    }
    $name= $_POST['name'];
    $email= $_POST['email'];
    $semester= $_POST['semester'];
    $section= $_POST['section'];
    $phone= $_POST['phone'];
    $desc= $_POST['desc'];
    $sql="INSERT INTO `feedback`.`info` (`Email`, `Name`, `Semester`, `Section`, `Phone`, `Feedback`, `Date`) VALUES ('$email', '$name', '$semester', '$section', '$phone', '$desc', current_timestamp());";

    if($con->query($sql)==true){
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SOSC Feedback Form</title>
</head>
<body>
    <div class="container">
    <h1>Feedback-form</h1>
    <h2>Thank you for attending the event!!!</h2>
    <p> Please give us your honest feedback</p>
    <?php
    if($insert){
    echo "<p class='Thankyou'>Thank you for submitting the form :)</p>";
    }
    ?>
    <form action="" method="post">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="semester" id="semester" placeholder="Enter your semester">
        <input type="text" name="section" id="section" placeholder="Enter your section">
        <input type="text" name="phone" id="phone" placeholder="Enter your Phone">
        <textarea name="desc" id="desc" cols="50" rows="10" placeholder="Enter the feedback about the event :)"></textarea>
        <button type="submit" class="btn sub"><strong>Submit</strong></button>
        <button type="reset" class="btn res"><strong>Reset</strong> </button>

    </div>
    </form>
    <script src="index.js"></script>
</body>
</html>