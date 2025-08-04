<div class="modal fade" id="tambahLatihanPendinginan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pendinginan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="submitForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="program_latihan_id" value="{{ $program->id }}" name="program_latihan_id" readonly>
                    <div class="mb-3">
                        <label for="target" class="form-label">Target</label>
                        <input type="text" class="form-control" id="target" name="target" oninput="capitalizeWords(this)" required>
                    </div>
                    <div class="mb-3">
                        <label for="gerakan" class="form-label">Gerakan</label>
                        <input type="text" class="form-control" id="gerakan" name="gerakan" oninput="capitalizeWords(this)" required>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea type="number" class="form-control" id="catatan" name="catatan" oninput="capitalizeWords(this)" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="saveChanges">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>