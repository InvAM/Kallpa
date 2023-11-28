<?php
include_once "models/categoria_productomodel.php";
include_once "models/marca_productomodel.php";
class RegistrarProducto extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('producto');
        $this->marcas = new MarcaProductoModel();
        $this->categorias = new CategoriaProductoModel();
        $this->view->mensaje = "";
        session_start();
        if (!isset($_SESSION['dni'])) {
            header("Location:" . constant('URL') . 'Login');
            exit();
        }
    }

    function render()
    {
        $marcas = $this->marcas->get();  
        $categorias = $this->categorias->get();  
        $this->view->categorias = $categorias;
        $this->view->marcas = $marcas;
        $this->view->render('registrarProducto/formRegistrarProducto');
    }

    function registrarNuevoProducto()
    {
        try {
            $codigo = $_POST['product-code'];
            $nombre = $_POST['product-name'];
            $precio = $_POST['product-price'];
            $cuota = $_POST['product-cuota'];
            $categoria = isset($_POST['id-categoria']) ? $_POST['id-categoria'] : null;
            $marca = isset($_POST['id-marca']) ? $_POST['id-marca'] : null;
            $imagen = isset($_POST['hidden-image']) ? $_POST['hidden-image'] : null;
    
            $mensaje = "";
    
            if ($this->model->insert([
                'codigo' => $codigo,
                'nombre' => $nombre,
                'precio' => $precio,
                'cuota' => $cuota,
                'IDCategoriaP' => $categoria,
                'IDMarcaP' => $marca,
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
   /* private function guardarImagen($file)
    {
        // Ruta donde se guardará el archivo en el servidor
        $target_dir = __DIR__ . "/uploads/";
        $target_file = $target_dir . basename($file["name"]);

        // Cambiar el nombre del archivo si ya existe
        while (file_exists($target_file)) {
            $file_name = pathinfo($file["name"], PATHINFO_FILENAME);
            $file_extension = pathinfo($file["name"], PATHINFO_EXTENSION);
            $new_file_name = $file_name . '_' . time() . '.' . $file_extension;
            $target_file = $target_dir . $new_file_name;
        }

        // Verificar si la carpeta de destino existe, si no, crearla
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        // Mover el archivo al directorio de destino
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file; // Devuelve la ruta de la imagen guardada
        } else {
            return false; // Devuelve false en caso de error al mover el archivo
        }
    }*/
}
?>
