<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['title', 'description', 'speaker', 'start_time', 'end_time', 'day', 'language'];
}
