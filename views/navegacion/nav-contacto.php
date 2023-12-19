<main>
    <!-- HEADER CONTENIDO -->
    <div class="header-secundario-blog">
        <div class="overlay">
            <h1>Contacta con nosotros</h1>
        </div>
    </div>

    <div class="main-contenido">
        <div class="alertas">
            <?php 
            if(isset($_SESSION['email_enviado']) && $_SESSION['email_enviado']=='complete') {
                echo "<strong>Pronto nos pondremos en contacto contigo</strong>";
            }

            elseif(isset($_SESSION['email_enviado']) && $_SESSION['email_enviado']=='failed') {
                echo "<strong>Email no enviado. Fijate en los campos</strong>";
            }

            unset($_SESSION['email_enviado']);
            ?>
        </div>
        <div id="contact">
            <div class="mensaje">
                <form action="<?=$_ENV['base_url']?>usuario/contactar" method="POST" enctype="multipart/form-data">
                    <p>
                        <input type="text" name="data[nombre]" placeholder="Nombre" required>
                    </p>
                    <p>
                        <input type="email" name="data[email]" placeholder="Email" value="alvareznella45@gmail.com" required>
                    </p>
                    <p>
                        <textarea name="data[mensaje]" rows="10" cols="50" required>Escribe tu mensaje</textarea>
                    </p>
                    <p>
                        
                        <input type="submit" value="Enviar" />
                    </p>
                </form>
            </div>

            <div class="mensaje">
                <div id="datos">
                    <ul>
                        <li><span>Dirección: </span> Avenida Constitución 20, local 119, 18012 Granada</li>
                        <li><span>Telefono:</span> 666-888-999</li>
                        <li><span>E-mail:</span> pilatescentrosalud@gmail.com</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>




</main>