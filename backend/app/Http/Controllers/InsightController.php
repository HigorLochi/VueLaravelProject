<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

use App\Models\Report;

class InsightController extends Controller
{

    private $months = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ];

    public function reportcountbymonth(Request $request)
    {
        $reponse = [];

        foreach($this->months as $idx => $month){
            $reponse[$month] = (Report::whereYear('created_at', date("Y"))->whereMonth('created_at', $idx)->get())->count();
        }

        return $reponse;
    }
}
