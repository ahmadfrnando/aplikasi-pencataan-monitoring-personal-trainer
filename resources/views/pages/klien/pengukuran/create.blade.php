@extends('layout.app')

@section('content')
<div class="row">
    <a href="{{ url()->previous() }}" class="text-secondary-emphasis mb-4 d-inline"><i class="ti ti-arrow-left"></i> Kembali</a>
    <div class="col-12">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                Informasi Klien
            </div>
            <div class="card-body">
                <form id="formSubmit">
                    @csrf
                    <input type="number" value="{{ $klien->id }}" name="klien_id" readonly hidden>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="no_urut_pengukuran" class="form-label">Nama Klien</label>
                            <input type="text" class="form-control" value="{{ $klien->nama }}" id="no_urut_pengukuran" aria-describedby="no_urut_pengukuran" readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="no_urut_pengukuran" class="form-label">No Urut Pengukuran</label>
                            <input type="text" class="form-control" name="no_urut_pengukuran" value="{{ $klien->pengukuran->count() + 1 }}" id="no_urut_pengukuran" aria-describedby="no_urut_pengukuran" readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="tanggal" class="form-label">Tanggal Pengukuran</label>
                            <input type="date" value="{{ old('tanggal') ?? date('Y-m-d') }}" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" aria-describedby="tanggal" required>
                            @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="berat_badan" class="form-label">Berat Badan(kg)</label>
                            <input type="number" value="{{ old('berat_badan') }}" name="berat_badan" class="form-control @error('nama') is-invalid @enderror" id="berat_badan" aria-describedby="berat_badan" step="any" required>
                            @error('tanggal_pengukuran')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="weist_circumference" class="form-label">Weist Circumference(cm)</label>
                            <input type="number" name="weist_circumference" value="{{ old('weist_circumference') }}" class="form-control @error('weist_circumference') is-invalid @enderror" id="weist_circumference" aria-describedby="weist_circumference" step="any" required>
                            @error('weist_circumference')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="body_fat" class="form-label">Body Fat(kg)</label>
                            <input type="number" name="body_fat" value="{{ old('body_fat') }}" class="form-control @error('body_fat') is-invalid @enderror" id="body_fat" aria-describedby="body_fat" step="any" required>
                            @error('body_fat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="visceral_fat" class="form-label">Visceral Fat</label>
                            <input type="number" name="visceral_fat" value="{{ old('visceral_fat') }}" class="form-control @error('visceral_fat') is-invalid @enderror" id="visceral_fat" aria-describedby="visceral_fat" step="any" required>
                            @error('visceral_fat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="bmi" class="form-label">BMI</label>
                            <input type="number" name="bmi" value="{{ old('bmi') }}" class="form-control @error('bmi') is-invalid @enderror" id="bmi" aria-describedby="bmi" step="any" required>
                            @error('bmi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="body_age" class="form-label">Body Age</label>
                            <input type="number" name="body_age" value="{{ old('body_age') }}" class="form-control @error('body_age') is-invalid @enderror" id="body_age" aria-describedby="body_age" step="any" required>
                            @error('body_age')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="lengan_kanan_atas" class="form-label">Lengan Kanan Atas</label>
                            <input type="number" value="{{ old('lengan_kanan_atas') }}" class="form-control @error('lengan_kanan_atas') is-invalid @enderror" id="lengan_kanan_atas" name="lengan_kanan_atas" aria-describedby="lengan_kanan_atas" step="any" required>
                            @error('lengan_kanan_atas')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="lengan_kanan_bawah" class="form-label">Lengan Kanan Bawah</label>
                            <input type="number" value="{{ old('lengan_kanan_bawah') }}" class="form-control @error('lengan_kanan_bawah') is-invalid @enderror" id="lengan_kanan_bawah" name="lengan_kanan_bawah" aria-describedby="lengan_kanan_bawah" step="any" required>
                            @error('lengan_kanan_bawah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="lengan_kiri_atas" class="form-label">Lengan Kiri Atas</label>
                            <input type="number" value="{{ old('lengan_kiri_atas') }}" class="form-control @error('lengan_kiri_atas') is-invalid @enderror" id="lengan_kiri_atas" name="lengan_kiri_atas" aria-describedby="lengan_kiri_atas" step="any" required>
                            @error('lengan_kiri_atas')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="lengan_kiri_bawah" class="form-label">Lengan Kiri Bawah</label>
                            <input type="number" value="{{ old('lengan_kiri_bawah') }}" class="form-control @error('lengan_kiri_bawah') is-invalid @enderror" id="lengan_kiri_bawah" name="lengan_kiri_bawah" aria-describedby="lengan_kiri_bawah" step="any" required>
                            @error('lengan_kiri_bawah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="leher" class="form-label">Leher</label>
                            <input type="number" value="{{ old('leher') }}" name="leher" class="form-control @error('leher') is-invalid @enderror" id="leher" aria-describedby="leher" step="any" required>
                            @error('leher')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="dada" class="form-label">Dada</label>
                            <input type="number" value="{{ old('dada') }}" name="dada" class="form-control @error('dada') is-invalid @enderror" id="dada" aria-describedby="dada" step="any" required>
                            @error('dada')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="pinggang" class="form-label">Pinggang</label>
                            <input type="number" value="{{ old('pinggang') }}" name="pinggang" class="form-control @error('pinggang') is-invalid @enderror" id="pinggang" aria-describedby="pinggang" step="any" required>
                            @error('pinggang')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="perut" class="form-label">Perut</label>
                            <input type="number" value="{{ old('perut') }}" name="perut" class="form-control @error('perut') is-invalid @enderror" id="perut" aria-describedby="perut" step="any" required>
                            @error('perut')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="panggul" class="form-label">Panggul</label>
                            <input type="number" value="{{ old('panggul') }}" name="panggul" class="form-control @error('panggul') is-invalid @enderror" id="panggul" aria-describedby="panggul" step="any" required>
                            @error('panggul')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="paha_kanan" class="form-label">Paha Kanan</label>
                            <input type="number" value="{{ old('paha_kanan') }}" name="paha_kanan" class="form-control @error('paha_kanan') is-invalid @enderror" id="paha_kanan" aria-describedby="paha_kanan" step="any" required>
                            @error('paha_kanan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="paha_kiri" class="form-label">Paha Kiri</label>
                            <input type="number" value="{{ old('paha_kiri') }}" name="paha_kiri" class="form-control @error('paha_kiri') is-invalid @enderror" id="paha_kiri" aria-describedby="paha_kiri" step="any" required>
                            @error('paha_kiri')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="betis_kanan" class="form-label">Betis Kanan</label>
                            <input type="number" value="{{ old('betis_kanan') }}" name="betis_kanan" class="form-control @error('betis_kanan') is-invalid @enderror" id="betis_kanan" aria-describedby="betis_kanan" step="any" required>
                            @error('betis_kanan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="betis_kiri" class="form-label">Betis Kiri</label>
                            <input type="number" value="{{ old('betis_kiri') }}" name="betis_kiri" class="form-control @error('betis_kiri') is-invalid @enderror" id="betis_kiri" aria-describedby="betis_kiri" step="any" required>
                            @error('betis_kiri')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <span class="text-muted fw-bolder mt-3 mb-2">FAT</span>
                        <hr />
                        <div class="col-md-3 mb-3">
                            <label for="fat_whole_body" class="form-label">Whole Body</label>
                            <input type="number" value="{{ old('fat_whole_body') }}" name="fat_whole_body" class="form-control @error('fat_whole_body') is-invalid @enderror" id="fat_whole_body" aria-describedby="fat_whole_body" step="any" required>
                            @error('fat_whole_body')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="fat_trunk" class="form-label">Trunk</label>
                            <input type="number" value="{{ old('fat_trunk') }}" name="fat_trunk" class="form-control @error('fat_trunk') is-invalid @enderror" id="fat_trunk" aria-describedby="fat_trunk" step="any" required>
                            @error('fat_trunk')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="fat_arm" class="form-label">Arm</label>
                            <input type="number" value="{{ old('fat_arm') }}" name="fat_arm" class="form-control @error('fat_arm') is-invalid @enderror" id="fat_arm" aria-describedby="fat_arm" step="any" required>
                            @error('fat_arm')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="fat_leg" class="form-label">Leg</label>
                            <input type="number" value="{{ old('fat_leg') }}" name="fat_leg" class="form-control @error('fat_leg') is-invalid @enderror" id="fat_leg" aria-describedby="fat_leg" step="any" required>
                            @error('fat_leg')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <span class="text-muted fw-bolder mt-3 mb-2">MUSCLE</span>
                        <hr />
                        <div class="col-md-3 mb-3">
                            <label for="muscle_whole_body" class="form-label">Whole Body</label>
                            <input type="number" value="{{ old('muscle_whole_body') }}" name="muscle_whole_body" class="form-control @error('muscle_whole_body') is-invalid @enderror" id="muscle_whole_body" aria-describedby="muscle_whole_body" step="any" required>
                            @error('muscle_whole_body')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="muscle_trunk" class="form-label">Trunk</label>
                            <input type="number" value="{{ old('muscle_trunk') }}" name="muscle_trunk" class="form-control @error('muscle_trunk') is-invalid @enderror" id="muscle_trunk" aria-describedby="muscle_trunk" step="any" required>
                            @error('muscle_trunk')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="muscle_arm" class="form-label">Arm</label>
                            <input type="number" value="{{ old('muscle_arm') }}" name="muscle_arm" class="form-control @error('muscle_arm') is-invalid @enderror" id="muscle_arm" aria-describedby="muscle_arm" step="any" required>
                            @error('muscle_arm')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="muscle_leg" class="form-label">Leg</label>
                            <input type="number" value="{{ old('muscle_leg') }}" name="muscle_leg" class="form-control @error('muscle_leg') is-invalid @enderror" id="muscle_leg" aria-describedby="muscle_leg" step="any" required>
                            @error('muscle_leg')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('klien.show', $klien->id) }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Pengukuran Baru</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        const formSelector = '#formSubmit';
        const actionUrl = "{{ route('klien.pengukuran.store') }}";
        const successMessage = 'Data berhasil disimpan!';
        const redirectUrl = "{{ route('klien.show', $klien->id) }}";

        submitFormAjax(formSelector, actionUrl, successMessage, redirectUrl);
    });
</script>
@endpush
@endsection