<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speaker;
use Illuminate\Support\Facades\Storage;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::paginate(10);
        return view('admin.speakers.index', compact('speakers'));
    }

    public function create()
    {
        return view('admin.speakers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'organization' => 'nullable|string|max:255',
            'logo' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'photo' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'bio' => 'nullable|string',
            'language' => 'nullable|string|max:5'
        ]);

        // Handle file upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['photo'] = $filename;
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images/logos'), $filename);
            $validated['logo'] = $filename;
        }

        Speaker::create($validated);
        return redirect()->route('speakers.index')->with('success', 'Speaker created successfully');
    }

    public function show(Speaker $speaker)
    {
        return view('admin.speakers.show', compact('speaker'));
    }

    public function edit(Speaker $speaker)
    {
        return view('admin.speakers.edit', compact('speaker'));
    }

    public function update(Request $request, Speaker $speaker)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'organization' => 'nullable|string|max:255',
            'logo' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'photo' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'bio' => 'nullable|string',
            'language' => 'nullable|string|max:5'
        ]);

        // Handle file upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($speaker->photo && file_exists(public_path('images/' . $speaker->photo))) {
                unlink(public_path('images/' . $speaker->photo));
            }
            
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['photo'] = $filename;
        }

        if($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($speaker->logo && file_exists(public_path('images/logos/' . $speaker->logo))) {
                unlink(public_path('images/logos/' . $speaker->logo));
            }
            
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images/logos'), $filename);
            $validated['logo'] = $filename;
        }

        $speaker->update($validated);
        return redirect()->route('speakers.index')->with('success', 'Speaker updated successfully');
    }

    public function destroy(Speaker $speaker)
    {
        // Delete photo file if exists
        if ($speaker->photo && file_exists(public_path('images/' . $speaker->photo))) {
            unlink(public_path('images/' . $speaker->photo));
        }
        // Delete logo file if exists
        if ($speaker->logo && file_exists(public_path('images/logos/' . $speaker->logo))) {
            unlink(public_path('images/logos/' . $speaker->logo));
        }
        
        $speaker->delete();
        return redirect()->route('speakers.index')->with('success', 'Speaker deleted successfully');
    }
}