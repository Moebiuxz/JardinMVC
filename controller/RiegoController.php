<?php
/**
 * Created by PhpStorm.
 * User: Alvaro
 * Date: 21/08/2017
 * Time: 20:44
 */

class RiegoController
{
    public function getAllRiegosController()
    {
        $respuesta = Data::getAllRiegosModel();

        foreach ($respuesta as $riego) {
            echo "<tr>";
            echo "<td>$riego[0]</td>";
            echo "<td>$riego[1]</td>";
            echo "<td>$riego[2]</td>";
            echo "<td>$riego[3]</td>";
            echo "<td>$riego[4]</td>";
            echo "<td>$riego[5]"." ".$riego[6]."</td>";
            echo "</tr>";
        }
    }

    public function getCantidadRiegosController()
    {
        $respuesta = Data::getCantidadRiegoModel();

        echo $respuesta[0];
    }
}