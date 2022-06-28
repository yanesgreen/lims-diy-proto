<?php

namespace App\Http\Controllers;

use App\BarangBukti;
use App\JenisKasus;
use App\Lembaga;
use App\Pemeriksa;
use App\Satker;
use App\Takah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Bidang;
use App\Jabatan;
use App\Jenisbb;
use App\Layanan;
use App\Pangkat;
use App\TiketMasuk;
use App\User;
use App\Polda;
use App\Polres;
use App\Polsek;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{

    public function __construct()
    {
        //----------------------------------------------------
        // exception middleware
        //----------------------------------------------------
        $this
            ->middleware(['checkrole:urtu/renmin'])
            ->only(
                'dashboardUrtu2'
            );

        $this
            ->middleware(['checkrole:kalabforcab'])
            ->only(
                'dashboardMingguan', 'dashboardBulanan', 'dashboardSemesteran', 'dashboardTahunan'
            );
    }

    public function dashboard()
    {
        // Admin
        if (Auth::user()->role->id === 1) {
            $jumlah_users = User::where('aktif', 1)->count();
            $jumlah_pemeriksa = Pemeriksa::count();
            $jumlah_jeniskasus = JenisKasus::count();
            $jumlah_jenisbb = Jenisbb::count();
            $jumlah_satker = Satker::count();
            $jumlah_lembaga = Lembaga::count();
            $jumlah_polda = Polda::count();
            $jumlah_polres = Polres::count();
            $jumlah_polsek = Polsek::count();

            return view('dashboards.admin', [
                'jumlah_users' => $jumlah_users,
                'jumlah_pemeriksa' => $jumlah_pemeriksa,
                'jumlah_jeniskasus' => $jumlah_jeniskasus,
                'jumlah_jenisbb' => $jumlah_jenisbb,
                'jumlah_satker' => $jumlah_satker,
                'jumlah_lembaga' => $jumlah_lembaga,
                'jumlah_polda' => $jumlah_polda,
                'jumlah_polres' => $jumlah_polres,
                'jumlah_polsek' => $jumlah_polsek,
            ]);
        }

        // Urtu
        if (Auth::user()->role->id === 2) {
            $jumlah_takah_diterima = Takah::whereYear('created_at', Carbon::now()->year)
                ->count();
            $jumlah_takah_diserahkan = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereNotNull('diserahkan_ke_kaurmin_at')
                ->count();

            return view('dashboards.urtu.satu', [
                'jumlah_takah_diterima' => $jumlah_takah_diterima,
                'jumlah_takah_diserahkan' => $jumlah_takah_diserahkan,
            ]);
        }

        // Kaurmin
        if (Auth::user()->role->id === 3) {
            $jumlah_takah_diterima = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['bidang_id' => Auth::user()->bidang_id])
                ->whereNotNull('diserahkan_ke_kaurmin_at')
                ->count();
            $jumlah_takah_siap_diserahkan = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['bidang_id' => Auth::user()->bidang_id])
                ->whereNotNull('siap_diserahkan_ke_urtu_at')
                ->count();
            return view('dashboards.kaurmin', [
                'jumlah_takah_diterima' => $jumlah_takah_diterima,
                'jumlah_takah_siap_diserahkan' => $jumlah_takah_siap_diserahkan,
            ]);
        }

        // Pimpinan/Visual Grafis
        if (Auth::user()->role->id === 4) {
            // unit kerja
            $jumlah_puslabfor = Takah::where(['created_at' => Carbon::today(), 'unitkerja_id' => 1])
                ->count();
            $jumlah_bidlabfor_sumut = Takah::where(['created_at' => Carbon::today(), 'unitkerja_id' => 3])
                ->count();
            $jumlah_bidlabfor_riau = Takah::where(['created_at' => Carbon::today(), 'unitkerja_id' => 8])
                ->count();
            $jumlah_bidlabfor_sumsel = Takah::where(['created_at' => Carbon::today(), 'unitkerja_id' => 6])
                ->count();
            $jumlah_bidlabfor_jateng = Takah::where(['created_at' => Carbon::today(), 'unitkerja_id' => 4])
                ->count();
            $jumlah_bidlabfor_jatim = Takah::where(['created_at' => Carbon::today(), 'unitkerja_id' => 2])
                ->count();
            $jumlah_bidlabfor_bali = Takah::where(['created_at' => Carbon::today(), 'unitkerja_id' => 7])
                ->count();
            $jumlah_bidlabfor_sulsel = Takah::where(['created_at' => Carbon::today(), 'unitkerja_id' => 5])
                ->count();
            $jumlah_bidlabfor_papua = Takah::where(['created_at' => Carbon::today(), 'unitkerja_id' => 9])
                ->count();

            // polda puslabfor
            $jumlah_polda_metro_jaya = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 101);
                })->count();
            $jumlah_polda_banten = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 103);
                })->count();
            $jumlah_polda_jabar = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 102);
                })->count();
            $jumlah_polda_kalbar = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 301);
                })->count();

            // polda jawa tengah
            $jumlah_polda_jateng = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 104);
                })->count();
            $jumlah_polda_diy = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 105);
                })->count();

            return view('dashboards.visual_grafis.default', [
                'jumlah_puslabfor' => $jumlah_puslabfor,
                'jumlah_bidlabfor_sumut' => $jumlah_bidlabfor_sumut,
                'jumlah_bidlabfor_riau' => $jumlah_bidlabfor_riau,
                'jumlah_bidlabfor_sumsel' => $jumlah_bidlabfor_sumsel,
                'jumlah_bidlabfor_jateng' => $jumlah_bidlabfor_jateng,
                'jumlah_bidlabfor_jatim' => $jumlah_bidlabfor_jatim,
                'jumlah_bidlabfor_bali' => $jumlah_bidlabfor_bali,
                'jumlah_bidlabfor_sulsel' => $jumlah_bidlabfor_sulsel,
                'jumlah_bidlabfor_papua' => $jumlah_bidlabfor_papua,
                'jumlah_polda_metro_jaya' => $jumlah_polda_metro_jaya,
                'jumlah_polda_banten' => $jumlah_polda_banten,
                'jumlah_polda_jabar' => $jumlah_polda_jabar,
                'jumlah_polda_kalbar' => $jumlah_polda_kalbar,
                'jumlah_polda_jateng' => $jumlah_polda_jateng,
                'jumlah_polda_diy' => $jumlah_polda_diy,
            ]);
        }

    }

    // Urtu 2
    public function dashboardUrtu2()
    {
        $jumlah_takah_diterima = Takah::whereYear('created_at', Carbon::now()->year)
            ->whereNotNull('diserahkan_ke_urtu_at')
            ->count();
        $jumlah_takah_diserahkan = Takah::whereYear('created_at', Carbon::now()->year)
            ->whereNotNull('siap_diserahkan_ke_penyidik_at')
            ->count();

        return view('dashboards.urtu.dua', [
            'jumlah_takah_diterima' => $jumlah_takah_diterima,
            'jumlah_takah_diserahkan' => $jumlah_takah_diserahkan,
        ]);
    }

    // Dashboard Visual Grafis mingguan, bulanan, semesteran, tahunan
    public function dashboardVisualGrafis(Request $request)
    {
        if ($request->waktu == 'mingguan') {
            // unit kerja
            $jumlah_puslabfor = Takah::where(['unitkerja_id' => 1])
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->count();
            $jumlah_bidlabfor_sumut = Takah::where(['unitkerja_id' => 3])
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->count();
            $jumlah_bidlabfor_riau = Takah::where(['unitkerja_id' => 8])
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->count();
            $jumlah_bidlabfor_sumsel = Takah::where(['unitkerja_id' => 6])
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->count();
            $jumlah_bidlabfor_jateng = Takah::where(['unitkerja_id' => 4])
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->count();
            $jumlah_bidlabfor_jatim = Takah::where(['unitkerja_id' => 2])
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->count();
            $jumlah_bidlabfor_bali = Takah::where(['unitkerja_id' => 7])
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->count();
            $jumlah_bidlabfor_sulsel = Takah::where(['unitkerja_id' => 5])
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->count();
            $jumlah_bidlabfor_papua = Takah::where(['unitkerja_id' => 9])
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->count();

            // polda puslabfor
            $jumlah_polda_metro_jaya = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 101);
                })->count();
            $jumlah_polda_banten = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 103);
                })->count();
            $jumlah_polda_jabar = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 102);
                })->count();
            $jumlah_polda_kalbar = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 301);
                })->count();

            // polda jawa tengah
            $jumlah_polda_jateng = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 104);
                })->count();
            $jumlah_polda_diy = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 105);
                })->count();

        } elseif ($request->waktu == 'bulanan') {
            // unit kerja
            $jumlah_puslabfor = Takah::where(['unitkerja_id' => 1])
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();
            $jumlah_bidlabfor_sumut = Takah::where(['unitkerja_id' => 3])
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();
            $jumlah_bidlabfor_riau = Takah::where(['unitkerja_id' => 8])
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();
            $jumlah_bidlabfor_sumsel = Takah::where(['unitkerja_id' => 6])
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();
            $jumlah_bidlabfor_jateng = Takah::where(['unitkerja_id' => 4])
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();
            $jumlah_bidlabfor_jatim = Takah::where(['unitkerja_id' => 2])
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();
            $jumlah_bidlabfor_bali = Takah::where(['unitkerja_id' => 7])
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();
            $jumlah_bidlabfor_sulsel = Takah::where(['unitkerja_id' => 5])
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();
            $jumlah_bidlabfor_papua = Takah::where(['unitkerja_id' => 9])
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();

            // polda puslabfor
            $jumlah_polda_metro_jaya = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 101);
                })->count();
            $jumlah_polda_banten = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 103);
                })->count();
            $jumlah_polda_jabar = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 102);
                })->count();
            $jumlah_polda_kalbar = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 301);
                })->count();

            // polda jawa tengah
            $jumlah_polda_jateng = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 104);
                })->count();
            $jumlah_polda_diy = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 105);
                })->count();

        } elseif ($request->waktu == 'semesteran') {

            // unit kerja
            $jumlah_puslabfor = Takah::where(['unitkerja_id' => 1])
                ->where("created_at", ">", Carbon::now()->subMonths(6))
                ->count();
            $jumlah_bidlabfor_sumut = Takah::where(['unitkerja_id' => 3])
                ->where("created_at", ">", Carbon::now()->subMonths(6))
                ->count();
            $jumlah_bidlabfor_riau = Takah::where(['unitkerja_id' => 8])
                ->where("created_at", ">", Carbon::now()->subMonths(6))
                ->count();
            $jumlah_bidlabfor_sumsel = Takah::where(['unitkerja_id' => 6])
                ->where("created_at", ">", Carbon::now()->subMonths(6))
                ->count();
            $jumlah_bidlabfor_jateng = Takah::where(['unitkerja_id' => 4])
                ->where("created_at", ">", Carbon::now()->subMonths(6))
                ->count();
            $jumlah_bidlabfor_jatim = Takah::where(['unitkerja_id' => 2])
                ->where("created_at", ">", Carbon::now()->subMonths(6))
                ->count();
            $jumlah_bidlabfor_bali = Takah::where(['unitkerja_id' => 7])
                ->where("created_at", ">", Carbon::now()->subMonths(6))
                ->count();
            $jumlah_bidlabfor_sulsel = Takah::where(['unitkerja_id' => 5])
                ->where("created_at", ">", Carbon::now()->subMonths(6))
                ->count();
            $jumlah_bidlabfor_papua = Takah::where(['unitkerja_id' => 9])
                ->where("created_at", ">", Carbon::now()->subMonths(6))
                ->count();

            // polda puslabfor
            $jumlah_polda_metro_jaya = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 101);
                })->count();
            $jumlah_polda_banten = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 103);
                })->count();
            $jumlah_polda_jabar = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 102);
                })->count();
            $jumlah_polda_kalbar = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 301);
                })->count();

            // polda jawa tengah
            $jumlah_polda_jateng = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 104);
                })->count();
            $jumlah_polda_diy = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 105);
                })->count();

        } else {

            // unit kerja
            $jumlah_puslabfor = Takah::where(['unitkerja_id' => 1])
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            $jumlah_bidlabfor_sumut = Takah::where(['unitkerja_id' => 3])
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            $jumlah_bidlabfor_riau = Takah::where(['unitkerja_id' => 8])
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            $jumlah_bidlabfor_sumsel = Takah::where(['unitkerja_id' => 6])
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            $jumlah_bidlabfor_jateng = Takah::where(['unitkerja_id' => 4])
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            $jumlah_bidlabfor_jatim = Takah::where(['unitkerja_id' => 2])
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            $jumlah_bidlabfor_bali = Takah::where(['unitkerja_id' => 7])
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            $jumlah_bidlabfor_sulsel = Takah::where(['unitkerja_id' => 5])
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            $jumlah_bidlabfor_papua = Takah::where(['unitkerja_id' => 9])
                ->whereYear('created_at', Carbon::now()->year)
                ->count();

            // polda puslabfor
            $jumlah_polda_metro_jaya = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 101);
                })->count();
            $jumlah_polda_banten = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 103);
                })->count();
            $jumlah_polda_jabar = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 102);
                })->count();
            $jumlah_polda_kalbar = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 301);
                })->count();

            // polda jawa tengah
            $jumlah_polda_jateng = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 104);
                })->count();
            $jumlah_polda_diy = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('asaltakah', function (Builder $query) {
                    $query->where('polda_id', '=', 105);
                })->count();

        }

        return view('dashboards.visual_grafis.default', [
            'jumlah_puslabfor' => $jumlah_puslabfor,
            'jumlah_bidlabfor_sumut' => $jumlah_bidlabfor_sumut,
            'jumlah_bidlabfor_riau' => $jumlah_bidlabfor_riau,
            'jumlah_bidlabfor_sumsel' => $jumlah_bidlabfor_sumsel,
            'jumlah_bidlabfor_jateng' => $jumlah_bidlabfor_jateng,
            'jumlah_bidlabfor_jatim' => $jumlah_bidlabfor_jatim,
            'jumlah_bidlabfor_bali' => $jumlah_bidlabfor_bali,
            'jumlah_bidlabfor_sulsel' => $jumlah_bidlabfor_sulsel,
            'jumlah_bidlabfor_papua' => $jumlah_bidlabfor_papua,
            'jumlah_polda_metro_jaya' => $jumlah_polda_metro_jaya,
            'jumlah_polda_banten' => $jumlah_polda_banten,
            'jumlah_polda_jabar' => $jumlah_polda_jabar,
            'jumlah_polda_kalbar' => $jumlah_polda_kalbar,
            'jumlah_polda_jateng' => $jumlah_polda_jateng,
            'jumlah_polda_diy' => $jumlah_polda_diy,
            'waktu' => $request->waktu,
        ]);
    }

}
