<?php

include('database.php');

if(isset($_POST['id'])) {
 
  $id = $_POST['id'];
   
  $query="SELECT * FROM task where id = $id ";
$result = mysqli_query($connection, $query);
$row=mysqli_fetch_array($result);

$notas =$row['notas'];
if ($notas !="") {
 $resultado = $notas."|".$row['estado'];

  if (!$result) {
    die('Query Failed.');
    echo "fail";
  }
  else{ echo $resultado;}
 

}


else{
  echo "NNo hay notas que buscar";
}
}

?>
