<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
      public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'nullable|string',
            'message' => 'required|string'
        ]); 
        ContactForm::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactForm $contact)
    {
        return $contact;
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactForm $contact)
    {
        $contact->update($request->all());
        return $contact;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactForm $contact)
    {
        $contact->delete();
        return response()->noContent();
    }
}