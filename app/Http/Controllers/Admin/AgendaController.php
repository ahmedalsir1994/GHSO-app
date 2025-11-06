<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Agenda::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = $request->validate([
           'title' => 'required|string',
           'description' => 'nullable|string',
           'start_time' => 'required|date',
           'end_time' => 'required|date|after_or_equal:start_time',
           'location' => 'nullable|string',
            'language' => 'nullable|string'
       ]);
       Agenda::create($data);   
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        return $agenda;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( $request, Agenda $agenda)
    {
      $agenda->update($request->all());
      return $agenda;
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return response()->noContent();
    }
}