


<main>

<h1>Tu perfil</h1>

<div class="cajaPerfil">

<div>
<img class="imagen-perfil" src="<?=$_ENV['base_url']?>src/img/<?=$_SESSION['identity']->imagen?>" alt="">
<img class="imagen-perfil" src="<?=$_ENV['base_url']?>src/img/" alt="">

<h2><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h2>
<a href="<?=$_ENV['base_url']?>usuario/editar">Editar datos</a>
</div>

<div>
    
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Clase</th>
                <th>Alumnos</th>
            </tr>
        </thead>
        <tbody>

            <tr>
<td></td>
            </tr>
        </tbody>
    </table>
</div>

</div>



<div class="cajaPerfil">

</div>


</main>