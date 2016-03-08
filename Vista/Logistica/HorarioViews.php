<?php
namespace Vista\Logistica;

require_once __DIR__.'/../Plantilla/Views.php';

abstract class HorarioViews extends \Vista\Plantilla\Views
{

    public static function getHorarioSemanal(){

        parent::setOn(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $trabajador = unserialize($_SESSION['trabajador']);

        ?>

        <div class="table-responsive" style="margin-top: 20px">
            <table class="table table-bordered">
                <caption ALIGN=bottom>Horario semanal de <?php echo $trabajador->getNombre()." ".$trabajador->getApellido1().' '.$trabajador->getApellido2()?></caption>
                <tr>
                    <td>
                    <th>00:00</th><th>1:00</th><th>2:00</th><th>3:00</th><th>4:00</th><th>5:00</th><th>6:00</th><th>7:00</th>
                    <th>8:00</th><th>9:00</th><th>10:00</th><th>11:00</th><th>12:00</th><th>13:00</th><th>14:00</th><th>15:00</th>
                    <th>16:00</th><th>17:00</th><th>18:00</th><th>19:00</th><th>20:00</th><th>21:00</th><th>22:00</th><th>23:00</th>
                    </td>
                </tr>

                <tr>
                    <th>Lunes</th>
                    <td>X</td><td>X</td><td>X</td><td>X</td><td>-</td><td>X</td><td>-</td><td>-</td>
                    <td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td><td>-</td><td>X</td>
                    <td>-</td><td>-</td><td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td>
                </tr>

                <tr>
                    <th>Martes</th>
                    <td>X</td><td>-</td><td>-</td><td>-</td><td>-</td><td>X</td><td>-</td><td>-</td>
                    <td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td><td>-</td><td>X</td>
                    <td>-</td><td>-</td><td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td>
                </tr>

                <tr>
                    <th>Miercoles</th>
                    <td>X</td><td>-</td><td>-</td><td>-</td><td>-</td><td>X</td><td>-</td><td>-</td>
                    <td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td><td>-</td><td>X</td>
                    <td>-</td><td>-</td><td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td>
                </tr>

                <tr>
                    <th>Jueves</th>
                    <td>X</td><td>-</td><td>-</td><td>-</td><td>-</td><td>X</td><td>-</td><td>-</td>
                    <td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td><td>-</td><td>X</td>
                    <td>-</td><td>-</td><td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td>
                </tr>

                <tr>
                    <th>Viernes</th>
                    <td>X</td><td>-</td><td>-</td><td>-</td><td>-</td><td>X</td><td>-</td><td>-</td>
                    <td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td><td>-</td><td>X</td>
                    <td>-</td><td>-</td><td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td>
                </tr>

                <tr>
                    <th>Sabado</th>
                    <td>X</td><td>-</td><td>-</td><td>-</td><td>-</td><td>X</td><td>-</td><td>-</td>
                    <td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td><td>-</td><td>X</td>
                    <td>-</td><td>-</td><td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td>
                </tr>

                <tr>
                    <th>Domingo</th>
                    <td>X</td><td>-</td><td>-</td><td>-</td><td>-</td><td>X</td><td>-</td><td>-</td>
                    <td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td><td>-</td><td>X</td>
                    <td>-</td><td>-</td><td>-</td><td>-</td><td>X</td><td>-</td><td>-</td><td>-</td>
                </tr>
            </table>
        </div>
        <?php

        require_once __DIR__.'/../Plantilla/pie.php';
    }
}