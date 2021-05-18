<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class SampleChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['First', 'Second', 'Third', 'Second', 'Third', 'Second', 'Third'])
            ->dataset('Sample', [ 30, 70, 3, 20, 3, 87,78, 100])
            ->dataset('Sample 2', [ 30, 87,78, 100, 70, 3, 20, 3]);
    }
}