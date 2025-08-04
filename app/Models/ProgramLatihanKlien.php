<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramLatihanKlien extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'program_latihan_klien';

    public function klien()
    {
        return $this->belongsTo(Klien::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program_latihan_inti()
    {
        return $this->hasMany(ProgramLatihanInti::class, 'program_latihan_id');
    }

    public function program_latihan_pendinginan()
    {
        return $this->hasMany(ProgramLatihanPendinginan::class, 'program_latihan_id');
    }

    public function program_pemanasan()
    {
        return $this->hasMany(ProgramPemanasan::class, 'program_latihan_id');
    }
}
