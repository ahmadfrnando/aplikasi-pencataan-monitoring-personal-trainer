@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Ubah Informasi Akun</h5>
                <div class="card">
                    <div class="card-body">
                        <form id="formUpdate">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nama Personal Trainer</label>
                                    <input type="text" name="name" value="{{ $user->name }}" id="name" class="form-control @error('name') is-invalid @enderror" id="name" oninput="capitalizeWords(this)" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Personal Trainer</label>
                                    <input type="email" value="{{ $user->email }}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Masukkan Password Akun</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation" class="form-label">Masukkan Ulang Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
        let formSelector = '#formUpdate';
        let actionUrl = "{{ route('pengaturan.update', $user->id) }}";
        let successMessage = 'Data berhasil diperbarui!';
        let redirectUrl = "{{ route('pengaturan.index') }}";
        submitFormAjax(formSelector, actionUrl, successMessage, redirectUrl);
    });
</script>
@endpush
@endsection