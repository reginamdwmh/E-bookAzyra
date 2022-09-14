<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <style>
        table.static {
            position: relative;
            border: 1px solid black;
        }
    </style>
    <title>Data Transaksi Penjualan Makanan</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>LAPORAN DATA TRANSAKSI PENJUALAN MAKANAN</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>

                <th>Tanggal</th>
                <th>Kode Pemesanan</th>
                <th>Keterangan Pemesanan</th>
                <th>Komisi</th>
                <th>Pendapatan</th>

                
            @php
                $komisi_akhir = 0;
                $pendapatan_akhir = 0;
            @endphp
            </tr>
            @foreach($tanggal as $tb) 
            <tr>
                <td><center>{{$tb->created_at->format('d/m/Y')}}</center></td>    
                <td><center>{{$tb->kode_pemesanan}}</center></td>
                <td><center>{{$tb->keterangan_pemesanan}}</center></td>
                @php
                    $komisi_akhir += $tb->komisi;
                    $pendapatan_akhir += $tb->total;
                @endphp
                <td><center>@currency($tb->komisi)</center></td>
                <td><center>@currency($tb->total)</center></td>
            </tr>
            @endforeach
            <tr>
                
                <td colspan="3"><center>Total</center></td>
                <td><center>Rp.{{ number_format($komisi_akhir) }}</center></td>
                <td><center>Rp.{{ number_format($pendapatan_akhir) }}</center></td>
            
            </tr>
            

            


            
        </table>
    </div>
</body>

</html>