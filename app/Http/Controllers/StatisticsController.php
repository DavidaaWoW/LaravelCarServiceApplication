<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Akaunting\Apexcharts\Chart;
use App\Models\Brand;
use App\Models\User;

class StatisticsController extends Controller
{
    public function generateRand(Request $request)
    {
        $count = $request->only('count');
        $cars = Car::factory()->count(intval($count['count']))->create();
        return $this->makeChart();
    }
    public function makeChart()
    {
        $chart = (new Chart)->setType('bar')
            ->setWidth('100%')
            ->setHeight(300)
            ->setLabels(Brand::all()->pluck('name')->toArray())
            ->setDataset('test', 'bar', [Car::where('brandId', '=', '1')->get()->count(), Car::where('brandId', '=', '2')->get()->count()]);
        $chart2 = (new Chart)->setType('line')
            ->setWidth('100%')
            ->setHeight(300)
            ->setLabels(['users', 'brands', 'cars'])
            ->setDataset('test', 'line', [User::all()->count(), Brand::all()->count(), Car::all()->count()]);
        $chart3 = (new Chart)->setType('donut')
            ->setWidth('100%')
            ->setHeight(300)
            ->setLabels(['users', 'brands', 'cars'])
            ->setDataset('test', 'donut', [User::all()->count(), Brand::all()->count(), Car::all()->count()]);
        return view('admin/statistics', ['chart' => $chart, 'chart2' => $chart2, 'chart3' => $chart3]);
    }
}
