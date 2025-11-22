<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\ContactForm;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {
       $stats = [
           'total_agendas' => Agenda::count(),
           'total_speakers' => Speaker::count(),
           'total_sponsors' => Sponsor::count(),
           'total_contacts' => ContactForm::count(),
           'total_pages' => Page::count(),
           'total_users' => User::count(),
       ];

       $agendas = Agenda::latest()->take(5)->get();
       $speakers = Speaker::latest()->take(5)->get();
       $sponsors = Sponsor::latest()->take(5)->get();
       $contacts = ContactForm::latest()->take(5)->get();
       $pages = Page::latest()->take(5)->get();

       return view('dashboard.index', compact(
           'stats',
           'agendas',
           'speakers',
           'sponsors',
           'contacts',
           'pages'
       ));
   }
}