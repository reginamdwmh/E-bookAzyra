<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <style type="text/css">
        body{
            font-family: 'Roboto Condensed', sans-serif;
        }
        .m-0{
            margin: 0px;
        }
        .p-0{
            padding: 0px;
        }
        .pt-5{
            padding-top:5px;
        }
        .mt-10{
            margin-top:10px;
        }
        .text-center{
            text-align:center !important;
        }
        .w-100{
            width: 100%;
        }
        .w-50{
            width:50%;   
        }
        .w-85{
            width:85%;   
        }
        .w-15{
            width:15%;   
        }
        .logo img{
            width:45px;
            height:45px;
            padding-top:30px;
        }
        .logo span{
            margin-left:8px;
            top:19px;
            position: absolute;
            font-weight: bold;
            font-size:25px;
        }
        .gray-color{
            color:#5D5D5D;
        }
        .text-bold{
            font-weight: bold;
        }
        .border{
            border:1px solid black;
        }
        table tr,th,td{
            border: 1px solid #d2d2d2;
            border-collapse:collapse;
            padding:7px 8px;
        }
        table tr th{
            background: #F4F4F4;
            font-size:15px;
        }
        table tr td{
            font-size:13px;
        }
        table{
            border-collapse:collapse;
        }
        .box-text p{
            line-height:10px;
        }
        .float-left{
            float:left;
        }
        .total-part{
            font-size:16px;
            line-height:12px;
        }
        .total-right p{
            padding-right:20px;
        }
    </style>
        <title>Data Transaksi Pemesanan Online</title>
    </head>
     
    <body>
        <div class="form-group">
            <p align="center"><b>LAPORAN DATA TRANSAKSI PEMESANAN ONLINE</b></p>
     
            <div class="w-50 float-left mt-10">
                @foreach ($users as $u)
                    @if($u->id == Auth::user()->id)
                    <p class="m-0 pt-5 w-100">Staff / user : <span class="gray-color">{{ $u->name }}</span></p>
                    @endif
                @endforeach
                <p class="m-0 pt-5 w-100">Tanggal Awal : <span class="gray-color"></span></p>
                <p class="m-0 pt-5 w-100">Tanggal Akhir : <span class="gray-color"></span></p> 
            </div>
            <div style="clear: both;"></div>
                      
            <div class="table-section bill-tbl w-100 mt-10">
            <table class="table w-100 mt-10">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Pemesanan</th>
                <th>Keterangan Pemesanan</th>
                <th>Komisi</th>
                <th>Pendapatan</th>

                
            @php
                $komisi_akhir = 0;
                $pendapatan_akhir = 0;
                $no = 1;
            @endphp
            </tr>
            @foreach($tanggal as $tb) 
            <tr>
                <td><center>{{$no++}}</center></td>
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
                
                <td colspan="4"><center>Total</center></td>
                <td><center>Rp.{{ number_format($komisi_akhir) }}</center></td>
                <td><center>Rp.{{ number_format($pendapatan_akhir) }}</center></td>
            
            </tr>
            

            


            
        </table>
    </div>
</body>

</html>