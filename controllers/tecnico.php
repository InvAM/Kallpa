<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica qué botón fue presionado
    if (isset($_POST["accion"])) {
        $accion = $_POST["accion"];
        $tecnico = new Tecnico();
        // Ejecuta el método correspondiente según el valor del botón
        switch ($accion) {
            case "seleccionar":
                $tecnico->seleccionar(); 
                break;
            case "limpiar":
                $tecnico->render(); // Función asociada al segundo botón
                break;
            case "volver":
                $tecnico->volver(); // Función asociada al segundo botón
                break;
            case "asignar":
                $tecnico->render(); // Función asociada al segundo botón
                break;
            default:
                $tecnico->render(); // Llama al método render de la clase 
                break;
        }
    }
}

class Tecnico extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('empleado');
        $this->view->mensaje="";
    }
    
    function render()
    {
        $empleado = $this->model->getTecnico();
        $this->view->empleado=$empleado;
        $this->view->render('asignarTecnico/formAsignarTecnico');
    }

    function volver(){
        header("Location: generarOrdenI");
        exit();
    }
    
    function asignar(){  
    }

    function seleccionar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $DNI_Em = $_POST["DNI_Em"];
            $IDCategoria = $_POST["IDCategoria"];
            $Nombre_Em = $_POST["Nombre_Em"];
            $Apellido_Em = $_POST["Apellido_Em"];
            $Celular_Em = $_POST["Celular_Em"];
    
            // Puedes hacer lo que necesites con los datos, por ejemplo, imprimir en la consola
            echo "<script>
                    console.log('DNI_Em:', '$DNI_Em');
                    console.log('IDCategoria:', '$IDCategoria');
                    console.log('Nombre_Em:', '$Nombre_Em');
                    console.log('Apellido_Em:', '$Apellido_Em');
                    console.log('Celular_Em:', '$Celular_Em');
                  </script>";
        }
    }
    
    
    
}