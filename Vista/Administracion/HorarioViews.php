<?php
namespace Vista\Administracion;

use Modelo\Base\Franjas;
use Vista\Plantilla\Views;

require_once __DIR__.'/../Plantilla/Views.php';

abstract class HorarioViews extends Views
{

    public static function getHorarioSemanal(){

        parent::setOn(true);
        parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $trabajador = unserialize($_SESSION['trabajador']);

        //Dia de la semana a mano, coger semana del sistema

        $horariosFranjas = $trabajador->getHorariosTrabajadorBySemana(10)->getHorario()->getHorariosFranja();

        $franjas = Franjas::getAll();

        ?>

        <div class="table-responsive" style="margin-top: 20px">
            <table class="table table-bordered">
                <caption ALIGN=bottom>Horario semanal de <?php echo $trabajador->getNombre()." ".$trabajador->getApellido1().' '.$trabajador->getApellido2()?></caption>
                <tr>
                    <td></td>
                        <?php
                        foreach ($franjas as $franja)
                        {
                            echo "<th>";
                            echo substr($franja->getHoraInicio(),0,-3);
                            echo "-";
                            echo substr($franja->getHoraFin(),0,-3);
                            echo "</th>";
                        }
                        ?>

                </tr>

                <tr>
                    <th>Lunes</th>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>

                </tr>

                <tr>
                    <th>Martes</th>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>

                </tr>
                <tr>
                    <th>Miércoles</th>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>

                </tr>
                <tr>
                    <th>Jueves</th>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>

                </tr>
                <tr>
                    <th>Viernes</th>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>

                </tr>
                <tr>
                    <th>Sábado</th>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>

                </tr>
                <tr>
                    <th>Domingo</th>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $encontrado = false;
                        foreach ($horariosFranjas as $hora)
                        {
                            if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                            {
                                echo "X";
                                $encontrado = true;
                            }
                        }
                        if (!$encontrado)
                        {
                            echo "-";
                        }
                        ?></td>

                </tr>
            </table>
        </div>
    <?php

        require_once __DIR__.'/../Plantilla/pie.php';
    }
}