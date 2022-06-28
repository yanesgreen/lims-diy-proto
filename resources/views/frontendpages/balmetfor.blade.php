@extends('layouts.frontend.frontendpage')

@section('content')
    <!--main-->
    <main>
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <h2 class="page-heading text-uppercase">
                            Bidang Balistik dan Metalurgi
                        </h2>
                        <h3 class="page-subheading d-none d-md-block">
                            Penjelasan singkat mengenai Bidang Balistik dan Metalurgi
                        </h3>
                    </div>
                    <figure class="figure w-100 mt-3 md-mt-0 rounded overflow-hidden">
                        <div class="figure-overlay"></div>
                        <img src="{{ asset("images/balmetfor.jpg") }}" class="figure-img" alt="page image">
                        <figcaption class="figure-caption">BALMETFOR</figcaption>
                        <div class="figure-logo">
                            <svg xmlns="http://www.w3.org/2000/svg" class="services-logo" viewBox="0 0 512 512">
                                <path
                                    d="M95.521 171.682v13.163H78.017v141.67h17.504v13.803h219.807V171.682zM0 171.682h48.01v168.636H0zM505.569 247.168c-11.042-15.153-25.055-28.676-41.649-40.209-33.217-23.075-72.726-35.278-114.255-35.278h-4.331v168.636h4.331c20.764 0 41.019-3.051 60.243-8.982a195.974 195.974 0 0054.012-26.296c16.594-11.532 30.607-25.055 41.649-40.209L512 256l-6.431-8.832z"/>
                            </svg>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p>
                        Bertugas menyelenggarakan pelayanan pemeriksaan teknis kriminalistik TKP dan pemeriksaan
                        laboratoris
                        kriminalistik barang bukti senjata api (senjata api, peluru dan selongsong peluru), bahan
                        peledak
                        (bahan peledak, komponen-komponen bom, dan bom pasca ledakan (post blast) ) dan metalurgi (bukti
                        nomor seri, kerusakan logam), dan kecelakaan konstruksi serta memberikan pelayanan umum forensik
                        kriminalistik.
                    </p>

                    <ul>
                        <li>
                            Bidang senjata api dan Peluru Forensik meliputi pemeriksaan senajata api, selongsong peluru,
                            anak peluru, peluru, sisa mesium, serta partikel pecahan logam yang diperikrakan dari
                            senjata
                            api dan peluru.
                        </li>
                        <li>
                            Bidang Bahan Peledak Forensik meliputi pemeriksaan barang bukti bahan peledak komersil yang
                            di
                            paket/container berbentuk bom serta sumbu ledak.
                        </li>
                        <li>
                            Bidang Metallurgi Forensik meliputi pemeriksaan metallurgi umum seperti ; analisa
                            kerusakan/perpatahan logam, analisa spesifikasi teknis/struktur logam serta pemalsuan nomor
                            seri
                            yang dicetak diatas permukaan logam (nomor mesin dan nomor rangka/chasis, motor atau mobil
                            serta
                            peralatan cadangan lainnya).
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection


