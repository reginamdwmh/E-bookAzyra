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
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Makanan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Diskon</th>
                <th>Total</th>
                
            @php
                $total_akhir = 0;
                $no = 1;
            @endphp
            </tr>
            @foreach($tanggal as $tb) 
            <tr>
                <td><center>{{$no++}}</center></td>
                <td><center>{{$tb->created_at->format('d/m/Y')}}</center></td>    
                <td>{{$tb->nama_makanan}}</td>
                <td><center>@currency($tb->harga)</center></td>
                <td><center>{{$tb->jumlah}}</center></td>
                <td><center>{{$tb->diskon}}%</center></td>
                @php
                    $total_akhir += $tb->total;
                @endphp
                <td><center>@currency($tb->total)</center></td>
            </tr>
            @endforeach
            <tr>
                
                <td colspan="6"><center>Total</center></td>
                <td><center>Rp.{{ number_format($total_akhir) }}</center></td>
            
            </tr>
            

            


            
        </table>
    </div>
</body>

</html>