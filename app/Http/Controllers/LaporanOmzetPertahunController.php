<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanOmzetPertahunController extends Controller
{
    public function indexomzetpertahun()
    {
        $users = UsersModel::select('*')
            ->get();

        $user = Auth::user();
        if($user->role == 'admin'){
            return view('admin.Laporan.OmzetPertahun.index',['users' => $users]);
        } else if($user->role == 'user'){
        return view('Laporan.OmzetPertahun.index',['users' => $users]);
        }
    }

    public function cetakomzerpertahun($tahun)
    {
        // dd($tahun);
        $users = UsersModel::select('*')
            ->get();
        $query = "SELECT
        hasil.bulan,
        COALESCE(SUM(tpm.total),0) AS omzet
    FROM(
            SELECT
                '01' AS bulan
            UNION ALL
            SELECT
                '02'
            UNION ALL
            SELECT
                '03'
            UNION ALL
            SELECT
                '04'
            UNION ALL
            SELECT
                '05'
            UNION ALL
            SELECT
                '06'
            UNION ALL
            SELECT
                '07'
            UNION ALL
            SELECT
                '08'
            UNION ALL
            SELECT
                '09'
            UNION ALL
            SELECT
                '10'
            UNION ALL
            SELECT
                '11'
            UNION ALL
            SELECT
                '12'
        ) hasil
        LEFT JOIN transaksi_penjualan_makanan tpm ON DATE_FORMAT(tpm.created_at, '%m') = hasil.bulan AND DATE_FORMAT(tpm.created_at, '%Y') = '" . $tahun . "'
    GROUP BY
        hasil.bulan
    ORDER BY
        hasil.bulan";
        // $omzet_pertahun = DB::table('transaksi_penjualan_makanan')->select(DB::raw("DATE_FORMAT(created_at, '%m') AS bulan"), DB::raw("COALESCE(SUM(total),0) AS omzet"))->whereYear('created_at', $tahun)->groupBy(DB::raw("DATE_FORMAT(created_at, '%m')"))->orderBy(DB::raw("DATE_FORMAT(created_at, '%m')"))->get();
        $omzet_pertahun = DB::select($query);
        // dd($omzet_pertahun);
        $pdf = PDF::loadView('Laporan.OmzetPertahun.laporan', ['omzet_pertahun' => $omzet_pertahun, 'users' => $users], compact('tahun'));
        return $pdf->stream('Laporan-Data-Omzet-Pertahun.pdf');
    }
}
