{{--Divider--}}
<hr class="sidebar-divider my-0">

{{--Nav Item - Dashboard--}}
<li class="nav-item">
    <a class="{{ Request::is('home') ? "nav-link active" : "nav-link" }}" href="{{ route('dashboard') }}">
        <span>Dashboard</span>
    </a>
</li>

{{--Divider--}}
<hr class="sidebar-divider">

{{--Master data--}}
<li class="nav-item">
    <a class="{{ Request::is('masterdata*') ? "nav-link collapsed active" : "nav-link collapsed" }}"
       href="#"
       data-toggle="collapse" data-target="#collapseTwo"
       aria-expanded="true" aria-controls="collapseTwo">
        <span>Master Data</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master data</h6>
            <a class="{{ Request::is('masterdata/pengguna*') ? "collapse-item active" : "collapse-item" }}"
               href="{{ route('pengguna.index') }}">
                Users
            </a>
            <a class="{{ Request::is('masterdata/pemeriksa*') ? "collapse-item active" : "collapse-item" }}"
               href="{{ route('pemeriksa.index') }}">
                Pemeriksa Forensik
            </a>
            <a class="{{ Request::is('masterdata/jeniskasus*') ? "collapse-item active" : "collapse-item" }}"
               href="{{ route('jeniskasus.index') }}">
                Jenis Kasus
            </a>
            <a class="{{ Request::is('masterdata/jenisbb*') ? "collapse-item active" : "collapse-item" }}"
               href="{{ route('jenisbb.index') }}">
                Jenis Barang Bukti
            </a>
            <a class="{{ Request::is('masterdata/lembaga*') ? "collapse-item active" : "collapse-item" }}"
               href="{{ route('lembaga.index') }}">
                Lembaga Non-Polri
            </a>
            <a class="{{ Request::is('masterdata/satker*') ? "collapse-item active" : "collapse-item" }}"
               href="{{ route('satker.index') }}">
                Satker Mabes Polri
            </a>
            <a class="{{ Request::is('masterdata/polda*') ? "collapse-item active" : "collapse-item" }}"
               href="{{ route('polda.index') }}">
                Polda
            </a>
            <a class="{{ Request::is('masterdata/polres*') ? "collapse-item active" : "collapse-item" }}"
               href="{{ route('polres.index') }}">
                Polres
            </a>
            <a class="{{ Request::is('masterdata/polsek*') ? "collapse-item active" : "collapse-item" }}"
               href="{{ route('polsek.index') }}">
                Polsek
            </a>
        </div>
    </div>
</li>

{{--Edit Takah--}}
<li class="nav-item">
    <a class="{{ Request::is('takah/izin_edit') ? "nav-link active" : "nav-link" }}"
       href="{{ route('takah.index.izin') }}">
        <span>Izin Edit Takah</span>
    </a>
</li>

{{--Summary Takah--}}
{{--<li class="nav-item">--}}
{{--    <a class="{{ Request::is('summary_takah') ? "nav-link active" : "nav-link" }}"--}}
{{--       href="{{ route('visual_grafis.tabulasi.summary_takah', ['unitkerja' => unitKerjaId()]) }}">--}}
{{--        <span>Summary Pemeriksaan</span>--}}
{{--    </a>--}}
{{--</li>--}}
