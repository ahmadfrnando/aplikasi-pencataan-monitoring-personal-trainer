<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <title>Laporan Program Latihan</title>
    <style>
        body {
            font-family: verdana, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 6px;
        }

        th {
            text-align: left;
            background-color: #aaaf4cff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .page-break {
            page-break-after: always;
        }

        .row-danger {
            background-color: #f8d7da !important;
        }

        .row-success {
            background-color: #d4edda !important;
        }
    </style>
</head>

<body>
    <div>
        @if($data && $data->count() > 0)
        <table style="margin-bottom: 20px;">
            <thead>
                <tr>
                    <th colspan="2">Informasi Klien</th>
                </tr>
            </thead>
            <tr>
                <td>Nama Klien</td>
                <td>{{ $data->first()->nama }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>{{ $data->first()->pekerjaan }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>{{ $data->first()->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>{{ $data->first()->tgl_lahir }}</td>
            </tr>
            <tr>
                <td>Usia</td>
                <td>{{ $data->first()->usia }}</td>
            </tr>
            <tr>
                <td>Berat Badan</td>
                <td>{{ $data->first()->berat_badan }} kg</td>
            </tr>
            <tr>
                <td>Tinggi Badan</td>
                <td>{{ $data->first()->tinggi_badan }} cm</td>
            </tr>
            <tr>
                <td>Target Berat Badan</td>
                <td>{{ $data->first()->target_berat_badan }} kg</td>
            </tr>
            <tr>
                <td>Riwayat Cedera</td>
                <td>{{ $data->first()->riwayat_cedera }}</td>
            </tr>
        </table>
        @foreach($data as $klien)
        @foreach($klien->program_latihan_klien as $key => $data)
        <div class="container page-break">
            <table class="">
                <thead>
                    <tr>
                        <th colspan="4">Program Latihan ke - {{ $key + 1 }}</th>
                    </tr>
                    <tr>
                        <th colspan="2" scope="col">
                            Nama Pengukuran
                        </th>
                        <th scope="col">Target</th>
                        <th scope="col">
                            Angka
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">
                            BERAT BADAN
                        </td>
                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('berat_badan', $data->berat_badan)) : ''}}"> {{ $data->berat_badan }} kg
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            WAIST CIRCUMFERENCE
                        </td>
                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class=" {{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('weist_circumference', $data->weist_circumference)) : ''}}"> {{ $data->weist_circumference }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            BODY FAT
                        </td>
                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('body_fat', $data->body_fat)) : ''}}"> {{ $data->body_fat }} kg
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            VISCERAL FAT
                        </td>
                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('visceral_fat', $data->visceral_fat)) : ''}}"> {{ $data->visceral_fat }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            BMI
                        </td>

                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('bmi', $data->bmi)) : ''}}"> {{ $data->bmi }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            BODY AGE
                        </td>

                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('body_age', $data->body_age)) : ''}}"> {{ $data->body_age }}
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="4" width="30%">
                            FAT
                        </td>
                        <td>
                            WHOLE BODY
                        </td>

                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('fat_whole_body', $data->fat_whole_body)) : ''}}"> {{ $data->fat_whole_body }} %
                        </td>
                    </tr>
                    <tr>
                        <td>
                            TRUNK
                        </td>

                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('fat_trunk', $data->fat_trunk)) : ''}}"> {{ $data->fat_trunk }} %
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ARM
                        </td>

                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('fat_arm', $data->fat_arm)) : ''}}"> {{ $data->fat_arm }} %
                        </td>
                    </tr>
                    <tr>
                        <td>
                            LEG
                        </td>

                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('fat_leg', $data->fat_leg)) : ''}}"> {{ $data->fat_leg }} %
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="4" width="30%">
                            MUSCLE
                        </td>
                        <td>
                            WHOLE BODY
                        </td>

                        <td>
                            {{ ($klien->is_menaikkan_muscle) ? '>': '<' }}
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('muscle_whole_body', $data->muscle_whole_body)) : ''}}"> {{ $data->muscle_whole_body }} %
                        </td>
                    </tr>
                    <tr>
                        <td>
                            TRUNK
                        </td>

                        <td>
                            {{ ($klien->is_menaikkan_muscle) ? '>': '<' }}
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('muscle_trunk', $data->muscle_trunk)) : ''}}"> {{ $data->muscle_trunk }} %
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ARM
                        </td>

                        <td>
                            {{ ($klien->is_menaikkan_muscle) ? '>': '<' }}
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('muscle_arm', $data->muscle_arm)) : ''}}"> {{ $data->muscle_arm }} %
                        </td>
                    </tr>
                    <tr>
                        <td>
                            LEG
                        </td>

                        <td>
                            {{ ($klien->is_menaikkan_muscle) ? '>': '<' }}
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('muscle_leg', $data->muscle_leg)) : ''}}"> {{ $data->muscle_leg }} %
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            LEHER
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('leher', $data->leher)) : ''}}"> {{ $data->leher }} cm
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" width="30%">
                            Lengan Atas
                        </td>
                        <td colspan="2">
                            Kanan
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('lengan_kanan_atas', $data->lengan_kanan_atas)) : ''}}"> {{ $data->lengan_kanan_atas }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Kiri
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('lengan_kiri_atas', $data->lengan_kiri_atas)) : ''}}"> {{ $data->lengan_kiri_atas }} cm
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" width="30%">
                            Lengan Bawah
                        </td>
                        <td colspan="2">
                            Kanan
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('lengan_kanan_bawah', $data->lengan_kanan_bawah)) : ''}}"> {{ $data->lengan_kanan_bawah }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Kiri
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('lengan_kiri_bawah', $data->lengan_kiri_bawah)) : ''}}"> {{ $data->lengan_kiri_bawah }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Dada
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('dada', $data->dada)) : ''}}"> {{ $data->dada }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Pinggang
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('pinggang', $data->pinggang)) : ''}}"> {{ $data->pinggang }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Perut
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('perut', $data->perut)) : ''}}"> {{ $data->perut }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Panggul
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('panggul', $data->panggul)) : ''}}"> {{ $data->panggul }} cm
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" width="30%">
                            Paha
                        </td>
                        <td colspan="2">
                            Kanan
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('paha_kanan', $data->paha_kanan)) : ''}}"> {{ $data->paha_kanan }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Kiri
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('paha_kiri', $data->paha_kiri)) : ''}}"> {{ $data->paha_kiri }} cm
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" width="30%">
                            Betis
                        </td>
                        <td colspan="2">
                            Kanan
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('betis_kanan', $data->betis_kanan)) : ''}}"> {{ $data->betis_kanan }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Kiri
                        </td>
                        <td class="{{ $data->no_urut_pengukuran > 1 ? ($data->isSesuaiTarget('betis_kiri', $data->betis_kiri)) : ''}}"> {{ $data->betis_kiri }} cm
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach
        @endforeach
        @endif
    </div>
</body>

</html>