<?php
  include "head.php";
?>

<div class=registro>
    <h2>Registro usuario</h2>
    <form action="#" method="post" class="form">
        <div> 
        	<label for="usuario">Usuario (*)</label>
            <input type="text" name="usuario" id="usuario" pattern="[A-Za-z]{3,10}" oninvalid="alert('El nombre de Usuario debe tener entre 3 y 15 letras.');" required /> 
            
        </div>
        <div> 
            <label>Password (*)</label>
            <input type="password" name="pass" id="pass" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="alert('El Password debe tener un mínimo de 8 carácteres alfanuméricos. Se requiere un número, una letra mayúscula y una minúscula.')" required />
        </div> 
        
        <div>
            <label>Nombre (*)</label>
            <input type="text" name="nombre" id="nombre" pattern="[A-Za-z]+{3,30}" oninvalid="alert('El Nombre debe tener entre 3 y 15 letras.')" required />
        </div>
         <div>
             <label>Apellidos</label>
             <input type="text" name="apellidos" id="apellidos" pattern="[A-Za-z]+{3,30}"/>
             
         </div>
         <div> 
            <label for="email">Email (*)</label> 
            <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"/>
        <BR><BR>
        </div>
        <div>
            <input type="submit"  name="Entrar" value="Entrar">
        </div>
        <a href="../Controller/index.php">Volver a Inicio</a> 
    </form>
</div>