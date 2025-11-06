<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    PageController,
    SpeakerController,
    SponsorController,
    AgendaItemController,
    ContactMessageController
};
use App\Models\Agenda;
use App\Models\ContactForm;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('pages', PageController::class);
    Route::resource('speakers', SpeakerController::class);
    Route::resource('sponsors', SponsorController::class);
    Route::resource('agenda', Agenda::class);
    Route::resource('messages', ContactForm::class)->only(['index', 'show', 'destroy']);
});