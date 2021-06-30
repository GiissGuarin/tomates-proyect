<?php

class producto extends entidadBase
{


    public function __construct($adaptador)
    {
        $tabla = "reparacion";
        $id_reparacion = "id_reparacion";
        parent::__construct($tabla, $adaptador);
    }
    public function crear($name, $qty, $lot, $expir, $price, $photo)
    {
        $owner = $_SESSION['idUsuario'];
        // A few settings
        //$img_file = $photo;

        // Read image path, convert to base64 encoding
        //$imgData = base64_encode(file_get_contents($img_file));

        // Format the image SRC:  data:{mime};base64,{data};
        //$src = 'data: ' . mime_content_type($img_file) . ';base64,' . $imgData;

        $query = "
       INSERT INTO `productos`(
        `id`,
        `name`,
        `quantity`,
        `lot`,
        `expiration`,
        `price`,
        `photo`,
        `uid_owner`
    )
    VALUES(
        NULL,
        '$name',
        '$qty',
        '$lot',
        '$expir',
        '$price',
        '$photo',
        '$owner'
        
    )
       ";
        $save = $this->get_BaseDatos()->query($query);
        return $save;
    }

    public function pay($n)
    {

        $query = "
            INSERT INTO `transacciones`(
            `id`,
            `id_producto`,
            `quantity`,
            `uid_comprador`,
            `uid_vendedor`
            )
            $n
            ";
        $save = $this->get_BaseDatos()->query($query);
        return $save;
    }

    public function updatepay($id_p, $cant)
    {

        $query = "
        UPDATE `productos` SET `quantity` = `quantity`-'$cant' WHERE `productos`.`id` = $id_p;
            ";
        $save = $this->get_BaseDatos()->query($query);
        return $save;
    }

    public function get_all()
    {
        $query = "SELECT a.id, a.name, a.quantity, a.`lot`, a.`expiration`, a.`price`,a.`uid_owner`, a.`photo` FROM `productos` AS a";
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
            a.id AS id_p,
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
        $save2 = $this->get_BaseDatos()->query($query);
        if (is_null($row = $save2->fetch_object())) {

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
        $save2 = $this->get_BaseDatos()->query($query);
        if (is_null($row = $save2->fetch_object())) {

            return false;
        } else {

            while ($you =  $save->fetch_object()) {
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
    public function updateInventary($id, $quant)
    {
        $query = "
        UPDATE `productos` SET `quantity` = `quantity`+'$quant' WHERE `productos`.`id` = $id;
        ";

        $save = $this->get_BaseDatos()->query($query);
        return $save;
    }
}
