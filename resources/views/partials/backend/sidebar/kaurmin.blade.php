{{--Nav Item - Dashboard--}}
{{--Divider--}}
<hr class="sidebar-divider my-0">

{{--Nav Item - Dashboard--}}
<li class="nav-item">
    <a class="{{ Request::is('home') ? "nav-link active" : "nav-link" }}" href="{{ route('dashboard') }}">
        <span>Dashboard - Tahap II</span>
    </a>
</li>

{{--Divider--}}
<hr class="sidebar-divider">

{{--Tahap 1 Dummy--}}
<li class="nav-item">
    <a class="{{ Request::is('dummies/takah/penerimaan') ? "nav-link active" : "nav-link" }}"
       style="color: #9b9b9b"
       href="javascript:void(0)">
        <span>
            Tahap I:<br>
            Penerimaan Barang Bukti dari Penyidik
        </span>
    </a>
</li>

<li class="nav-item">
    <a class="{{ Request::is('takah/index/2/tahap') ? "nav-link active" : "nav-link" }}"
       href="{{ route('takah.index.tahap', ["tahap" => 2]) }}">
                    <span>
                        Tahap II:<br>
                        Pemeriksaan Laboratoris Barang Bukti
                    </span>
    </a>
</li>

<li class="nav-item">
    <a class="{{ Request::is('takah/pencarian*') ? "nav-link active" : "nav-link" }}"
       style="color: #9b9b9b"
       href="javascript:void(0)">
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
    <a class="{{ Request::is('takah/pencarian*') ? "nav-link active" : "nav-link" }}"
       href="{{ route('takah.pencarian.index') }}">
        <span>
           Searching
        </span>
    </a>
</li>

