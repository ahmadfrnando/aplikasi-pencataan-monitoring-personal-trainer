@extends('layout.app')

@section('content')
<div class="row">
    <a href="{{ route('klien.index') }}" class="text-secondary-emphasis mb-4 d-inline"><i class="ti ti-arrow-left"></i> Kembali</a>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Ubah Data Klien</h5>
                <div class="card">
                    <div class="card-body">
                        <form id="formSubmit">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama Klien</label>
                                    <input type="text" name="nama" value="{{ old('nama') ?? $klien->nama }}" id="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" oninput="capitalizeWords(this)">
                                    @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin">
                                        <option value="">--Pilih Jenis Kelamin--</option>
                                        <option value="Laki-laki" {{ (old('jenis_kelamin') ?? $klien->jenis_kelamin ) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ (old('jenis_kelamin') ?? $klien->jenis_kelamin ) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') ?? $klien->tgl_lahir }}" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir">
                                    @error('tgl_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="usia" class="form-label">Usia</label>
                                    <input type="number" name="usia" value="{{ old('usia') ?? $klien->usia }}" id="usia" min="0" class="form-control @error('usia') is-invalid @enderror" id="usia" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="berat_badan" class="form-label">Berat Badan</label>
                                    <input type="number" name="berat_badan" value="{{ old('berat_badan') ?? $klien->berat_badan }}" id="berat_badan" class="form-control @error('berat_badan') is-invalid @enderror" id="berat_badan" step="any">
                                    <div class="form-text">Berat Badan dalam satuan kg</div>
                                    @error('berat_badan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                                    <input type="number" name="tinggi_badan" value="{{ old('tinggi_badan') ?? $klien->tinggi_badan }}" id="tinggi_badan" class="form-control @error('tinggi_badan') is-invalid @enderror" id="tinggi_badan" step="any">
                                    <div class="form-text">Tinggi Badan dalam satuan cm</div>
                                    @error('tinggi_badan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="target_berat_badan" class="form-label">Target Berat Badan</label>
                                    <input type="number" name="target_berat_badan" value="{{ old('target_berat_badan') ?? $klien->target_berat_badan }}" id="target_berat_badan" class="form-control @error('target_berat_badan') is-invalid @enderror" id="target_berat_badan" step="any">
                                    <div class="form-text">Tinggi Badan dalam satuan kg</div>
                                    @error('target_berat_badan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan') ?? $klien->pekerjaan }}" id="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" oninput="capitalizeWords(this)">
                                    @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="riwayat_cedera" class="form-label">Riwayat Cedera</label>
                                    <input type="text" name="riwayat_cedera" value="{{ old('riwayat_cedera') ?? $klien->riwayat_cedera }}" id="riwayat_cedera" class="form-control @error('riwayat_cedera') is-invalid @enderror" id="riwayat_cedera" oninput="capitalizeWords(this)">
                                    @error('riwayat_cedera')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type='text/javascript'>
    $(function() {
        $('#tgl_lahir').change(function() {
            var today = new Date();
            var birthDate = new Date(this.value);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            $('#usia').val(age);
        });

        

        let formSelector = '#formSubmit';
        let actionUrl = "{{ route('klien.update', $klien->id) }}";
        let successMessage = 'Data berhasil disimpan!';
        let redirectUrl = "{{ route('klien.index') }}";
        submitFormAjax(formSelector, actionUrl, successMessage, redirectUrl);
    });
</script>
@endpush
@endsection