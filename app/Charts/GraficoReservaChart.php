<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use app\Models\Reserva;
class GraficoReservaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        return $this->chart->donutChart()
            ->setTitle('GRÁFICO RESERVAS ')
            ->setSubtitle('Realizadas por nossos clientes todos feitos online!')
            ->addData([15, 65, 35])
            ->setLabels(['Reserva de Mesas', 'Reservas de Todo Local', 'Reservas da Área Externa'])
            ->setFontFamily('DM Sans')
            ->setFontColor('#1C1C1C	');

        }
}
