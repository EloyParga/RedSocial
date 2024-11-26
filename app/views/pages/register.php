<?php

    include_once URL_APP . '/views/custom/header.php';

?>

<div class="container-center center">
    <div class="container-content center">
        <div class="content-acction center">
            <form action="<?php echo URL_PROYECT?>/home/register" method="POST">
                <input type="text" name="usuario" placeholder="Usuario" requiered>
                <input type="email" name="email" placeholder="Email" requiered>
                <input type="password" name="contrasena" placeholder="Contraseña" requiered>
                <button class="btn-purple btn-block">Registrarse</button>
            </form>

            <?php if(isset($_SESSION['usuarioError'])) :?> 
                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                    <?php echo $_SESSION['usuarioError']?>
                    <button type="button" class="btn-close btn-close-alert" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php unset($_SESSION['usuarioError']);
            endif ?>

            <div class="contenido-link mt-2">
                <span class="mr-2">¿Ya tienes cuenta? <a href="<?php echo URL_PROYECT?>home/login">Inicia Sesion</a></span>
            </div>
        </div>

        <div class="content-image center">
            <img src="<?php echo URL_PROYECT ?>public/img/img-registro.png" alt="Mago del codigo 2">
        </div>
        
    </div>
</div>

<?php

    include_once URL_APP . '/views/custom/footer.php';

?>