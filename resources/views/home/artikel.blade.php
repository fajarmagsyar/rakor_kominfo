@extends('home.layouts.main')
@section('isi')

    <main id="main">

    <style>
#overflowTest {
  background: #ffffff;
  /* color: white; */
  padding: 15px;
  width: 100%;
  height: 200px;
  overflow: scroll;
  /* border: 1px solid #ccc; */
}
</style>

    <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    
                    
                </div>

                @foreach ($artikelRows as $key => $r)
                <div class="row">
                
                    <div class="col-lg-12 card shadow" data-aos="fade-up" data-aos-delay="200">
                        <div class="post-box">

                            <div class="meta">
                                <span class="post-date">{{ $r->created_at }}</span>
                                <span class="post-author"> / {{ $r->nama }}</span>
                            </div>
                            <div id="overflowTest">
                                <p class="fst-italic">{{ ($r->isi) }}</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>

        </section><!-- End Recent Blog Posts Section -->

    </main><!-- End #main -->
@endsection
