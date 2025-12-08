<?php

namespace App\Http\Controllers;

use App\Models\Workorder;
use App\Models\Material;
use App\Models\Photo;
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
    public function create(Workorder $workorder)
    {
        return view('workorders.create', compact('workorder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'employee_name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date_format:d-m-Y',
            'end_date' => 'required|date_format:d-m-Y|after_or_equal:start_date',
            'material_name' => 'required|string|max:255',
            'material_quantity' => 'required|integer|min:1',
            'photo' => 'required|image|max:2048',
    ]);

        $photoPath = $request->file('photo')->store('workorders/photos', 'public');

        // Create the workorder
        $workorder = Workorder::create([
            'employee_name' => $validated['employee_name'],
            'description' => $validated['description'],
            'start' => $validated['start_date'],
            'end' => $validated['end_date'],
            'photo' => $photoPath,
            'status' => 'open',
        ]);

        Material::create([
            'name' => $validated['material_name'],
            'quantity' => $validated['material_quantity'],
            'workorder_id' => $workorder->id,
        ]);

        Photo::create([
            'url' => $photoPath,
            'workorder_id' => $workorder->id,
        ]);


        return redirect()->route('workorders.index', 'open');
    }

    /**
     * Display the specified resource.
     */
    public function show(Workorder $workorder)
    {
        // Load the relationships
        $workorder->load(['photos', 'materials']);
        
        return view('workorders.show', compact('workorder'));
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
    * Mark the workorder as completed.
    */
    public function complete(Workorder $workorder)
    {
        $workorder->update(['status' => 'closed']);
    
        return redirect()->route('workorders.index', 'open');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workorder $workorder)
    {
        //
    }
}
