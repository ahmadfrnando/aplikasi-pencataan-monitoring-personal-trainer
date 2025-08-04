<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPemanasan extends Model
{
    use HasFactory;

    protected $table = 'program_pemanasan';

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
