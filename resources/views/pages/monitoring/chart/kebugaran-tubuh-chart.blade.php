<div class="col-12 mt-4">
    <div class="card">
        <div class="card-body">
            @if($klien->pengukuran->count() > 0)
            {!! $chart->container() !!}
            @else
            <div class="col-12 text-center">
                <figure><img src="{{ asset('assets/images/illustrator/personal-trainer.svg') }}" alt="pt" width="250" class="img-fluid">
                    <figcaption class="text-muted mt-3">Belum ada pengukuran</figcaption>
                </figure>
            </div>
            @endif
        </div>
    </div>
</div>