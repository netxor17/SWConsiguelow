<?php
namespace es\fdi\ucm\aw;

class FormularioCarrito extends Form
{
    public function __construct() {
        parent::__construct('formCarrito');
    }
    
    protected function generaCamposFormulario($datos)
    {
        $nombreProd = '';
        $nombreCat='';
        if ($datos) {
            $nombreProd = isset($datos['nombre']) ? $datos['nombre'] : $nombreProd;
            $nombreCat = isset($datos['tipo']) ? $datos['tipo'] : $nombreCat;
        }
        $html = <<<EOF
        <fieldset>
            <legend>Buscar un producto</legend></br>
            <form method="post" action="Producto.php">
            <p><label>Filtrar por nombre:</label> <input type="text" name="nombre" value="$nombreProd"/></p>
            <p><label>Filtrar por categoria:</label> <input type="text" name="tipo" value="$nombreCat"/></p>
            <button type="submit" name="search">Buscar</button>
            </form>
        </fieldset>
        EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        
        $nombreProd = isset($datos['nombre']) ? $datos['nombre'] : null;
        $nombreCat = isset($datos['tipo']) ? $datos['tipo'] : null;
                
       if ( empty($nombreProd) && empty($nombreCat)) {
            $result[] = "Debes rellenar al menos algun campo para filtrar";
        }
        
        if (count($result) === 0) {
            if(strlen($nombreProd)>0){
             Producto::muestraProductosPorNombre();
            }
            elseif (strlen($nombreCat)>0){
             Producto::muestraProductosPorCat();
            }
    }
        return $result;
    }
}