<?php  use Utils\Utils; ?>

<main>
<div class="main-contenido">
<div class="contenedor-login">
    <h1>Iniciar Sesión</h1>
    <form action="<?=$_ENV['base_url']?>usuario/login" method="POST" enctype="multipart/form-data">
        <p>
            <input type="text" name="data[email]" placeholder="Correo electrónico" required>
        </p>
        <p>
            <input type="password" name="data[password]" placeholder="Contraseña" required>
        </p>

        <input type="submit"  value="Login" class="btn btn-primary">

    </form>

<div>
</div>
</main>
