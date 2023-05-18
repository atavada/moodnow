<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function color()
    {
        return $this->hasOne(Color::class);
    }
    
    public function music()
    {
        return $this->hasMany(Music::class);
    }
}
