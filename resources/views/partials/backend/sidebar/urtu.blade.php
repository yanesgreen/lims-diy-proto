{{--Nav Item - Dashboard--}}
<li class="nav-item">
    <a class="{{ Request::is('home') ? "nav-link active" : "nav-link" }}" href="{{ route('dashboard') }}">
        <span>Dashboard - Tahap I</span>
    </a>
</li>

{{--Dashboard 2--}}
<li class="nav-item">
    <a class="{{ Request::is('home/urtu2') ? "nav-link active" : "nav-link" }}"
       href="{{ route('dashboard.urtu2') }}">
        <span>Dashboard - Tahap III</span>
    </a>
</li>

{{--Divider--}}
<hr class="sidebar-divider">

<li class="nav-item">
    <a class="{{ Request::is('takah/penerimaan') ? "nav-link active" : "nav-link" }}"
       href="{{ route('takah.penerimaan') }}">
                    <span>
                        Tahap I:<br>
                        Penerimaan Barang Bukti dari Penyidik
                    </span>
    </a>
</li>

<li class="nav-item">
    <a class="{{ Request::is('dummies/takah/pencarian*') ? "nav-link active" : "nav-link" }}"
       style="color: #9b9b9b"
       href="javascript:void(0)">
                    <span>
                        Tahap II:<br>
                        Pemeriksaan Laboratoris Barang Bukti
                    </span>
    </a>
</li>

<li class="nav-item">
    <a class="{{ Request::is('takah/index/3/tahap') ? "nav-link active" : "nav-link" }}"
       href="{{ route('takah.index.tahap', ["tahap" => 3]) }}">
                    <span>
                        Tahap III:<br>
                        Penyerahan BAP Laboratoris dan Barang Bukti Ke Penyidik
                    </span>
    </a>
</li>

{{--Divider--}}
<hr class="sidebar-divider">

{{--Searching--}}
<li class="nav-item">
    <a class="{{ Request::is('takah/index/takah_telah_selesai') ? "nav-link active" : "nav-link" }}"
       href="{{ route('takah.index.takah_telah_selesai') }}">
        <span>
           Takah Telah Diserahkan Ke Penyidik
        </span>
    </a>
</li>

{{--Divider--}}
<hr class="sidebar-divider">

{{--Searching--}}
<li class="nav-item">
    <a class="{{ Request::is('takah/pencarian/index') ? "nav-link active" : "nav-link" }}"
       href="{{ route('takah.pencarian.index') }}">
        <span>
           Searching
        </span>
    </a>
</li>

{{--Divider--}}
<hr class="sidebar-divider">

{{--Edit Takah--}}
<li class="nav-item">
    <a class="{{ Request::is('takah/index/edit') ? "nav-link active" : "nav-link" }}"
       href="{{ route('takah.index.edit') }}">
        <span>
           Edit Takah
        </span>
    </a>
</li>

