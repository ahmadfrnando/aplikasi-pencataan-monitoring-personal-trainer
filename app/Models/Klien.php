<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    use HasFactory;

    protected $table = 'klien';

    protected $guarded = [];

    const TARGET_MENGURANGIN = true;
    const TARGET_MENAIKKAN = false;

    protected static function boot()
    {
        parent::boot();
        // 80 < 100
        static::created(function ($klien) {
            if ($klien->target_berat_badan < $klien->berat_badan) {
                $klien->update([
                    'is_menaikkan_muscle' => true,
                    'is_mengurangi_fat' => true,
                ]);
            }
            if ($klien->target_berat_badan > $klien->berat_badan) {
                $klien->update([
                    'is_menaikkan_muscle' => true,
                    'is_mengurangi_fat' => false,
                ]);
            }
        });
    }

    public function trainer()
    {
        return $this->belongsTo(User::class);
    }

    public function pengukuran()
    {
        return $this->hasMany(PengukuranKlien::class);
    }
    public function program_latihan_klien()
    {
        return $this->hasMany(ProgramLatihanKlien::class); 
    }
}
