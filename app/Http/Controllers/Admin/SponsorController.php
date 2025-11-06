<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Sponsor::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'logo' => 'nullable|string',
            'website' => 'nullable|string',
            'category' => 'nullable|string',
            'language' => 'nullable|string'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsor $sponsor)
    {
        return $sponsor;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        $sponsor->update($request->all());
        return $sponsor;        
    }

  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
        return response()->noContent();
    }
}