@extends('layout.app')

@section('content')
<div class="row">
    <a href="{{ route('program.latihan-inti.index', $program->id) }}" class="text-secondary-emphasis mb-4 d-inline"><i class="ti ti-arrow-left"></i> Kembali</a>
    <div class="col-12">
        <h5 class="card-title fw-semibold mb-4">Informasi Klien</h5>
        <div class="card">
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
            <ul class="nav nav-pills gap-4 nav-fill my-4">
                <li class="nav-item bg-muted border border-primary rounded">
                    <a href="{{ route('program.pemanasan.index', $program->id) }}" class="nav-link" aria-current="page">
                        <div class="d-flex align-items-center gap-2 justify-content-center text-white">
                            <span class="bg-white rounded-circle text-primary round-20 hstack justify-content-center">
                                1
                            </span>
                            Pemanasan
                        </div>
                    </a>
                </li>
                <li class="nav-item rounded">
                    <a href="{{ route('program.latihan-inti.index', $program->id) }}" class="nav-link active">
                        <div class="d-flex align-items-center gap-2 justify-content-center text-white">
                            <span class="bg-white rounded-circle text-primary round-20 hstack justify-content-center">
                                2
                            </span>
                            Latihan Inti
                        </div>
                    </a>
                </li>
                <li class="nav-item bg-muted rounded">
                    <a href="{{ route('program.pendinginan.index', $program->id) }}" class="nav-link">
                        <div class="d-flex align-items-center gap-2 justify-content-center text-white">
                            <span class="bg-white rounded-circle text-primary round-20 hstack justify-content-center">
                                3
                            </span>
                            Pendinginan
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <hr />
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title fw-semibold text-center">Tambah Latihan Inti</h3>
            </div>
            <div class="card-body">
                <form id="formSubmit">
                    @csrf
                    <div class="row mb-3">
                        <input type="number" id="program_latihan_id" value="{{ $program->id }}" name="program_latihan_id" readonly hidden>
                        <div class="col-md-4 mt-2">
                            <label for="target_otot" class="form-label">Target Otot</label>
                            <input type="text" name="target_otot" value="{{ old('target_otot') }}" id="target_otot" class="form-control @error('target_otot') is-invalid @enderror" id="target_otot" oninput="capitalizeWords(this)" required>
                            @error('target_otot')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="gerakan" class="form-label">Gerakan</label>
                            <input type="text" name="gerakan" value="{{ old('gerakan') }}" id="gerakan" class="form-control @error('gerakan') is-invalid @enderror" id="gerakan" oninput="capitalizeWords(this)" required>
                            @error('gerakan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="alat" class="form-label">Alat</label>
                            <input type="text" name="alat" value="{{ old('alat') }}" id="alat" class="form-control @error('alat') is-invalid @enderror" id="alat" oninput="capitalizeWords(this)" required>
                            @error('alat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mt-2">
                            <label for="set" class="form-label">Set</label>
                            <input type="text" name="set" value="{{ old('set') }}" id="set" class="form-control @error('set') is-invalid @enderror" id="set" oninput="capitalizeWords(this)" required>
                            @error('set')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mt-2">
                            <label for="rep" class="form-label">Rep</label>
                            <input type="text" name="rep" value="{{ old('rep') }}" id="rep" class="form-control @error('rep') is-invalid @enderror" id="rep" oninput="capitalizeWords(this)" required>
                            @error('rep')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mt-2">
                            <label for="rest" class="form-label">Rest</label>
                            <input type="text" name="rest" value="{{ old('rest') }}" id="rest" class="form-control @error('rest') is-invalid @enderror" id="rest" oninput="capitalizeWords(this)" required>
                            @error('rest')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mt-2">
                            <label for="tempo" class="form-label">Tempo</label>
                            <input type="text" name="tempo" value="{{ old('tempo') }}" id="tempo" class="form-control @error('tempo') is-invalid @enderror" id="tempo" oninput="capitalizeWords(this)" required>
                            @error('tempo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="set_1" class="form-label">Set 1</label>
                            <input type="text" name="set_1" value="{{ old('set_1') }}" id="set_1" class="form-control @error('set_1') is-invalid @enderror" id="set_1" oninput="capitalizeWords(this)" required>
                            @error('set_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="beban_1" class="form-label">Beban 1</label>
                            <input type="text" name="beban_1" value="{{ old('beban_1') }}" id="beban_1" class="form-control @error('beban_1') is-invalid @enderror" id="beban_1" oninput="capitalizeWords(this)" required>
                            @error('beban_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="set_2" class="form-label">Set 2</label>
                            <input type="text" name="set_2" value="{{ old('set_2') }}" id="set_2" class="form-control @error('set_2') is-invalid @enderror" id="set_2" oninput="capitalizeWords(this)" required>
                            @error('set_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="beban_2" class="form-label">Beban 2</label>
                            <input type="text" name="beban_2" value="{{ old('beban_2') }}" id="beban_2" class="form-control @error('beban_2') is-invalid @enderror" id="beban_2" oninput="capitalizeWords(this)" required>
                            @error('beban_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="set_3" class="form-label">Set 3</label>
                            <input type="text" name="set_3" value="{{ old('set_3') }}" id="set_3" class="form-control @error('set_3') is-invalid @enderror" id="set_3" oninput="capitalizeWords(this)" required>
                            @error('set_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="beban_3" class="form-label">Beban 3</label>
                            <input type="text" name="beban_3" value="{{ old('beban_3') }}" id="beban_3" class="form-control @error('beban_3') is-invalid @enderror" id="beban_3" oninput="capitalizeWords(this)" required>
                            @error('beban_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="set_4" class="form-label">Set 4</label>
                            <input type="text" name="set_4" value="{{ old('set_4') }}" id="set_4" class="form-control @error('set_4') is-invalid @enderror" id="set_4" oninput="capitalizeWords(this)" required>
                            @error('set_4')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="beban_4" class="form-label">Beban 4</label>
                            <input type="text" name="beban_4" value="{{ old('beban_4') }}" id="beban_4" class="form-control @error('beban_4') is-invalid @enderror" id="beban_4" oninput="capitalizeWords(this)" required>
                            @error('beban_4')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="set_5" class="form-label">Set 5</label>
                            <input type="text" name="set_5" value="{{ old('set_5') }}" id="set_5" class="form-control @error('set_5') is-invalid @enderror" id="set_5" oninput="capitalizeWords(this)" required>
                            @error('set_5')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="beban_5" class="form-label">Beban 5</label>
                            <input type="text" name="beban_5" value="{{ old('beban_5') }}" id="beban_5" class="form-control @error('beban_5') is-invalid @enderror" id="beban_5" oninput="capitalizeWords(this)" required>
                            @error('beban_5')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mt-2">
                            <label for="catatan" class="form-label">Notes</label>
                            <textarea type="text" rows="3" name="catatan" id="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan" oninput="capitalizeWords(this)" required>{{ old('catatan') }}</textarea>
                            @error('catatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ route('program.latihan-inti.index', $program->id) }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type='text/javascript'>
    $(function() {
        let formSelector = '#formSubmit';
        let actionUrl = "{{ route('program.latihan-inti.store', $program->id) }}";
        let successMessage = 'Data berhasil disimpan!';
        let redirectUrl = "{{ route('program.latihan-inti.index', $program->id) }}";
        submitFormAjax(formSelector, actionUrl, successMessage, redirectUrl);
    });
</script>
@endpush
@endsection