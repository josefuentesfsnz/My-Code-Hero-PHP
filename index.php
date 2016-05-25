<?php
  require 'conexion.php';

  // hacemos el query para buscar a todas las personas que tengamos creadas en la base de datos
  $sql = "SELECT * FROM personas";

  if(!$resultado = $db->query($sql))
  {
    die('Ocurrio un error ejecutando el query [' . $db->error . ']');
  }
  $db->close();
?>

<div class="container">
    <div class="jumbotron">
      <h1>Lista de personas</h1>
    </div>
    <table class="table" id="tabla">
      <thead>
        <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Sexo</th>
        <th>&nbsp</th>
      </tr>
      </thead>
        <tbody>
          <?php  
          // Creamos la tabla con los campos que queremos mostrar de las personas
          // Iteramos a través de los resultados que nos devolvió la consulta
          // Le colocamos un id a cada fila para cuando las vayamos a eliminar con jQuery
          // La acción de eliminar la llamamos a través de un evento onclick e indicando el id a eliminar
            while($fila = $resultado->fetch_assoc())
            {
              echo '
                <tr id="fila_'.$fila['id'].'">
                  <td>'.$fila['id'].'</td>
                  <td>'.$fila['nombre'].'</td>
                  <td>'.$fila['correo'].'</td>
                  <td>'.($fila['sexo'] == 1 ? 'M':'F').'</td>
                  <td><a onclick="eliminar('.$fila['id'].')">Eliminar</a></td>
                </tr>';
            }
          ?>
      </tbody>
  </table>
  
  <!--
  Creamos el formulario que vamos a enviar para crear una persona
  Este formulario lo vamos a enviar por AJAX con jQuery y por eso le colocamos un id
  La dirección a donde se enviara el formulario va en el código de jQuery y no en el formulario
  -->
</div>
<!-- link para importar jQuery a nuestro proyecto -->
  <script src="https://code.jquery.com/jquery.js">
  </script>
<!-- link con el archivo JavaScript de bootstrap -->
    
    <script src="js/bootstrap.min.js"></script>

      <script type="text/javascript">
      // Esta primera función agrega un disparador de  evento a la acción submit,
      // esto quiere decir que cuando se presione el botón de submit del formulario
      // con id 'formulario' entonces se ejecutara el código contenido en el.
      $( "#formulario" ).submit(function( event )
      {
        event.preventDefault();
        // Como estamos enviamos un formulario, la acción a realizar por AJAX debe ser post.
        // Vamos a ver los parámetros que necesita el método $.post de jQuery para funcionar
        // 1. Dirección a donde se va a enviar el formulario por medio de POST
        // 2. Datos del formulario, la función serializa() convierte el formulario en una cadena de texto
        // 3. Función que se ejecutara cuando se reciba la respuesta del servidor.

    $.post('agregar.php',$('#formulario').serialize(), function(data)
    {

    // Si todo salió bien en el servidor se devolvera éxito => true y se ejecutara el else
    // pero si algo salió mal entonces se mostrar una alerta con el mensaje error
    if (data.exito != true){
    alert('Error');
    }else{

    // Si la persona se creo bien en la base de datos entonces insertamos una fila
    // con su información al final de la tabla
    $('#tabla tr:last').after(
    '<tr id="fila_'+data.id+'">'+
    '<td>'+data.id+'</td>'+
    '<td>'+data.nombre+'</td>'+
    '<td>'+data.correo+'</td>'+
    '<td>'+data.sexo+'</td>'+
    '<td><a onclick="eliminar('+data.id+')">Eliminar</a></td>'+
    '</tr>'
    );
    }
    });

    });

    //Esta es la función que se llama al eliminar una persona de la tabla
    function eliminar(id){

    // con el método $.get hacemos una petición GET mediante AJAX con jQuery
    // 1. El primer parámetro es la dirección a donde se va a hacer la petición y los parámetros de la misma
    // en este caso el parámetro será el id de la persona que se va a eliminar.                 // 2. El segundo parámetro es la función que se va a ejecutar cuando se reciba la respuesta del servidor
    $.get('eliminar.php?id='+id,
    function(data){
    if (data.exito != true){
    alert('Error');
    }else{
    // si la respuesta fue exitosa entonces eliminamos la fila de la tabla
    $('#fila_'+id).remove();
    }
    });
    }
</script>