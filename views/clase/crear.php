<?php 
use Utils\Utils;
use Models\Usuario;
use Models\Categoria;
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
    <div class="alertas">
        <?php 
        if(isset($_SESSION['crear_clase']) && $_SESSION['crear_clase']=='complete') {
            echo "<strong>Clase creada</strong>";
        }

        elseif(isset($_SESSION['crear_clase']) && $_SESSION['crear_clase']=='failed') {
            echo "<strong>Clase no creada</strong>";
        }

        elseif(isset($_SESSION['crear_clase']) && is_array($_SESSION['crear_clase'])){
            foreach($_SESSION['crear_clase'] as $errores) {
                echo "<p><strong style=color:red;> *".$errores."</strong></p>";
            }
        }

        unset($_SESSION['crear_clase']);
        ?>
        <div class="crear"> 
            <form id="formularioCrear" action="<?=$_ENV['base_url']?>clase/crear" method="POST" enctype="multipart/form-data">
                <div class="contenedor">
                    <div class="caja">
                        <p> 
                            <label for="titulo">Titulo: </label>
                            <input type="text" name="data[titulo]" required>
                        </p>
                        <p> 
                            <label for="precio">Precio: </label>
                            <input type="text" name="data[precio]" required>
                        </p>

                        <p>
                            <label for="cantidad">Cantidad: </label>
                            <input type="text" name="data[cantidad]" required>
                        </p>
                    </div>
            
                    <div class="caja"> 
                        <?php $profesores = Usuario::obtenerProfesor(); ?>
                        <p>

                            <label for="profesor">Profesor:</label>
                            <select name="data[id_usuario_profesor]">
                                <option value="selecciona">Selecciona un profesor</option>  
                                <?php while($profe = $profesores->fetch(PDO::FETCH_OBJ)):?>
                                    <option value="<?=$profe->id?>"><?=$profe->nombre?> <?=$profe->apellidos?></option>  
                                <?php endwhile?>

                            </select>

                        </p>

                        <?php $categorias = Categoria::obtenerCategorias(); ?>
                        <p>
                            <label for="categoria">Categoria:</label>
                            <select name="data[id_categoria]">
                            <option value="selecciona">Selecciona una categoría</option>  
                                <?php while($categoria = $categorias->fetch(PDO::FETCH_OBJ)):?>
                                    <option value="<?=$categoria->id?>"><?=$categoria->titulo?></option>  
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
        </div>
    </div>
</main>
