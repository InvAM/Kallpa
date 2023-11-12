<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica qué botón fue presionado
    if (isset($_POST["accion"])) {
        $accion = $_POST["accion"];
        $generarOrdenI = new GenerarOrdenI();
        // Ejecuta el método correspondiente según el valor del botón
        switch ($accion) {
            case "generarOrden":
                $generarOrdenI->registrarOrden(); // Llama al método render de la clase GenerarOrdenI
                break;
            case "limpiar":
                $generarOrdenI->limpiar(); // Función asociada al segundo botón
                break;
            case "volver":
                $generarOrdenI->volver(); // Función asociada al segundo botón
                break;
            case "asignarTecnico":
                $generarOrdenI->asignarTecnico(); // Función asociada al segundo botón
                break;
            case "visualizar":
                $generarOrdenI->visualizar(); // Función asociada al segundo botón
                break;
            // Agrega más casos según sea necesario
            default:
                $generarOrdenI->render(); // Llama al método render de la clase GenerarOrdenI
                break;
        }
    }
}

class GenerarOrdenI extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function render()
    {   
        
        $this->view->render('generarOrdenI/formGenerarOrdenI');
    }

    function registrarOrden(){
        echo '<script>';
        echo 'console.log("Registro exitoso");';
        echo '</script>';
    }

    function volver(){
        header("Location: menu");
        exit();
    }

    function limpiar(){
        echo '<script>';
        echo 'console.log("Limpiando");';
        echo '</script>';
    }

    function asignarTecnico(){
        header("Location: tecnico");
        exit();
    }

    function visualizar(){
        echo '<script>';
        echo 'console.log("visualizando");';
        echo '</script>';
    }
}
