@extends('layout.admin')

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
                    <i class="fas fa-dumbbell stat-icon"></i>
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
                    <i class="fas fa-fire stat-icon"></i>
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
                    <h5 class="card-title mb-0">5 Daftar Personal Trainer Terbaru</h5>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                        <thead>
                            <tr>
                                <th scope="col" class="px-0 text-muted">
                                    Nama Personal Trainer
                                </th>
                                <th scope="col" class="px-0 text-muted">Jumlah Klien</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trainer as $t)
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                         <img src="{{ asset($t->getPhotoProfile())}}" class="rounded-circle" width="48"
                                alt="flexy" />
                                        <div class="ms-3">
                                            <h6 class="mb-0 fw-bolder">{{ $t->name }}</h6>
                                            <span class="text-muted">{{ $t->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-0">{{ $t->klien->count() }}</td>
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