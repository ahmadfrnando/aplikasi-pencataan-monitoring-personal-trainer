@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="mr-3">
                    <i class="fas fa-users stat-icon"></i>
                </div>
                <div class="ms-2">
                    <div class="stat-value">{{ $stats['total_klien'] }} Orang</div>
                    <div class="text-muted">Total Klien</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mt-4 mt-md-0">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="mr-3">
                    <i class="fas fa-shopping-cart stat-icon"></i>
                </div>
                <div class="ms-2">
                    <div class="stat-value">{{ $stats['total_klien_bulking'] }} Orang</div>
                    <div class="text-muted">Bulking Klien</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mt-4 mt-md-0">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="mr-3">
                    <i class="fas fa-dollar-sign stat-icon"></i>
                </div>
                <div class="ms-2">
                    <div class="stat-value">{{ $stats['total_klien_cutting'] }} Orang</div>
                    <div class="text-muted">Cutting Klien</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title mb-0">Pengukuran Klien Terbaru</h5>
                </div>
                <div class="list-group list-group-flush">
                    @foreach($dataPengukuranTerbaru['data'] as $key => $pengukuran)
                    <div class="list-group-item border-0 d-flex align-items-center px-0">
                        <div class="avatar-sm bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                            <img src="{{ asset('assets/images/profile/' . ($pengukuran['jenis_kelamin'] == 'Laki-laki' ? 'user-1.jpg' : 'user-2.jpg')) }}" class="rounded-circle" width="48"
                                alt="flexy" />
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">{{ $pengukuran['nama'] ?? '' }}</h6>
                            <p class="text-muted small mb-0">{{ $pengukuran['nama_program_latihan'] ?? '' }}</p>
                        </div>
                        <small class="text-muted">{{ $pengukuran['waktu_terakhir'] ?? '' }}</small>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title mb-0">5 Daftar Klien Terbaru</h5>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                        <thead>
                            <tr>
                                <th scope="col" class="px-0 text-muted">
                                    Nama Klien
                                </th>
                                <th scope="col" class="px-0 text-muted">Berat Badan</th>
                                <th scope="col" class="px-0 text-muted">
                                    Target Berat Badan
                                </th>
                                <th scope="col" class="px-0 text-muted text-end">
                                    Persentase Pencapaian
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataTableKlienTerbaru['data'] as $key => $klien)
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                         <img src="{{ asset('assets/images/profile/' . ($klien['jenis_kelamin'] == 'Laki-laki' ? 'user-1.jpg' : 'user-2.jpg')) }}" class="rounded-circle" width="48"
                                alt="flexy" />
                                        <div class="ms-3">
                                            <h6 class="mb-0 fw-bolder">{{ $klien['nama'] ?? '' }}</h6>
                                            <span class="text-muted">{{ $klien['nama_program_latihan'] ?? '' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-0">{{ $klien['berat_badan'] ?? 0 }} Kg</td>
                                <td class="px-0">{{ $klien['target_berat_badan'] ?? 0 }} Kg
                                </td>
                                <td class="px-0 text-dark fw-medium text-end">
                                    <span class="badge bg-success">{{ $klien['persentase_pencapaian_terakhir'] ?? 0 }} %</span>  
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection