{{--Map Links--}}
<div class="row mb-5">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <a class="{{ Request::is('home') ? "btn btn-primary active-link peta-link" : "btn btn-primary peta-link" }}"
           href="{{ route('dashboard') }}"
           role="button">
            Harian
        </a>
        <a class="{{ Request::is('home/mingguan') ? "btn btn-primary active-link peta-link" : "btn btn-primary peta-link" }}"
           href="{{ route('dashboard.visual_grafis', ['waktu' => 'mingguan']) }}"
           role="button">
            Mingguan
        </a>
        <a class="{{ Request::is('home/bulanan') ? "btn btn-primary active-link peta-link" : "btn btn-primary peta-link" }}"
           href="{{ route('dashboard.visual_grafis', ['waktu' => 'bulanan']) }}"
           role="button">
            Bulanan
        </a>
        <a class="{{ Request::is('home/semesteran') ? "btn btn-primary active-link peta-link" : "btn btn-primary peta-link" }}"
           href="{{ route('dashboard.visual_grafis', ['waktu' => 'semesteran']) }}"
           role="button">
            Semesteran
        </a>
        <a class="{{ Request::is('home/tahunan') ? "btn btn-primary active-link peta-link" : "btn btn-primary peta-link" }}"
           href="{{ route('dashboard.visual_grafis', ['waktu' => 'tahunan']) }}"
           role="button">
            Tahunan
        </a>
    </div>
</div>

