<?php namespace es\fdi\ucm\aw;
//require_once __DIR__ . '/Aplicacion.php';


class Pedido
{

    public static function buscaPedido($nombrePedido)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM Pedidos P WHERE P.nombre = '%s'", $conn->real_escape_string($nombrePedido));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $pedido = new Pedido($fila['fecha'], $fila['idCliente'], $fila['idProd'],$fila['nombreProd'], $fila['pagado']);
                $pedido->idPedido = $fila['idPedido'];
                $result = $pedido;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }

    public static function muestraPedidos()
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $user = $_SESSION['username'];
        //$query = sprintf("SELECT * FROM Pedidos pd JOIN Usuarios u ON u.id = pd.idCliente"); $conn->real_escape_string($user);
        $query = sprintf("SELECT * FROM Pedidos P WHERE P.idCliente ='$user'"); $conn->real_escape_string($user);
        $rs = $conn->query($query);
        $result = false;
        $i=0;
        if ($rs) {
            if ( $rs->num_rows > 0) {
                while ($array=$rs->fetch_array()){
                $claves = array_keys($array);
                foreach($claves as $clave){
                    $arrayauxliar[$i][$clave]=$array[$clave];
                }           
                $i++;
                $pedidos = $arrayauxliar;
                $result = $pedidos;
                }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
      }

    }

    public static function añadePedido($nombrePedido, $descripcion, $precio,$unidades, $unidadesDisponibles,$tallasDisponibles,$coloresDisponibles,$talla,$color,$categoria,$reseña,$agotado,$numEstrellas,$imagen) //atributos pedidos
    {
        $pedido = self::buscaPedido($nombrePedido);
        if ($pedido) {
            return false;
        }
        $pedido = new Pedido($nombreProd, $descripcion, $precio,$unidades, $unidadesDisponibles, $tallasDisponibles, $coloresDisponibles, $talla, $color, $categoria, $reseña, $agotado, $numEstrellas, $imagen);
        return self::guardaPedido($pedido);
    }
    

    public static function guardaPedido($pedido)
    {
        if ($pedido->idPedido !== null) {
            return self::actualizaPedido($pedido);
        }
        return self::insertaPedido($pedido);
    }
    
    private static function insertaPedido($pedido)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO `pedidos`  (`nombre`,`descripcion`,`precio`,`unidades`,`unidadesDisponibles`, `tallasDisponibles`,`coloresDisponibles`, `talla`, `color`, `categoria`,`agotado`,`reseña`,`numEstrellas`, `imagen`) 
		 VALUES('%s', '%s', '%f', '%d','%d', '%s', '%s', '%s', '%s', '%s', '%b', '%s', '%d','%s')"
            , $conn->real_escape_string($pedido->nombre)
            , $conn->real_escape_string($pedido->descripcion)
            , $conn->real_escape_string($pedido->precio)
            , $conn->real_escape_string($pedido->unidades)
            , $conn->real_escape_string($pedido->unidadesDisponibles)
			, $conn->real_escape_string($pedido->tallasDisponibles)
			, $conn->real_escape_string($pedido->coloresDisponibles)
			, $conn->real_escape_string($pedido->talla)
			, $conn->real_escape_string($pedido->color)
			, $conn->real_escape_string($pedido->categoria)
			, $conn->real_escape_string($pedido->agotado)
			, $conn->real_escape_string($pedido->reseña)
			,$conn->real_escape_string($pedido->numEstrellas)
            ,$conn->real_escape_string($pedido->imagen)); // hay que insertar una imagen
        if ( $conn->query($query) ) {
            $pedido->idPedido= $conn->insert_id;
            echo "pedido añadido con exito";
            exit();
           // $pedido->idVendedor = $conn->id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $pedido;
    }
    
    private static function actualizaPedido($pedido)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE pedidos P SET nombre = '%s', descripcion='%s', precio='%f', unidades='%d, unidadesDisponibles ='%d', tallasDisponibles ='%s', coloresDisponibles ='%s', talla ='%s', color ='%s', categoria ='%s', reseña ='%s', agotado ='%b', numEstrellas ='%d', imagen ='%s' WHERE P.id=%i"
            , $conn->real_escape_string($pedido->nombre)
            , $conn->real_escape_string($pedido->descripcion)
            , $conn->real_escape_string($pedido->precio)
            , $conn->real_escape_string($pedido->unidades)
            , $conn->real_escape_string($pedido->unidadesDisponibles)
            , $conn->real_escape_string($pedido->tallasDisponibles)
            , $conn->real_escape_string($pedido->coloresDisponibles)
            , $conn->real_escape_string($pedido->talla)
            , $conn->real_escape_string($pedido->color)
            , $conn->real_escape_string($pedido->categoria)
            , $conn->real_escape_string($pedido->reseña)
            , $conn->real_escape_string($pedido->agotado)
            , $conn->real_escape_string($pedido->numEstrellas)
            , $conn->real_escape_string($pedido->imagen)
            , $pedido->id);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                echo "No se ha podido actualizar el pedido: " . $pedido->id;
                exit();
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        
        return $pedido;
    }

	
    //filas tabla pedido
    
    private $idPedido;

    private $fecha;

    private $idProd;

    private $idCliente;
	
    private $nombreProd;
	
    private $pagado;
	
    private function __construct($fecha, $idProd, $idCliente,$nombreProd, $pagado)
    {
        $this->fecha = $fecha;
        $this->idProd = $idProd;
        $this->idCliente = $idCliente;
        $this->nombreProd = $nombreProd;
        $this->pagado = $pagado;
    }

    public function idPedido()
    {
        return $this->idPedido;
    }

    public function nombreProd()
    {
        return $this->nombreProd;
    }

	public function idCliente()
    {
        return $this->idCliente;
    }

	public function fecha()
    {
        return $this->fecha;
    }
    public function pagado()
    {
        return $this->pagado;
    }
    
    public function idProd()
    {
        return $this->idProd; 
    }

}