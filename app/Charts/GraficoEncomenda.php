<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use app\Models\Encomenda;

class GraficoEncomenda
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {


        return $this->chart->lineChart()
            ->setTitle('Encomendas')
            ->setSubtitle('Pedidos no site x Pedidos presencial ')
            ->addData('Pedidos online', [40, 93, 35])
            ->addData('Pedidos Presencial', [70, 29, 77])
            ->setXAxis(['Pizza Salgada ', 'Pizza Doce ', ''])
            ->setFontFamily('DM Sans')
            ->setFontColor('#1C1C1C	');
    }
}
