<?php namespace es\fdi\ucm\aw;
//require_once __DIR__ . '/Aplicacion.php';


class Producto
{


    public static function buscaProducto($nombreProd)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM Productos P WHERE P.nombre = '%s'", $conn->real_escape_string($nombreProd));
		//$query = sprintf("SELECT * FROM Productos P WHERE P.nombre LIKE '%s'", $conn->real_escape_string($nombreProd));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $producto = new Producto($fila['nombre'], $fila['descripcion'], $fila['precio'],$fila['unidades'], $fila['unidadesDisponibles'],$fila['tallasDisponibles'],$fila['coloresDisponibles'],$fila['talla'],$fila['color'],$fila['categoria'],$fila['reseña'],$fila['agotado'],$fila['numEstrellas'],$fila['imagen']);
                $producto->id = $fila['id'];
                $result = $producto;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }

    /*public static function muestraProductos($producto)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM Productos P"); //$conn->real_escape_string($producto);
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows >= 1) {
                $fila = $rs->fetch_assoc();
                $producto = new Producto($fila['nombre'], $fila['descripcion'], $fila['precio'],$fila['unidades'], $fila['unidadesDisponibles'],$fila['tallasDisponibles'],$fila['coloresDisponibles'],$fila['talla'],$fila['color'],$fila['categoria'],$fila['reseña'],$fila['agotado'],$fila['numEstrellas'],$fila['imagen']);
                $producto->id = $fila['id'];
                $result = $producto;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }*/


    
    public static function añadeProd($nombreProd, $descripcion, $precio,$unidades, $unidadesDisponibles,$tallasDisponibles,$coloresDisponibles,$talla,$color,$categoria,$reseña,$agotado,$numEstrellas,$imagen) //atributos productos
    {
        $producto = self::buscaProducto($nombreProd);
        if ($producto) {
            return false;
        }
        $producto = new Producto($nombreProd, $descripcion, $precio,$unidades, $unidadesDisponibles, $tallasDisponibles, $coloresDisponibles, $talla, $color, $categoria, $reseña, $agotado, $numEstrellas, $imagen);
        return self::guardaProd($producto);
    }
    
    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    
    public static function guardaProd($producto)
    {
        if ($producto->id !== null) {
            return self::actualizaProd($producto);
        }
        return self::insertaProd($producto);
    }
    
    private static function insertaProd($producto)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO `productos`  (`nombre`,`descripcion`,`precio`,`unidades`,`unidadesDisponibles`, `tallasDisponibles`,`coloresDisponibles`, `talla`, `color`, `categoria`,`agotado`,`reseña`,`numEstrellas`, `imagen`) 
		VALUES('%s', '%s', '%i', '%i','%i', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($producto->nombre)
            , $conn->real_escape_string($producto->descripcion)
            , $conn->real_escape_string($producto->precio)
            , $conn->real_escape_string($producto->unidades)
            , $conn->real_escape_string($producto->unidadesDisponibles)
			, $conn->real_escape_string($producto->tallasDisponibles)
			, $conn->real_escape_string($producto->coloresDisponibles)
			, $conn->real_escape_string($producto->talla)
			, $conn->real_escape_string($producto->color)
			, $conn->real_escape_string($producto->categoria)
			, $conn->real_escape_string($producto->agotado)
			, $conn->real_escape_string($producto->reseña)
			,$conn->real_escape_string($producto->numEstrellas)
            ,$conn->real_escape_string($producto->imagen)); // hay que insertar una imagen
        if ( $conn->query($query) ) {
            $producto->id = $conn->insert_id;
            //$producto->idVendedor = $conn->id; // como se dice que el idVendedor es el id del usuario que lo vende?
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $producto;
    }
    
    private static function actualizaProd($producto)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE Productos P SET nombre = '%s', descripcion='%s', precio='%f', rol='%s' WHERE P.id=%i"
            , $conn->real_escape_string($producto->nombre)
            , $conn->real_escape_string($producto->descripcion)
            , $conn->real_escape_string($producto->precio)
            , $conn->real_escape_string($producto->unidades)
            , $conn->real_escape_string($producto->unidadesDisponibles)
            , $conn->real_escape_string($producto->tallasDisponibles)
            , $conn->real_escape_string($producto->coloresDisponibles)
            , $conn->real_escape_string($producto->talla)
            , $conn->real_escape_string($producto->color)
            , $conn->real_escape_string($producto->categoria)
            , $conn->real_escape_string($producto->reseña)
            , $conn->real_escape_string($producto->agotado)
            , $conn->real_escape_string($producto->numEstrellas)
            , $conn->real_escape_string($producto->imagen)
            , $producto->id);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                echo "No se ha podido actualizar el producto: " . $producto->id;
                exit();
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        
        return $producto;
    }
	
	//filas tabla productos
    
    private $id;

    private $nombre;

    private $descripcion;

    private $precio;
	
    private $unidadesDisponibles=0;
	
    private $tallasDisponibles=NULL;
	
    private $coloresDisponibles=NULL;
	
    private $talla;
	
    private $color;
	
    private $categoria;
	
    private $agotado = false;
	
    private $reseña =NULL;

    private $numEstrellas=0;
	
    private $imagen;

    private $unidades;

    private function __construct($nombreProd, $descripcion, $precio,$unidades, $unidadesDisponibles, $tallasDisponibles, $coloresDisponibles, $talla, $color, $categoria, $reseña, $agotado, $numEstrellas, $imagen)
    {
        $this->nombre = $nombreProd;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->unidades = $unidades;
        $this->unidadesDisponibles = $unidadesDisponibles;
		$this->tallasDisponibles= $tallasDisponibles;
        $this->coloresDisponibles = $coloresDisponibles;
        $this->talla = $talla;
        $this->color = $color;
		$this->categoria= $categoria;
        $this->agotado = $agotado;
        $this->reseña = $reseña;
        $this->numEstrellas = $numEstrellas;
		$this->imagen = $imagen;
    }

    public function id()
    {
        return $this->id;
    }

    public function nombre()
    {
        return $this->nombre;
    }

	public function descripcion()
    {
        return $this->descripcion;
    }

	public function unidades()
    {
        return $this->unidades;
    }
    public function precio()
    {
        return $this->precio;
    }
    
    public function tallasDisponibles()
    {
        return $this->tallasDisponibles; //deberia devolver todas las tallas disponibles
    }

    public function unidadesDisponibles()
    {
        return $this->unidadesDisponibles;
    }

    public function coloresDisponibles()
    {
        return $this->coloresDisponibles;
    }

    public function talla()
    {
        return $this->talla;
    }
    
    public function categoria()
    {
        return $this->categoria;
    }

    public function agotado()
    {
        return $this->agotado;
    }


    public function color()
    {
        return $this->color;
    }

    public function reseña()
    {
        return $this->reseña;
    }
    
    public function numEstrellas()
    {
        return $this->numEstrellas;
    }

    public function imagen()
    {
        return $this->imagen;
    }

    public function compruebaPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function cambiaPassword($nuevoPassword)
    {
        $this->password = self::hashPassword($nuevoPassword);
    }
}