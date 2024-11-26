<?php

    include_once URL_APP . '/views/custom/header.php';

    include_once URL_APP . '/views/custom/navbar.php';

   
?>

<div class="container-center center">
    <div class="container-content center">
        <div class="content-image center">
            <img src="<?php echo URL_PROYECT ?>public/img/img-log.png" alt="Mago del codigo">
        </div>

        <div class="content-acction center">
             <form action="<?php echo URL_PROYECT . 'home/login'; ?>" method="POST">
                <input type="text" name="usuario" placeholder="Usuario" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button class="btn-purple btn-block" whe>Iniciar Sesion</button>
            </form>
            <!--Alerta de usuario o contraseña incorrectos-->
            <?php if(isset($_SESSION['errorLogin'])) :?>
                <div class="alert alert-danger alert-dismissible fade show w-100 mt-2 mb-2" role="alert">
                    <?php echo $_SESSION['errorLogin']?>
                    <button type="button" class="btn-close btn-close-alert" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['errorLogin']);
            endif ?>
            
            <!--Alerta Registro exitoso-->
            <?php if(isset($_SESSION['loginComplete'])) :?>
                <div class="alert alert-success alert-dismissible fade show w-100 mt-2 mb-2" role="alert">
                    <?php echo $_SESSION['loginComplete']?>
                    <button type="button" class="btn-close btn-close-alert" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php unset($_SESSION['loginComplete']);
            endif ?>

            <div class="contenido-link mt-2">
                <span class="mr-2">¿No tienes cuenta? <a href="<?php echo URL_PROYECT?>home/register">Registrate</a></span>
            </div>
        </div>
        
    </div>
</div>

<?php

    include_once URL_APP . '/views/custom/footer.php';

?>