<?php 
use Utils\Utils;
use Models\Usuario;
use Models\Categoria;
//<br /><b>Warning</b>:  Undefined variable $datos in <b>C:\xampp\htdocs\PROYECTO_ZESARI\views\clase\crear.php</b> on line <b>21</b><br /><br /><b>Warning</b>:  Trying to access array offset on value of type null in <b>C:\xampp\htdocs\PROYECTO_ZESARI\views\clase\crear.php</b> on line <b>21</b><br />
?>

<main>

    <!-- HEADER CONTENIDO -->
    <div class="header-submenu">
        <div class="overlay">
            <h1>Crear Clase</h1>
        </div>
    </div>
     <!-- MAIN CONTENIDO -->
    <div class="main-contenido">
        <div class="crear"> 
        <?php while($clase = $datos->fetch(PDO::FETCH_OBJ)):?>
            <form id="formularioCrear" style="margin-left: 30px; margin-top:30px" action="<?=$_ENV['base_url']?>clase/crear" method="POST" enctype="multipart/form-data">
                <div class="contenedor">
                    <div class="caja">
                        <p> 
                            <label for="titulo">Titulo: </label>
                            <input type="text" name="data[titulo]" value="<?=$clase->titulo?>">
                        </p>
                        <p> 
                            <label for="precio">Precio: </label>
                            <input type="text" name="data[precio]" value="<?=$clase->precio?>">
                        </p>

                        <p>
                            <label for="cantidad">Cantidad: </label>
                            <input type="number" name="data[cantidad]" value="<?=$clase->cantidad?>">
                        </p>
                    </div>
            
                    <div class="caja"> 
                        <?php $profesores = Usuario::obtenerProfesor(); ?>
                        <p>

                            <label for="profesor">Profesor:</label>
                            <select name="data[id_usuario_profesor]">
                                <option value="selecciona">Selecciona un profesor</option>  
                                <?php while($profe = $profesores->fetch(PDO::FETCH_OBJ)):?>
                                    <option value="<?=$profe->id?>" <?php if($clase->id_usuario_profesor == $profe->id) echo 'selected'?>><?=$profe->nombre?> <?=$profe->apellidos?></option>  
                                <?php endwhile?>

                            </select>

                        </p>

                        <?php $categorias = Categoria::obtenerCategorias(); ?>
                        <p>
                            <label for="categoria">Categoria:</label>
                            <select name="data[id_categoria]">
                            <option value="selecciona">Selecciona una categoría</option>  
                                <?php while($categoria = $categorias->fetch(PDO::FETCH_OBJ)):?>
                                    <option value="<?=$categoria->id?>" <?php if($clase->id_categoria == $categoria->id) echo 'selected'?>><?=$categoria->titulo?></option>  
                                <?php endwhile?>

                            </select>

                        </p>
                    </div>
                </div>
                <div class="contenedor">
                    <input class="insertarDato" type="submit"  name="crear" value="Crear">     
                    <a class="volver" href="<?= $_ENV['base_url'] ?>clase/gestion">Volver</a>
                </div>
            </form>
            <?php endwhile?>
        </div>
    </div>
</main>
