<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Speaker::all());
    }
 
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'title' => 'nullable',
            'organization' => 'nullable',
            'photo' => 'nullable|string',
            'bio' => 'nullable|string',
            'language' => 'nullable|string'
            
        ]);


        return Speaker::create($data);
    }

  
    public function show(Speaker $speaker)
    {
        return $speaker;
    }

    public function update(Request $request, Speaker $speaker)
    {
         $speaker->update($request->all());
        return $speaker;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speaker $speaker)
    {
        $speaker->delete();
        return response()->noContent();
    }
}