<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramLatihanPendinginan extends Model
{
    use HasFactory;

    protected $table = 'program_latihan_pendinginan';

    protected $guarded = ['id'];

    public function program_latihan_klien()
    {
        return $this->belongsTo(ProgramLatihanKlien::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
