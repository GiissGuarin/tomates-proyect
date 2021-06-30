<?php

class producto extends entidadBase
{


    public function __construct($adaptador)
    {
        $tabla = "reparacion";
        $id_reparacion = "id_reparacion";
        parent::__construct($tabla, $adaptador);
    }
    public function crear($name, $qty, $lot, $expir, $price)
    {
        $owner = $_SESSION['idUsuario'];

        $query = "
       INSERT INTO `productos`(
        `id`,
        `name`,
        `quantity`,
        `lot`,
        `expiration`,
        `price`,
        `uid_owner`
    )
    VALUES(
        NULL,
        '$name',
        '$qty',
        '$lot',
        '$expir',
        '$price',
        '$owner'
    )
       ";
        $save = $this->get_BaseDatos()->query($query);
        return $save;
    }

    public function pay($id_p, $qun, $price, $id_com, $id_ven)
    {


        $query = "
            INSERT INTO `transacciones`(
            `id`,
            `id_producto`,
            `quantity`,
            `uid_comprador`,
            `uid_vendedor`
            )
            VALUES(NULL, '$id_p', '$qun', '$id_com', '$id_ven')
            ";
        $save = $this->get_BaseDatos()->query($query);
        return $save;
    }

    public function get_all()
    {
        $query = "SELECT a.id, a.name, a.quantity, a.`lot`, a.`expiration`, a.`price`,a.`uid_owner` FROM `productos` AS a";
        $save = $this->get_BaseDatos()->query($query);
        if (is_null($save)) {
            return false;
        } else {

            while ($you = $save->fetch_object()) {
                $result[] = $you;
            }

            return $result;
        }
    }
    public function myProducts()
    {
        $owner = $_SESSION['idUsuario'];
        $query = "
        SELECT a.id, a.name, a.quantity, a.`lot`, a.`expiration`, a.`price`,a.`uid_owner` 
        FROM `productos` AS a
        WHERE uid_owner = $owner";
        $save = $this->get_BaseDatos()->query($query);
        if (is_null($save)) {
            return false;
        } else {

            while ($you = $save->fetch_object()) {
                $result[] = $you;
            }

            return $result;
        }
    }

    public function myShopping()
    {
        $owner = $_SESSION['idUsuario'];
        $query = "
        SELECT
            t.id,
            a.name,
            t.quantity,
            a.`expiration`,
            a.`price`,
            t.quantity*a.`price` AS total
        FROM
            `transacciones` AS t
        INNER JOIN `productos` AS a
        ON
            t.id_producto = a.id
        WHERE
            t.uid_comprador =  $owner
        ";
        $save = $this->get_BaseDatos()->query($query);
        if (is_null($save)) {

            return false;
        } else {

            while ($you = $save->fetch_object()) {
                $result[] = $you;
            }

            return $result;
        }
    }

    public function mySales()
    {
        $owner = $_SESSION['idUsuario'];
        $query = "
        SELECT
            t.id,
            a.name,
            t.quantity,
            a.`expiration`,
            a.`price`,
            t.quantity*a.`price` AS total
        FROM
            `transacciones` AS t
        INNER JOIN `productos` AS a
        ON
            t.id_producto = a.id
        WHERE
            t.uid_vendedor =  $owner
        ";
        $save = $this->get_BaseDatos()->query($query);
        if (is_null($save)) {

            return false;
        } else {

            while ($you = $save->fetch_object()) {
                $result[] = $you;
            }

            return $result;
        }
    }
    public function deleteTrans($id)
    {
        $query = "
        DELETE FROM `transacciones` WHERE `transacciones`.`id` = $id;";
        $save = $this->get_BaseDatos()->query($query);
        return $save;
    }
    public function updateITnventary($id, $quant)
    {
        # code...
    }
}
