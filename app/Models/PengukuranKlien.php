<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengukuranKlien extends Model
{
    use HasFactory;

    protected $table = 'pengukuran_klien';

    protected $guarded = [];

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
        if($this->klien->is_mengurangi_fat) {
            if($nilaiSebelum >= $nilaiSekarang){
                return 'row-success';
            } else {
                return 'row-danger';
            }
        }
        if(!$this->klien->is_mengurangi_fat) {
            if($nilaiSebelum >= $nilaiSekarang){
                return 'row-danger';
            } else {
                return 'row-success';
            }
        }
    }
}
