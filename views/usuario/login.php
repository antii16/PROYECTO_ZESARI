<?php  use Utils\Utils; ?>

<main>
<div class="main-contenido">
<div class="container">
      <div class="login-box">
        <h2>Login</h2>
        <form action="<?=$_ENV['base_url']?>usuario/login" method="POST" enctype="multipart/form-data">
          <label for="username">Email</label>
          <input type="text" name="data[email]"  id="username" placeholder="Correo electrónico" required>
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="data[password]" placeholder="Contraseña" required>
          <input type="submit" value="Login" />
        </form>
      </div>
    </div>

</div>
</main>
