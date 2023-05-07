<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Data Omzet Pertahun</title>
</head>
     
    <body>
        
            {{-- <p align="center"><b>LAPORAN DATA TRANSAKSI UMUM</b></p> --}}
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
                <font size="5"><b>LAPORAN DATA OMZET PERTAHUN</b></font><br>
            </div>
            
            <br>
            <div class="w-50 float-left mt-10">
                @foreach ($users as $u)
                    @if($u->id == Auth::user()->id)
                    <font style="margin-right: 120px;" size="3">Staff / user : <span class="gray-color">{{ $u->name }}</span></font><br>
                    @endif
                @endforeach
                <font style="margin-right: 120px;" size="3">Tahun : {{ $tahun }}<span class="gray-color"></span></font><br>
            </div>
            <div style="clear: both;"></div>
            <br> 
            <table border="1" cellspacing="0" width="100%">
            <thead style="background-color: #f5b2bb; text-align: center;">
            <tr>
                <th>Bulan</th>
                <th>Omzet</th>
                
            @php
                // $total_akhir = 0;
                // $no = 1;
            @endphp
            </tr>
            </thead>
            <tbody>
            {{-- @foreach($omzet_pertahun as $key => $t)  --}}
            @for($no = 0; $no <= 11; $no++)
            <tr>
                @if ($no == 0)
                    <td><center>Januari</center></td>
                    @if($omzet_pertahun[0]->bulan == 1 && $omzet_pertahun[0]->bulan != '')<td><center>@currency($omzet_pertahun[0]->omzet)</center></td>@else<td><center>@currency(0)</center></td>@endif
                @elseif($no == 1)
                    <td><center>Februari</center></td>
                    @if($omzet_pertahun[1]->bulan == 2 && $omzet_pertahun[1]->bulan != '')<td><center>@currency($omzet_pertahun[1]->omzet)</center></td>@else<td><center>@currency(0)</center></td>@endif
                @elseif($no == 2)
                    <td><center>Maret</center></td>
                    @if($omzet_pertahun[2]->bulan == 3 && $omzet_pertahun[2]->bulan != '')<td><center>@currency($omzet_pertahun[2]->omzet)</center></td>@else<td><center>@currency(0)</center></td>@endif
                @elseif($no == 3)
                    <td><center>April</center></td>
                    @if($omzet_pertahun[3]->bulan == 4 && $omzet_pertahun[3]->bulan != '')<td><center>@currency($omzet_pertahun[3]->omzet)</center></td>@else<td><center>@currency(0)</center></td>@endif
                @elseif($no == 4)
                    <td><center>Mei</center></td>
                    @if($omzet_pertahun[4]->bulan == 5 && $omzet_pertahun[4]->bulan != '')<td><center>@currency($omzet_pertahun[4]->omzet)</center></td>@else<td><center>@currency(0)</center></td>@endif
                @elseif($no == 5)
                    <td><center>Juni</center></td>
                    @if($omzet_pertahun[5]->bulan == 6 && $omzet_pertahun[5]->bulan != '')<td><center>@currency($omzet_pertahun[5]->omzet)</center></td>@else<td><center>@currency(0)</center></td>@endif
                @elseif($no == 6)
                    <td><center>Juli</center></td>
                    @if($omzet_pertahun[6]->bulan == 7 && $omzet_pertahun[6]->bulan != '')<td><center>@currency($omzet_pertahun[6]->omzet)</center></td>@else<td><center>@currency(0)</center></td>@endif
                @elseif($no == 7)
                    <td><center>Agustus</center></td>
                    @if($omzet_pertahun[7]->bulan == 8 && $omzet_pertahun[7]->bulan != '')<td><center>@currency($omzet_pertahun[7]->omzet)</center></td>@else<td><center>@currency(0)</center></td>@endif
                @elseif($no == 8)
                    <td><center>September</center></td>
                    @if($omzet_pertahun[8]->bulan == 9 && $omzet_pertahun[8]->bulan != '')<td><center>@currency($omzet_pertahun[8]->omzet)</center></td>@else<td><center>@currency(0)</center></td>@endif
                @elseif($no == 9)
                    <td><center>Oktober</center></td>
                    @if($omzet_pertahun[9]->bulan == 10 && $omzet_pertahun[9]->bulan != '')<td><center>@currency($omzet_pertahun[9]->omzet)</center></td>@else<td><center>@currency(0)</center></td>@endif
                @elseif($no == 10)
                    <td><center>November</center></td>
                    @if($omzet_pertahun[10]->bulan == 11 && $omzet_pertahun[10]->bulan != '')<td><center>@currency($omzet_pertahun[10]->omzet)</center></td>@else<td><center>@currency(0)</center></td>@endif
                @elseif($no == 11)
                    <td><center>Desember</center></td>
                    @if($omzet_pertahun[11]->bulan == 12 && $omzet_pertahun[11]->bulan != '')<td><center>@currency($omzet_pertahun[11]->omzet)</center></td>@else<td><center>@currency(0)</center></td>@endif
                @endif
            </tr>
            @endfor
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