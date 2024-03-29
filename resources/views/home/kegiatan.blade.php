@extends('home.layouts.main')
@section('isi')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'id',
                    events: {!! json_encode($events) !!},
                });
                calendar.render();
            });
        </script>

        <div class="my-5 container text-center">
            <h1 data-aos-delay="200">Kegiatan</h1>

        </div>
        <div class="container mt-5" data-aos="fade-up">


            <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4 col-sm-12">
                    <ol class="list-group list-group-numbered">
                        <a href="https://drive.google.com/drive/folders/1F8oLk0xWTLW1Qh8AhRwPmqxhbdyF9qJD?usp=share_link"
                            class="btn text-white" style="background-color: rgb(96, 165, 255)"><i class="bi bi-folder"></i>
                            Materi RAKOR 2023</a>
                        @foreach ($kegiatan as $r)
                            <!-- mulai modal  -->
                            <br>
                            <a href="/kegiatan-single/{{ $r->kegiatan_id }}">
                                <li class="list-group-item d-flex justify-content-between align-items-start mb-2">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{ $r->nama_kegiatan }}</div>
                                        <div class="text-muted">
                                            <i class="bi bi-clock"></i> {{ $r->jam_masuk }} - {{ $r->jam_keluar }}
                                            <br>
                                            <i class="bi bi-geo-alt-fill"></i> {{ $r->lokasi }}
                                            <br>
                                            {{-- <a href="" class="float-end"><i class="bi bi-geo"></i> Map</a> --}}
                                        </div>
                                    </div>

                                    <div class="badge bg-primary rounded-pill">
                                        {{ date('D', strtotime($r->tanggal)) . ', ' . $r->tanggal }}</div>
                                </li>
                            </a>
                        @endforeach
                    </ol>
                </div>
                <div class="col-lg-8">
                    <div id='calendar'></div>
                </div>

            </div>

        </div>
    </section><!-- End About Section -->
    </main><!-- End #main -->
@endsection
