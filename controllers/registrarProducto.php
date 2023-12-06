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
        $this->view->productos = $this->model->getProductosForTable();
        $this->view->render('registrarProducto/formRegistrarProducto');
    }

    function registrarNuevoProducto()
    {
        try {
            $datosJson = file_get_contents("php://input");
            $datos = json_decode($datosJson, true);
            $response = array();
            if ($datos !== null) {
                $IDProducto = isset($datos['IDProducto']) ? $datos['IDProducto'] : null;
                $nombre = isset($datos['nombre']) ? $datos['nombre'] : null;
                $precio = isset($datos['precio']) ? $datos['precio'] : null;
                $cuota = isset($datos['cuota']) ? $datos['cuota'] : null;
                $IDCategoriaP = isset($datos['IDCategoriaP']) ? $datos['IDCategoriaP'] : null;
                $IDMarcaP = isset($datos['IDMarcaP']) ? $datos['IDMarcaP'] : null;
                $imagen = isset($datos['imagen']) ? base64_decode($datos['imagen']) : null;

                if ($IDProducto !== null && $nombre != null && $precio !== null && $cuota !== null && $IDCategoriaP !== null && $IDMarcaP !== null && $imagen !== null) {



                    if (
                        $this->model->insert([
                            'IDProducto' => $IDProducto,
                            'nombre' => $nombre,
                            'precio' => $precio,
                            'cuota' => $cuota,
                            'IDCategoriaP' => $IDCategoriaP,
                            'IDMarcaP' => $IDMarcaP,
                            'imagen' => $imagen
                        ])
                    ) {

                        $response['success'] = true;
                        $response['message'] = 'Producto registrado con éxito';
                    } else {
                        $response['success'] = false;
                        $response['message'] = 'No se pudo registrar el producto verifique la informacion ingresada';
                    }
                } else {
                    $response['success'] = false;
                    $response['message'] = 'Faltan datos obligatorios';
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Datos no válidos';
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
        }
    }
    function actualizarProducto()
    {
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true);
        $response = array();
    
        if ($datos !== null) {
            $IDProducto = isset($datos['IDProducto']) ? $datos['IDProducto'] : null;
            $nombre = isset($datos['nombre']) ? $datos['nombre'] : null;
            $precio = isset($datos['precio']) ? $datos['precio'] : null;
            $cuota = isset($datos['cuota']) ? $datos['cuota'] : null;
            $IDCategoriaP = isset($datos['IDCategoriaP']) ? $datos['IDCategoriaP'] : null;
            $IDMarcaP = isset($datos['IDMarcaP']) ? $datos['IDMarcaP'] : null;
            $imagen = isset($datos['imagen']) ? base64_decode($datos['imagen']) : null;
    
        if($imagen==null){
            $imagenFinal= $this->model->obtenerImagenProducto($IDProducto);;
        }else { 
            $imagenFinal= $imagen;
        }
            if ($IDProducto !== null && $nombre !== null && $precio !== null && $cuota !== null && $IDCategoriaP !== null && $IDMarcaP !== null) {
                if (
                    $this->model->actualizarProducto([
                        'IDProducto' => $IDProducto,
                        'nombre' => $nombre,
                        'precio' => $precio,
                        'cuota' => $cuota,
                        'IDCategoriaP' => $IDCategoriaP,
                        'IDMarcaP' => $IDMarcaP,
                        'imagen' => $imagenFinal
                    ])
                ) {
                    $response['success'] = true;
                    $response['message'] = 'Producto actualizado con éxito';
                } else {
                    $response['success'] = false;
                    $response['message'] = 'No se pudo actualizar el producto, verifica la información ingresada';
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Faltan datos obligatorios';
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Datos no válidos';
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function eliminarProducto()
{
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);
    $response = array();

    if (isset($data['idproducto'])) {
        $IDProducto = $data['idproducto'];

        if ($this->model->delete($IDProducto)) {
            $response['success'] = true;
            $response['message'] = "Producto eliminado correctamente";
        } else {
            $response['success'] = false;
            $response['message'] = 'No se puede eliminar el producto';
        }

        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }
}
}