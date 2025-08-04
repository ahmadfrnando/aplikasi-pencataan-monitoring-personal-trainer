<div class="modal fade " id="showLatihanInti-{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" style="max-width: 80% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Latihan Inti</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row p-2">
                    <div class="mt-2 col-md-4">
                        <label for="target_otot" class="form-label">Target Otot</label>
                        <input type="text" class="form-control" id="target_otot" value="{{ $value->target_otot }}" readonly>
                    </div>
                    <div class="mt-2 col-md-4">
                        <label for="gerakan" class="form-label">Gerakan</label>
                        <input type="text" class="form-control" id="gerakan" value="{{ $value->gerakan }}" readonly>
                    </div>
                    <div class="mt-2 col-md-4">
                        <label for="alat" class="form-label">Alat</label>
                        <input type="text" class="form-control" id="alat" value="{{ $value->alat }}" readonly>
                    </div>
                    <div class="mt-2 col-md-3">
                        <label for="set" class="form-label">Set</label>
                        <input type="text" class="form-control" id="set" value="{{ $value->set }}" readonly>
                    </div>
                    <div class="mt-2 col-md-3">
                        <label for="rep" class="form-label">Rep</label>
                        <input type="text" class="form-control" id="rep" value="{{ $value->rep }}" readonly>
                    </div>
                    <div class="mt-2 col-md-3">
                        <label for="rest" class="form-label">Rest</label>
                        <input type="text" class="form-control" id="rest" value="{{ $value->rest }}" readonly>
                    </div>
                    <div class="mt-2 col-md-3">
                        <label for="tempo" class="form-label">Tempo</label>
                        <input type="text" class="form-control" id="tempo" value="{{ $value->tempo }}" readonly>
                    </div>
                    <div class="mt-2 col-md-6">
                        <label for="set_1" class="form-label">Set 1</label>
                        <input type="text" class="form-control" id="set_1" value="{{ $value->set_1 }}" readonly>
                    </div>
                    <div class="mt-2 col-md-6">
                        <label for="beban_1" class="form-label">Beban 1</label>
                        <input type="text" class="form-control" id="beban_1" value="{{ $value->beban_1 }}" readonly>
                    </div>
                    <div class="mt-2 col-md-6">
                        <label for="set_2" class="form-label">Set 2</label>
                        <input type="text" class="form-control" id="set_2" value="{{ $value->set_2 }}" readonly>
                    </div>
                    <div class="mt-2 col-md-6">
                        <label for="beban_2" class="form-label">Beban 2</label>
                        <input type="text" class="form-control" id="beban_2" value="{{ $value->beban_2 }}" readonly>
                    </div>
                    <div class="mt-2 col-md-6">
                        <label for="set_3" class="form-label">Set 3</label>
                        <input type="text" class="form-control" id="set_3" value="{{ $value->set_3 }}" readonly>
                    </div>
                    <div class="mt-2 col-md-6">
                        <label for="beban_3" class="form-label">Beban 3</label>
                        <input type="text" class="form-control" id="beban_3" value="{{ $value->beban_3 }}" readonly>
                    </div>
                    <div class="mt-2 col-md-6">
                        <label for="set_4" class="form-label">Set 4</label>
                        <input type="text" class="form-control" id="set_4" value="{{ $value->set_4 }}" readonly>
                    </div>
                    <div class="mt-2 col-md-6">
                        <label for="beban_4" class="form-label">Beban 4</label>
                        <input type="text" class="form-control" id="beban_4" value="{{ $value->beban_4 }}" readonly>
                    </div>
                    <div class="mt-2 col-md-6">
                        <label for="set_5" class="form-label">Set 5</label>
                        <input type="text" class="form-control" id="set_5" value="{{ $value->set_5 }}" readonly>
                    </div>
                    <div class="mt-2 col-md-6">
                        <label for="beban_5" class="form-label">Beban 5</label>
                        <input type="text" class="form-control" id="beban_5" value="{{ $value->beban_5 }}" readonly>
                    </div>
                    <div class="mt-2 col-12">
                        <label for="catatan" class="form-label">Notes</label>
                        <textarea type="text" rows="3" class="form-control" id="catatan" readonly>{{ $value->catatan }}</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>