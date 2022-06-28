@extends('layouts.frontend.frontendpage')

@section('content')
    <!--main-->
    <main>
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <h2 class="page-heading text-uppercase">
                            Bidang Fisika dan Komputer
                        </h2>
                        <h3 class="page-subheading d-none d-md-block">
                            Penjelasan singkat mengenai Bidang Fisika dan Komputer
                        </h3>
                    </div>
                    <div class="figure-container">
                        <figure class="figure w-100 mt-3 md-mt-0 rounded overflow-hidden">
                            <div class="figure-overlay"></div>
                            <img src="{{ asset("images/fiskomfor.jpg") }}" class="figure-img rounded" alt="page image">
                            <figcaption class="figure-caption">FISKOMFOR</figcaption>
                            <div class="figure-logo">
                                <svg xmlns="http://www.w3.org/2000/svg" class="services-logo" viewBox="0 0 512 512">
                                    <path
                                        d="M39.822 59.733v295.822h432.355V59.733H39.822zm392.533 238.933H79.644V99.555h352.711v199.111zM312.889 384v28.444H199.111V384H0v11.378c0 31.289 25.6 56.889 56.889 56.889h398.222c31.289 0 56.889-25.6 56.889-56.889V384H312.889z"/>
                                </svg>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p>
                        Bertugas menyelenggarakan pelayanan pemeriksaan teknis kriminalistik TKP dan pemeriksaan
                        laboratoris
                        kriminalistik barang bukti uji kebohongan (lie detector), jejak, radioaktif, konstruksi
                        bangunan,
                        peralatan teknik, kebakaran/pembakaran, dan komputer (suara dan gambar (audio/video), komputer &
                        telepon genggam (computer & mobile phones), dan kejahatan jaringan internet/intranet (cyber
                        network)) serta memberikan pelayanan umum forensik kriminalistik.
                    </p>

                    <ul>
                        <li>
                            Bidang Fisika Umum Forensik meliputi Pemeriksaan sabotasi, berkas kejahatan dan sebagainya.
                        </li>
                        <li>
                            Bidang Komputer Forensik meliputi pemeriksaan suara dan gambar (audio/video), computer dan
                            telepon
                            genggam (computer dan mobile phones), dan kejahatan jaringan internet/intranet (cyber
                            network)
                            dan
                            sebagainya.
                        </li>
                        <li>
                            Bidang Fisika khusus meliputi pemeriksaan bekas alat/jejak alat (tool mark),
                            pemeriksaan/analisa
                            kebohongan melalui Leidetection dan voice detection.
                        </li>
                        <li>
                            Bidang instrument Forensik meliputi pemeriksaan barang bukti dengan dukungan instrument
                            analisis.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection


