<?php 

session_start();
include('database.php');

  // try {
  //   $connection = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE, USER, PASSWORD);
  //   $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   echo "Connected successfully";
  // } catch(PDOException $e) {
  //   echo "Connection failed: " . $e->getMessage();
  // }

  // if(isset($_POST['submit'])){
  //   $FirstName = $_POST['firstName'];
  //   $LastName = $_POST['lastName'];
  //   $Email = $_POST['email'];
  //   $Subject = $_POST['subject'];
  //   $Message = $_POST['message'];

  //   $sql = "INSERT INTO contact-form (FirstName, LastName, Email, Subject, Message)
  //   VALUES (:FirstName, :LastName, :Email, :Subject, :Message)";
  //   $stmt = $connection->prepare($sql);
  //   $stmt->bindParam(':Firstname', $FirstName, PDO::PARAM_STR);
  //   $stmt->bindParam(':LastName', $LastName, PDO::PARAM_STR);
  //   $stmt->bindParam(':Email', $Email, PDO::PARAM_STR);
  //   $stmt->bindParam(':Subject', $Subject, PDO::PARAM_STR);
  //   $stmt->bindParam(':Message', $Message, PDO::PARAM_STR);
  //   $stmt->execute();

  //   echo "New record created successfully";
  // }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $FirstName = $_POST["firstName"];
  $LastName = $_POST["lastName"];
  $Email = $_POST["email"];
  $Subject = $_POST["subject"];
  $Message = $_POST["message"];

  try {
    $connection = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE, USER, PASSWORD);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "INSERT INTO contact-form (FirstName, LastName, Email, Subject, Message)
    VALUES (:firstName, :lastName, :email, :subject, :message)";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':firstName', $FirstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $LastName, PDO::PARAM_STR);
    $stmt->bindParam(':email', $Email, PDO::PARAM_STR);
    $stmt->bindParam(':subject', $Subject, PDO::PARAM_STR);
    $stmt->bindParam(':message', $Message, PDO::PARAM_STR);

    $stmt->execute();

    echo "New record created successfully";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $connection = null;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>


    <title>The house of tea</title>
    
    <link rel='stylesheet' type='text/css' media='screen' href='contact.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Favicon -->

   <link rel="icon" href="icon.png" type="image/png" />

   <!-- Google Fonts -->

   <style> @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap'); </style>
   <style> @import url('https://fonts.googleapis.com/css2?family=Aboreto&family=Source+Sans+Pro:wght@300&display=swap');</style>
   
</head>

<body>

   <!-- Navbar -->

   <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">  
      <div class="navbar-brand">The house of tea</div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon text-white"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="index.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="menu.php" class="nav-link">Menu</a>
          </li>
          <li class="nav-item">
            <a href="pictures.html" class="nav-link">Pictures</a>
          </li>
          <li class="nav-item">
            <a href="restaurant.html" class="nav-link">Where to find us</a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="background">

<!-- Contact --> 

<form>
<div class="container text-center">  
    <img src="./pictures/logo.png" class="img-fluid" alt="Logo">
    <h4><b>We'd love to hear from you</b></h4>
</div>  

<div class="container">

<form method="post">
  <div class="form-group-one">
    <label for="firstName">First Name</label>
    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name" value="<?php htmlspecialchars($FirstName['FirstName'], ENT_QUOTES, 'UTF-8'); ?>">
  </div>
  <div class="form-group">
    <label for="lastName">Last Name</label>
    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name" value="<?php htmlspecialchars($LastName['LastName'], ENT_QUOTES, 'UTF-8'); ?>">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" value="<?php htmlspecialchars($Email['Email'], ENT_QUOTES, 'UTF-8'); ?>">
  </div>
  <div class="form-group">
    <label for="subject">Subject</label>
    <select class="form-control" id="subject" name="subject" value="<?php htmlspecialchars($Subject['Subject'], ENT_QUOTES, 'UTF-8'); ?>">
      <option>Reservation</option>
      <option>Question</option>
      <option>Workshop registration</option>
    </select>
  </div>
  <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" id="message" name="message" rows="3" value="<?php htmlspecialchars($Message['Message'], ENT_QUOTES, 'UTF-8'); ?>"></textarea>
  </div>
  <br>
  <div class="container-one">
  <button type="submit" class="btn btn-dark">
    <img src="send.png" alt="Icon"> &nbsp&nbsp Send 
  </button>
  </div>
</form>

 </div>  

</div> 
</form>

        
</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>