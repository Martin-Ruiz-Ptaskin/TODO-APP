<?php

include('database.php');

if(isset($_POST['id'])) {
 
  $id = $_POST['id'];
  $query="SELECT * FROM task where id = $id ";
$result = mysqli_query($connection, $query);
$row=mysqli_fetch_array($result);
$name =$row['name'];
$description= $row['description'];
$estado= $row['estado'];
$fecha_in= $row['fecha'];
$modulo= $row['modulo'];
$notas= $row['notas'];



$hoy = date("j, n, Y");
 $insert= "INSERT INTO `realizado`( `name`, `description`, `fecha`,`estado`, `fecha_in`, `modulo`) VALUES ('$name','$description','$hoy','$estado','$fecha_in','$modulo')";
$result3 = mysqli_query($connection, $insert);

  
  $query2 = "DELETE FROM task WHERE id = $id"; 
  $result2 = mysqli_query($connection, $query2);

  if (!$result or !$result2 or !$result3) {
    die('Query Failed.');
  }
  echo "Task Deleted Successfully";  

}

?>
