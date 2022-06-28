<?php

namespace App\Http\Controllers;

use App\Takah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class TakahYajraController extends Controller
{
    public function apiTahap(Request $request)
    {
        $columnsToSelect = ['takah.id', 'takah.nomor', 'takah.created_at', 'takah.statustakah_id'];
        $model = null;

        // urmin hanya dapat mengakses tahap 2
        if (auth()->user()->role->id === 3) {
            $tahap = (int) $request->tahap;
            $model = $tahap === 2 ?
                Takah::where([
                    'tahap' => $tahap,
                    'bidang_id' => auth()->user()->bidang_id
                ])
                    ->with('statustakah:id,nama')
                    ->select($columnsToSelect)
                :
                null;
        }

        // urtu hanya dapat mengakses tahap 1 dan tahap 3
        if (auth()->user()->role->id === 2) {
            $tahap = (int) $request->tahap;
            if (in_array($tahap, [1, 3])) {
                if ($tahap === 1) {
                    $model = Takah::with('statustakah:id,nama')
                        ->where('tahap', $tahap)
                        ->select($columnsToSelect);
                }
                if ($tahap === 3) {
                    $model = Takah::with('statustakah:id,nama')
                        ->where(['tahap' => $tahap])
                        ->whereIn('statustakah_id', [4, 5])
                        ->select($columnsToSelect);
                }
            } else {
                $model = null;
            }
        }

        return DataTables::of($model)
            ->addIndexColumn()
            ->editColumn('created_at', function (Takah $takah) {
                return $takah->created_at->year;
            })
            ->addColumn('link_cetak', function (Takah $takah) {
                return '<a class="d-block badge badge-success" href="' . route('takah.cetakan.penerimaan', $takah->id) . '">Lihat Cetakan</a>';
            })
            ->addColumn('action', function (Takah $takah) {
                return '<a class="d-block badge badge-primary" href="' . route('takah.tahap', $takah->id) . '">Lanjutkan Proses</a>';
            })
            ->rawColumns(['link_cetak', 'action'])
            ->make(true);
    }

    public function apiTakahTelahSelesai(Request $request)
    {
        $year = $request->year ?: date("Y");
        $columnsToSelect = ['takah.id', 'takah.nomor'];

        $model = Takah::where(['statustakah_id' => 6])
            ->whereYear('created_at', $year)
            ->select($columnsToSelect);

        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('detail_takah', function (Takah $takah) {
                return '<a href="' . route('takah.tahap', $takah->id) . '" class="text-warning">lihat detail takah</a>';
            })
            ->addColumn('link_cetak_penerimaan', function (Takah $takah) {
                return '<a class="d-block badge badge-primary" href="' . route('takah.cetakan.penerimaan', $takah->id) . '" target="_blank">Lihat Cetakan</a>';
            })
            ->addColumn('link_cetak_penyerahan', function (Takah $takah) {
                return '<a class="d-block badge badge-success" href="' . route('takah.cetakan.penyerahan', $takah->id) . '" target="_blank">Lihat Cetakan</a>';
            })
            ->rawColumns(['detail_takah', 'link_cetak_penerimaan', 'link_cetak_penyerahan'])
            ->make(true);
    }

    public function apiIzin()
    {
        $model = Takah::with('editor')->select('takah.*');
        return DataTables::of($model)
            ->addIndexColumn()
            ->editColumn('editable', function (Takah $takah) {
                if ($takah->editable === 1) {
                    return '<span class="badge badge-pill badge-success d-block">dapat diedit</span>';
                } else {
                    return '<span class="badge badge-pill badge-dark d-block">tdk dapat diedit</span>';
                }
            })
            ->addColumn('editor', function (Takah $takah) {
                return $takah->editor ? $takah->editor->nama : '';
            })
            ->addColumn('action', 'partials.backend.actions.takah_action')
            ->rawColumns(['editable', 'action'])
            ->make(true);
    }

    public function apiEdit()
    {
        $model = Takah::where(['editable' => 1, 'editor_id' => Auth::user()->nrp])->select('takah.*');
        return DataTables::of($model)
            ->addIndexColumn()
            ->editColumn('editable', function (Takah $takah) {
                if ($takah->editable === 1) {
                    return '<span class="badge badge-pill badge-success d-block">dapat diedit</span>';
                } else {
                    return '<span class="badge badge-pill badge-dark d-block">tdk dapat diedit</span>';
                }
            })
            ->addColumn('action', 'partials.backend.actions.takah_edit_action')
            ->rawColumns(['editable', 'action'])
            ->make(true);
    }

    //=====================
    //  API - Process Flow
    //=====================
    public function apiPenerimaanDariPenyidik(Request $request)
    {
        $model = Takah::whereDate('created_at', $request->get('tgl'))->select('takah.*');

        return DataTables::of($model)
            ->addIndexColumn()
            ->editColumn('nomor', function (Takah $takah) {
                if ($takah->statustakah_id === 1) {
                    return '<a style="color:blue" href="' . route('takah.tahap', $takah->id) . '">' . $takah->nomor . '</a>';
                }

                return '<a style="color:grey" href="' . route('takah.detail', $takah->id) . '">' . $takah->nomor . '</a>';
            })
            ->addColumn('statustakah', function (Takah $takah) {
                if ($takah->statustakah_id === 1) {
                    return '
                    <span class="badge badge-pill d-block" style="background: royalblue; color: white">
                        ' . $takah->statustakah->nama . '
                    </span>';
                }

                return '
                <span class="badge badge-pill d-block" style="background: grey; color: white">
                    ' . $takah->statustakah->nama . '
                </span>';
            })
            ->rawColumns(['nomor', 'statustakah'])
            ->make(true);
    }

    public function apiDiserahkanKeKaurmin(Request $request)
    {

        $model = Takah::whereDate('diserahkan_ke_kaurmin_at', $request->get('tgl'))->select('takah.*');

        return DataTables::of($model)
            ->addIndexColumn()
            ->editColumn('nomor', function (Takah $takah) {
                if ($takah->statustakah_id === 2) {
                    return '<a style="color:blue" href="' . route('takah.tahap', $takah->id) . '">' . $takah->nomor . '</a>';
                }

                return '<a style="color:grey" href="' . route('takah.detail', $takah->id) . '">' . $takah->nomor . '</a>';
            })
            ->addColumn('statustakah', function (Takah $takah) {
                if ($takah->statustakah_id === 1) {
                    return '
                    <span class="badge badge-pill d-block" style="background: royalblue; color: white">
                         ' . $takah->statustakah->nama . '
                    </span>';
                }

                return '
                <span class="badge badge-pill d-block" style="background: grey; color: white">
                     ' . $takah->statustakah->nama . '
                </span>';
            })
            ->rawColumns(['nomor', 'statustakah'])
            ->make(true);
    }

    public function apiDiterimaOlehKaurmin(Request $request)
    {

        $model = Takah::whereDate('diserahkan_ke_kaurmin_at', $request->get('tgl'))
            ->where(['bidang_id' => auth()->user()->bidang_id])
            ->select('takah.*');

        return DataTables::of($model)
            ->addIndexColumn()
            ->editColumn('nomor', function (Takah $takah) {
                if ($takah->statustakah_id == 2) {
                    return '<a style="color:blue" href="' . route('takah.tahap', $takah->id) . '">' . $takah->nomor . '</a>';
                }

                return '<a style="color:grey" href="' . route('takah.detail', $takah->id) . '">' . $takah->nomor . '</a>';
            })
            ->addColumn('statustakah', function (Takah $takah) {
                if ($takah->statustakah_id == 2) {
                    return '
                    <span class="badge badge-pill d-block" style="background: royalblue; color: white">
                         ' . $takah->statustakah->nama . '
                    </span>';
                }

                return '
                <span class="badge badge-pill d-block" style="background: grey; color: white">
                     ' . $takah->statustakah->nama . '
                </span>';
            })
            ->rawColumns(['nomor', 'statustakah'])
            ->make(true);
    }

    public function apiSiapDiserahkanKeUrtu(Request $request)
    {

        $model = Takah::whereDate('siap_diserahkan_ke_urtu_at', $request->get('tgl'))
            ->where(['bidang_id' => auth()->user()->bidang_id])
            ->select('takah.*');

        return DataTables::of($model)
            ->addIndexColumn()
            ->editColumn('nomor', function (Takah $takah) {
                if ($takah->statustakah_id == 3) {
                    return '<a style="color:blue" href="' . route('takah.tahap', $takah->id) . '">' . $takah->nomor . '</a>';
                }

                return '<a style="color:grey" href="' . route('takah.detail', $takah->id) . '">' . $takah->nomor . '</a>';
            })
            ->addColumn('statustakah', function (Takah $takah) {
                if ($takah->statustakah_id == 3) {
                    return '
                    <span class="badge badge-pill d-block" style="background: royalblue; color: white">
                         ' . $takah->statustakah->nama . '
                    </span>';
                }

                return '
                <span class="badge badge-pill d-block" style="background: grey; color: white">
                    ' . $takah->statustakah->nama . '
                </span>';
            })
            ->rawColumns(['nomor', 'statustakah'])
            ->make(true);
    }

    public function apiDiterimaOlehUrtu(Request $request)
    {

        $model = Takah::whereDate('diserahkan_ke_urtu_at', $request->get('tgl'))->select('takah.*');

        return DataTables::of($model)
            ->addIndexColumn()
            ->editColumn('nomor', function (Takah $takah) {
                if ($takah->statustakah_id === 4) {
                    return '<a style="color:blue" href="' . route('takah.tahap', $takah->id) . '">' . $takah->nomor . '</a>';
                }

                return '<a style="color:grey" href="' . route('takah.detail', $takah->id) . '">' . $takah->nomor . '</a>';
            })
            ->addColumn('statustakah', function (Takah $takah) {
                if ($takah->statustakah_id === 4) {
                    return '
                    <span class="badge badge-pill d-block" style="background: royalblue; color: white">
                         ' . $takah->statustakah->nama . '
                    </span>';
                } else {
                    return '
                    <span class="badge badge-pill d-block" style="background: grey; color: white">
                        ' . $takah->statustakah->nama . '
                    </span>';
                }
            })
            ->rawColumns(['nomor', 'statustakah'])
            ->make(true);
    }

    public function apiSiapDiserahkanKePenyidik(Request $request)
    {

        $model = Takah::whereDate('siap_diserahkan_ke_penyidik_at', $request->get('tgl'))->select('takah.*');

        return DataTables::of($model)
            ->addIndexColumn()
            ->editColumn('nomor', function (Takah $takah) {
                if ($takah->statustakah_id === 5) {
                    return '<a style="color:blue" href="' . route('takah.tahap', $takah->id) . '">' . $takah->nomor . '</a>';
                } else {
                    return '<a style="color:grey" href="' . route('takah.detail', $takah->id) . '">' . $takah->nomor . '</a>';
                }
            })
            ->addColumn('statustakah', function (Takah $takah) {
                if ($takah->statustakah_id === 5) {
                    return '
                    <span class="badge badge-pill d-block" style="background: royalblue; color: white">
                        ' . $takah->statustakah->nama . '
                    </span>';
                } else {
                    return '
                    <span class="badge badge-pill d-block" style="background: grey; color: white">
                         ' . $takah->statustakah->nama . '
                    </span>';
                }
            })
            ->rawColumns(['nomor', 'statustakah'])
            ->make(true);
    }

    //=====================
    // Api Visual Grafis
    //=====================
    public function apiSummary(Request $request)
    {

        $model = Takah::with(['bidang', 'subbidang', 'jeniskasus'])
            ->where('takah.unitkerja_id', $request->unitkerja_id)
            ->select('takah.*');

        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('asal_satker', function (Takah $takah) {
                if ($takah->asaltakah->instansi === 'polri') {
                    if ($takah->asaltakah->satker_id !== null) {
                        return $takah->asaltakah->satker->nama;
                    }

                    if ($takah->asaltakah->polda_id && $takah->asaltakah->polres_id && $takah->asaltakah->polsek_id) {
                        return
                            $takah->asaltakah->polda->nama . '<br>' .
                            $takah->asaltakah->polres->nama . '<br>' .
                            $takah->asaltakah->polsek->nama;
                    }

                    if ($takah->asaltakah->polda_id && $takah->asaltakah->polres_id) {
                        return
                            $takah->asaltakah->polda->nama . '<br>' .
                            $takah->asaltakah->polres->nama;
                    }

                    return $takah->asaltakah->polda->nama;
                }

                return $takah->asaltakah->lembaga->nama;
            })
            ->addColumn('tgl_mulai_pemeriksaan', function (Takah $takah) {
                if ($takah->takah_lengkap_at !== null) {
                    return Carbon::parse($takah->takah_lengkap_at)->format('d-m-Y');
                }

                return '-';

            })
            ->addColumn('tgl_prediksi_selesai', function (Takah $takah) {
                if ($takah->takah_lengkap_at !== null) {
                    return
                        Carbon::parse($takah->created_at)->addWeek(2)->format('d-m-Y') .
                        ' s.d ' .
                        Carbon::parse($takah->created_at)->addWeek(4)->format('d-m-Y');
                } else {
                    return '';
                }
            })
            ->addColumn('status', function (Takah $takah) {
                if ($takah->takah_lengkap_at) {
                    $awal_pemeriksaan = Carbon::createFromFormat('Y-m-d H:s:i', $takah->takah_lengkap_at);
                    $hari_ini = Carbon::now();
                    if ($takah->diserahkan_ke_urtu_at && !$takah->diserahkan_ke_penyidik_at) {
                        return '
                            <span class="badge-pill mr-2" style="background: mediumseagreen"></span>
                            <span>pemeriksaan telah selesai</span>';
                    }

                    if ($takah->diserahkan_ke_urtu_at && $takah->diserahkan_ke_penyidik_at) {
                        return '
                            <span class="badge-pill mr-2" style="background: darkgreen"></span>
                            <span>takah dan BAP laboratoris telah diserahkan ke penyidik/penerima</span>';
                    } else {
                        $jumlah_hari_pemeriksaan = $hari_ini->diffInDays($awal_pemeriksaan);
                        $jumlah_hari_pemeriksaan = $jumlah_hari_pemeriksaan + 1;
                        if ($jumlah_hari_pemeriksaan > 28) {
                            return '
                                <span class="badge-pill mr-2" style="background: darkred;"></span>
                                <span>melewati waktu prediksi selesai pemeriksaan</span>';
                        } elseif ($jumlah_hari_pemeriksaan >= 26 && $jumlah_hari_pemeriksaan <= 28) {
                            return '
                                <span class="badge-pill mr-2" style="background: orange;"></span>
                                <span>mendekati waktu prediksi selesai pemeriksaan</span>';
                        } elseif ($jumlah_hari_pemeriksaan <= 25) {
                            return '
                                <span class="badge-pill mr-2" style="background: yellow;"></span>
                                <span>masih dalam waktu prediksi selesai pemeriksaan</span>';
                        }
                    }
                } else {
                    return '
                            <span class="badge-pill mr-2" style="background: white; border: 1px solid black"></span>
                            <span>pemeriksaan belum dimulai</span>';
                }

            })
            ->rawColumns(['asal_satker', 'status'])
            ->make(true);
    }

    public function apiKasusMenonjol(Request $request)
    {
        if ($request->waktu === 'harian') {
            $model = Takah::with(['bidang', 'subbidang', 'jeniskasus'])
                ->where(['takah.created_at' => Carbon::today()])
                ->where('kasus_menonjol', '=', 1)
                ->select('takah.*');
        } elseif ($request->waktu === 'mingguan') {
            $model = Takah::with(['bidang', 'subbidang', 'jeniskasus'])
                ->whereBetween('takah.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->where('kasus_menonjol', '=', 1)
                ->select('takah.*');
        } elseif ($request->waktu === 'bulanan') {
            $model = Takah::with(['bidang', 'subbidang', 'jeniskasus'])
                ->whereYear('takah.created_at', Carbon::now()->year)
                ->whereMonth('takah.created_at', Carbon::now()->month)
                ->where('kasus_menonjol', '=', 1)
                ->select('takah.*');
        } elseif ($request->waktu === 'semesteran') {
            $model = Takah::with(['bidang', 'subbidang', 'jeniskasus'])
                ->where("created_at", ">", Carbon::now()->subMonths(6))
                ->where('kasus_menonjol', '=', 1)
                ->select('takah.*');
        } elseif ($request->waktu == 'tahunan') {
            $model = Takah::with(['bidang', 'subbidang', 'jeniskasus'])
                ->whereYear('takah.created_at', Carbon::now()->year)
                ->where('kasus_menonjol', '=', 1)
                ->select('takah.*');
        }

        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('asal_satker', function (Takah $takah) {
                if ($takah->asaltakah->instansi === 'polri') {
                    if ($takah->asaltakah->satker_id !== null) {
                        return $takah->asaltakah->satker->nama;
                    }

                    if ($takah->asaltakah->polda_id && $takah->asaltakah->polres_id && $takah->asaltakah->polsek_id) {
                        return
                            $takah->asaltakah->polda->nama . '<br>' .
                            $takah->asaltakah->polres->nama . '<br>' .
                            $takah->asaltakah->polsek->nama;
                    }

                    if ($takah->asaltakah->polda_id && $takah->asaltakah->polres_id) {
                        return
                            $takah->asaltakah->polda->nama . '<br>' .
                            $takah->asaltakah->polres->nama;
                    }

                    return $takah->asaltakah->polda->nama;
                } else {
                    return $takah->asaltakah->lembaga->nama;
                }
            })
            ->addColumn('tgl_mulai_pemeriksaan', function (Takah $takah) {
                if ($takah->takah_lengkap_at !== null) {
                    return Carbon::parse($takah->takah_lengkap_at)->format('d-m-Y');
                }

                return '-';

            })
            ->addColumn('tgl_prediksi_selesai', function (Takah $takah) {
                if ($takah->takah_lengkap_at !== null) {
                    return
                        Carbon::parse($takah->created_at)->addWeek(2)->format('d-m-Y') .
                        ' s.d ' .
                        Carbon::parse($takah->created_at)->addWeek(4)->format('d-m-Y');
                }

                return '';
            })
            ->addColumn('status', function (Takah $takah) {
                if ($takah->takah_lengkap_at) {
                    $awal_pemeriksaan = Carbon::createFromFormat('Y-m-d H:s:i', $takah->takah_lengkap_at);
                    $hari_ini = Carbon::now();
                    if ($takah->diserahkan_ke_urtu_at && !$takah->diserahkan_ke_penyidik_at) {
                        return '
                            <span class="badge-pill mr-2" style="background: mediumseagreen"></span>
                            <span>sudah selesai pemeriksaan</span>';
                    }

                    if ($takah->diserahkan_ke_urtu_at && $takah->diserahkan_ke_penyidik_at) {
                        return '
                            <span class="badge-pill mr-2" style="background: darkgreen"></span>
                            <span>takah dan BAP laboratoris telah diserahkan ke penyidik/penerima</span>';
                    } else {
                        $jumlah_hari_pemeriksaan = $hari_ini->diffInDays($awal_pemeriksaan);
                        ++$jumlah_hari_pemeriksaan;
                        if ($jumlah_hari_pemeriksaan > 28) {
                            return '
                                <span class="badge-pill mr-2" style="background: darkred;"></span>
                                <span>diluar waktu penyelesaian pemeriksaan</span>';
                        }

                        if ($jumlah_hari_pemeriksaan >= 26 && $jumlah_hari_pemeriksaan <= 28) {
                            return '
                                <span class="badge-pill mr-2" style="background: orange;"></span>
                                <span>mendekati waktu prediksi selesai pemeriksaan</span>';
                        }

                        if ($jumlah_hari_pemeriksaan <= 25) {
                            return '
                                <span class="badge-pill mr-2" style="background: yellow;"></span>
                                <span>masih dalam proses pemeriksaan</span>';
                        }
                    }
                } else {
                    return '
                            <span class="badge-pill mr-2" style="background: white; border: 1px solid black"></span>
                            <span>pemeriksaan belum dimulai</span>';
                }

            })
            ->rawColumns(['asal_satker', 'status'])
            ->make(true);
    }
}
