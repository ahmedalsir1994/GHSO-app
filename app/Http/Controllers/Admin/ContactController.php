<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactForm::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(ContactForm $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(ContactForm $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Message deleted successfully');
    }
}