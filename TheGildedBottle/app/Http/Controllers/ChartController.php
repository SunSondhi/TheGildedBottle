<?php

namespace App\Http\Controllers;



;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Analytics;
use Spatie\Analytics\Period;



class ChartController extends Controller
{

    
    public function index()
    {
        return view('bar-chart');
    }

    public function getData()
    {
        $data = DB::table('purchases')
        ->select(DB::raw('name, SUM(quantity * price) as total'))
        ->groupBy('name')
            ->get();
        return response()->json($data);
    }

    public function getData2()
    {
        $purchases = DB::table('purchases')
        ->select('in_progress', DB::raw('count(*) as total'))
        ->whereIn('in_progress', [0, 1, 2])
        ->groupBy('in_progress')
        ->get();

        $statusLabels = collect([
            0 => 'In Progress',
            1 => 'Cancelled',
            2 => 'Processed'
        ]);

        $labels = $statusLabels->only($purchases->pluck('in_progress')->toArray())->values()->toArray();
        $data = $purchases->pluck('total')->toArray();

        $chartdata = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Purchase Status',
                    'backgroundColor' => [
                        '#3498db',
                        '#e74c3c',
                        '#2ecc71'
                    ],
                    'data' => $data
                ]
            ]
        ];

        return response()->json($chartdata);
    }

    public function scatterPlot()
    {
        $purchases = DB::table('purchases')
            ->where('in_progress', 2)
            ->select(DB::raw('price * quantity as total_price, created_at'))
            ->get();

        $data = [];

        foreach ($purchases as $purchase) {
            $data[] = [
                'x' => strtotime($purchase->created_at) * 1000, // multiply by 1000 to convert to milliseconds
                'y' => $purchase->total_price
            ];
        }

        $chartData = [
            'datasets' => [
                [
                    'label' => 'Purchasing Trend',
                    'data' => $data,
                    'borderColor' => 'rgba(200, 200, 200, 0.75)',
                    'backgroundColor' => 'rgba(200, 200, 200, 0.5)',
                    'pointRadius' => 5,
                    'pointHoverRadius' => 10,
                    'pointHitRadius' => 30
                ]
            ]
        ];

        $chartLabels = [];

        return response()->json([
            'labels' => $chartLabels,
            'datasets' => $chartData
        ]);
    }



}
