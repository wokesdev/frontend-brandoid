<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Laba/Rugi - {{ config('app.name') }}</title>
    @include('scripts.base-styles')
</head>
<body>
    <div class="card-body">
        <center><h3>Laporan Laba/Rugi - {{ config('app.name') }} <br>[{{ $fromDate }} s/d {{ $toDate }}]</h3></center>
        <div class="table-responsive">
            <table id="table" class="display table">
                <thead>
                    <tr style="background-color: #D3D3D3">
                        <th>Nomor Akun</th>
                        <th>Nama Akun</th>
                        <th>Nomor Rincian Akun</th>
                        <th>Nama Rincian Akun</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Penjualan --}}
                    <tr>
                        <td>{{ $data['penjualan_coa']['nomor_akun'] }}</td>
                        <td>{{ $data['penjualan_coa']['nama_akun'] }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    @foreach ($penjualanGeDetails as $penjualanGeDetail)
                        <tr>
                            <td></td>
                            <td></td>
                            <td>{{ $penjualanGeDetail['coa_detail']['nomor_rincian_akun'] }}</td>
                            <td>{{ $penjualanGeDetail['coa_detail']['nama_rincian_akun'] }}</td>
                            <td>Rp{{ \Illuminate\Support\Facades\Http::withToken(session('token'))->post('https://api.jujutsu.xyz/api/v1/income-statement-filter-based', [
                                'rincian_akun_id' => $penjualanGeDetail['coa_detail_id'],
                                'from_date' => $fromDate,
                                'to_date' => $toDate
                            ])['data']['sum_kredit_based'] }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td style="background-color: #D3D3D3"></td>
                        <td style="background-color: #D3D3D3"></td>
                        <td style="background-color: #D3D3D3"></td>
                        <td style="background-color: #D3D3D3">Total</td>
                        <td style="background-color: #D3D3D3">Rp{{ $data['penjualan_sum'] }},-</td>
                    </tr>

                    {{-- End Penjualan --}}

                    {{-- Pendapatan Lain-Lain --}}
                    <tr>
                        <td>{{ $data['pendapatan_lain_coa']['nomor_akun'] }}</td>
                        <td>{{ $data['pendapatan_lain_coa']['nama_akun'] }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    @foreach ($pendapatanLainGeDetails as $pendapatanLainGeDetail)
                        <tr>
                            <td></td>
                            <td></td>
                            <td>{{ $pendapatanLainGeDetail['coa_detail']['nomor_rincian_akun'] }}</td>
                            <td>{{ $pendapatanLainGeDetail['coa_detail']['nama_rincian_akun'] }}</td>
                            <td>Rp{{ \Illuminate\Support\Facades\Http::withToken(session('token'))->post('https://api.jujutsu.xyz/api/v1/income-statement-filter-based', [
                                'rincian_akun_id' => $pendapatanLainGeDetail['coa_detail_id'],
                                'from_date' => $fromDate,
                                'to_date' => $toDate
                            ])['data']['sum_kredit_based'] }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td style="background-color: #D3D3D3"></td>
                        <td style="background-color: #D3D3D3"></td>
                        <td style="background-color: #D3D3D3"></td>
                        <td style="background-color: #D3D3D3">Total</td>
                        <td style="background-color: #D3D3D3">Rp{{ $data['pendapatan_lain_sum'] }},-</td>
                    </tr>

                    {{-- End Pendapatan Lain-Lain --}}

                    {{-- Biaya Operasional --}}
                    <tr>
                        <td>{{ $data['biaya_operasional_coa']['nomor_akun'] }}</td>
                        <td>{{ $data['biaya_operasional_coa']['nama_akun'] }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    @foreach ($biayaOperasionalGeDetails as $biayaOperasionalGeDetail)
                        <tr>
                            <td></td>
                            <td></td>
                            <td>{{ $biayaOperasionalGeDetail['coa_detail']['nomor_rincian_akun'] }}</td>
                            <td>{{ $biayaOperasionalGeDetail['coa_detail']['nama_rincian_akun'] }}</td>
                            <td>Rp{{ \Illuminate\Support\Facades\Http::withToken(session('token'))->post('https://api.jujutsu.xyz/api/v1/income-statement-filter-based', [
                                'rincian_akun_id' => $biayaOperasionalGeDetail['coa_detail_id'],
                                'from_date' => $fromDate,
                                'to_date' => $toDate
                            ])['data']['sum_debit_based'] }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td style="background-color: #D3D3D3"></td>
                        <td style="background-color: #D3D3D3"></td>
                        <td style="background-color: #D3D3D3"></td>
                        <td style="background-color: #D3D3D3">Total</td>
                        <td style="background-color: #D3D3D3">Rp{{ $data['biaya_operasional_sum'] }},-</td>
                    </tr>

                    {{-- End Biaya Operasional --}}

                    {{-- Biaya Operasional --}}
                    <tr>
                        <td>{{ $data['biaya_lain_coa']['nomor_akun'] }}</td>
                        <td>{{ $data['biaya_lain_coa']['nama_akun'] }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    @foreach ($biayaLainGeDetails as $biayaLainGeDetail)
                        <tr>
                            <td></td>
                            <td></td>
                            <td>{{ $biayaLainGeDetail['coa_detail']['nomor_rincian_akun'] }}</td>
                            <td>{{ $biayaLainGeDetail['coa_detail']['nama_rincian_akun'] }}</td>
                            <td>Rp{{ \Illuminate\Support\Facades\Http::withToken(session('token'))->post('https://api.jujutsu.xyz/api/v1/income-statement-filter-based', [
                                'rincian_akun_id' => $biayaLainGeDetail['coa_detail_id'],
                                'from_date' => $fromDate,
                                'to_date' => $toDate
                            ])['data']['sum_debit_based'] }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td style="background-color: #D3D3D3"></td>
                        <td style="background-color: #D3D3D3"></td>
                        <td style="background-color: #D3D3D3"></td>
                        <td style="background-color: #D3D3D3">Total</td>
                        <td style="background-color: #D3D3D3">Rp{{ $data['biaya_lain_sum'] }},-</td>
                    </tr>

                    {{-- End Biaya Operasional --}}

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Laba Bersih</b></td>
                        <td><b>{{ $data['laba_bersih'] }}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @include('scripts.base-scripts')
    @include('user.report.income-statement.print-modal')
</body>
</html>
