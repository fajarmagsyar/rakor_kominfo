@extends('home.layouts.main')
@section('isi')
    <main id="main">

        <style>
            #overflowTest {
                background: #ffffff;
                padding: 15px;
                width: 100%;
                height: 200px;
                overflow: scroll;
            }
        </style>

        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <div class="section-header">


                </div>

                <div class="row">

                    @foreach ($artikelRows as $key => $r)
                        <div class="col-5 card mx-auto shadow" data-aos="fade-up" data-aos-delay="200">
                            <div class="post-box">

                                <div class="meta">
                                    <i class="bi bi-calendar"></i>
                                    <span class="post-date">{{ $r->created_at }}</span>
                                    <i class="bi bi-person-fill"></i>
                                    <span class="post-author">{{ $r->nama }}</span>
                                </div>
                                <div id="overflowTest" style="height: 800px">
                                    <p class="fst-italic"><?php
                                    echo $r->isi;
                                    ?></p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </section><!-- End Recent Blog Posts Section -->

    </main><!-- End #main -->
@endsection
