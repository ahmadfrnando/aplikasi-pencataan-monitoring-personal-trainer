@extends('layout.app')

@section('content')
<div class="row">
    <a href="{{ route('program-latihan-klien.index') }}" class="text-secondary-emphasis mb-4 d-inline"><i class="ti ti-arrow-left"></i> Kembali</a>
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
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center   ">
                <h5 class="card-title fw-semibold">Semua Program Latihan</h5>
                <button id="btnTambah" data-bs-toggle="modal" data-bs-target="#tambahProgramLatihan" data-id="{{ $klien->id }}" class="btn btn-primary"><i class="ti ti-plus"></i> Tambah Program Latihan</button>
                @include('pages.program-latihan.create-modal-form')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table">
                        <thead class="text-sm">
                            <tr>
                                <th width="7%" class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">No</th>
                                <th width="15%" class="text-uppercase text-secondary font-weight-bolder opacity-7">Tanggal</th>
                                <th width="10%" class="text-uppercase text-secondary font-weight-bolder opacity-7">Hari</th>
                                <th width="20%" class="text-uppercase text-secondary font-weight-bolder opacity-7">Nama Program</th>
                                <th width="10%" class="text-uppercase text-secondary font-weight-bolder opacity-7">Durasi</th>
                                <th width="30%" class="text-uppercase text-secondary font-weight-bolder opacity-7">Catatan</th>
                                <th class="text-uppercase text-secondary font-weight-bolder opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('pages.program-latihan.edit-modal-form')
</div>
@push('scripts')
<script type='text/javascript'>
    $(function() {
        var route = "{{ route('program-latihan-klien.show', $klien->id) }}";
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
                    return moment(data).locale('id').format('LL') ?? '-';
                }
            },
            {
                data: 'tanggal',
                name: 'tanggal',
                format: 'raw',
                render: function(data, type, row) {
                    return moment(data).locale('id').format('dddd') ?? '-';
                }
            },
            {
                data: 'nama_program',
                name: 'nama_program',
            },
            {
                data: 'durasi_menit',
                name: 'durasi_menit',
                render: function(data, type, row) {
                    return data + ' Menit';
                }
            },
            {
                data: 'keterangan',
                name: 'keterangan',
            },
            {
                data: 'action',
                name: 'action',
                className: 'text-center',
                orderable: false,
                searchable: false
            }
        ];
        let table = initializeDataTableParams(selector, route, columns);

        let formSelector = '#submitForm';
        let modal = '#tambahProgramLatihan';
        let actionUrl = "{{ route('program-latihan-klien.store') }}";
        let successMessage = 'Data berhasil disimpan!';
        let redirectUrl = "{{ route('program-latihan-klien.show', $klien->id) }}";
        let tableSelector = '.data-table';
        submitFormAjaxModal(formSelector, actionUrl, successMessage, modal);

        $(document).on('click', '#btnEdit', function() {
            let formSelectorEdit = '#updateForm';
            let modalEdit = $(this).data('bs-target');
            let id = $(this).data('id');
            let actionUrlEdit = "{{ route('program-latihan-klien.update', ':id') }}";
            actionUrlEdit = actionUrlEdit.replace(':id', id);
            let successMessageEdit = 'Data berhasil diubah!';
            let redirectUrlEdit = "{{ route('program-latihan-klien.index') }}";
            submitFormAjaxModal(formSelectorEdit, actionUrlEdit, successMessageEdit, modalEdit, tableSelector);
            
            $.ajax({
                url: "{{ route('program-latihan-klien.edit', ':id') }}".replace(':id', id),
                type: 'GET',
                success: function(response) {
                    $(formSelectorEdit).find('#nama_program').val(response.program.nama_program);
                    $(formSelectorEdit).find('#tanggal').val(response.program.tanggal);
                    $(formSelectorEdit).find('#durasi_menit').val(response.program.durasi_menit);
                    $(formSelectorEdit).find('#keterangan').val(response.program.keterangan);
                },
                error: function(xhr) {
                    console.error(xhr);
                }
            });
        });

        $(document).on('click', '#btnHapus', function() {
            var idHapus = $(this).data('id');
            var routeHapus = "{{ route('program-latihan-klien.destroy', ':id') }}";
            routeHapus = routeHapus.replace(':id', idHapus);
            deleteDataAjax(routeHapus, table);
        });
    });
</script>
@endpush
@endsection