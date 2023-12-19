<?php 
use Utils\Utils;
use Models\Categoria;
use Models\Horario;
?>

<main>
<!-- HEADER CONTENIDO -->
<div class="header-submenu">
        <div class="overlay">
        <h1>Editar Horario</h1>
        </div>
    </div>
     <!-- MAIN CONTENIDO -->

     
<div class="main-contenido">
<div class="alertas">
<?php 
if(isset($_SESSION['editar_horario']) && $_SESSION['editar_horario']=='complete') {
    echo "<strong>Horario editado</strong>";
}

elseif(isset($_SESSION['editar_horario']) && $_SESSION['editar_horario']=='failed') {
    echo "<strong>Horario no editado</strong>";
}

elseif(isset($_SESSION['editar_horario']) && is_array($_SESSION['editar_horario'])){
    foreach($_SESSION['editar_horario'] as $errores) {
        echo "<p><strong style=color:red;> *".$errores."</strong></p>";
    }
}

unset($_SESSION['editar_horario']);
?>
</div>
<div class="crear"> 

<form id="formularioCrear" action="<?=$_ENV['base_url']?>horario/editar" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <th>ID</th>
            <th>Fecha y hora</th>
            <th>Categoría</th>
            <th>Aforo disponible</th>  
        </tr>
        <?php $horarios = Horario::obtenerHorario(); ?>
        <?php while($horario = $horarios->fetch(PDO::FETCH_OBJ)):?>
        <tr>
            <td><input type="text" name="data[id][]" value="<?=$horario->id?>" required readonly></td>
            <td><input type="datetime-local" name="data[fecha][]" value="<?=$horario->fecha?>" required></td>
            
            <td>
            <?php $categorias = Categoria::obtenerCategorias(); ?>
            <select name="data[id_categoria][]">
            <option value="selecciona">Selecciona una categoría</option>  
            <?php while($categoria = $categorias->fetch(PDO::FETCH_OBJ)):?>
                <option value="<?=$categoria->id?>" <?php if($horario->id_categoria == $categoria->id) echo 'selected'?>><?=$categoria->titulo?></option>  
            <?php endwhile?>

        </select>
            </td>
            <td><input type="text" name="data[aforo_disponible][]" value="<?=$horario->aforo_disponible?>" required></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <div class="contenedor">
        <input class="editar2" type="submit"  name="crear" value="Editar">
        <a class="volver" href="<?= $_ENV['base_url'] ?>horario/gestion">Volver</a>
</div>

        
</form>

</div>
</div>

</main>