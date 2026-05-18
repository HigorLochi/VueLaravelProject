<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Report::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Report::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Report::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(Report::where('id', $id)->exists()){
            $report = Report::find($id);

            $report->title = $request->title;
            $report->description = $request->description;
            $report->danger_level = $request->danger_level;
            $report->postal_code = $request->postal_code;
            $report->user_id = $request->user_id;

            $report->save();

            return reponse()->json([
                "message" => "Report updated succesfully"
            ], 200);
        }else{
            return reponse()->json([
                "message" => "Report not found"
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Report::where('id', $id)->exists()){
            $report = Report::find($id);

            $report->delete();

            return reponse()->json([
                "message" => "Report deleted succesfully"
            ], 200);
        }else{
            return reponse()->json([
                "message" => "Report not found"
            ], 400);
        }
    }
}
