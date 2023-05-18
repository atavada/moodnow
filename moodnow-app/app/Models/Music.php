<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'musics';

    public function questionnaire()
    {
        return $this->belongsToMany(Questionnaire::class);
    }
}
