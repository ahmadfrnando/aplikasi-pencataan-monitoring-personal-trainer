@extends('layout.app')

@section('content')
<div class="row">
    <a href="{{ route('klien.index') }}" class="text-secondary-emphasis mb-4 d-inline"><i class="ti ti-arrow-left"></i> Kembali</a>
    <div class="col-12">
        <h5 class="card-title fw-semibold mb-4">Tambah </h5>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    Informasi Klien
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <div>
                        <a href="{{ route('klien.edit', $klien->id) }}" class="btn btn-warning"><i class="ti ti-pencil"></i></a>
                    </div>
                    <div>
                        <a href="{{ route('klien.destroy', $klien->id) }}" class="btn btn-danger"><i class="ti ti-trash"></i></a>
                    </div>
                    <div>
                        <a href="{{ route('klien.pengukuran.create', $klien->id) }}" class="btn btn-primary">Tambah Pengukuran Baru</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-2 row">
                    <div class="mb-2 col-md-2 text-dark fw-bold">Nama Klien</div>
                    <div class="mb-2 col-md-4 text-secondary-emphasis">{{ $klien->nama }}</div>
                    <div class="mb-2 col-md-2 text-dark fw-bold">Pekerjaan</div>
                    <div class="mb-2 col-md-4 text-secondary-emphasis">{{ $klien->pekerjaan }}</div>
                    <div class="mb-2 col-md-2 text-dark fw-bold">Jenis Kelamin</div>
                    <div class="mb-2 col-md-4 text-secondary-emphasis">{{ $klien->jenis_kelamin }}</div>
                    <div class="mb-2 col-md-2 text-dark fw-bold">Tanggal Lahir</div>
                    <div class="mb-2 col-md-4 text-secondary-emphasis">{{ $klien->tgl_lahir }}</div>
                    <div class="mb-2 col-md-2 text-dark fw-bold">Usia</div>
                    <div class="mb-2 col-md-4 text-secondary-emphasis">{{ $klien->usia }}</div>
                    <div class="mb-2 col-md-2 text-dark fw-bold">Berat Badan</div>
                    <div class="mb-2 col-md-4 text-secondary-emphasis">{{ $klien->berat_badan }} kg</div>
                    <div class="mb-2 col-md-2 text-dark fw-bold">Tinggi Badan</div>
                    <div class="mb-2 col-md-4 text-secondary-emphasis">{{ $klien->tinggi_badan }} cm</div>
                    <div class="mb-2 col-md-2 text-dark fw-bold">Target Berat Badan</div>
                    <div class="mb-2 col-md-4 text-secondary-emphasis">{{ $klien->target_berat_badan }} kg</div>
                    <div class="mb-2 col-md-2 text-dark fw-bold">Riwayat Cedera</div>
                    <div class="mb-2 col-md-4 text-secondary-emphasis">{{ $klien->riwayat_cedera }}</div>
                </div>
            </div>
        </div>
        <div class="row" id="table-pengukuran">
            @if($klien->pengukuran->count() > 0)
            @foreach($klien->pengukuran as $pengukuran)
            <div class="col-md-6">
                <div class="card mt-2">
                    <div class="card-header">
                        Informasi Pengukuran Ke - {{ $pengukuran->no_urut_pengukuran }}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-uppercase">
                            <table class="table table-body mb-0 text-nowrap varient-table align-middle fs-3 table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2" scope="col" class="px-0 text-dark text-uppercase text-center">
                                            Nama Pengukuran
                                        </th>
                                        <th scope="col" class="px-0 text-dark text-uppercase text-center">Target</th>
                                        <th scope="col" class="px-0 text-dark text-uppercase text-center">
                                            Angka
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            BERAT BADAN
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('berat_badan', $pengukuran->berat_badan)) : ''}}"> {{ $pengukuran->berat_badan }} kg
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="berat_badan"
                                                data-value="{{ $pengukuran->berat_badan }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            WAIST CIRCUMFERENCE
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('weist_circumference', $pengukuran->weist_circumference)) : ''}}"> {{ $pengukuran->weist_circumference }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="weist_circumference"
                                                data-value="{{ $pengukuran->weist_circumference }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            BODY FAT
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('body_fat', $pengukuran->body_fat)) : ''}}"> {{ $pengukuran->body_fat }} kg
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="body_fat"
                                                data-value="{{ $pengukuran->body_fat }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            VISCERAL FAT
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('visceral_fat', $pengukuran->visceral_fat)) : ''}}"> {{ $pengukuran->visceral_fat }}
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="visceral_fat"
                                                data-value="{{ $pengukuran->visceral_fat }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            BMI
                                        </td>

                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('bmi', $pengukuran->bmi)) : ''}}"> {{ $pengukuran->bmi }}
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="bmi"
                                                data-value="{{ $pengukuran->bmi }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            BODY AGE
                                        </td>

                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('body_age', $pengukuran->body_age)) : ''}}"> {{ $pengukuran->body_age }}
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="body_age"
                                                data-value="{{ $pengukuran->body_age }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4" width="30%" class="px-0 text-dark fw-medium text-center">
                                            FAT
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center">
                                            WHOLE BODY
                                        </td>

                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('fat_whole_body', $pengukuran->fat_whole_body)) : ''}}"> {{ $pengukuran->fat_whole_body }} %
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="fat_whole_body"
                                                data-value="{{ $pengukuran->fat_whole_body }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-0 text-dark fw-medium text-center">
                                            TRUNK
                                        </td>

                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('fat_trunk', $pengukuran->fat_trunk)) : ''}}"> {{ $pengukuran->fat_trunk }} %
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="fat_trunk"
                                                data-value="{{ $pengukuran->fat_trunk }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-0 text-dark fw-medium text-center">
                                            ARM
                                        </td>

                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('fat_arm', $pengukuran->fat_arm)) : ''}}"> {{ $pengukuran->fat_arm }} %
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="fat_arm"
                                                data-value="{{ $pengukuran->fat_arm }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-0 text-dark fw-medium text-center">
                                            LEG
                                        </td>

                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('fat_leg', $pengukuran->fat_leg)) : ''}}"> {{ $pengukuran->fat_leg }} %
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="fat_leg"
                                                data-value="{{ $pengukuran->fat_leg }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4" width="30%" class="px-0 text-dark fw-medium text-center">
                                            MUSCLE
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center">
                                            WHOLE BODY
                                        </td>

                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_menaikkan_muscle) ? '>': '<' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('muscle_whole_body', $pengukuran->muscle_whole_body)) : ''}}"> {{ $pengukuran->muscle_whole_body }} %
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="muscle_whole_body"
                                                data-value="{{ $pengukuran->muscle_whole_body }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-0 text-dark fw-medium text-center">
                                            TRUNK
                                        </td>

                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_menaikkan_muscle) ? '>': '<' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('muscle_trunk', $pengukuran->muscle_trunk)) : ''}}"> {{ $pengukuran->muscle_trunk }} %
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="muscle_trunk"
                                                data-value="{{ $pengukuran->muscle_trunk }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-0 text-dark fw-medium text-center">
                                            ARM
                                        </td>

                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_menaikkan_muscle) ? '>': '<' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('muscle_arm', $pengukuran->muscle_arm)) : ''}}"> {{ $pengukuran->muscle_arm }} %
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="muscle_arm"
                                                data-value="{{ $pengukuran->muscle_arm }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-0 text-dark fw-medium text-center">
                                            LEG
                                        </td>

                                        <td class="px-0 text-dark fw-medium text-center">
                                            {{ ($klien->is_menaikkan_muscle) ? '>': '<' }}
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('muscle_leg', $pengukuran->muscle_leg)) : ''}}"> {{ $pengukuran->muscle_leg }} %
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="muscle_leg"
                                                data-value="{{ $pengukuran->muscle_leg }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="px-0 text-dark fw-medium text-center">
                                            LEHER
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('leher', $pengukuran->leher)) : ''}}"> {{ $pengukuran->leher }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="leher"
                                                data-value="{{ $pengukuran->leher }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" width="30%" class="px-0 text-dark fw-medium text-center">
                                            Lengan Atas
                                        </td>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            Kanan
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('lengan_kanan_atas', $pengukuran->lengan_kanan_atas)) : ''}}"> {{ $pengukuran->lengan_kanan_atas }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="lengan_kanan_atas"
                                                data-value="{{ $pengukuran->lengan_kanan_atas }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            Kiri
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('lengan_kiri_atas', $pengukuran->lengan_kiri_atas)) : ''}}"> {{ $pengukuran->lengan_kiri_atas }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="lengan_kiri_atas"
                                                data-value="{{ $pengukuran->lengan_kiri_atas }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" width="30%" class="px-0 text-dark fw-medium text-center">
                                            Lengan Bawah
                                        </td>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            Kanan
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('lengan_kanan_bawah', $pengukuran->lengan_kanan_bawah)) : ''}}"> {{ $pengukuran->lengan_kanan_bawah }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="lengan_kanan_bawah"
                                                data-value="{{ $pengukuran->lengan_kanan_bawah }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            Kiri
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('lengan_kiri_bawah', $pengukuran->lengan_kiri_bawah)) : ''}}"> {{ $pengukuran->lengan_kiri_bawah }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="lengan_kiri_bawah"
                                                data-value="{{ $pengukuran->lengan_kiri_bawah }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="px-0 text-dark fw-medium text-center">
                                            Dada
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('dada', $pengukuran->dada)) : ''}}"> {{ $pengukuran->dada }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="dada"
                                                data-value="{{ $pengukuran->dada }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="px-0 text-dark fw-medium text-center">
                                            Pinggang
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('pinggang', $pengukuran->pinggang)) : ''}}"> {{ $pengukuran->pinggang }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="pinggang"
                                                data-value="{{ $pengukuran->pinggang }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="px-0 text-dark fw-medium text-center">
                                            Perut
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('perut', $pengukuran->perut)) : ''}}"> {{ $pengukuran->perut }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="perut"
                                                data-value="{{ $pengukuran->perut }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="px-0 text-dark fw-medium text-center">
                                            Panggul
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('panggul', $pengukuran->panggul)) : ''}}"> {{ $pengukuran->panggul }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="panggul"
                                                data-value="{{ $pengukuran->panggul }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" width="30%" class="px-0 text-dark fw-medium text-center">
                                            Paha
                                        </td>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            Kanan
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('paha_kanan', $pengukuran->paha_kanan)) : ''}}"> {{ $pengukuran->paha_kanan }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="paha_kanan"
                                                data-value="{{ $pengukuran->paha_kanan }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            Kiri
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('paha_kiri', $pengukuran->paha_kiri)) : ''}}"> {{ $pengukuran->paha_kiri }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="paha_kiri"
                                                data-value="{{ $pengukuran->paha_kiri }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" width="30%" class="px-0 text-dark fw-medium text-center">
                                            Betis
                                        </td>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            Kanan
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('betis_kanan', $pengukuran->betis_kanan)) : ''}}"> {{ $pengukuran->betis_kanan }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="betis_kanan"
                                                data-value="{{ $pengukuran->betis_kanan }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="px-0 text-dark fw-medium text-center">
                                            Kiri
                                        </td>
                                        <td class="px-0 text-dark fw-medium text-center {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('betis_kiri', $pengukuran->betis_kiri)) : ''}}"> {{ $pengukuran->betis_kiri }} cm
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-link edit-btn"
                                                data-id="{{ $pengukuran->id }}"
                                                data-name="betis_kiri"
                                                data-value="{{ $pengukuran->betis_kiri }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm">
                                    <div class="mb-3">
                                        <label for="modalInput" class="form-label">Nilai</label>
                                        <input type="number" class="form-control" id="modalInput" name="value" step="any" required>
                                        <input type="hidden" id="modalId" name="id">
                                        <input type="hidden" id="modalName" name="name">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" id="saveChanges">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
            @else
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Informasi Klien
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <span class="btn btn-danger rounded-circle round-48 hstack justify-content-center">
                                <i class="ti ti-x fs-6"></i>
                            </span>
                            <div class="col-12 mt-4 mb-2 text-secondary-emphasis text-center">Belum ada pengukuran</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
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

        // let formSelector = '#formSubmit';
        // let actionUrl = "{{ route('klien.store') }}";
        // let successMessage = 'Data berhasil disimpan!';
        // let redirectUrl = "{{ route('klien.index') }}";
        // submitFormAjax(formSelector, actionUrl, successMessage, redirectUrl);

        // Ketika tombol edit diklik
        $(document).on('click', '.edit-btn', function() {
            var id = $(this).data('id'); // Mengambil data ID
            var name = $(this).data('name'); // Mengambil data Name
            var value = $(this).data('value'); // Mengambil data Value

            // Memasukkan data ke modal
            $('#modalId').val(id); // Set ID di hidden input
            $('#modalName').val(name); // Set Name di hidden input
            $('#modalInput').val(value); // Set value di input

            // Menampilkan modal
            $('#exampleModal').modal('show');
        });

        $(document).on('click', '#saveChanges', function(e) {
            e.preventDefault();
            var formData = $('#editForm').serialize(); // Mengambil data dari form
            var redirectUrl = "{{ route('klien.show', $klien->id) }}";
            var successMessage = "Data berhasil disimpan!";
            // Kirim data ke server menggunakan AJAX (ganti URL dengan rute yang sesuai)
            $.ajax({
                url: '/pengukuran-klien/update-data', // Ganti dengan URL endpoint untuk update
                method: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function(response) {
                    $('#exampleModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: successMessage || `${response.message}`,
                        confirmButtonText: 'Oke',
                        confirmButtonColor: '#5e72e4'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // window.location.href = redirectUrl;
                            $('#table-pengukuran').load(location.href + ' #table-pengukuran > *');
                        }
                    });
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let res = xhr.responseJSON;
                        let errorMessages = Object.values(res.errors).flat().join('\n');
                        Swal.fire('Validasi Gagal', errorMessages, 'error');
                    } else {
                        Swal.fire('Gagal', xhr.responseJSON?.message || 'Terjadi kesalahan.', 'error');
                    }
                }
            });
        });

    });
</script>
@endpush
@endsection