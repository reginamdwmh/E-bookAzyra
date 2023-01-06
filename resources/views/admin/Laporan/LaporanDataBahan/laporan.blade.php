<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Data Transaksi Bahan</title>
</head>
    {{-- <style type="text/css">
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
    </style> --}}
        
     
    <body>
        <table border="0" align="center" width="100%">
            <tr align="center">
                <td>
            <img src="{{asset ('assets/AdminLTE/dist/img/azyra.png')}}" width="120px">
                </td>
                <td>
                    <font style="font-size: 28px; margin-right: 120px;">AZYRA SNACK N FOOD</font> <br>
                    <font style="margin-right: 120px;" size="2">Jl. Menatos Timur No.8 Banjarbaru Utara, Kalimantan Selatan 707114</font> <br>
                </td>
            </tr>
        </table>
        <hr class="my-4">
        <br>

        <div style="text-align: center;">
            <font size="5"><b>LAPORAN DATA TRANSAKSI BAHAN</b></font><br>
        </div>
            
        <br>
        <div class="w-50 float-left mt-10">
            @foreach ($users as $u)
                @if($u->id == Auth::user()->id)
                <font style="margin-right: 120px;" size="3">Staff / user : <span class="gray-color">{{ $u->name }}</span></font><br>
                @endif
            @endforeach
            <font style="margin-right: 120px;" size="3">Tanggal Cut Off : {{ date('d F Y', strtotime($tglawal)) }} s/d {{ date('d F Y', strtotime($tglakhir)) }} <span class="gray-color"></span></font><br>
        </div>
            <div style="clear: both;"></div>
        <br>            
        <table border="1" cellspacing="0" width="100%">
        <thead style="background-color: #f5b2bb; text-align: center;">
        <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Bahan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                
            @php
                $total_akhir = 0;
                $no = 1;
            @endphp
            </tr>
        </thead>
        <tbody>
            @foreach($tanggal as $t) 
            <tr>
                <td><center>{{$no++}}</center></td>
                <td><center>{{$t->created_at->format('d F Y')}}</center></td>    
                <td>{{$t->nama_bahan}}</td>
                <td><center>@currency($t->harga)</center></td>
                <td><center>{{$t->jumlah}}</center></td>
                @php
                    $total_akhir += $t->total;
                @endphp
                <td><center>@currency($t->total)</center></td>
            </tr>
            @endforeach
            <tr>
                
                <td colspan="5"><center>Total Keseluruhan</center></td>
                <td><center>Rp.{{ number_format($total_akhir) }}</center></td>
            
            </tr>
        </tbody>       
        </table>
        <br><br>

        <div style="text-align: left; display: inline-block; float: right; margin-right: 50px;">
            <label>
                <br>
                <p style="text-align: left;">
                    
                    <center>PEMILIK</center>
                    
                </p>
                <br><br><br>
                <p style="text-align: center;">
                    <b></b><br>
                    Siti Maisyarah, S.E<br>
                 
                </p>
            </label>
        </div>
    
</body>

</html>