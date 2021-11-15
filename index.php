<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Todo App</title>
    <!-- BOOTSTRAP 4  -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="editor.css">
  
  </head>
  <body>
<?php 
include('database.php');

$query="SELECT * FROM realizado ORDER BY id desc ";
$result = mysqli_query($connection, $query);
$row=mysqli_fetch_array($result);

 ?>
    <!-- NAVIGATION  -->
      <style type="text/css">
      .info{
        display: none;
        position: fixed;
        width: 100vw;
        height: 100vh;
        background-color: rgba(224, 224, 224, 0.8);
        z-index: 99;
        justify-content: center;
        align-content: center;
        align-items: center;
      }
      .cent{
        display: flex;
        width: 70%;
        height: 70%;
        position: fixed;
        background-color: white;
        flex-direction: column;

      }
      .note {
        width: 100%;
        height: 90px;
        border-bottom: solid 1px;
        justify-content: space-around;
        display: flex;
        flex-direction: column;
      }
      .input{
        width: 100%;
        height: 100%;
        align-items: center;
        justify-content: center;
        display: flex;
        justify-content: space-around;
      }
      .notas{
        height: calc(100% - 90px);
      }
      
       .textt{
        width: 100%;
        overflow-y: scroll;
        height: 90%;
        margin-top: 10px;
      }
      .text{
        width: 80%;
        margin-top: 15px;
        background-color: #f5f5f5;
        margin-left:  15px;      }
    </style>
    <div class="info">
      <div class="cent"> 
          <div class="note">
            <div class="input">
              <label > Agregar nota</label>
              <form id="form">
             <textarea name="txtarea" id="txtarea"></textarea>

             </form>
              <button id="agregar" class=" btn btn-success">agregar</button>
                <select id="select" class="select" name="select">
                    <option selected id="nosotros" value="Nosotros">Nosotros</option>
                    <option id="Ivan"  value="Ivan" >Ivan</option>
                    <option id="juan" value="Juan">Juan</option>
                    <option id="N3" value="N3">N3</option>
                    <option id="otros" value="otros">otros</option>
                    <option id="ayer" value="de-ayer">ayer</option>


                    <option id="resuelto" value="resuelto">Resuelto</option>

                  </select>
              <i style="font-size: 20px;" id="cruz" class="fas fa-times"></i>
            </div>


          </div>
          <div class="notas">
            <div class="textt" id="texto-place"></div>


          </div>



      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Tasks App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <form class="form-inline my-2 my-lg-0">
            <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
          </form>
      </div>
    </nav>

    <div class="container">
      <div class="row p-4">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <!-- FORM TO ADD TASKS -->
              <form id="task-form">
                <div class="form-group">
                  <input type="text" id="name" placeholder="Task Name" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" id="modulo" placeholder="modulo" class="form-control">
                </div>
                <div class="form-group">
                  <textarea id="description" cols="30" rows="10" class="form-control" placeholder="Task Description"></textarea>
                </div>
                <input type="hidden" id="taskId">
                <button type="submit" class="btn btn-primary btn-block text-center">
                  Save Task
                </button>
              </form>
            </div>
          </div>
        </div>

        <!-- TABLE  -->
        <div class="col-md-8">
          <div class="card my-4" id="task-result">
            <div class="card-body">
              <!-- SEARCH -->
              <ul id="container"></ul>
            </div>
          </div>

          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Description</td>
                <td>Estado</td>
                

                <td>Fecha in</td>
                <td>Modulo</td>

              </tr>
            </thead>
            <tbody id="tasks"></tbody>
          </table>
        </div>
      </div>
    </div>
    <div style="display: flex; justify-content: center; width: 100%; flex-direction: column;align-items: center;" id="realizadas" >
      <h2>tareas realizadas</h2>
      <div class="realizados" style="width:70%;">
    <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Description</td>
                <td>Modulo</td>
                <td>Fecha fin</td>
                <td>Fecha in</td>
                 <td>Estado</td>
              </tr>
            </thead>
            <tbody id="tasks2"></tbody>
            <?php

           if (isset($row)) {
            echo ' <thead>
              <tr>
                <td>'.$row['id'].'</td>
                <td>
                <a href="https://asijira.buenosaires.gob.ar/browse/'.$row['name'].'" class="task-item">
                '.$row['name'].'
                </td>
                <td>'.$row['description'].'</td>
                <td>'.$row['modulo'].'</td>
                <td>'.$row['fecha'].'</td>
                <td>'.$row['fecha_in'].'</td>

                <td>'.$row['estado'].'</td>
              </tr>
            </thead>
           
          ';
              while ($row=mysqli_fetch_array($result)){
                echo ' <thead>
              <tr>
                <td>'.$row['id'].'</td>
                <td>
                <a href="https://asijira.buenosaires.gob.ar/browse/'.$row['name'].'" class="task-item">
                '.$row['name'].'

                </td>
                <td>'.$row['description'].'</td>
                <td>'.$row['modulo'].'</td>
                <td>'.$row['fecha'].'</td>
                <td>'.$row['fecha_in'].'</td>
                <td>'.$row['estado'].'</td>
              </tr>
            </thead>
            
         ';

              }
            }



              ?>
           
            <tbody id="tasks"></tbody>
          </table>
  </div>
  
    </div>
    </div>
  
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <!-- Frontend Logic -->
    <script src="app.js"></script>
    <script type="text/javascript" src="editor.js"></script> 
  </body>

</html>
