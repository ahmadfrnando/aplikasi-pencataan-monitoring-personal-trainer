<div class="modal fade" id="ubahLatihanPemanasan-{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Pemanasan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateForm" action="{{ route('program.pemanasan.update', $value->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="target" class="form-label">Target</label>
                        <input type="text" class="form-control" value="{{ $value->target }}" id="target" name="target" oninput="capitalizeWords(this)" required>
                    </div>
                    <div class="mb-3">
                        <label for="gerakan" class="form-label">Gerakan</label>
                        <input type="text" class="form-control" id="gerakan" value="{{ $value->gerakan }}" name="gerakan" oninput="capitalizeWords(this)" required>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea type="number" value="{{ $value->catatan }}" class="form-control" id="catatan" name="catatan" oninput="capitalizeWords(this)" required>{{ $value->catatan }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>