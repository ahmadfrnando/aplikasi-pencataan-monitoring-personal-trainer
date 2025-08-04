@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Semua Klien</h4>
                        <p class="card-subtitle">
                            Daftar Semua klien tercatat
                        </p>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table data-table">
                        <thead class="text-sm">
                            <tr>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Nama</th>
                                <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Jenis Kelamin</th>
                                <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Tanggal Lahir</th>
                                <th class="text-uppercase text-secondary font-weight-bolder opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type='text/javascript'>
    $(function() {
        var route = 'monitoring.index';
        var selector = ".data-table";
        var columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'w-8 text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'nama',
                name: 'nama',
            },
            {
                data: 'jenis_kelamin',
                name: 'jenis_kelamin',
            },
            {
                data: 'tgl_lahir',
                name: 'tgl_lahir',
                format: 'raw',
                render: function(data, type, row) {
                    return moment(data).format('DD-MM-YYYY') ?? '-';
                }
            },
            {
                data: 'action',
                name: 'action',
                className: 'text-center',
                orderable: false,
                searchable: false
            }
        ];
        var table = initializeDataTable(selector, route, columns);
    });
</script>
@endpush
@endsection