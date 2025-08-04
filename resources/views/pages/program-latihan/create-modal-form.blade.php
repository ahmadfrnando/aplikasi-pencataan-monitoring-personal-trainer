<div class="modal fade" id="tambahProgramLatihan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pogram Latihan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="submitForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="klien_id" value="{{ $klien->id }}" name="klien_id" readonly>
                    <div class="mb-3">
                        <label for="nama_program" class="form-label">Nama Program Latihan</label>
                        <input type="text" class="form-control" id="nama_program" name="nama_program" oninput="capitalizeWords(this)" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="durasi_menit" class="form-label">Durasi</label>
                        <input type="number" class="form-control" id="durasi_menit" name="durasi_menit" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea rows="3" class="form-control" id="keterangan" name="keterangan" oninput="capitalizeWords(this)" required></textarea>
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