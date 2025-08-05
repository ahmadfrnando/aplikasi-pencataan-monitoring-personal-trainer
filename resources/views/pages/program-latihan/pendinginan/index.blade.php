@extends('layout.app')

@section('content')
<div class="row">
    <a href="{{ route('program-latihan-klien.show', $program->klien->id) }}" class="text-secondary-emphasis mb-4 d-inline"><i class="ti ti-arrow-left"></i> Kembali</a>
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title fw-semibold text-center">Informasi Klien</h3>
                <a href="{{ route('klien.pengukuran.create',$program->klien->id) }}" class="btn btn-primary"><i class="ti ti-plus"></i> Tambah Pengukuran Baru</a>
            </div>
            <div class="card-body">
                <div class="mb-2 row">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/profile/' . ($program->klien->jenis_kelamin == 'Laki-laki' ? 'user-1.jpg' : 'user-2.jpg')) }}" class="rounded-circle" width="60"
                            alt="flexy" />
                        <div class="ms-3">
                            <h3 class="mb-0 fw-bolder">{{ $program->klien->nama ?? '-' }} - {{ $program->klien->pekerjaan ?? '-' }}</h3>
                            <div class="d-flex gap-4 mt-2 align-items-center justify-content-start">
                                <div>
                                    <i class="ti ti-cake text-muted"></i>
                                    <span class="text-muted">Usia: {{ $program->klien->usia }} Tahun</span>
                                </div>
                                <div>
                                    <i class="ti ti-gender-male text-muted"></i>
                                    <span class="text-muted">Jenis Kelamin: {{ $program->klien->jenis_kelamin }}</span>
                                </div>
                                <div>
                                    <i class="ti ti-weight text-muted"></i>
                                    <span class="text-muted">Berat Badan: {{ $program->klien->berat_badan }} Kg</span>
                                </div>
                                <div>
                                    <i class="ti ti-ruler text-muted"></i>
                                    <span class="text-muted">Tinggi Badan: {{ $program->klien->tinggi_badan }} Cm</span>
                                </div>
                                <div>
                                    <i class="ti ti-target text-muted"></i>
                                    <span class="text-muted">Target: {{ $program->klien->target_berat_badan }} Kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <div class="step">
                        <a href="{{ route('program.pemanasan.index', $program->id)  }}" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Pemanasan</span>
                        </a>
                    </div>
                    <div class="line"></div>
                    <div class="step">
                        <a href="{{ route('program.latihan-inti.index', $program->id) }}" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Latihan Inti</span>
                        </a>
                    </div>
                    <div class="line"></div>
                    <div class="step active">
                        <a href="{{ route('program.pendinginan.index', $program->id) }}" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">Pendinginan</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title fw-semibold text-center">Semua Latihan Pendinginan</h3>
                <button type="button" data-bs-toggle="modal" data-bs-target="#tambahLatihanPendinginan" data-id="{{ $program->id }}" class="btn btn-primary justify-content-center text-white text-center">
                    <i class="ti ti-plus me-2"></i>
                    Tambah Latihan Pendinginan
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive mt-4">
                    <table id="table-pendinginan" class="table mb-0 text-nowrap varient-table align-middle fs-3">
                        <thead>
                            <tr>
                                <th scope="col" class="px-0 text-muted">
                                    Target
                                </th>
                                <th scope="col" class="px-0 text-muted">Gerakan</th>
                                <th scope="col" class="px-0 text-muted">
                                    Notes
                                </th>
                                <th scope="col" class="px-0 text-muted">
                                    Status
                                </th>
                                <th scope="col" class="px-0 text-muted">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!$program->program_latihan_pendinginan->isEmpty())
                            @foreach ($program->program_latihan_pendinginan as $key => $value)
                            <tr>
                                <td class="px-0">{{ $value->target }}</td>
                                <td class="px-0">{{ $value->gerakan }}</td>
                                <td class="px-0">{{ $value->catatan }}</td>
                                <td class="px-0">
                                    <input class="form-check-input primary checkbox" type="checkbox" id="is_done" name="is_done" style="background-color: #1e4db7 !important;" data-id="{{ $value->id }}" {{ $value->is_done == 1 ? 'checked' : '' }}>
                                </td>
                                <td class="px-0 justify-content-center gap-2 d-flex">
                                    <button id="btnEdit" data-bs-toggle="modal" data-bs-target="#ubahLatihanPendinginan-{{ $value->id }}" data-id="{{ $value->id }}" class="btn btn-sm btn-primary"><i class="ti ti-edit"></i></button>
                                    <button id="btnDelete" data-id="{{ $value->id }}" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>
                                </td>
                                @include('pages.program-latihan.pendinginan.edit-modal-form')
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-center">
                                    <figure><img src="{{ asset('assets/images/illustrator/personal-trainer.svg') }}" alt="pt" width="250" class="img-fluid">
                                        <figcaption class="text-muted mt-3">Belum ada latihan pendinginan</figcaption>
                                    </figure>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @include('pages.program-latihan.pendinginan.create-modal-form')
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type='text/javascript'>
    $(function() {
        let table = '#table-pendinginan';
        let formSelector = '#submitForm';
        let modal = '#tambahLatihanPendinginan';
        let actionUrl = "{{ route('program.pendinginan.store') }}";
        let successMessage = 'Data berhasil disimpan!';
        let redirectUrl = "{{ route('program.pendinginan.index', $program->id) }}";
        submitFormModal(formSelector, actionUrl, successMessage, modal, table, redirectUrl);

        $(document).on('click', '#btnEdit', function() {
            let formSelectorEdit = '#updateForm';
            let modalEdit = $(this).data('bs-target');
            let id = $(this).data('id');
            let actionUrlEdit = "{{ route('program.pendinginan.update', ':id') }}";
            actionUrlEdit = actionUrlEdit.replace(':id', id);
            let successMessageEdit = 'Data berhasil diubah!';
            let redirectUrlEdit = "{{ route('program.pendinginan.index', $program->id) }}";
            submitFormModal(formSelectorEdit, actionUrlEdit, successMessageEdit, modalEdit, table, redirectUrlEdit);
        });

        $(document).on('click', '.checkbox', function() {
            var id = $(this).data('id');
            var is_done = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                url: '{{ route("program.pendinginan.update-isdone") }}', // Route to handle saving the data
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    is_done: is_done
                },
                success: function(response) {
                    $('#table-pendinginan').load(location.href + ' #table-pendinginan > *');
                },
                error: function(xhr, status, error) {
                    console.log("Error: " + error);
                }
            });
        });

        $(document).on('click', '#btnDelete', function() {
            var id = $(this).data('id');
            var route = "{{ route('program.pendinginan.destroy', ':id') }}";
            route = route.replace(':id', id);
            var table = '#table-pendinginan';
            deleteData(route, table);
        });
    });
</script>
@endpush
@endsection