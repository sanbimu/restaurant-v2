<?php 
session_start();
include('database.php');

if (isset($_POST['id'])) {
    $queryDrinks = "DELETE FROM `menu-drinks` WHERE id = :id";
    $queryFood = "DELETE FROM `menu-food` WHERE id = :id";
    $stmt = $connection->prepare($queryDrinks. ';' .$queryFood);
    $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
    $stmt->execute();
}

if(isset($_POST['Drink'], $_POST['Badge'], $_POST['Description'], $_POST['Price'])){
        $query = "INSERT INTO `menu-drinks` (`Drink`, `Badge`, `Description`, `Price`) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($query);
        $stmt->execute([$_POST['Drink'], $_POST['Badge'], $_POST['Description'], $_POST['Price']]);
}


if(isset($_POST['Food'], $_POST['Badge'], $_POST['Description'], $_POST['Price'])){
    $query = "INSERT INTO `menu-food` (`Food`, `Badge`, `Description`, `Price`) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->execute([$_POST['Food'], $_POST['Badge'], $_POST['Description'], $_POST['Price']]);
}

?>  

<!---------- HEAD ------------->

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    
        <title>The house of tea back office</title>
        
        <link rel='stylesheet' type='text/css' media='screen' href='backoffice.css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
       <!-- Favicon -->
    
       <link rel="icon" href="icon.png" type="image/png" />
       
       <!-- Google Fonts -->
    
       <style> @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap'); </style>
       <style> @import url('https://fonts.googleapis.com/css2?family=Aboreto&family=Source+Sans+Pro:wght@300&display=swap');</style>
       
    </head>
<body>
  
    <div class="container" id="containerOne">
        <div class="row">
          <div class="col-10">


<!---------- DRINKS ------------->


<?php
    $query = "SELECT * FROM `menu-drinks`";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h5 class= "titleDrinks">Menu Drinks</h5>
    <table class="table" id="tableDrinks">
        <thead>
            <tr>
                <th scope="col" class= "colidd">ID</th>
                <th scope="col" class= "coldrink">Drink</th>
                <th scope="col" class= "colbadged">Badge</th>
                <th scope="col" class= "coldescd">Description</th>
                <th scope="col" class= "colpriced">Price</th>
                <th scope="col" class= "coldeleted">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row['Drink'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row['Badge'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row['Description'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row['Price'], ENT_QUOTES, 'UTF-8') . "</td>";
            ?>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            <?php               
                echo "</tr>";
            }
            ?>
            <tr>
                    <form method="post">
                        <td></td>
                        <td>
                            <input type="hidden" name="Drink" value="<?php htmlspecialchars($row['Drink'], ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="text" name="Drink" value="" required>
                        </td>
                        <td>
                            <input type="hidden" name="Badge" value="<?php htmlspecialchars($row['Badge'], ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="text" name="Badge" value="" >
                        </td>
                        <td>
                            <input type="hidden" name="Description" value="<?php htmlspecialchars($row['Description'], ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="text" name="Description" value="" required>
                        </td>
                        <td>
                            <input type="hidden" name="Price" value="<?php htmlspecialchars($row['Price'], ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="text" name="Price" value="" required></td>
                        <td>
                            <input type="submit" value="Insert" class="btn btn-dark">
                        </td>
                    </form>
            </tr>
        </tbody>
    </table>


<!---------- FOOD ------------->


<?php
    $query = "SELECT * FROM `menu-food`";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h5 class= "titleFood">Menu Food</h5>
    <table class="table" id="tableFood">
        <thead>
            <tr>
                <th scope="col" class= "colidf">ID</th>
                <th scope="col" class= "colfood">Food</th>
                <th scope="col" class= "colbadgef">Badge</th>
                <th scope="col" class= "coldescf">Description</th>
                <th scope="col" class= "colpricef">Price</th>
                <th scope="col" class= "coldeletef">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row['Food'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row['Badge'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row['Description'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row['Price'], ENT_QUOTES, 'UTF-8') . "</td>";
                ?>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            <?php               
                echo "</tr>";
            }
            ?>
            <tr>
                    <form method="post">
                        <td></td>
                        <td>
                            <input type="hidden" name="Food" value="<?php htmlspecialchars($row['Food'], ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="text" name="Food" value="" required>
                        </td>
                        <td>
                            <input type="hidden" name="Badge" value="<?php htmlspecialchars($row['Badge'], ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="text" name="Badge" value="" >
                        </td>
                        <td>
                            <input type="hidden" name="Description" value="<?php htmlspecialchars($row['Description'], ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="text" name="Description" value="" required>
                        </td>
                        <td>
                            <input type="hidden" name="Price" value="<?php htmlspecialchars($row['Price'], ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="text" name="Price" value="" required>
                        </td>
                        <td>
                            <input type="submit" value="Insert" class="btn btn-dark">
                        </td>
                    </form>
            </tr>
        </tbody>
    </table>

        </div>
      </div>
    </div>

</body>
</html>