<div id="grafik_tabulasi_links" class="row mb-4 mt-4">
    <div class="card-body d-flex justify-content-between">
        <a href="{{ route('visual_grafis.grafik.perpolda', ['waktu' => $waktu, 'unitkerja' => $unitkerja ] ) }}"
           class="{{ Request::is('visual_grafis/grafik/per_polda/*') ||  Request::is('visual_grafis/tabulasi/per_polda/*') ? "btn btn-primary text-info" : "btn btn-primary" }}"
           role="button">
            Statistik Per Polda
        </a>
        <a href="{{ route('visual_grafis.grafik.perbidang_subbidang', ['waktu' => $waktu, 'unitkerja' => $unitkerja ] ) }}"
           class="
                @if(\Request::is('visual_grafis/grafik/per_bidang_subbidang/*') || \Request::is('visual_grafis/tabulasi/per_bidang/*') || \Request::is('visual_grafis/tabulasi/per_subbidang/*'))
               btn btn-primary text-info
               @else
               btn btn-primary
               @endif
               "
           role="button">
            Statistik Per Bidang/Subbid
        </a>
        <div class="dropdown">
            <a href="#"
               class="{{ Request::is('visual_grafis/grafik/per_pemeriksa/*') ? "btn btn-primary dropdown-toggle text-info" : "btn btn-primary dropdown-toggle" }}"
               role="button"
               id="dropdownMenuBidangSubbidang"
               data-toggle="dropdown">
                Statistik Per Pemeriksa
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuPemeriksa">
                <a href="{{ route('visual_grafis.grafik.perpemeriksa',
                ['waktu' => $waktu, 'unitkerja' => $unitkerja, 'bidang_id' => 3]) }}"
                   class="dropdown-item">
                    Fiskomfor
                </a>
                <a href="{{ route('visual_grafis.grafik.perpemeriksa',
                ['waktu' => $waktu, 'unitkerja' => $unitkerja, 'bidang_id' => 5]) }}"
                   class="dropdown-item">
                    Narkobafor
                </a>
                <a href="{{ route('visual_grafis.grafik.perpemeriksa',
                ['waktu' => $waktu, 'unitkerja' => $unitkerja, 'bidang_id' => 1]) }}"
                   class="dropdown-item">
                    Dokupalfor
                </a>
                <a href="{{ route('visual_grafis.grafik.perpemeriksa',
                ['waktu' => $waktu, 'unitkerja' => $unitkerja, 'bidang_id' => 4]) }}"
                   class="dropdown-item">
                    Kimbiofor
                </a>
                <a href="{{ route('visual_grafis.grafik.perpemeriksa',
                ['waktu' => $waktu, 'unitkerja' => $unitkerja, 'bidang_id' => 2]) }}"
                   class="dropdown-item">
                    Balmetfor
                </a>
            </div>
        </div>
        <a href="{{ route('visual_grafis.grafik.perdurasipemeriksaan', ['waktu' => $waktu, 'unitkerja' => $unitkerja ] ) }}"
           class="{{ Request::is('visual_grafis/grafik/per_durasi_pemeriksaan/*') ? "btn btn-primary text-info" : "btn btn-primary" }}"
           role="button">
            Statistik Per Durasi Pemeriksaan
        </a>
        <div class="dropdown">
            <a class="{{ Request::is('visual_grafis/grafik/per_jenis_bb/*') ? "btn btn-primary dropdown-toggle text-info" : "btn btn-primary dropdown-toggle" }}"
               href="#"
               role="button"
               id="dropdownMenuJenisBB"
               data-toggle="dropdown">
                Statistik Per Jenis Barang Bukti
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuJenisBB">
                <a href="{{ route('visual_grafis.grafik.perjenisbb',
                ['waktu' => $waktu, 'unitkerja' => $unitkerja, 'bidang_id' => 3]) }}"
                   class="dropdown-item">
                    Fiskomfor
                </a>
                <a href="{{ route('visual_grafis.grafik.perjenisbb',
                ['waktu' => $waktu, 'unitkerja' => $unitkerja, 'bidang_id' => 5]) }}"
                   class="dropdown-item">
                    Narkobafor
                </a>
                <a href="{{ route('visual_grafis.grafik.perjenisbb',
                ['waktu' => $waktu, 'unitkerja' => $unitkerja, 'bidang_id' => 1]) }}"
                   class="dropdown-item">
                    Dokupalfor
                </a>
                <a href="{{ route('visual_grafis.grafik.perjenisbb',
                ['waktu' => $waktu, 'unitkerja' => $unitkerja, 'bidang_id' => 4]) }}"
                   class="dropdown-item">
                    Kimbiofor
                </a>
                <a href="{{ route('visual_grafis.grafik.perjenisbb',
                ['waktu' => $waktu, 'unitkerja' => $unitkerja, 'bidang_id' => 2]) }}"
                   class="dropdown-item">
                    Balmetfor
                </a>
            </div>
        </div>
        <div class="dropdown">
            <a
                class="{{ Request::is('visual_grafis/grafik/lainnya/*') ? "btn btn-primary dropdown-toggle text-info" : "btn btn-primary dropdown-toggle" }}"
                href="#"
                role="button"
                id="dropdownMenuLainnya"
                data-toggle="dropdown">
                Menu Lainnya
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuJenisBB">
                <a class="dropdown-item"
                   href="{{ route('visual_grafis.grafik.feedback', ['waktu' => $waktu, 'unitkerja' => $unitkerja]) }}">
                    Statistik Feedback
                </a>
                <a class="dropdown-item"
                   href="{{ route('visual_grafis.tabulasi.summary_takah', ['unitkerja' => $unitkerja]) }}">
                    Summary Pemeriksaan
                </a>
                <a class="dropdown-item"
                   href="{{ route('visual_grafis.grafik.kasus_menonjol', ['waktu' => $waktu, 'unitkerja' => $unitkerja]) }}">
                    Statistik Kasus Menonjol
                </a>
            </div>
        </div>
    </div>
</div>

