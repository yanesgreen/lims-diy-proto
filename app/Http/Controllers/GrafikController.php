<?php

namespace App\Http\Controllers;

use App\Takah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Http;

class GrafikController extends Controller
{
    // grafik per polda
    public function grafikPerPolda(Request $request)
    {

        if ($request->unitkerja == 1) {
            if ($request->waktu == 'harian') {
                $jumlah_polda_metro_jaya = Takah::where(['created_at' => Carbon::today()])
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 101);
                    })->count();
                $jumlah_polda_banten = Takah::where(['created_at' => Carbon::today()])
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 103);
                    })->count();
                $jumlah_polda_jabar = Takah::where(['created_at' => Carbon::today()])
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 102);
                    })->count();
                $jumlah_polda_kalbar = Takah::where(['created_at' => Carbon::today()])
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 301);
                    })->count();
                $jumlah_lainnya = Takah::where(['created_at' => Carbon::today()])
                    ->whereHas('asaltakah', function ($query) {
                        $query
                            ->whereNotIn('polda_id', [101, 102, 103, 301])
                            ->orWhere('polda_id', null);
                    })
                    ->count();

            } elseif ($request->waktu == 'mingguan') {
                $jumlah_polda_metro_jaya = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 101);
                    })->count();
                $jumlah_polda_banten = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 103);
                    })->count();
                $jumlah_polda_jabar = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 102);
                    })->count();
                $jumlah_polda_kalbar = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 301);
                    })->count();
                $jumlah_lainnya = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->whereHas('asaltakah', function ($query) {
                        $query
                            ->whereNotIn('polda_id', [101, 102, 103, 301])
                            ->orWhere('polda_id', null);
                    })
                    ->count();

            } elseif ($request->waktu == 'bulanan') {
                $jumlah_polda_metro_jaya = Takah::whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 101);
                    })->count();
                $jumlah_polda_banten = Takah::whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 103);
                    })->count();
                $jumlah_polda_jabar = Takah::whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 102);
                    })->count();
                $jumlah_polda_kalbar = Takah::whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 301);
                    })->count();
                $jumlah_lainnya = Takah::whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->whereHas('asaltakah', function ($query) {
                        $query
                            ->whereNotIn('polda_id', [101, 102, 103, 301])
                            ->orWhere('polda_id', null);
                    })
                    ->count();
            } elseif ($request->waktu == 'semesteran') {
                $jumlah_polda_metro_jaya = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 101);
                    })->count();
                $jumlah_polda_banten = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 103);
                    })->count();
                $jumlah_polda_jabar = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 102);
                    })->count();
                $jumlah_polda_kalbar = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 301);
                    })->count();
                $jumlah_lainnya = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                    ->whereHas('asaltakah', function ($query) {
                        $query
                            ->whereNotIn('polda_id', [101, 102, 103, 301])
                            ->orWhere('polda_id', null);
                    })
                    ->count();
            } elseif ($request->waktu == 'tahunan') {
                $jumlah_polda_metro_jaya = Takah::whereYear('created_at', Carbon::now()->year)
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 101);
                    })->count();
                $jumlah_polda_banten = Takah::whereYear('created_at', Carbon::now()->year)
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 103);
                    })->count();
                $jumlah_polda_jabar = Takah::whereYear('created_at', Carbon::now()->year)
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 102);
                    })->count();
                $jumlah_polda_kalbar = Takah::whereYear('created_at', Carbon::now()->year)
                    ->whereHas('asaltakah', function ($query) {
                        $query->where('polda_id', 301);
                    })->count();
                $jumlah_lainnya = Takah::whereYear('created_at', Carbon::now()->year)
                    ->whereHas('asaltakah', function ($query) {
                        $query
                            ->whereNotIn('polda_id', [101, 102, 103, 301])
                            ->orWhere('polda_id', null);
                    })
                    ->count();
            }

            return view('visual_grafis.grafik.per_polda.puslabfor',
                [
                    'jumlah_polda_metro_jaya' => $jumlah_polda_metro_jaya,
                    'jumlah_polda_banten' => $jumlah_polda_banten,
                    'jumlah_polda_jabar' => $jumlah_polda_jabar,
                    'jumlah_polda_kalbar' => $jumlah_polda_kalbar,
                    'jumlah_lainnya' => $jumlah_lainnya,
                    'waktu' => $request->waktu,
                    'unitkerja' => $request->unitkerja
                ]);

        } else {

            if ($request->waktu == 'harian') {

                $takahPerPolda = Takah::where(['takah.created_at' => Carbon::today(), 'takah.unitkerja_id' => $request->unitkerja])
                    ->join('asaltakah', 'takah.asaltakah_id', '=', 'asaltakah.id')
                    ->selectRaw('asaltakah.nama_asal, count(asaltakah.nama_asal) as total')
                    ->groupBy('asaltakah.nama_asal')
                    ->pluck('total', 'asaltakah.nama_asal');

            } elseif ($request->waktu == 'mingguan') {

                $takahPerPolda = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->where(['takah.unitkerja_id' => $request->unitkerja])
                    ->join('asaltakah', 'takah.asaltakah_id', '=', 'asaltakah.id')
                    ->selectRaw('asaltakah.nama_asal, count(asaltakah.nama_asal) as total')
                    ->groupBy('asaltakah.nama_asal')
                    ->pluck('total', 'asaltakah.nama_asal');

            } elseif ($request->waktu == 'bulanan') {

                $takahPerPolda = Takah::whereYear('takah.created_at', Carbon::now()->year)
                    ->whereMonth('takah.created_at', Carbon::now()->month)
                    ->where(['takah.unitkerja_id' => $request->unitkerja])
                    ->join('asaltakah', 'takah.asaltakah_id', '=', 'asaltakah.id')
                    ->selectRaw('asaltakah.nama_asal, count(asaltakah.nama_asal) as total')
                    ->groupBy('asaltakah.nama_asal')
                    ->pluck('total', 'asaltakah.nama_asal');

            } elseif ($request->waktu == 'semesteran') {

                $takahPerPolda = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                    ->where(['takah.unitkerja_id' => $request->unitkerja])
                    ->join('asaltakah', 'takah.asaltakah_id', '=', 'asaltakah.id')
                    ->selectRaw('asaltakah.nama_asal, count(asaltakah.nama_asal) as total')
                    ->groupBy('asaltakah.nama_asal')
                    ->pluck('total', 'asaltakah.nama_asal');

            } elseif ($request->waktu == 'tahunan') {

                $takahPerPolda = Takah::whereYear('takah.created_at', Carbon::now()->year)
                    ->where(['takah.unitkerja_id' => $request->unitkerja])
                    ->join('asaltakah', 'takah.asaltakah_id', '=', 'asaltakah.id')
                    ->selectRaw('asaltakah.nama_asal, count(asaltakah.nama_asal) as total')
                    ->groupBy('asaltakah.nama_asal')
                    ->pluck('total', 'asaltakah.nama_asal');

            }

            return view('visual_grafis.grafik.per_polda.default',
                [
                    'bidang_id' => $request->bidang_id,
                    'waktu' => $request->waktu,
                    'unitkerja' => $request->unitkerja,
                    'takahPerPolda' => $takahPerPolda
                ]);

        }

    }

    // grafik per bidang dan subbidang
    public function grafikPerBidangSubbidang(Request $request)
    {
        if ($request->waktu == 'harian') {

            // jumlah bidang
            $jumlah_fiskomfor = Takah::where(['created_at' => Carbon::today()])->where(['bidang_id' => 3])->count();
            $jumlah_narkobafor = Takah::where(['created_at' => Carbon::today()])->where(['bidang_id' => 5])->count();
            $jumlah_dokupalfor = Takah::where(['created_at' => Carbon::today()])->where(['bidang_id' => 1])->count();
            $jumlah_kimbiofor = Takah::where(['created_at' => Carbon::today()])->where(['bidang_id' => 4])->count();
            $jumlah_balmetfor = Takah::where(['created_at' => Carbon::today()])->where(['bidang_id' => 2])->count();

            // subbidang
            $jumlah_subbiddokumen = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 1])->count();
            $jumlah_subbidupal = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 2])->count();
            $jumlah_subbidprodcet = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 3])->count();
            $jumlah_subbidsenpi = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 4])->count();
            $jumlah_subbidhandak = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 5])->count();
            $jumlah_subbidmetal = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 6])->count();
            $jumlah_subbiddeteksus = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 7])->count();
            $jumlah_subbidlakabakar = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 8])->count();
            $jumlah_subbidkomfor = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 9])->count();
            $jumlah_subbidkim = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 10])->count();
            $jumlah_subbidbioser = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 11])->count();
            $jumlah_subbidtokling = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 12])->count();
            $jumlah_subbidnarko = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 13])->count();
            $jumlah_subbidpsiko = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 14])->count();
            $jumlah_subbidbaya = Takah::where(['created_at' => Carbon::today()])->where(['subbidang_id' => 15])->count();

        } elseif ($request->waktu == 'mingguan') {

            // jumlah bidang
            $jumlah_fiskomfor = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['bidang_id' => 3])->count();
            $jumlah_narkobafor = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['bidang_id' => 5])->count();
            $jumlah_dokupalfor = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['bidang_id' => 1])->count();
            $jumlah_kimbiofor = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['bidang_id' => 4])->count();
            $jumlah_balmetfor = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['bidang_id' => 2])->count();

            // subbidang
            $jumlah_subbiddokumen = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 1])->count();
            $jumlah_subbidupal = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 2])->count();
            $jumlah_subbidprodcet = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 3])->count();
            $jumlah_subbidsenpi = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 4])->count();
            $jumlah_subbidhandak = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 5])->count();
            $jumlah_subbidmetal = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 6])->count();
            $jumlah_subbiddeteksus = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 7])->count();
            $jumlah_subbidlakabakar = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 8])->count();
            $jumlah_subbidkomfor = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 9])->count();
            $jumlah_subbidkim = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 10])->count();
            $jumlah_subbidbioser = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 11])->count();
            $jumlah_subbidtokling = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 12])->count();
            $jumlah_subbidnarko = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 13])->count();
            $jumlah_subbidpsiko = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 14])->count();
            $jumlah_subbidbaya = Takah::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['subbidang_id' => 15])->count();

        } elseif ($request->waktu == 'bulanan') {

            // jumlah bidang
            $jumlah_fiskomfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['bidang_id' => 3])->count();
            $jumlah_narkobafor = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['bidang_id' => 5])->count();
            $jumlah_dokupalfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['bidang_id' => 1])->count();
            $jumlah_kimbiofor = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['bidang_id' => 4])->count();
            $jumlah_balmetfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['bidang_id' => 2])->count();

            // subbidang
            $jumlah_subbiddokumen = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 1])->count();
            $jumlah_subbidupal = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 2])->count();
            $jumlah_subbidprodcet = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 3])->count();
            $jumlah_subbidsenpi = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 4])->count();
            $jumlah_subbidhandak = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 5])->count();
            $jumlah_subbidmetal = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 6])->count();
            $jumlah_subbiddeteksus = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 7])->count();
            $jumlah_subbidlakabakar = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 8])->count();
            $jumlah_subbidkomfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 9])->count();
            $jumlah_subbidkim = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 10])->count();
            $jumlah_subbidbioser = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 11])->count();
            $jumlah_subbidtokling = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 12])->count();
            $jumlah_subbidnarko = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 13])->count();
            $jumlah_subbidpsiko = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 14])->count();
            $jumlah_subbidbaya = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 15])->count();

        } elseif ($request->waktu == 'semesteran') {

            // jumlah bidang
            $jumlah_fiskomfor = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['bidang_id' => 3])->count();
            $jumlah_narkobafor = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['bidang_id' => 5])->count();
            $jumlah_dokupalfor = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['bidang_id' => 1])->count();
            $jumlah_kimbiofor = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['bidang_id' => 4])->count();
            $jumlah_balmetfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['bidang_id' => 2])->count();

            // subbidang
            $jumlah_subbiddokumen = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 1])->count();
            $jumlah_subbidupal = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 2])->count();
            $jumlah_subbidprodcet = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 3])->count();
            $jumlah_subbidsenpi = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['subbidang_id' => 4])->count();
            $jumlah_subbidhandak = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 5])->count();
            $jumlah_subbidmetal = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 6])->count();
            $jumlah_subbiddeteksus = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 7])->count();
            $jumlah_subbidlakabakar = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 8])->count();
            $jumlah_subbidkomfor = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 9])->count();
            $jumlah_subbidkim = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 10])->count();
            $jumlah_subbidbioser = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 11])->count();
            $jumlah_subbidtokling = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 12])->count();
            $jumlah_subbidnarko = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 13])->count();
            $jumlah_subbidpsiko = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 14])->count();
            $jumlah_subbidbaya = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['subbidang_id' => 15])->count();

        } elseif ($request->waktu == 'tahunan') {

            // jumlah bidang
            $jumlah_fiskomfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['bidang_id' => 3])->count();
            $jumlah_narkobafor = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['bidang_id' => 5])->count();
            $jumlah_dokupalfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['bidang_id' => 1])->count();
            $jumlah_kimbiofor = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['bidang_id' => 4])->count();
            $jumlah_balmetfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['bidang_id' => 2])->count();

            // subbidang
            $jumlah_subbiddokumen = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 1])->count();
            $jumlah_subbidupal = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 2])->count();
            $jumlah_subbidprodcet = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 3])->count();
            $jumlah_subbidsenpi = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 4])->count();
            $jumlah_subbidhandak = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 5])->count();
            $jumlah_subbidmetal = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 6])->count();
            $jumlah_subbiddeteksus = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 7])->count();
            $jumlah_subbidlakabakar = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 8])->count();
            $jumlah_subbidkomfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 9])->count();
            $jumlah_subbidkim = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 10])->count();
            $jumlah_subbidbioser = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 11])->count();
            $jumlah_subbidtokling = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 12])->count();
            $jumlah_subbidnarko = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 13])->count();
            $jumlah_subbidpsiko = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 14])->count();
            $jumlah_subbidbaya = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['subbidang_id' => 15])->count();

        }

        return view('visual_grafis.grafik.per_bidang_subbidang.default',
            [
                'jumlah_fiskomfor' => $jumlah_fiskomfor,
                'jumlah_narkobafor' => $jumlah_narkobafor,
                'jumlah_dokupalfor' => $jumlah_dokupalfor,
                'jumlah_kimbiofor' => $jumlah_kimbiofor,
                'jumlah_balmetfor' => $jumlah_balmetfor,
                'jumlah_subbiddeteksus' => $jumlah_subbiddeteksus,
                'jumlah_subbidlakabakar' => $jumlah_subbidlakabakar,
                'jumlah_subbidkomfor' => $jumlah_subbidkomfor,
                'jumlah_subbidnarko' => $jumlah_subbidnarko,
                'jumlah_subbidpsiko' => $jumlah_subbidpsiko,
                'jumlah_subbidbaya' => $jumlah_subbidbaya,
                'jumlah_subbiddokumen' => $jumlah_subbiddokumen,
                'jumlah_subbidupal' => $jumlah_subbidupal,
                'jumlah_subbidprodcet' => $jumlah_subbidprodcet,
                'jumlah_subbidsenpi' => $jumlah_subbidsenpi,
                'jumlah_subbidhandak' => $jumlah_subbidhandak,
                'jumlah_subbidmetal' => $jumlah_subbidmetal,
                'jumlah_subbidkim' => $jumlah_subbidkim,
                'jumlah_subbidbioser' => $jumlah_subbidbioser,
                'jumlah_subbidtokling' => $jumlah_subbidtokling,
                'waktu' => $request->waktu,
                'unitkerja' => $request->unitkerja
            ]);

    }

    // grafik per pemeriksa
    public function grafikPerPemeriksa(Request $request)
    {

        if ($request->waktu == 'harian') {
            $takahPerPemeriksa = Takah::where(['takah.created_at' => Carbon::today()])
                ->where('takah.bidang_id', '=', $request->bidang_id)
                ->join('pemeriksa_takah', 'takah.id', '=', 'pemeriksa_takah.takah_id')
                ->join('pemeriksa', 'pemeriksa.id', '=', 'pemeriksa_takah.pemeriksa_id')
                ->selectRaw('pemeriksa.nama, pemeriksa_takah.pemeriksa_id, count(pemeriksa_takah.pemeriksa_id) as total')
                ->groupBy('pemeriksa_takah.pemeriksa_id')
                ->pluck('total', 'pemeriksa.nama');
        } elseif ($request->waktu == 'mingguan') {
            $takahPerPemeriksa = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where('takah.bidang_id', '=', $request->bidang_id)
                ->join('pemeriksa_takah', 'takah.id', '=', 'pemeriksa_takah.takah_id')
                ->join('pemeriksa', 'pemeriksa.id', '=', 'pemeriksa_takah.pemeriksa_id')
                ->selectRaw('pemeriksa.nama, pemeriksa_takah.pemeriksa_id, count(pemeriksa_takah.pemeriksa_id) as total')
                ->groupBy('pemeriksa_takah.pemeriksa_id')
                ->pluck('total', 'pemeriksa.nama');
        } elseif ($request->waktu == 'bulanan') {
            $takahPerPemeriksa = Takah::whereYear('takah.created_at', Carbon::now()->year)
                ->whereMonth('takah.created_at', Carbon::now()->month)
                ->where('takah.bidang_id', '=', $request->bidang_id)
                ->join('pemeriksa_takah', 'takah.id', '=', 'pemeriksa_takah.takah_id')
                ->join('pemeriksa', 'pemeriksa.id', '=', 'pemeriksa_takah.pemeriksa_id')
                ->selectRaw('pemeriksa.nama, pemeriksa_takah.pemeriksa_id, count(pemeriksa_takah.pemeriksa_id) as total')
                ->groupBy('pemeriksa_takah.pemeriksa_id')
                ->pluck('total', 'pemeriksa.nama');
        } elseif ($request->waktu == 'semesteran') {
            $takahPerPemeriksa = Takah::where("takah.created_at", ">", Carbon::now()->subMonths(6))
                ->where('takah.bidang_id', '=', $request->bidang_id)
                ->join('pemeriksa_takah', 'takah.id', '=', 'pemeriksa_takah.takah_id')
                ->join('pemeriksa', 'pemeriksa.id', '=', 'pemeriksa_takah.pemeriksa_id')
                ->selectRaw('pemeriksa.nama, pemeriksa_takah.pemeriksa_id, count(pemeriksa_takah.pemeriksa_id) as total')
                ->groupBy('pemeriksa_takah.pemeriksa_id')
                ->pluck('total', 'pemeriksa.nama');
        } elseif ($request->waktu == 'tahunan') {
            $takahPerPemeriksa = Takah::whereYear('takah.created_at', Carbon::now()->year)
                ->where('takah.bidang_id', '=', $request->bidang_id)
                ->join('pemeriksa_takah', 'takah.id', '=', 'pemeriksa_takah.takah_id')
                ->join('pemeriksa', 'pemeriksa.id', '=', 'pemeriksa_takah.pemeriksa_id')
                ->selectRaw('pemeriksa.nama, pemeriksa_takah.pemeriksa_id, count(pemeriksa_takah.pemeriksa_id) as total')
                ->groupBy('pemeriksa_takah.pemeriksa_id')
                ->pluck('total', 'pemeriksa.nama');
        }

        return view('visual_grafis.grafik.per_pemeriksa.default',
            [
                'bidang_id' => $request->bidang_id,
                'waktu' => $request->waktu,
                'unitkerja' => $request->unitkerja,
                'takahPerPemeriksa' => $takahPerPemeriksa
            ]);


    }

    // grafik per durasi pemeriksaan
    public function grafikPerDurasiPemeriksaan(Request $request)
    {

        if ($request->waktu == 'harian') {
            // rata-rata
            $jumlah_fiskomfor = Takah::whereDate('diserahkan_ke_urtu_at', Carbon::today())
                ->where(['bidang_id' => 3])
                ->avg('durasi_pemeriksaan');
            $jumlah_narkobafor = Takah::whereDate('diserahkan_ke_urtu_at', Carbon::today())
                ->where(['bidang_id' => 5])
                ->avg('durasi_pemeriksaan');
            $jumlah_dokupalfor = Takah::whereDate('diserahkan_ke_urtu_at', Carbon::today())
                ->where(['bidang_id' => 1])
                ->avg('durasi_pemeriksaan');
            $jumlah_kimbiofor = Takah::whereDate('diserahkan_ke_urtu_at', Carbon::today())
                ->where(['bidang_id' => 4])
                ->avg('durasi_pemeriksaan');
            $jumlah_balmetfor = Takah::whereDate('diserahkan_ke_urtu_at', Carbon::today())
                ->where(['bidang_id' => 2])
                ->avg('durasi_pemeriksaan');
        } elseif ($request->waktu == 'mingguan') {
            // rata-rata
            $jumlah_fiskomfor = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['bidang_id' => 3])
                ->avg('durasi_pemeriksaan');
            $jumlah_narkobafor = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['bidang_id' => 5])
                ->avg('durasi_pemeriksaan');
            $jumlah_dokupalfor = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['bidang_id' => 1])
                ->avg('durasi_pemeriksaan');
            $jumlah_kimbiofor = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['bidang_id' => 4])
                ->avg('durasi_pemeriksaan');
            $jumlah_balmetfor = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['bidang_id' => 2])
                ->avg('durasi_pemeriksaan');
        } elseif ($request->waktu == 'bulanan') {
            // rata-rata
            $jumlah_fiskomfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['bidang_id' => 3])
                ->avg('durasi_pemeriksaan');
            $jumlah_narkobafor = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['bidang_id' => 5])
                ->avg('durasi_pemeriksaan');
            $jumlah_dokupalfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['bidang_id' => 1])
                ->avg('durasi_pemeriksaan');
            $jumlah_kimbiofor = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['bidang_id' => 4])
                ->avg('durasi_pemeriksaan');
            $jumlah_balmetfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['bidang_id' => 2])
                ->avg('durasi_pemeriksaan');
        } elseif ($request->waktu == 'semesteran') {
            // rata-rata
            $jumlah_fiskomfor = Takah::where("takah.created_at", ">", Carbon::now()->subMonths(6))
                ->where(['bidang_id' => 3])
                ->avg('durasi_pemeriksaan');
            $jumlah_narkobafor = Takah::where("takah.created_at", ">", Carbon::now()->subMonths(6))
                ->where(['bidang_id' => 5])
                ->avg('durasi_pemeriksaan');
            $jumlah_dokupalfor = Takah::where("takah.created_at", ">", Carbon::now()->subMonths(6))
                ->where(['bidang_id' => 1])
                ->avg('durasi_pemeriksaan');
            $jumlah_kimbiofor = Takah::where("takah.created_at", ">", Carbon::now()->subMonths(6))
                ->where(['bidang_id' => 4])
                ->avg('durasi_pemeriksaan');
            $jumlah_balmetfor = Takah::where("takah.created_at", ">", Carbon::now()->subMonths(6))
                ->where(['bidang_id' => 2])
                ->avg('durasi_pemeriksaan');
        } elseif ($request->waktu == 'tahunan') {
            // rata-rata
            $jumlah_fiskomfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['bidang_id' => 3])
                ->avg('durasi_pemeriksaan');
            $jumlah_narkobafor = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['bidang_id' => 5])
                ->avg('durasi_pemeriksaan');
            $jumlah_dokupalfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['bidang_id' => 1])
                ->avg('durasi_pemeriksaan');
            $jumlah_kimbiofor = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['bidang_id' => 4])
                ->avg('durasi_pemeriksaan');
            $jumlah_balmetfor = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['bidang_id' => 2])
                ->avg('durasi_pemeriksaan');
        }

        return view('visual_grafis.grafik.per_durasi_pemeriksaan.default',
            [
                'waktu' => $request->waktu,
                'unitkerja' => $request->unitkerja,
                'jumlah_fiskomfor' => $jumlah_fiskomfor,
                'jumlah_narkobafor' => $jumlah_narkobafor,
                'jumlah_dokupalfor' => $jumlah_dokupalfor,
                'jumlah_kimbiofor' => $jumlah_kimbiofor,
                'jumlah_balmetfor' => $jumlah_balmetfor,
            ]);

    }

    // grafik per jenis bb
    public function grafikPerJenisBB(Request $request)
    {
        if ($request->waktu == 'harian') {
            $takahPerJenisBB = Takah::where(['takah.created_at' => Carbon::today()])
                ->where('takah.bidang_id', '=', $request->bidang_id)
                ->join('barangbukti_takah', 'takah.id', '=', 'barangbukti_takah.takah_id')
                ->join('barangbukti', 'barangbukti.id', '=', 'barangbukti_takah.barangbukti_id')
                ->join('jenisbb', 'jenisbb.id', '=', 'barangbukti.jenisbb_id')
                ->selectRaw('jenisbb.nama, count(barangbukti.jenisbb_id) as total')
                ->groupBy('barangbukti.jenisbb_id')
                ->pluck('total', 'jenisbb.nama');
        } elseif ($request->waktu == 'mingguan') {
            $takahPerJenisBB = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where('takah.bidang_id', '=', $request->bidang_id)
                ->join('barangbukti_takah', 'takah.id', '=', 'barangbukti_takah.takah_id')
                ->join('barangbukti', 'barangbukti.id', '=', 'barangbukti_takah.barangbukti_id')
                ->join('jenisbb', 'jenisbb.id', '=', 'barangbukti.jenisbb_id')
                ->selectRaw('jenisbb.nama, count(barangbukti.jenisbb_id) as total')
                ->groupBy('barangbukti.jenisbb_id')
                ->pluck('total', 'jenisbb.nama');
        } elseif ($request->waktu == 'bulanan') {
            $takahPerJenisBB = Takah::whereYear('takah.created_at', Carbon::now()->year)
                ->whereMonth('takah.created_at', Carbon::now()->month)
                ->where('takah.bidang_id', '=', $request->bidang_id)
                ->join('barangbukti_takah', 'takah.id', '=', 'barangbukti_takah.takah_id')
                ->join('barangbukti', 'barangbukti.id', '=', 'barangbukti_takah.barangbukti_id')
                ->join('jenisbb', 'jenisbb.id', '=', 'barangbukti.jenisbb_id')
                ->selectRaw('jenisbb.nama, count(barangbukti.jenisbb_id) as total')
                ->groupBy('barangbukti.jenisbb_id')
                ->pluck('total', 'jenisbb.nama');
        } elseif ($request->waktu == 'semesteran') {
            $takahPerJenisBB = Takah::where("takah.created_at", ">", Carbon::now()->subMonths(6))
                ->where('takah.bidang_id', '=', $request->bidang_id)
                ->join('barangbukti_takah', 'takah.id', '=', 'barangbukti_takah.takah_id')
                ->join('barangbukti', 'barangbukti.id', '=', 'barangbukti_takah.barangbukti_id')
                ->join('jenisbb', 'jenisbb.id', '=', 'barangbukti.jenisbb_id')
                ->selectRaw('jenisbb.nama, count(barangbukti.jenisbb_id) as total')
                ->groupBy('barangbukti.jenisbb_id')
                ->pluck('total', 'jenisbb.nama');
        } elseif ($request->waktu == 'tahunan') {
            $takahPerJenisBB = Takah::whereYear('takah.created_at', Carbon::now()->year)
                ->where('takah.bidang_id', '=', $request->bidang_id)
                ->join('barangbukti_takah', 'takah.id', '=', 'barangbukti_takah.takah_id')
                ->join('barangbukti', 'barangbukti.id', '=', 'barangbukti_takah.barangbukti_id')
                ->join('jenisbb', 'jenisbb.id', '=', 'barangbukti.jenisbb_id')
                ->selectRaw('jenisbb.nama, count(barangbukti.jenisbb_id) as total')
                ->groupBy('barangbukti.jenisbb_id')
                ->pluck('total', 'jenisbb.nama');
        }

        return view('visual_grafis.grafik.per_jenisbb.default',
            [
                'bidang_id' => $request->bidang_id,
                'waktu' => $request->waktu,
                'unitkerja' => $request->unitkerja,
                'takahPerJenisBB' => $takahPerJenisBB
            ]);
    }

    // grafik Feedback
    public function grafikFeedback(Request $request)
    {

        if ($request->waktu == 'harian') {
            $jumlah_1a = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 1);
                })->count();
            $jumlah_1b = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 2);
                })->count();
            $jumlah_1c = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 3);
                })->count();
            $jumlah_2a = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 1);
                })->count();
            $jumlah_2b = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 2);
                })->count();
            $jumlah_2c = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 3);
                })->count();
            $jumlah_3a = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 1);
                })->count();
            $jumlah_3b = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 2);
                })->count();
            $jumlah_3c = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 3);
                })->count();
            $jumlah_4a = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 1);
                })->count();
            $jumlah_4b = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 2);
                })->count();
            $jumlah_4c = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 3);
                })->count();
            $jumlah_5a = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 1);
                })->count();
            $jumlah_5b = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 2);
                })->count();
            $jumlah_5c = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 3);
                })->count();
            $jumlah_6a = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 1);
                })->count();
            $jumlah_6b = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 2);
                })->count();
            $jumlah_6c = Takah::where(['created_at' => Carbon::today()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 3);
                })->count();
        } elseif ($request->waktu == 'mingguan') {
            $jumlah_1a = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 1);
                })->count();
            $jumlah_1b = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 2);
                })->count();
            $jumlah_1c = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 3);
                })->count();
            $jumlah_2a = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 1);
                })->count();
            $jumlah_2b = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 2);
                })->count();
            $jumlah_2c = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 3);
                })->count();
            $jumlah_3a = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 1);
                })->count();
            $jumlah_3b = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 2);
                })->count();
            $jumlah_3c = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 3);
                })->count();
            $jumlah_4a = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 1);
                })->count();
            $jumlah_4b = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 2);
                })->count();
            $jumlah_4c = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 3);
                })->count();
            $jumlah_5a = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 1);
                })->count();
            $jumlah_5b = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 2);
                })->count();
            $jumlah_5c = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 3);
                })->count();
            $jumlah_6a = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 1);
                })->count();
            $jumlah_6b = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 2);
                })->count();
            $jumlah_6c = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 3);
                })->count();
        } elseif ($request->waktu == 'bulanan') {
            $jumlah_1a = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 1);
                })->count();
            $jumlah_1b = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 2);
                })->count();
            $jumlah_1c = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 3);
                })->count();
            $jumlah_2a = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 1);
                })->count();
            $jumlah_2b = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 2);
                })->count();
            $jumlah_2c = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 3);
                })->count();
            $jumlah_3a = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 1);
                })->count();
            $jumlah_3b = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 2);
                })->count();
            $jumlah_3c = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 3);
                })->count();
            $jumlah_4a = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 1);
                })->count();
            $jumlah_4b = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 2);
                })->count();
            $jumlah_4c = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 3);
                })->count();
            $jumlah_5a = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 1);
                })->count();
            $jumlah_5b = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 2);
                })->count();
            $jumlah_5c = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 3);
                })->count();
            $jumlah_6a = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 1);
                })->count();
            $jumlah_6b = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 2);
                })->count();
            $jumlah_6c = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 3);
                })->count();
        } elseif ($request->waktu == 'semesteran') {
            $jumlah_1a = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 1);
                })->count();
            $jumlah_1b = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 2);
                })->count();
            $jumlah_1c = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 3);
                })->count();
            $jumlah_2a = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 1);
                })->count();
            $jumlah_2b = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 2);
                })->count();
            $jumlah_2c = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 3);
                })->count();
            $jumlah_3a = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 1);
                })->count();
            $jumlah_3b = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 2);
                })->count();
            $jumlah_3c = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 3);
                })->count();
            $jumlah_4a = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 1);
                })->count();
            $jumlah_4b = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 2);
                })->count();
            $jumlah_4c = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 3);
                })->count();
            $jumlah_5a = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 1);
                })->count();
            $jumlah_5b = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 2);
                })->count();
            $jumlah_5c = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 3);
                })->count();
            $jumlah_6a = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 1);
                })->count();
            $jumlah_6b = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 2);
                })->count();
            $jumlah_6c = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 3);
                })->count();
        } elseif ($request->waktu == 'tahunan') {
            $jumlah_1a = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 1);
                })->count();
            $jumlah_1b = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 2);
                })->count();
            $jumlah_1c = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan1', 3);
                })->count();
            $jumlah_2a = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 1);
                })->count();
            $jumlah_2b = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 2);
                })->count();
            $jumlah_2c = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan2', 3);
                })->count();
            $jumlah_3a = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 1);
                })->count();
            $jumlah_3b = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 2);
                })->count();
            $jumlah_3c = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan3', 3);
                })->count();
            $jumlah_4a = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 1);
                })->count();
            $jumlah_4b = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 2);
                })->count();
            $jumlah_4c = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan4', 3);
                })->count();
            $jumlah_5a = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 1);
                })->count();
            $jumlah_5b = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 2);
                })->count();
            $jumlah_5c = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan5', 3);
                })->count();
            $jumlah_6a = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 1);
                })->count();
            $jumlah_6b = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 2);
                })->count();
            $jumlah_6c = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereHas('feedback', function ($query) {
                    $query->where('pertanyaan6', 3);
                })->count();
        }

        return view('visual_grafis.grafik.feedback.default',
            [
                'jumlah_1a' => $jumlah_1a,
                'jumlah_2a' => $jumlah_2a,
                'jumlah_3a' => $jumlah_3a,
                'jumlah_4a' => $jumlah_4a,
                'jumlah_5a' => $jumlah_5a,
                'jumlah_6a' => $jumlah_6a,
                'jumlah_1b' => $jumlah_1b,
                'jumlah_2b' => $jumlah_2b,
                'jumlah_3b' => $jumlah_3b,
                'jumlah_4b' => $jumlah_4b,
                'jumlah_5b' => $jumlah_5b,
                'jumlah_6b' => $jumlah_6b,
                'jumlah_1c' => $jumlah_1c,
                'jumlah_2c' => $jumlah_2c,
                'jumlah_3c' => $jumlah_3c,
                'jumlah_4c' => $jumlah_4c,
                'jumlah_5c' => $jumlah_5c,
                'jumlah_6c' => $jumlah_6c,
                'waktu' => $request->waktu,
                'unitkerja' => $request->unitkerja
            ]);

    }

    // grafik Kasus Menonjol
    public function grafikKasusMenonjol(Request $request)
    {

        if ($request->waktu == 'harian') {
            $kasus_menonjol = Takah::where(['created_at' => Carbon::today(), 'kasus_menonjol' => 1])
                ->count();
            $kasus_tidak_menonjol = Takah::where(['created_at' => Carbon::today(), 'kasus_menonjol' => 0])
                ->count();
        } elseif ($request->waktu == 'mingguan') {
            $kasus_menonjol = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['kasus_menonjol' => 1])
                ->count();
            $kasus_tidak_menonjol = Takah::whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where(['kasus_menonjol' => 0])
                ->count();
        } elseif ($request->waktu == 'bulanan') {
            $kasus_menonjol = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['kasus_menonjol' => 1])
                ->count();
            $kasus_tidak_menonjol = Takah::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where(['kasus_menonjol' => 0])
                ->count();
        } elseif ($request->waktu == 'semesteran') {
            $kasus_menonjol = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['kasus_menonjol' => 1])
                ->count();
            $kasus_tidak_menonjol = Takah::where("created_at", ">", Carbon::now()->subMonths(6))
                ->where(['kasus_menonjol' => 0])
                ->count();
        } elseif ($request->waktu == 'tahunan') {
            $kasus_menonjol = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['kasus_menonjol' => 1])
                ->count();
            $kasus_tidak_menonjol = Takah::whereYear('created_at', Carbon::now()->year)
                ->where(['kasus_menonjol' => 0])
                ->count();
        }

        return view('visual_grafis.grafik.kasus_menonjol.default',
            [
                'kasus_menonjol' => $kasus_menonjol,
                'kasus_tidak_menonjol' => $kasus_tidak_menonjol,
                'waktu' => $request->waktu,
                'unitkerja' => $request->unitkerja
            ]);

    }

}
