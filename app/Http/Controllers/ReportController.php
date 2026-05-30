<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

use App\Exceptions\ReportNotFoundException;
use App\Models\Report;
 
class ReportController extends Controller
{
    public function all(): Collection
    {
        $report = new Report();
        
        return $report->with("user", "danger_level", "city.country")->get();
    }

    public function insert(Request $request): JsonResponse
    {
        foreach($request->reports as $report){
            Report::create($report);
        }

        return response()->json([
            'message' => "Report(s) created",
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $report = Report::find($id);

        if($report) $report->updateOrFail($request->report);
        else throw new ReportNotFoundException();

        return response()->json([
            'message' => "Report updated",
        ]);
    }

    public function delete(Request $request, string $id): JsonResponse
    {
        $report = Report::find($id);

        if($report) $report->destroy($request->report);
        else throw new ReportNotFoundException();

        return response()->json([
            'message' => "Report deleted",
        ]);
    }
}