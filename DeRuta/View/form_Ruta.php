<?php

include_once '../Model/funcionesBD.php';

  include "cabecera.php";
  include "../Controller/controlAdmin.php";
?>

    <div class="ruta">
        <h2>Registro ruta</h2>
        <form action="../Model/uploader.php" method="post" class="form" enctype="multipart/form-data">
            <div> 
                <label for="nombre">Nombre ruta (*)</label> 
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div> 
                <label for="distancia">Kms (*)</label> 
                <input type="number" id="distancia" min="0" name="distancia" required>
            </div>

             <div> 
                <label for="ubicacion">Ubicación (*)</label> 
                <input type="text" id="ubicacion" name="ubicacion" required>
            </div> 

             <div>
                <label> Dificultad ruta</label>
                <select name="Dificultad" required>    
                    <option value="Baja">Baja</option>    
                    <option value="Moderada" selected>Moderada</option> 
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <div>
                <label>Selecciona una foto: </label>
                <input type="hidden" name="MAX_FILE_SIZE" value="150000000" />
                <!-- Imagen de tamaño máximo para incluir GIFS. Es en bytes.  -->
                <input type="file" name="foto_subida" id="foto_subida"/><br>  
            </div>
            <div>
                <input type="submit" value="Registra ruta">
            </div> 
        </form>
    </div>
