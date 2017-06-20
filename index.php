<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PhpMailPerARoger</title>
  </head>
  <body>

    <div id="contingut">
      <h3>Si te atrae la tecnología, tienes carácter eminentemente comercial, don de gentes y capacidad de negociación</h3>
      <h3> envíanos tu CV y correo de presentación y nos pondremos en contacto contigo.</h3>
      <br>
      <h3>Queremos con nosotros a los mejores profesionales.</h3>
      <br>
      <form class="form-container" action="treballa_amb_nosaltres.php" method="post" enctype="multipart/form-data">
          <div>
              <input class="form-input" name="nombre" type="text" id="name" placeholder="Nombre y Apellidos" required/>
          </div>

          <div>
              <input class="form-input" name="asunto" type="text" id="asunto" placeholder="Asunto" required/>
          </div>

          <div>
              <input class="form-input" name="mail" type="email" id="mail" placeholder="Correo electronico" />
          </div>
          <div>
              <input class="form-input" name="telefono" type="text" placeholder="Telefono">
          </div>

          <div>
              <textarea name="menssage" rows="8" cols="80" placeholder="Menssage ..."></textarea>
          </div>

              <div>
              <input class="archivo" name="archivo" type="file" accept="application/pdf">
              </div>
          <div>
              <input class="enviar" name="enviar" type="submit" value="Enviar">
          </div>
      </form>
    </div>

  </body>
</html>
