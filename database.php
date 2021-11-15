<?php

$connection = mysqli_connect(
  'localhost', 'root', '', 'task'
);

// for testing connection
#if($connection) {
#  echo 'database is connected';
#}

?>
