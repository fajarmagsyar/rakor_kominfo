@extends('home.layouts.main')
@section('isi')

<br><br>
    <main id="main">
        
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                
                <div class="row gy-5">
                  @foreach ($fasilitasRows as $fasilitasRow)
                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ $fasilitasRow->foto }}" class="img-fluid" style="width: 100%; height:240px;" alt="">
                            </div>
                            <div class="details position-relative">    
                                <a href="/wisata-single" class="stretched-link">
                                    <h3>{{ $fasilitasRow->nama_fasilitas }}</h3>
                                </a>
                                <p>{!! substr($fasilitasRow->deskripsi, 0, 90)  !!}...</p>
                                    <a href="/wisata-single/{{ $fasilitasRow->fasilitas_id}}" class="readmore stretched-link"><span><h6>Read More</h6></span>
                                </a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->
                   @endforeach 
                   
                </div>

            </div>
        </section><!-- End Services Section -->

     

    </main><!-- End #main -->
@endsection
