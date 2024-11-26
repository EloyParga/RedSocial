<?php

class Home extends Controller {

    private $usuario;

    public function __construct() {
        $this->usuario = $this->model('usuario');
    }

    public function index() {
        if (isset($_SESSION['logueado'])) {
            $this->view('pages/home');
        }else{
            redirection('home/login');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datosLogin = [
                'usuario' => trim($_POST['usuario']),
                'contrasena' => trim($_POST['contrasena']),
            ];
    
            $datosUsuario = $this->usuario->getUsuario($datosLogin['usuario']);

            //var_dump($datosUsuario);
    
            if ($datosUsuario) {
                if ($this->usuario->verificarContrasena($datosUsuario, $datosLogin['contrasena'])) {
                    $_SESSION['logueado'] = $datosUsuario->fk_idPrivilegio;
                    redirection('home');

                } else {
                    $_SESSION['errorLogin'] = 'Contraseña incorrecta';
                    redirection('/home');
                }
            } else {
                $_SESSION['errorLogin'] = 'Usuario incorrecto';
                redirection('/home');
            }
        } else {

            if(isset($_SESSION['logueado'])) {
                redirection('/home');
            }else{

                $this->view('pages/login');
            }

        }
    }
    
    public function register(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $datosRegistro= [
                'privilegio'=> '2',
                'email'=> trim($_POST['email']),
                'usuario'=> trim($_POST['usuario']),
                'contrasena' => password_hash(trim($_POST['contrasena']), PASSWORD_DEFAULT), // Cifrado correcto
            ];

            if ($this->usuario->verificarUsuario($datosRegistro)) {
                if($this->usuario->register($datosRegistro)){
                    $_SESSION['loginComplete'] = '¡Enhorabuena! Ya puedes iniciar sesion';
                    redirection('/home');
                }else{
                    
                }
            }else{
                $_SESSION['usuarioError'] = 'El usuario ya existe. Elige otro nombre de usuario';
                $this->view('pages/register');
            }
        }else{
            $this->view('pages/register');
        }
    }

    public function logout(){
        session_start();

        $_SESSION = [];

        session_destroy();

        redirection('/home');
    }
}