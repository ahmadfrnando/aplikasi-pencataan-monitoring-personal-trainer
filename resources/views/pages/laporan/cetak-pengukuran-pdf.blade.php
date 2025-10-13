<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengukuran</title>
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
        <table class="page-break" style="margin-bottom: 20px;">
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
        @foreach($klien->pengukuran as $pengukuran)
        <div class="container">
            <table class="page-break">
                <thead>
                    <tr>
                        <th colspan="4">Informasi Pengukuran Ke - {{ $pengukuran->no_urut_pengukuran }}</th>
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
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('berat_badan', $pengukuran->berat_badan)) : ''}}"> {{ $pengukuran->berat_badan }} kg
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            WAIST CIRCUMFERENCE
                        </td>
                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class=" {{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('weist_circumference', $pengukuran->weist_circumference)) : ''}}"> {{ $pengukuran->weist_circumference }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            BODY FAT
                        </td>
                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('body_fat', $pengukuran->body_fat)) : ''}}"> {{ $pengukuran->body_fat }} kg
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            VISCERAL FAT
                        </td>
                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('visceral_fat', $pengukuran->visceral_fat)) : ''}}"> {{ $pengukuran->visceral_fat }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            BMI
                        </td>

                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('bmi', $pengukuran->bmi)) : ''}}"> {{ $pengukuran->bmi }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            BODY AGE
                        </td>

                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('body_age', $pengukuran->body_age)) : ''}}"> {{ $pengukuran->body_age }}
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
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('fat_whole_body', $pengukuran->fat_whole_body)) : ''}}"> {{ $pengukuran->fat_whole_body }} %
                        </td>
                    </tr>
                    <tr>
                        <td>
                            TRUNK
                        </td>

                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('fat_trunk', $pengukuran->fat_trunk)) : ''}}"> {{ $pengukuran->fat_trunk }} %
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ARM
                        </td>

                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('fat_arm', $pengukuran->fat_arm)) : ''}}"> {{ $pengukuran->fat_arm }} %
                        </td>
                    </tr>
                    <tr>
                        <td>
                            LEG
                        </td>

                        <td>
                            {{ ($klien->is_mengurangi_fat) ? '<': '>' }}
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('fat_leg', $pengukuran->fat_leg)) : ''}}"> {{ $pengukuran->fat_leg }} %
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
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('muscle_whole_body', $pengukuran->muscle_whole_body)) : ''}}"> {{ $pengukuran->muscle_whole_body }} %
                        </td>
                    </tr>
                    <tr>
                        <td>
                            TRUNK
                        </td>

                        <td>
                            {{ ($klien->is_menaikkan_muscle) ? '>': '<' }}
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('muscle_trunk', $pengukuran->muscle_trunk)) : ''}}"> {{ $pengukuran->muscle_trunk }} %
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ARM
                        </td>

                        <td>
                            {{ ($klien->is_menaikkan_muscle) ? '>': '<' }}
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('muscle_arm', $pengukuran->muscle_arm)) : ''}}"> {{ $pengukuran->muscle_arm }} %
                        </td>
                    </tr>
                    <tr>
                        <td>
                            LEG
                        </td>

                        <td>
                            {{ ($klien->is_menaikkan_muscle) ? '>': '<' }}
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('muscle_leg', $pengukuran->muscle_leg)) : ''}}"> {{ $pengukuran->muscle_leg }} %
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Leher
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('leher', $pengukuran->leher)) : ''}}"> {{ $pengukuran->leher }} cm
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" width="30%">
                            Lengan Atas
                        </td>
                        <td colspan="2">
                            Kanan
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('lengan_kanan_atas', $pengukuran->lengan_kanan_atas)) : ''}}"> {{ $pengukuran->lengan_kanan_atas }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Kiri
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('lengan_kiri_atas', $pengukuran->lengan_kiri_atas)) : ''}}"> {{ $pengukuran->lengan_kiri_atas }} cm
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" width="30%">
                            Lengan Bawah
                        </td>
                        <td colspan="2">
                            Kanan
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('lengan_kanan_bawah', $pengukuran->lengan_kanan_bawah)) : ''}}"> {{ $pengukuran->lengan_kanan_bawah }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Kiri
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('lengan_kiri_bawah', $pengukuran->lengan_kiri_bawah)) : ''}}"> {{ $pengukuran->lengan_kiri_bawah }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Dada
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('dada', $pengukuran->dada)) : ''}}"> {{ $pengukuran->dada }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Pinggang
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('pinggang', $pengukuran->pinggang)) : ''}}"> {{ $pengukuran->pinggang }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Perut
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('perut', $pengukuran->perut)) : ''}}"> {{ $pengukuran->perut }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Panggul
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('panggul', $pengukuran->panggul)) : ''}}"> {{ $pengukuran->panggul }} cm
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" width="30%">
                            Paha
                        </td>
                        <td colspan="2">
                            Kanan
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('paha_kanan', $pengukuran->paha_kanan)) : ''}}"> {{ $pengukuran->paha_kanan }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Kiri
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('paha_kiri', $pengukuran->paha_kiri)) : ''}}"> {{ $pengukuran->paha_kiri }} cm
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" width="30%">
                            Betis
                        </td>
                        <td colspan="2">
                            Kanan
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('betis_kanan', $pengukuran->betis_kanan)) : ''}}"> {{ $pengukuran->betis_kanan }} cm
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Kiri
                        </td>
                        <td class="{{ $pengukuran->no_urut_pengukuran > 1 ? ($pengukuran->isSesuaiTarget('betis_kiri', $pengukuran->betis_kiri)) : ''}}"> {{ $pengukuran->betis_kiri }} cm
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