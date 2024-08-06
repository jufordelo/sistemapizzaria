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
            ->setSubtitle('Vendas Online x Total de Encomendas')
            ->addData('Vendas online', [40, 93, 35])
            ->addData('Total de vendas', [70, 29, 77])
            ->setXAxis(['Bolo', 'Doces', 'Salgados'])
            ->setFontFamily('DM Sans')
            ->setFontColor('#1C1C1C	');
    }
}
