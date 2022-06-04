@extends('home.layouts.main')
@section('isi') 

         <!-- ======= About Section ======= -->
         <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2 style="padding-top: 50px;"> <span>Visi & Misi</span> </h2>
                    <hr>
                </div>

                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="/assets/img/tirosa.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7">
                       

                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1">Visi</a></li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#tab2">Misi</a></li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="tab1">

                                <center>
                                <p class="fst-italic">Organisasi strategis untuk pemberdayaan kota-kota dalam rangka pelaksanaan otonomi di Indonesia.</p>
                                </center>
                            </div><!-- End Tab 1 Content -->

                            <div class="tab-pane fade show" id="tab2">

                               <center>
                               <p class="fst-italic">Berusaha untuk menjadi suatu organisasi yang terpercaya, profesional di bidang perkotaan dalam mendukung dan melaksanakan upaya terbaik bagi pemerintahan kota melalui pembangunan yang demokratis, transparan, otonomi yang bertanggung jawab, sebagai bagian dari masyarakat baru pada struktur pemerintahan di Negara Republik Indonesia</p>
                                
                                <p class="fst-italic">APEKSI senantiasa mengembangkan fungsi dan tugasnya sesuai dalam koridor visi dan misi yang telah ditetapkan dalam Anggaran Dasar dan Anggaran Rumah Tangga. Visi dan Misi APEKSI saat ini dianggap masih cukup relevan dan mampu menjawab tantangan yang dihadapi oleh para anggota. APEKSI memfasilitasi pemerintah daerah (kota-kota) di Indonesia untuk melakukan pengelolaan yang lebih baik dalam pelayanan publik, meningkatkan kapasitas pemerintah daerah dalam mengatasi berbagai permasalahan kota secara efektif dan efisien, serta sebagai wadah untuk tukar menukar pengalaman dan pengetahuan.</p>
                               </center> 
                            </div><!-- End Tab 2 Content -->

                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End About Section -->
    </main><!-- End #main -->
@endsection
