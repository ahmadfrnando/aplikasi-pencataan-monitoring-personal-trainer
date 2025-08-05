@extends('layout.app')

@section('content')
<div class="row">
    <a href="{{ route('monitoring.index') }}" class="text-secondary-emphasis mb-4 d-inline"><i class="ti ti-arrow-left"></i> Kembali</a>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2 row">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/profile/' . ($klien->jenis_kelamin == 'Laki-laki' ? 'user-1.jpg' : 'user-2.jpg')) }}" class="rounded-circle" width="60"
                            alt="flexy" />
                        <div class="ms-3">
                            <h3 class="mb-0 fw-bolder">{{ $klien->nama }} - {{ $klien->pekerjaan }}</h3>
                            <div class="d-flex gap-4 mt-2 align-items-center justify-content-start">
                                <div>
                                    <i class="ti ti-cake text-muted"></i>
                                    <span class="text-muted">Usia: {{ $klien->usia }} Tahun</span>
                                </div>
                                <div>
                                    <i class="ti ti-gender-male text-muted"></i>
                                    <span class="text-muted">Jenis Kelamin: {{ $klien->jenis_kelamin }}</span>
                                </div>
                                <div>
                                    <i class="ti ti-weight text-muted"></i>
                                    <span class="text-muted">Berat Badan: {{ $klien->berat_badan }} Kg</span>
                                </div>
                                <div>
                                    <i class="ti ti-ruler text-muted"></i>
                                    <span class="text-muted">Tinggi Badan: {{ $klien->tinggi_badan }} Cm</span>
                                </div>
                                <div>
                                    <i class="ti ti-target text-muted"></i>
                                    <span class="text-muted">Target: {{ $klien->target_berat_badan }} Kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.monitoring.chart.stats-overview')
    @include('pages.monitoring.chart.kebugaran-tubuh-chart')
    @include('pages.monitoring.chart.riwayat-data-pengukuran')

</div>
@push('scripts')
<script src="{{ $chart->cdn() }}"></script>
{!! $chart->script() !!}
@push('scripts')
<script type='text/javascript'>
    $(function() {
        var route = "{{ route('monitoring.riwayat-data-pengukuran', $klien->id) }}";
        var selector = ".data-table";
        var columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'w-8 text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'tanggal',
                name: 'tanggal',
                format: 'raw',
                render: function(data, type, row) {
                    return moment(data).format('DD-MM-YYYY') ?? '-';
                }
            },
            {
                data: 'berat_badan',
                name: 'berat_badan',
                render: function(data, type, row) {
                    return data ? data + ' Kg' : '-';
                }
            },
            {
                data: 'fat_whole_body',
                name: 'fat_whole_body',
                render: function(data, type, row) {
                    return data ? data + ' %' : '-';
                }
            },
            {
                data: 'muscle_whole_body',
                name: 'muscle_whole_body',
                render: function(data, type, row) {
                    return data ? data + ' %' : '-';
                }
            },
            {
                data: 'pinggang',
                name: 'pinggang',
                render: function(data, type, row) {
                    return data ? data + ' Cm' : '-';
                }
            },
        ];
        var table = initializeDataTableParams(selector, route, columns);
    });
</script>
@endpush
@endpush
@endsection