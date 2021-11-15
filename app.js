$(document).ready(function() {
  // Global Settings
  let edit = false;

  // Testing Jquery
  console.log('jquery is working!');
  fetchTasks();
  $('#task-result').hide();


  // search key type event
  $('#search').keyup(function() {
    if($('#search').val()) {
      let search = $('#search').val();
      $.ajax({
        url: 'task-search.php',
        data: {search},
        type: 'POST',
        success: function (response) {
          if(!response.error) {
            let tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task => {
              template += `
                     <li><a href="#" class="task-item">${task.name}</a></li>
                    ` 
            });
            $('#task-result').show();
            $('#container').html(template);
          }
        } 
      })
    }
  });

  $('#task-form').submit(e => {
    e.preventDefault();
    const postData = {
      name: $('#name').val(),
      modulo: $('#modulo').val(),
      description: $('#description').val(),
      id: $('#taskId').val()
    };
    const url = edit === false ? 'task-add.php' : 'task-edit.php';
    console.log(postData, url);
    $.post(url, postData, (response) => {
      console.log(response);
      $('#task-form').trigger('reset');
      fetchTasks();
    });
  });

  // Fetching Tasks
  function fetchTasks() {
    $.ajax({
      url: 'tasks-list.php',
      type: 'GET',
      success: function(response) {
        const tasks = JSON.parse(response);
        let template = '';
        tasks.forEach(task => {
          template += `
                  <tr taskId="${task.id}">
                  <td>${task.id}</td>
                  <td>
                  <a href="https://asijira.buenosaires.gob.ar/browse/${task.name}" class="task-item">
                    ${task.name} 
                  </a>
                  </td>
                  <td><pre>${task.description}</pre></td>
                  <td>${task.estado}</td>
                  <td>${task.fecha}</td>
                  <td>${task.modulo}</td>


                  
                  <td style="display:flex; justify-content:center; flex-direction:column;">
                    <button class="task-delete btn btn-danger">
                     Delete 
                    </button>
                    <button class="task-info btn btn-info">
                      Notas
                    </button>
                  </td>
                  </tr>
                `
        });
        $('#tasks').html(template);
        
      }
    });

  }

  // Get a Single Task by Id 
  $(document).on('click', '.task-item', (e) => {
    const element = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(element).attr('taskId');
    $.post('task-single.php', {id}, (response) => {
      const task = JSON.parse(response);
      $('#name').val(task.name);
      $('#description').val(task.description);
      $('#taskId').val(task.id);
      edit = true;
    });
    e.preventDefault();
  });

  // Delete a Single Task
  $(document).on('click', '.task-delete', (e) => { // le digo que ejecute lo siuiente cuando la clase task-delete sea clickeada
    if(confirm('Are you sure you want to delete it?')) { // pregunto si esta seguro de querer eliminar
      const element = $(this)[0].activeElement.parentElement.parentElement; // esto no haria falta pero guarda en una variable el objeto donde se encuentra el id Relacionado con la BBDD
      const id = $(element).attr('taskId'); // saco del html el atributo taskid Que tiene el id al cual debo modificar
      $.post('task-delete.php', {id}, (response) => { // con esto genero una peticion hacia "task-delete.php" que dberia ser tu archivo php que haga la accion de borrar modificar etc, tambien le paso la variable id definida arriba
        fetchTasks(); // ignorar
        console.log(response);  //imprimo lo que devuelve task-delete.php
      });
    }
  });
  var actual
   $(document).on('click', '.task-info', (e) => {
        
        $('.info').css("display","flex");

        
            const element = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(element).attr('taskId');
      actual=id;
      
      
      $.post('traer-notas.php', {id}, (response) => {

 
        
        var respuesta = response.substr(1);
        var div=respuesta.split("|");
        var cadena= div[0].split("&");
        //var estado = ${task.estado};
        for (var i =0; i <cadena.length; i++) {
          $("#texto-place").append('<pre class="text"> '+cadena[i]+'</pre>');
          
        }
        $("#"+div[1]).attr("selected","true");
        console.log(div[1]);
      });
    
  });
   // Agrego notas con el boton
   $("#agregar").click(function(){
        var txt=$('#txtarea').val();
        
         console.log(select)
     
        $.post('task-notas.php', {actual,txt}, (response) => {

        if(response=="yes"){
          $("#texto-place").append('<pre class="text"> '+txt+'</pre>');
        }
        console.log(response);
      });
       



   })
   // agrego notas con el oncehnge del select
   $("#select").change(function(){
     var select=$('.select').val();
 $.post('task-notas.php', {actual,select}, (response) => {

        if(response=="yes"){
          $("#texto-place").append('<p class="text"> '+txt+'</p>');
        }
        console.log(response);
      });
   })
  

   $("#cruz").click(function(){
        $('.text').remove();
        $('.info').css("display","none");
        



   })
   

});

 