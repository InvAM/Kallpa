<?php
include_once "models/producto.php";
class RegistrarProducto extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('producto');
        $this->view->mensaje = "";
    }

    function render()
    {
        $productos = $this->model->get();
        $this->view->productos = $productos;
        $this->view->render('registrarProducto/formRegistrarProducto');
    }

    function registrarNuevoProducto()
    {
        try {
            $nombre = $_POST['product-name'];
            $precio = $_POST['product-price'];
            $cuota = $_POST['product-cuota'];
            $categoria = $_POST['product-categoria'];
            $marca = $_POST['product-marca'];
            $imagen = $this->guardarImagen($_FILES['product-image']);

            $mensaje = "";

            if ($this->model->insert([
                'nombre' => $nombre,
                'precio' => $precio,
                'cuota' => $cuota,
                'categoria' => $categoria,
                'marca' => $marca,
                'imagen' => $imagen,
            ])) {
                $mensaje = "Nuevo producto registrado";
            } else {
                $mensaje = "Error al registrar el producto en la base de datos";
            }
        } catch (Exception $e) {
            $mensaje = "Excepción: " . $e->getMessage();
        }

        $this->view->mensaje = $mensaje;
        $this->render();
    }
    private function guardarImagen($file)
    {
        // Ruta donde se guardará el archivo en el servidor
        $target_dir = __DIR__ . "/uploads/";
        $target_file = $target_dir . basename($file["name"]);
    
        // Inicializar $uploadOk
        $uploadOk = 1;
    
        // Verificar si el archivo ya existe
        if (file_exists($target_file)) {
            echo "Error: El archivo ya existe.";
            $uploadOk = 0;
        }
    
        // Verificar el tamaño de la imagen
        if ($file["size"] > 500000) {
            echo "Error: El tamaño del archivo es demasiado grande.";
            $uploadOk = 0;
        }
    
        // Permitir ciertos formatos de archivo
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Error: Solo se permiten archivos JPG, JPEG, PNG y GIF.";
            $uploadOk = 0;
        }
    
        // Verificar si $uploadOk está configurado en 0 por algún error
        if ($uploadOk == 0) {
            echo "Error: No se pudo subir el archivo.";
            return false;
        } else {
            // Si todo está bien, intenta subir el archivo
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return $target_file; // Devuelve la ruta de la imagen guardada
            } else {
                echo "Error al mover el archivo al directorio de destino.";
                return false; // Devuelve false en caso de error al mover el archivo
            }
        }
    }
}
?>
