<?php

include_once 'Database.php';
include_once 'Usuario.php';

class ModelLogin {

    public function verificacionUsuario($usuario, $contrasena) {

        $pdo = Database::connect();
        $sql = "SELECT u.ID_USU,u.TIPO_USU,c.CEDULA_CAJ,c.NOMBRES_CAJ,c.APELLIDOS_CAJ,u.NOMBRE_USU,u.PASS_USU FROM tbl_usuarios u INNER join tbl_cajero c on u.ID_CAJ=c.ID_CAJ where u.NOMBRE_USU='zappy' and u.PASS_USU='zero';";
        $consulta = $pdo->prepare($sql);
        
        $consulta->execute(array($usuario, $contrasena));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $atributo = new Usuario();
        $atributo->setID_USU($dato['id_usu']);
        $atributo->setTIPO_USU($dato['tipo_usu']);
        $atributo->setCEDULA_USU($dato['cedula_caj']);
        $atributo->setNOMBRES_USU($dato['nombres_caj']);
        $atributo->setAPELLIDOS_USU($dato['apellidos_caj']);
        $atributo->setNOMBRE_USU($dato['nombre_usu']);
        $atributo->setPASS_USU($dato['pass_usu']);

        Database::disconnect();

        return $atributo;
    }

}
