<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugueteria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div>
       <?php
       include "menu.php"
       ?>
    </div>
    
    <div class="row row-cols-1 row-cols-md-2 g-4">
    <?php 
    $consulta="SELECT j.nombre, j.costo, j.modelo, j.descripcion, m.nombre, j.id_juguete FROM juguete j inner join marca m on m.id_marca=j.id_marca;
    ";
$mysqli = new mysqli("localhost","root","","jugueteria");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

//$sql = "SELECT Lastname, Age FROM Persons ORDER BY Lastname";

if ($result = $mysqli -> query($consulta)) {
  while ($row = $result -> fetch_row()) {
    printf ("%s (%s)\n", $row[0], $row[1]);
    $nombre=$row[0];
    $costo=$row[1];
    $modelo=$row[2];
    $descripcion=$row[3];
    $marca=$row[4];
    $id_juguete=$row[5];
    ?>
  <div class="col">
    <div class="card">
      <img src="img/<?php echo $id_juguete;?>.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $nombre;?></h5>
        <p class="card-text"><?php echo $descripcion;?></p>
      </div>
    </div>
  </div>
  <?php 
   }
   $result -> free_result();
 }
 
 $mysqli -> close();
  ?>
</div>
</body>
</html>