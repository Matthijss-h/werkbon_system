<?php

namespace App\Http\Controllers;

use App\Models\Workorder;
use Illuminate\Http\Request;

class WorkorderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($status = 'open')
    {
        $workorders = Workorder::where('status', $status)->get();

        return view('workorders.index', compact('workorders', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Workorder $workorder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workorder $workorder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workorder $workorder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workorder $workorder)
    {
        //
    }
}
