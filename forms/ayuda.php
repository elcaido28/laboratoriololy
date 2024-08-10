<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/805c37e370.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  </head>
  <body>

<style media="screen">
* {  box-sizing: border-box; }
body{
  background: #ebe9e9;
    background-image: url(images/fond_todo.jpg);
    background-size: cover;
    background-position: 0px 0px;
    background-repeat: no-repeat;
}
.acordeon {
  margin-top: 30px;
}
.acordeon input {
  display: none;
}

.acordeon__titulo {
  display: block;
  padding: 15px;
  background: #3c8dbc;
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  border-bottom: 1px solid #fff;
}
.acordeon__titulo:hover {
  background: #17587e;
}
.acordeon__titulo i{
  margin-right: 20px;
}
.acordeon__contenido {
  height: 0;
  overflow: hidden;
  margin: 0;
  transition: all 0.5s;
}
.acordeon input:checked ~ .acordeon__contenido{
  height: auto;
  margin: 10px 0;
}
</style>
<div class="acordeon">
            <div class="acordeon__item">
                <input type="radio" name="acordeon" id="item1">
                <label for="item1" class="acordeon__titulo"> <i class="fas fa-angle-down"></i> Manejo de la aplicación</label>
                <p class="acordeon__contenido"><i class="fas fa-minus"></i> Lista Examenes </p>
                <p class="acordeon__contenido">Tendrá para descargar todos los resultados de los examenes de los ultimos 3 meses.</p>
                <p class="acordeon__contenido"><i class="fas fa-minus"></i> Cotización  </p>
                <p class="acordeon__contenido">Podrá seleccionar todos los reactivos que se indican en su hoja de petición de examenes y luego precionar el boton <b>Calcular Cotizacion</b> para visualizar el costo a pagar por su examen.</p>
                <p class="acordeon__contenido"><i class="fas fa-minus"></i> Perfil </p>
                <p class="acordeon__contenido">Mostrará su informacion basica, adicional podra actualizar o hacer cambio de contraseña. </p>

            </div>
            <div class="acordeon__item">
                <input type="radio" name="acordeon" id="item2">
                <label for="item2" class="acordeon__titulo"><i class="fas fa-angle-down"></i> Reclamos y Quejas</label>
                <p class="acordeon__contenido">Se recomienda redarctar un correo detallado de sus inconformidades, tambien adjuntar imagenes o videos y enviarlo al Email <b>reclamos@laboratoriololy.com</b> tendra una respuesta en las proximas 72 horas. </p>
            </div>
            <div class="acordeon__item">
                <input type="radio" name="acordeon" id="item3">
                <label for="item3" class="acordeon__titulo"><i class="fas fa-angle-down"></i>¿No puedo ver  Examenes?</label>
                <p class="acordeon__contenido">Si le indica que debe hacercarse al laboratorio no podrá descargar los resultados del examen, estos solo seran entregados en el laboratio para guardar la confidencialidad doctor - paciente .</p>
            </div>
        </div>



  </body>
</html>
