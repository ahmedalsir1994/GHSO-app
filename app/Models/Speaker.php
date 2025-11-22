<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = ['name', 'photo', 'bio', 'language', 'organization','logo', 'title'];

    /**
     * Get the logo height class for this speaker
     * Allows different logo sizes per speaker
     */
    public function getLogoHeightClass()
    {
        $logoHeights = [
            'Afraa Amur' => 'h-16',
            'Jamal K AlAsmi' => 'h-10',
        ];

        return $logoHeights[$this->name] ?? 'h-10';
    }
}