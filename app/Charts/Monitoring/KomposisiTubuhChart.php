<?php

namespace App\Charts\Monitoring;

use App\Models\PengukuranKlien;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KomposisiTubuhChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($klien_id): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $pengukuran = PengukuranKlien::where('klien_id', $klien_id)
            ->orderBy('tanggal', 'asc')
            ->get(['tanggal', 'berat_badan', 'muscle_whole_body', 'body_fat', 'fat_whole_body']);  // Pastikan mengambil kolom yang diperlukan
        // Mengambil tanggal sebagai label untuk sumbu X
        $tanggal = $pengukuran->pluck('tanggal')->map(function ($date) {
            return $date;  // Format tanggal sesuai dengan yang diinginkan
        });

        // Ambil data untuk masing-masing kolom
        $berat_badan = $pengukuran->pluck('berat_badan');
        $massa_otot = $pengukuran->pluck('muscle_whole_body');
        $persentase_lemak = $pengukuran->pluck('body_fat');
        $lemak_tubuh = $pengukuran->pluck('fat_whole_body');

        // Membuat chart dengan data yang diambil
        return $this->chart->lineChart()
            ->setTitle('Komposisi Tubuh')
            ->setSubtitle('Data pengukuran komposisi tubuh')
            ->addData('Berat Badan', $berat_badan->toArray())  // Data untuk berat badan
            ->addData('Massa Otot', $massa_otot->toArray())  // Data untuk massa otot
            ->addData('Lemak Tubuh', $lemak_tubuh->toArray())  // Data untuk lemak tubuh
            ->addData('Persentase Lemak', $persentase_lemak->toArray())  // Data untuk persentase lemak
            ->setXAxis($tanggal->toArray());  // Menambahkan tanggal sebagai label pada sumbu X
    }
}
