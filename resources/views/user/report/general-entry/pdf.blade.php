<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Jurnal Umum - {{ config('app.name') }}</title>
    @include('scripts.base-styles')
</head>
<body>
    <div class="card-body">
        <center><h3>Jurnal Umum - {{ config('app.name') }} <br>[{{ $fromDate }} s/d {{ $toDate }}]</h3></center>
        <div class="table-responsive">
            <table id="table" class="display table">
                <thead>
                    <tr style="background-color: #D3D3D3">
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Ref.</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($generalEntryDetails as $generalEntryDetail)
                    <tr>
                        <td>{{ $generalEntryDetail['general_entry']['tanggal'] }}</td>
                        <td>{{ $generalEntryDetail['general_entry']['keterangan'] }}</td>
                        <td>{{ $generalEntryDetail['coa_detail']['nomor_rincian_akun'] }}</td>
                        <td>{{ $generalEntryDetail['debit'] }}</td>
                        <td>{{ $generalEntryDetail['kredit'] }}</td>
                    </tr>
                @endforeach
                <tr style="background-color: #D3D3D3">
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td>{{ $sumDebit }}</td>
                    <td>{{ $sumKredit }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    @include('scripts.base-scripts')
</body>
</html>
