<?php 
use Utils\Utils;

?>

<main>
    <!-- HEADER CONTENIDO -->
    <div class="header-submenu">
        <div class="overlay">
            <h1>Crear usuario</h1>
        </div>
    </div>

    <!-- MAIN CONTENIDO -->

    <div class="main-contenido">

    <div class="alertas">
        <?php 
        if(isset($_SESSION['register']) && $_SESSION['register']=='complete') {
            echo "<strong>Usuario registrado</strong>";
        }

        elseif(isset($_SESSION['register']) && $_SESSION['register']=='failed') {
            echo "<strong>Usuario no registrado</strong>";
        }

        elseif(isset($_SESSION['register']) && is_array($_SESSION['register'])){
            foreach($_SESSION['register'] as $errores) {
                echo "<p><strong style=color:red;> *".$errores."</strong></p>";
            }
        }

        unset($_SESSION['register']);
        ?>
        
        <div class="crear"> 
            <form  id="formularioCrearUsuario" action="<?=$_ENV['base_url']?>usuario/registro" method="POST" enctype="multipart/form-data">
            <div class="caja">
                <fieldset>
                    <legend> Datos obligatorios </legend>
                    <p> 
                        <label for="nombre">Nombre: </label>
                        <input type="text" name="data[nombre]" required>
                    </p>
                    <p> 
                        <label for="apellidos">Apellidos: </label>
                        <input type="text" name="data[apellidos]" required>
                    </p>

                    <p> 
                        <label for="email">Email: </label>
                        <input type="email" name="data[email]" required>
                    </p>

                    <p>
                        <label for="rol">Rol: </label>
                        <select name="data[rol]" id="">
                            
                            <option value="cliente"  selected="true">Cliente</option>
                            <?php if (isset($_SESSION['admin'])) : ?>
                            <option value="empleado">Empleado</option>
                            <option value="admin">Administrador</option>
                            <?php endif; ?>
                        </select>
                    </p>

                </fieldset>
            </div>    
            <div class="caja">
                <input type="submit" name="registrar"  value="Dar de alta" class="btn btn-primary">
                <a href="<?=$_ENV['base_url']?>usuario/gestion">Volver</a>
            </div>  
            </form>

        </div>
    </div>
</main>