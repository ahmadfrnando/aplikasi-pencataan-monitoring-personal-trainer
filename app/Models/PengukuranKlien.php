<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengukuranKlien extends Model
{
    use HasFactory;

    protected $table = 'pengukuran_klien';

    protected $guarded = [];

    protected $casts = [
        'berat_badan' => 'float',
        'weist_circumference' => 'float',
        'body_fat' => 'float',
        'visceral_fat' => 'float',
        'bmi' => 'float',
        'body_age' => 'float',
        'fat_whole_body' => 'float',
        'fat_trunk' => 'float',
        'fat_arm' => 'float',
        'fat_leg' => 'float',
        'muscle_leg' => 'float',
        'muscle_arm' => 'float',
        'muscle_trunk' => 'float',
        'muscle_whole_body' => 'float',
        'leher' => 'float',
        'lengan_kanan_atas' => 'float',
        'lengan_kanan_bawah' => 'float',
        'lengan_kiri_atas' => 'float',
        'lengan_kiri_bawah' => 'float',
        'dada' => 'float',
        'pinggang' => 'float',
        'perut' => 'float',
        'panggul' => 'float',
        'paha_kanan' => 'float',
        'paha_kiri' => 'float',
        'betis_kiri' => 'float',
        'betis_kanan' => 'float',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($pengukuran) {
            $pengukuran->no_urut_pengukuran = $pengukuran->klien->pengukuran()->count();
            $pengukuran->save();
        });
    }

    public function klien()
    {
        return $this->belongsTo(Klien::class);
    }

    public function isSesuaiTarget($attribut, $nilaiSekarang)
    {
        $nilaiSebelum = PengukuranKlien::where('klien_id', $this->klien_id)->where('no_urut_pengukuran', $this->no_urut_pengukuran - 1)->first()->$attribut;
        if ($this->klien->is_mengurangi_fat) {
            if ($nilaiSebelum >= $nilaiSekarang) {
                return 'row-success';
            } else {
                return 'row-danger';
            }
        }
        if (!$this->klien->is_mengurangi_fat) {
            if ($nilaiSebelum >= $nilaiSekarang) {
                return 'row-danger';
            } else {
                return 'row-success';
            }
        }
    }
}
