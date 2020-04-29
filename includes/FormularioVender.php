<?php namespace es\fdi\ucm\aw;
//require_once __DIR__.'/Form.php';
//require_once __DIR__.'/Usuario.php';

class FormularioVender extends Form
{
    public function __construct() {
        parent::__construct('formVender');
    }
    
    protected function generaCamposFormulario($datos)
    {
        $nombreProd = '';
        $descripcion= '';
        $precio ='';
        $talla='';
        $color='';
        $categoria ='';
        $reseña ='';
        $agotado = '';
        $unidades='';
        $unidadesDisponibles='';
        $tallasDisponibles = '';
        $coloresDisponibles = '';
        $numEstrellas = '';
        $imagen = '';

        if ($datos) {
            $nombreProd = isset($datos['nombre']) ? $datos['nombre'] : $nombreProd;
            $descripcion = isset($datos['descripcion']) ? $datos['descripcion'] : $descripcion;
            $precio = isset($datos['precio']) ? $datos['precio'] : $precio;
            $unidades = isset($datos['unidades']) ? $datos['unidades'] : $unidades;
            $tallasDisponibles = isset($datos['tallasDisponibles']) ? $datos['tallasDisponibles'] : $tallasDisponibles;
            $unidadesDisponibles = isset($datos['unidadesDisponibles']) ? $datos['unidadesDisponibles'] : $unidadesDisponibles;
            $coloresDisponibles = isset($datos['coloresDisponibles']) ? $datos['coloresDisponibles'] : $coloresDisponibles;
            $talla = isset($datos['talla']) ? $datos['talla'] : $talla;
            $color = isset($datos['color']) ? $datos['color'] : $color;
            $categoria = isset($datos['categoria']) ? $datos['categoria'] : $categoria;
            $agotado = isset($datos['agotado']) ? $datos['agotado'] : $agotado;
            $reseña = isset($datos['reseña']) ? $datos['reseña'] : $reseña;
            $numEstrellas = isset($datos['numEstrellas']) ? $datos['numEstrellas'] : $numEstrellas;
            $imagen = isset($datos['imagen']) ? $datos['imagen'] : $imagen;
        }
        $html = <<<EOF
        <fieldset>
            <link rel="stylesheet" href="styles/style.css">
            <legend>Producto, descripcion y precio</legend>
            <p><label>Nombre del producto:</label> <input type="text" name="nombre" value="$nombreProd"/></p>
            <p><label>Descripcion</label> <input type="text" name="descripcion" value="$descripcion"/></p>
            <p><label>Precio del producto:</label> <input type="text" name="precio" value="$precio"/></p>
            <p><label>Unidades:</label> <input type="text" name="unidades" value="$unidades"/></p>
            <p><label>Talla</label> <input type="text" name="talla" value="$talla"/></p>
            <p><label>Color del producto:</label> <input type="text" name="color" value="$color"/></p>
            <p><label>Categoria</label> <input type="text" name="categoria" value="$categoria"/></p>
            <p><label>Imagen</label> <input type="file" name="imagen" value="$imagen"/></p>
            <button type="submit" name="sell">Vender</button>
        </fieldset>
        EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();

        $unidades =array();
        
        $nombreProd = isset($datos['nombre']) ? $datos['nombre'] : null;
                
        if ( empty($nombreProd) ) {
            $result[] = "El nombre del producto no puede estar vacío";
        }
        
        $descripcion = isset($datos['descripcion']) ? $datos['descripcion'] : null;

        if ( empty($descripcion) ) {
            $result[] = "La descripcion no puede estar vacía.";
        }

        $precio = isset($datos['precio']) ? $datos['precio'] : null;

        if ( empty($precio) ) {
            $result[] = "El precio no puede ser nulo.";
        }

        $unidades = isset($datos['unidades']) ? $datos['unidades'] : null;
                
        if ( empty($unidades) ) {
            $result[] = "El numero de unidades no puede ser nulo";
        }
        

        $talla = isset($datos['talla']) ? $datos['talla'] : null;

        if ( empty($talla) ) {
            $result[] = "La talla no puede estar vacía.";
        }
        
        $color = isset($datos['color']) ? $datos['color'] : null;

        if ( empty($color) ) {
            $result[] = "El color no puede estar vacía.";
        }

        $tallasDisponibles = $talla;

        if ( empty($tallasDisponibles) ) {
            $result[] = "No hay tallas disponibles";
        }

        $unidadesDisponibles = $unidades;

        if ( empty($unidadesDisponibles) ) {
            $result[] = "No hay unidades disponibles";
        }
        
        $coloresDisponibles = $color;

        if ( empty($coloresDisponibles) ) {
            $result[] = "No hay colores disponibles";
        }
        
        $categoria = isset($datos['categoria']) ? $datos['categoria'] : null;

        if ( empty($categoria) ) {
            $result[] = "La categoria no puede estar vacía.";
        }
        
        $reseña = isset($datos['tallasDisponibles']) ? $datos['tallasDisponibles'] : null;

        if ( empty($tallasDisponibles) ) {
            $result[] = "No hay tallas disponibles";
        }
        
        $agotado = isset($datos['tallasDisponibles']) ? $datos['tallasDisponibles'] : null;

        if ( empty($tallasDisponibles) ) {
            $result[] = "No hay tallas disponibles";
        }
        
        $numEstrellas = isset($datos['tallasDisponibles']) ? $datos['tallasDisponibles'] : null;

        if ( empty($tallasDisponibles) ) {
            $result[] = "No hay tallas disponibles";
        }
        
        $imagen = isset($datos['talla']) ? $datos['talla'] : null;

        if ( empty($talla) ) {
            $result[] = "La imagen no puede estar vacía.";
        }

       if (count($result) === 0) {
            $producto = Producto::añadeProd($nombreProd, $descripcion, $precio,$unidades,$unidadesDisponibles,$tallasDisponibles,$coloresDisponibles,$talla,$color,$categoria,$reseña,$agotado,$numEstrellas,$imagen);
            if ( ! $producto ) {
                // No se da pistas a un posible atacante
                $result[] = "No se ha podido añadir el producto";
            }
        }
        return $result;
    }
}
