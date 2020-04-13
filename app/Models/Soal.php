<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $guarded = [];


    public function jawabans()
    {
        return $this->hasMany(Jawaban::class);
    }

    public function alasans()
    {
        return $this->hasMany(Alasan::class);
    }
}