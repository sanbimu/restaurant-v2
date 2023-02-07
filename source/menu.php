<?php 

session_start();
include('database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>


    <title>The house of tea</title>
    
    <link rel='stylesheet' type='text/css' media='screen' href='menu.css'>
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
            <a href="contact.html" class="nav-link">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="background">

   <!-- Menu: grouped list with badges -->

<div class="container">
    <div class="row">
        <div class="col-lg-5">
            <h3 class="drinks">Drinks</h3>
            <ul class="list-group-flush" id="listdrinks">
<?php
            try {
    $connection = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE, USER, PASSWORD);
    $query = "SELECT * FROM `menu-drinks`";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo "<li class='list-item pt-4'>";
        echo "<h5>" . htmlspecialchars($row['Drink'], ENT_QUOTES, 'UTF-8');
        if (!empty($row['Badge'])) {
            echo " <span class='badge'>" . htmlspecialchars($row['Badge'], ENT_QUOTES, 'UTF-8') . "</span>";
        }
        echo "</h5>";
        echo "<p>" . htmlspecialchars($row['Description'], ENT_QUOTES, 'UTF-8') . " &nbsp&nbsp <span class='text-light'>€ " . htmlspecialchars($row['Price'], ENT_QUOTES, 'UTF-8') . "</span></p>";
        echo "</li>";
    }     
            } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
            }
?>           
        </div>

        <div class="col-lg-5">


        </ul> 
            <h3 class="food">Food</h3>
            <ul class="list-group-flush" id="listfood">
<?php
            try {
    $connection = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE, USER, PASSWORD);
    $query = "SELECT * FROM `menu-food`";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo "<li class='list-item pt-4'>";
        echo "<h5>" . htmlspecialchars($row['Food'], ENT_QUOTES, 'UTF-8');
        if (!empty($row['Badge'])) {
            echo " <span class='badge'>" . htmlspecialchars($row['Badge'], ENT_QUOTES, 'UTF-8') . "</span>";
        }
        echo "</h5>";
        echo "<p>" . htmlspecialchars($row['Description'], ENT_QUOTES, 'UTF-8') . " &nbsp&nbsp<span class='text-light'>€ " . htmlspecialchars($row['Price'], ENT_QUOTES, 'UTF-8') . "</span></p>";
        echo "</li>";
    }     
      }     catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
            }
?>
              </ul> 

        </div>


    </div>
</div>

</div>  


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>