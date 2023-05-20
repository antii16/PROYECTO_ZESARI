<?php  use Utils\Utils; ?>

<?php if(isset($_SESSION['login']) && $_SESSION['login']=='failed'):?>
    <strong class="alert_red">Login fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php unset($_SESSION['login']);?>


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

