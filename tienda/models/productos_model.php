<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
require_once('controllers/productos_controller.php');


class productos_model
{
    private $controller;

    public function __construct()
    {
        $this->controller = new productos_controller;
    }

    //carga los productos en la base de datos
    public function cargarProductos()
    {


        if ($_SESSION['asc' . session_id()] == true) {
            $productos[] = $this->controller->cargarProductosASC();
        } else if ($_SESSION['desc' . session_id()] == true) {
            $productos[] = $this->controller->cargarProductosDESC();
        } else {
            $productos[] = $this->controller->cargarProductos();
        }

        foreach ($productos as $producto) {
            if ($producto[0] == 'ERROR') {
                $isErrorProduct = true;
            } else {
                $isErrorProduct = false;
            }
            foreach ($producto as $product) {
                echo '
 <div class="caja-producto">
 <form method="POST">
     <p>
         Id Producto: 
     </p>
     <input type="text" value="' . ($isErrorProduct ? 'Error cargando productos' : $product['id']) . '" name="id" readonly>
     <p>
         Nombre Producto: 
     </p>
     <input type="text" value="' . ($isErrorProduct ? 'Error cargando productos' : $product['nombre']) . '" name="nombre" readonly>
     <p>
         Cantidad disponible: 
     </p>
     <input type="text" value="' . ($isErrorProduct ? 'N/A' : $product['stock']) . '" name="cantidad" readonly>
     <p>
         Precio por unidad:
     </p>
     <input type="text" value="' . ($isErrorProduct ? 'N/A' : $product['precio_unitario']) . '" name="precio" readonly>
     <p>
         Categoria:
     </p>
     <input type="text" value="' . ($isErrorProduct ? 'N/A' : $product['categoria']) . '" name="categoria" readonly>
     
     ' . ($isErrorProduct ? 'N/A' : '<input type="number" placeholder="--" name="cantidad" max="' . $product['stock'] . '" min="1" required>') . '
            <input type="submit" value="Añadir al carrito" name="addCarrito">
    </form>
 </div>';

            }
        }
    }

    //carga los productos de la tabla de carro de la compra solo del usuario actual
    public function cargarProductosCarrito()
    {
        $productos[] = $this->controller->cargarProductosCarrito();

        foreach ($productos as $producto) {
            if ($producto[0] == 'ERROR') {
                echo '<div class="caja-producto">
                <p>
                No hay productos en el carrito!
                </p>
                </div>';
            } else {
                foreach ($producto as $product) {
                    echo '
                <div class="caja-producto">
                <form method="POST">
                <p>
                ID compra: 
                </p>
                <input type="text" value="' . $product['id'] . '" name="id" readonly>
                    <p>
                        Nombre Producto: 
                    </p>
                    <input type="text" value="' . $product['producto'] . '" name="producto" readonly>
                    <p>
                        Cantidad en el carrito: 
                    </p>
                    <input type="text" value="' . $product['cantidad'] . '" name="cantidad" readonly>
                    <p>
                        Precio total:
                    </p>
                    <input type="text" value="' . $product['precio_total'] . '€" name="precio" readonly>
                    
                    <input type="submit" value="Quitar del carrito" name="remCarrito">
                   </form>
                </div>';
                }
            }
        }

    }

    //añade producto al carrito del usuario actual
    public function addCarrito($usaurio, $id, $cantidad, $precio)
    {
        $info = array($usaurio, $id, $cantidad, $precio);

        $this->controller->addCarrito($info);
    }

    //quita producto al carrito del usuario actual
    public function remCarrito($id, $cantidad, $producto)
    {
        $info = array($id, $cantidad, $producto);

        $this->controller->remCarrito($info);
    }

}
?>