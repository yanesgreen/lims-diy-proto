<?php
//================
// Auth
//=================
Auth::routes(['register' => false, 'reset' => false, 'confirm' => false]);
Route::post('login', 'Auth\LoginController@authenticate');
Route::post('login/visual_grafis', 'Auth\LoginController@authenticateVisualGrafis')->name('login.visual_grafis');
Route::get('login/visual_grafis', 'Auth\LoginController@showLoginVisualGrafisForm')->name('login.visual_grafis');

//================
// Frontend
//=================
Route::get('/', 'FrontendController@landingPage')->name('landingpage');
Route::group(['prefix' => 'pages'], function () {
    Route::get('/dokupalfor', 'FrontendController@dokupalfor')->name('pages.dokupalfor');
    Route::get('/balmetfor', 'FrontendController@balmetfor')->name('pages.balmetfor');
    Route::get('/fiskomfor', 'FrontendController@fiskomfor')->name('pages.fiskomfor');
    Route::get('/kimbiofor', 'FrontendController@kimbiofor')->name('pages.kimbiofor');
    Route::get('/narkobafor', 'FrontendController@narkobafor')->name('pages.narkobafor');
    Route::get('/smile', 'FrontendController@smile')->name('pages.smile');
    Route::get('/welcome', 'FrontendController@welcome')->name('pages.welcome');
});
Route::get('/tes', 'FrontendController@tes');

//================
// Scan
//=================
Route::get('takah/{takah}/detail_scan', 'TakahDetailScanController@detailScan')
    ->name('takah.detail_scan');

//================
// Backend
//=================
// semua link di backend wajib login terlebih dahulu
Route::group(['middleware' => 'auth'], function () {

    //============
    // dashboard
    //============
    Route::get('/home', 'DashboardController@dashboard')->name('dashboard');
    Route::get('/home/urtu2', 'DashboardController@dashboardUrtu2')->name('dashboard.urtu2');

    //========================
    // dashboard visual grafis
    //========================
    Route::get('/home/{waktu}', 'DashboardController@dashboardVisualGrafis')->name('dashboard.visual_grafis');

    //================
    // profile
    //================
    Route::get('/profile/{user}', 'ProfileController@index')->name('profile.index');
    Route::put('/profile/password/{user}', 'ProfileController@updatePassword')->name('profile.updatePassword');
    Route::put('/profile/pin/{user}', 'ProfileController@updatePin')->name('profile.updatePin');

    //================
    // master data
    //================
    Route::group(['prefix' => 'masterdata/', 'middleware' => ['checkrole:admin']], function () {
        // user/pengguna
        Route::patch('pengguna/softdelete/{user}', 'UserController@softdelete')->name('pengguna.softdelete');
        Route::get('pengguna/{user}/delete', 'UserController@delete')->name('pengguna.delete');
        Route::get('pengguna/api', 'UserYajraController@api')->name('pengguna.api');
        Route::resource('pengguna', 'UserController')->except(['destroy']);

        // bidang
        Route::patch('bidang/softdelete/{bidang}', 'BidangController@softdelete')->name('bidang.softdelete');
        Route::get('bidang/{bidang}/delete', 'BidangController@delete')->name('bidang.delete');
        Route::get('bidang/api', 'BidangYajraController@api')->name('bidang.api');
        Route::resource('bidang', 'BidangController')->except(['show', 'destroy']);

        // lembaga
        Route::patch('lembaga/softdelete/{lembaga}', 'LembagaController@softdelete')->name('lembaga.softdelete');
        Route::get('lembaga/{lembaga}/delete', 'LembagaController@delete')->name('lembaga.delete');
        Route::get('lembaga/api', 'LembagaYajraController@api')->name('lembaga.api');
        Route::resource('lembaga', 'LembagaController')->except(['show', 'destroy']);

        // Satker
        Route::patch('satker/softdelete/{satker}', 'SatkerController@softdelete')->name('satker.softdelete');
        Route::get('satker/{satker}/delete', 'SatkerController@delete')->name('satker.delete');
        Route::get('satker/api', 'SatkerYajraController@api')->name('satker.api');
        Route::resource('satker', 'SatkerController')->except(['show', 'destroy']);

        // pemeriksa
        Route::patch('pemeriksa/softdelete/{pemeriksa}', 'PemeriksaController@softdelete')->name('pemeriksa.softdelete');
        Route::get('pemeriksa/{pemeriksa}/delete', 'PemeriksaController@delete')->name('pemeriksa.delete');
        Route::get('pemeriksa/api', 'PemeriksaYajraController@api')->name('pemeriksa.api');
        Route::resource('pemeriksa', 'PemeriksaController')->except(['destroy']);

        // penyidik
        Route::patch('penyidik/softdelete/{penyidik}', 'PenyidikController@softdelete')->name('penyidik.softdelete');
        Route::get('penyidik/{penyidik}/delete', 'PenyidikController@delete')->name('penyidik.delete');
        Route::get('penyidik/api', 'PenyidikController@api')->name('penyidik.api');
        Route::resource('penyidik', 'PenyidikController')->except(['store', 'destroy']);

        //subbidang
        Route::group(['prefix' => 'bidang/{bidang}'], function () {
            Route::get('subbidang', 'SubbidangController@index')->name('subbidang.index');
            Route::post('subbidang', 'SubbidangController@store')->name('subbidang.store');
            Route::put('subbidang/{subbidang}', 'SubbidangController@update')->name('subbidang.update');
            Route::get('subbidang/create', 'SubbidangController@create')->name('subbidang.create');
            Route::get('subbidang/api', 'SubbidangYajraController@api')->name('subbidang.api');
            Route::get('subbidang/{subbidang}/edit', 'SubbidangController@edit')->name('subbidang.edit');
            Route::get('subbidang/{subbidang}/delete', 'SubbidangController@delete')->name('subbidang.delete');
            Route::patch('subbidang/softdelete/{subbidang}', 'SubbidangController@softdelete')->name('subbidang.softdelete');
        });

        // jabatan
        Route::patch('jabatan/softdelete/{jabatan}', 'JabatanController@softdelete')->name('jabatan.softdelete');
        Route::get('jabatan/{jabatan}/delete', 'JabatanController@delete')->name('jabatan.delete');
        Route::get('jabatan/api', 'JabatanYajraController@api')->name('jabatan.api');
        Route::resource('jabatan', 'JabatanController')->except(['show', 'destroy']);

        // pangkat
        Route::patch('pangkat/softdelete/{pangkat}', 'PangkatController@softdelete')->name('pangkat.softdelete');
        Route::get('pangkat/{pangkat}/delete', 'PangkatController@delete')->name('pangkat.delete');
        Route::get('pangkat/api', 'PangkatYajraController@api')->name('pangkat.api');
        Route::resource('pangkat', 'PangkatController')->except(['show', 'destroy']);

        // JenisBB
        Route::patch('jenisbb/softdelete/{jenisbb}', 'JenisbbController@softdelete')->name('jenisbb.softdelete');
        Route::get('jenisbb/{jenisbb}/delete', 'JenisbbController@delete')->name('jenisbb.delete');
        Route::get('jenisbb/api', 'JenisbbYajraController@api')->name('jenisbb.api');
        Route::resource('jenisbb', 'JenisbbController')->except(['show', 'destroy']);

        // JenisKasus
        Route::patch('jeniskasus/softdelete/{jeniskasus}', 'JenisKasusController@softdelete')->name('jeniskasus.softdelete');
        Route::get('jeniskasus/{jeniskasus}/delete', 'JenisKasusController@delete')->name('jeniskasus.delete');
        Route::get('jeniskasus/api', 'JenisKasusYajraController@api')->name('jeniskasus.api');
        Route::get('jeniskasus/{jeniskasus}/edit', 'JenisKasusController@edit')->name('jeniskasus.edit');
        Route::match(['put', 'patch'], 'jeniskasus/{jeniskasus}', 'JenisKasusController@update')->name('jeniskasus.update');
        Route::resource('jeniskasus', 'JenisKasusController')->except(['show', 'destroy', 'edit', 'update']);

        // Polda
        Route::patch('polda/softdelete/{polda}', 'PoldaController@softdelete')->name('polda.softdelete');
        Route::get('polda/{polda}/delete', 'PoldaController@delete')->name('polda.delete');
        Route::get('polda/api', 'PoldaYajraController@api')->name('polda.api');
        Route::resource('polda', 'PoldaController')->except(['show', 'destroy']);

        // Polres
        Route::patch('polres/softdelete/{polres}', 'PolresController@softdelete')->name('polres.softdelete');
        Route::get('polres/{polres}/delete', 'PolresController@delete')->name('polres.delete');
        Route::get('polres/{polres}/edit', 'PolresController@edit')->name('polres.edit');
        Route::match(['put', 'patch'], 'polres/{polres}', 'PolresController@update')->name('polres.update');
        Route::get('polres/api', 'PolresYajraController@api')->name('polres.api');
        Route::resource('polres', 'PolresController')->except(['show', 'destroy', 'edit', 'update']);

        // Polsek
        Route::patch('polsek/softdelete/{polsek}', 'PolsekController@softdelete')->name('polsek.softdelete');
        Route::get('polsek/{polsek}/delete', 'PolsekController@delete')->name('polsek.delete');
        Route::get('polsek/api', 'PolsekYajraController@api')->name('polsek.api');
        Route::resource('polsek', 'PolsekController')->except(['show', 'destroy']);
    });

    //===================
    // Chained Select
    //===================
    Route::group(['prefix' => 'masterdata/'], function () {
        // subbidang
        Route::get('subbidang/api/select/create', 'SubbidangSelectController@apiSelectCreate')->name('subbidang.api.select.create');
        Route::get('subbidang/api/select/takah', 'SubbidangSelectController@apiSelectTakah')->name('subbidang.api.select.takah');

        // polres
        Route::get('polres/api/select', 'PolresSelectController@apiSelect')->name('polres.api.select');
        Route::get('polres/api/select/edit', 'PolresSelectController@apiSelectEdit')->name('polres.api.select.edit');

        // polsek
        Route::get('polsek/api/select', 'PolsekSelectController@apiSelect')->name('polsek.api.select');
        Route::get('polsek/api/select/edit', 'PolsekSelectController@apiSelectEdit')->name('polsek.api.select.edit');

    });

    //=================
    // Penyidik
    //=================
    Route::post('penyidik', 'PenyidikController@store')
        ->name('penyidik.store')
        ->middleware(['checkrole:urtu/renmin,admin']);
    Route::post('penyidik/search', 'PenyidikSearchController@search')
        ->name('penyidik.search')
        ->middleware(['checkrole:urtu/renmin']);

    //=================
    // barang bukti
    //=================
    Route::group(['prefix' => 'takah/{takah}'], function () {
        Route::get('barangbukti', 'BarangBuktiController@index')->name('barangbukti.index');
        Route::post('barangbukti', 'BarangBuktiController@store')
            ->name('barangbukti.store')
            ->middleware(['checkrole:urtu/renmin']);
        Route::get('barangbukti/create', 'BarangBuktiController@create')
            ->name('barangbukti.create')
            ->middleware(['checkrole:urtu/renmin']);
        Route::get('barangbukti/api', 'BarangBuktiYajraController@api')->name('barangbukti.api');
    });
    Route::get('barangbukti/{barangbukti}/edit', 'BarangBuktiController@edit')->name('barangbukti.edit');
    Route::put('barangbukti/{barangbukti}', 'BarangBuktiController@update')->name('barangbukti.update');
    Route::get('barangbukti/{barangbukti}/delete', 'BarangBuktiController@delete')->name('barangbukti.delete');
    Route::patch('barangbukti/{barangbukti}/softdelete', 'BarangBuktiController@softdelete')->name('barangbukti.softdelete');

    //================
    // takah
    //================
    // api
    Route::get('takah/api', 'TakahYajraController@api')
        ->name('takah.api')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/api/takah_telah_selesai', 'TakahYajraController@apiTakahTelahSelesai')
        ->name('takah.api.takah_telah_selesai')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/api/{tahap}/tahap', 'TakahYajraController@apiTahap')
        ->name('takah.api.tahap')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/api/izin', 'TakahYajraController@apiIzin')
        ->name('takah.api.izin')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/api/edit', 'TakahYajraController@apiEdit')
        ->name('takah.api.edit')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/api/{unitkerja_id}/summary_takah', 'TakahYajraController@apiSummary')
        ->name('takah.api.summary_takah')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin,kalabforcab']);
    Route::get('takah/api/kasus_menonjol/{waktu}', 'TakahYajraController@apiKasusMenonjol')
        ->name('takah.api.kasus_menonjol')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin,kalabforcab']);
    Route::get('takah/api/penerimaan_dari_penyidik', 'TakahYajraController@apiPenerimaanDariPenyidik')
        ->name('takah.api.penerimaan_dari_penyidik')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/api/diserahkan_ke_kaurmin', 'TakahYajraController@apiDiserahkanKeKaurmin')
        ->name('takah.api.diserahkan_ke_kaurmin')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/api/diterima_oleh_kaurmin', 'TakahYajraController@apiDiterimaOlehKaurmin')
        ->name('takah.api.diterima_oleh_kaurmin')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/api/siap_diserahkan_ke_urtu', 'TakahYajraController@apiSiapDiserahkanKeUrtu')
        ->name('takah.api.siap_diserahkan_ke_urtu')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/api/diterima_oleh_urtu', 'TakahYajraController@apiDiterimaOlehUrtu')
        ->name('takah.api.diterima_oleh_urtu')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/api/siap_diserahkan_ke_penyidik', 'TakahYajraController@apiSiapDiserahkanKePenyidik')
        ->name('takah.api.siap_diserahkan_ke_penyidik')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);

    // index
    Route::get('takah/index/edit', 'TakahController@indexEdit')
        ->name('takah.index.edit')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/izin_edit', 'TakahController@indexIzin')
        ->name('takah.index.izin')
        ->middleware(['checkrole:admin']);
    Route::get('takah/index/{tahap}/tahap', 'TakahController@indexTahap')
        ->name('takah.index.tahap')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/index/summary_takah', 'TakahController@indexSummary')
        ->name('takah.index.summary_takah')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/index/takah_telah_selesai', 'TakahController@indexTakahTelahSelesai')
        ->name('takah.index.takah_telah_selesai')
        ->middleware(['checkrole:urtu/renmin']);

    // create
    Route::get('takah/penerimaan', 'TakahController@penerimaan')
        ->name('takah.penerimaan')
        ->middleware(['checkrole:urtu/renmin']);

    // store
    Route::post('takah/', 'TakahController@store')
        ->name('takah.store')
        ->middleware(['checkrole:urtu/renmin']);
    Route::post('takah/store/penyidik_permintaan_asal', 'TakahController@storePenyidik_Permintaan_Asal')
        ->name('takah.store.penyidik_permintaan_asal')
        ->middleware(['checkrole:urtu/renmin']);
    Route::post('takah/store/jeniskasus_barangbukti_mindik', 'TakahController@storeJenisKasus_BarangBukti_Mindik')
        ->name('takah.store.jeniskasus_barangbukti_mindik')
        ->middleware(['checkrole:urtu/renmin']);

    // detail
    Route::get('takah/detail/{tahap}', 'TakahController@detail')
        ->name('takah.detail')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);

    // edit
    Route::get('takah/{takah}/edit', 'TakahController@edit')
        ->name('takah.edit')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/{takah}/izin_edit', 'TakahController@editIzin')
        ->name('takah.edit.izin')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);

    // update
    Route::put('takah/update/izin_edit/{takah}', 'TakahController@updateIzin')
        ->name('takah.update.izin')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::put('takah/update/penyidik_permintaan_asal/{takah}', 'TakahController@updatePenyidik_Permintaan_Asal')
        ->name('takah.update.penyidik_permintaan_asal')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::put('takah/update/jeniskasus_barangbukti_mindik/{takah}', 'TakahController@updateJenisKasus_BarangBukti_Mindik')
        ->name('takah.update.jeniskasus_barangbukti_mindik')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::put('takah/update/keterangan_formil_tambahan/{takah}', 'TakahController@updateKeteranganFormilTambahan')
        ->name('takah.update.keterangan_formil_tambahan')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::put('takah/update/keterangan_teknis_tambahan/{takah}', 'TakahController@updateKeteranganTeknisTambahan')
        ->name('takah.update.keterangan_teknis_tambahan')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::put('takah/update/keterangan_takah/{takah}', 'TakahController@updateKeteranganTakah')
        ->name('takah.update.keterangantakah')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::put('takah/update/pemeriksa/{takah}', 'TakahController@updatePemeriksa')
        ->name('takah.update.pemeriksa')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);

    // cetakan
    Route::get('takah/{takah}/cetakan_penerimaan', 'TakahCetakanController@cetakanPenerimaan')
        ->name('takah.cetakan.penerimaan')
        ->middleware(['checkrole:urtu/renmin']);
    Route::get('takah/{takah}/cetakan_penyerahan', 'TakahCetakanController@cetakanPenyerahan')
        ->name('takah.cetakan.penyerahan')
        ->middleware(['checkrole:urtu/renmin']);

    // tahap
    Route::get('takah/tahap/{tahap}', 'TakahController@tahap')
        ->name('takah.tahap')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);

    // process flow
    Route::put('takah/{takah}/serahkan_ke_kaurmin', 'TakahProcessFlowController@serahkanKeKaurmin')
        ->name('takah.process.serahkan_ke_kaurmin')
        ->middleware(['checkrole:urtu/renmin']);
    Route::put('takah/{takah}/tambah_kelengkapan_takah', 'TakahProcessFlowController@tambahKelengkapanTakah')
        ->name('takah.process.tambah_kelengkapan_takah')
        ->middleware(['checkrole:kaurmin']);
    Route::put('takah/{takah}/tambah_pemeriksa', 'TakahProcessFlowController@tambahPemeriksa')
        ->name('takah.process.tambah_pemeriksa')
        ->middleware(['checkrole:kaurmin']);
    Route::put('takah/{takah}/simpan_bap', 'TakahProcessFlowController@simpanBap')
        ->name('takah.process.simpan_bap')
        ->middleware(['checkrole:kaurmin']);
    Route::put('takah/{takah}/tambah_dokumen_diserahkan', 'TakahProcessFlowController@tambahDokumenDiserahkan')
        ->name('takah.process.tambah_dokumen_diserahkan')
        ->middleware(['checkrole:urtu/renmin']);
    Route::put('takah/{takah}/simpan_penyidik_penerima', 'TakahProcessFlowController@simpanPenyidikPenerima')
        ->name('takah.process.simpan_penyidik_penerima')
        ->middleware(['checkrole:urtu/renmin']);
    Route::put('takah/{takah}/simpan_feedback', 'TakahProcessFlowController@simpanFeedback')
        ->name('takah.process.simpan_feedback')
        ->middleware(['checkrole:urtu/renmin']);

    // pencarian
    Route::get('takah/pencarian/index', 'TakahSearchController@pencarianIndex')
        ->name('takah.pencarian.index')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/pencarian/bytakah', 'TakahSearchController@pencarianByTakah')
        ->name('takah.pencarian.bytakah')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);
    Route::get('takah/pencarian/bytersangka', 'TakahSearchController@pencarianByTersangka')
        ->name('takah.pencarian.bytersangka')
        ->middleware(['checkrole:urtu/renmin,kaurmin,admin']);

    //========================
    // Visual Grafis - Grafis
    //========================
    // grafis per polda
    Route::get('visual_grafis/grafik/per_polda/{unitkerja}/{waktu}', 'GrafikController@grafikPerPolda')
        ->name('visual_grafis.grafik.perpolda');
    // grafis per bidang
    Route::get('visual_grafis/grafik/per_bidang_subbidang/{unitkerja}/{waktu}', 'GrafikController@grafikPerBidangSubbidang')
        ->name('visual_grafis.grafik.perbidang_subbidang');
    // grafis per pemeriksa
    Route::get('visual_grafis/grafik/per_pemeriksa/{unitkerja}/{bidang_id}/{waktu}', 'GrafikController@grafikPerPemeriksa')
        ->name('visual_grafis.grafik.perpemeriksa');
    // grafis per durasi pemeriksaan
    Route::get('visual_grafis/grafik/per_durasi_pemeriksaan/{unitkerja}/{waktu}', 'GrafikController@grafikPerDurasiPemeriksaan')
        ->name('visual_grafis.grafik.perdurasipemeriksaan');
    // grafis per jenis bb
    Route::get('visual_grafis/grafik/per_jenis_bb/{unitkerja}/{bidang_id}/{waktu}', 'GrafikController@grafikPerJenisBB')
        ->name('visual_grafis.grafik.perjenisbb');
    // grafis feedback
    Route::get('visual_grafis/grafik/lainnya/feedback/{unitkerja}/{waktu}', 'GrafikController@grafikFeedback')
        ->name('visual_grafis.grafik.feedback');
    // grafis kasus menonjol
    Route::get('visual_grafis/grafik/lainnya/kasus_menonjol/{unitkerja}/{waktu}', 'GrafikController@grafikKasusMenonjol')
        ->name('visual_grafis.grafik.kasus_menonjol');

    //==========================
    // Visual Grafis - Tabulasi
    //==========================
    //  tabulasi per polda
    Route::get('visual_grafis/tabulasi/per_polda/{unitkerja}/{waktu}', 'TabulasiController@tabulasiPerPolda')
        ->name('visual_grafis.tabulasi.perpolda');
    // tabulasi per bidang
    Route::get('visual_grafis/tabulasi/per_bidang/{unitkerja}/{waktu}', 'TabulasiController@tabulasiPerBidang')
        ->name('visual_grafis.tabulasi.perbidang');
    // tabulasi per sub-bidang
    Route::get('visual_grafis/tabulasi/per_subbidang/{unitkerja}/{bidang_id}/{waktu}', 'TabulasiController@tabulasiPerSubbidang')
        ->name('visual_grafis.tabulasi.persubbidang');
    // tabulasi per pemeriksa
    Route::get('visual_grafis/tabulasi/per_pemeriksa/{unitkerja}/{bidang_id}/{waktu}', 'TabulasiController@tabulasiPerPemeriksa')
        ->name('visual_grafis.tabulasi.perpemeriksa');
    // tabulasi per durasi pemeriksaan
    Route::get('visual_grafis/tabulasi/per_durasi_pemeriksaan/{unitkerja}/{waktu}', 'TabulasiController@tabulasiPerDurasiPemeriksaan')
        ->name('visual_grafis.tabulasi.per_durasi_pemeriksaan');
    // grafis per jenis bb
    Route::get('visual_grafis/tabulasi/per_jenis_bb/{unitkerja}/{bidang_id}/{waktu}', 'TabulasiController@tabulasiPerJenisBB')
        ->name('visual_grafis.tabulasi.perjenisbb');
    // tabulasi feedback
    Route::get('visual_grafis/tabulasi/feedback/{unitkerja}/{waktu}', 'TabulasiController@tabulasiFeedback')
        ->name('visual_grafis.tabulasi.feedback');
    // tabulasi summary_takah takah
    Route::get('visual_grafis/tabulasi/{unitkerja}/takah/summary_takah', 'TabulasiController@tabulasiSummaryTakah')
        ->name('visual_grafis.tabulasi.summary_takah');
    // tabulasi kasus menonjol
    Route::get('visual_grafis/tabulasi/{unitkerja}/takah/kasus_menonjol/{waktu}', 'TabulasiController@tabulasiKasusMenonjol')
        ->name('visual_grafis.tabulasi.kasus_menonjol');

    //=====================
    // Manual Route Links
    //=====================
    Route::get('storage_link', 'StorageLinkController@link')->name('storage.link')->middleware(['checkrole:admin']);

});

