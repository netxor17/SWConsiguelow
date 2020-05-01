<?php
namespace es\fdi\ucm\aw;

function url($url){
    /*si la directiva de configuración ession.use_trans_id es 0 no hay transmisión automática de SID por URL
    y si SID es vacío (usuario rechaza la cookie) tenemos qyue gestionar la transmisión*/
    if ((get_cfg_var('session.use_trans_id')==0) and (SID !='')){
        //comprobar si hay algo en la URL para añadir ? o &
        $url .= ((strpos($url, '?') === FALSE) ?'?':'&').SID;
    }
    return $url;
}

                 
?>