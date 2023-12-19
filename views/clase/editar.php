<?php 
use Utils\Utils;
use Models\Usuario;
use Models\Categoria;
?>

<main>

    <!-- HEADER CONTENIDO -->
    <div class="header-submenu">
        <div class="overlay">
            <h1>Editar Clase</h1>
        </div>
    </div>
     <!-- MAIN CONTENIDO -->
    <div class="main-contenido">
    <div class="alertas">
    <?php 
    if(isset($_SESSION['editar_clase']) && $_SESSION['editar_clase']=='complete') {
        echo "<strong>Clase editada</strong>";
    }

    elseif(isset($_SESSION['editar_clase']) && $_SESSION['editar_clase']=='failed') {
        echo "<strong>Clase no editada</strong>";
    }
    elseif(isset($_SESSION['editar_clase']) && is_array($_SESSION['editar_clase'])){
        foreach($_SESSION['editar_clase'] as $errores) {
            echo "<p><strong style=color:red;> *".$errores."</strong></p>";
        }
    
    }
    unset($_SESSION['editar_clase']);
    ?>
    </div>
        <div class="crear"> 
        <?php while($clase = $datos->fetch(PDO::FETCH_OBJ)):?>
            <form id="formularioCrear" action="<?=$_ENV['base_url']?>clase/editar/<?=$clase->id?>" method="POST" enctype="multipart/form-data">
                <div class="contenedor">
                    <div class="caja">
                        <p> 
                            <label for="titulo">Titulo: </label>
                            <input type="text" name="data[titulo]" value="<?=$clase->titulo?>" required>
                        </p>
                        <p> 
                            <label for="precio">Precio: </label>
                            <input type="text" name="data[precio]" value="<?=$clase->precio?>" required>
                        </p>

                        <p>
                            <label for="cantidad">Cantidad mensual: </label>
                            <input type="number" name="data[cantidad]" value="<?=$clase->cantidad?>" required>
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
                    <input class="editar2" type="submit"  name="crear" value="Editar">     
                    <a class="volver" href="<?= $_ENV['base_url'] ?>clase/gestion">Volver</a>
                </div>
            </form>
            <?php endwhile?>
        </div>
    </div>
</main>
