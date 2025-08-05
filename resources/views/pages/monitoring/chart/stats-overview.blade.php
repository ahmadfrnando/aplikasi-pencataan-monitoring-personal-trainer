<div class="col-md-4">
    <div class="card h-100 text-center shadow">
        <div class="card-body">
            <div class="display-4 text-primary mb-2">
                <i class="fas fa-weight"></i>
            </div>
            <h2 class="card-title mb-3">{{ $stats['berat_badan_terakhir'] ?? 0 }}</h2>
            <p class="card-text text-muted">Berat Badan Terakhir</p>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card h-100 text-center shadow">
        <div class="card-body">
            <div class="display-4 text-success mb-2">
                <i class="fas fa-percent"></i>
            </div>
            <h2 class="card-title mb-3">{{ $stats['persentase_lemak_tubuh_terakhir'] ?? 0 }} %</h2>
            <p class="card-text text-muted">Persentase Lemak Tubuh</p>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card h-100 text-center shadow">
        <div class="card-body">
            <div class="display-4 text-warning mb-2">
                <i class="fas fa-dumbbell"></i>
            </div>
            <h2 class="card-title mb-3">{{ $stats['massa_otot_skeletal_terakhir'] ?? 0 }}</h2>
            <p class="card-text text-muted">Massa Otot Skeletal</p>
        </div>
    </div>
</div>