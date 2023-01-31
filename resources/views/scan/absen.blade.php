@php
    use App\Models\Absen;
    
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RAKOR KOMINFO Kota Kupang 2022 | {{ $pageTitle }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.ico" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/assets/css/variables.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="background-color: rgb(47, 56, 121)">

    @if (session()->has('success'))
        <script>
            swal.fire('Berhasil', 'Peserta berhasil terabsen!', 'success');
        </script>
    @endif
    @if (session()->has('sudah'))
        <script>
            swal.fire('Gagal', 'Peserta tersebut sudah absen dalam kegiatan ini!', 'error');
        </script>
    @endif
    <div class="row">
        <div class="col-12 h-100 middle-align text-center mt-4 mb-4">
            <h1><i class="bi bi-person-badge text-white"></i></h1>
            <h3><span class="text-white"><b>Absensi</b> Kegiatan</span></h3>
        </div>
    </div>
    <div class="container bg-white px-4 py-5 content" style="border-radius: 40px">
        @if (count($kegiatan) > 1)
            @foreach ($kegiatan as $keg)
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card shadow" style="border-radius: 20px; border: none;">
                            <div class="card-body">
                                <h5 class="card-title mb-3"><b><i class="bi bi-activity"></i>
                                        {{ $keg['nama_kegiatan'] }}</b> <span
                                        class="badge bg-success">Berlangsung</span>
                                </h5>
                                <h6 class="card-subtitle mb-3 text-muted"><i class="bi bi-clock mr-3"></i>
                                    {{ $keg['tanggal'] }},
                                    {{ $keg['jam_masuk'] }} - {{ $keg['jam_keluar'] }} WITA</h6>
                                <h6 class="card-subtitle mb-3 text-muted"><i class="bi bi-map mr-3"></i>
                                    {{ $keg['lokasi'] }}</h6>
                                <div class="card" style="border-radius: 15px">
                                    <div class="card-body py-0">
                                        <p class="card-text">
                                        <div class="text-muted">Deskripsi: </div>
                                        <?php
                                        echo $keg['deskripsi'];
                                        ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="accordion accordion-flush mt-3" id="accordionExample">
                                    <div class="accordion-item" style="border-radius: 15px">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#accord_{{ $keg['kegiatan_id'] }}" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                <i class="bi bi-person-fill"></i> &nbsp; {{ $keg['kuota'] }}
                                                Kuota
                                            </button>
                                        </h2>
                                        <div id="accord_{{ $keg['kegiatan_id'] }}" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="table-responsive">

                                                    <table class="table" style="border-radius: 15px">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nama</th>
                                                            <th>Asal</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        @foreach (Absen::getAbsenByKegiatan($keg['kegiatan_id']) as $key => $r)
                                                            <tr>
                                                                <td>{{ $key = $key + 1 }}</td>
                                                                <td>{{ $r->nama }}</td>
                                                                <td>{{ $r->asal }}</td>
                                                                <td>{{ $r->status_peserta }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @elseif (count($kegiatan) == 0)
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card shadow" style="border-radius: 20px; border: none;">
                        <div class="card-body">
                            <div class="alert alert-danger mt-3" style="border-radius: 10px">
                                <center>
                                    Tidak ada kegiatan yang sedang berlangsung!
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="card shadow" style="border-radius: 20px; border: none;">
                        <div class="card-body">
                            <h5 class="card-title mb-3"><b><i class="bi bi-activity"></i>
                                    {{ $kegiatan[0]['nama_kegiatan'] }}</b> <span
                                    class="badge bg-success">Berlangsung</span>
                            </h5>
                            <h6 class="card-subtitle mb-3 text-muted"><i class="bi bi-clock mr-3"></i>
                                {{ $kegiatan[0]['tanggal'] }},
                                {{ $kegiatan[0]['jam_masuk'] }} - {{ $kegiatan[0]['jam_keluar'] }} WITA</h6>
                            <h6 class="card-subtitle mb-3 text-muted"><i class="bi bi-map mr-3"></i>
                                {{ $kegiatan[0]['lokasi'] }}</h6>
                            <div class="card" style="border-radius: 15px">
                                <div class="card-body py-0">
                                    <p class="card-text">
                                    <div class="text-muted">Deskripsi: </div>
                                    <?php
                                    echo $kegiatan[0]['deskripsi'];
                                    ?>
                                    </p>
                                </div>
                            </div>
                            <div class="accordion accordion-flush mt-3" id="accordionExample">
                                <div class="accordion-item" style="border-radius: 15px">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            <i class="bi bi-person-fill"></i> &nbsp; {{ $kegiatan[0]['kuota'] }}
                                            Kuota
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <table class="table" style="border-radius: 15px">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Asal</th>
                                                    <th>Status</th>
                                                </tr>
                                                @foreach (Absen::getAbsenByKegiatan($kegiatan[0]['kegiatan_id']) as $key => $r)
                                                    <tr>
                                                        <td>{{ $key = $key + 1 }}</td>
                                                        <td>{{ $r->nama }}</td>
                                                        <td>{{ $r->asal }}</td>
                                                        <td>{{ $r->status_peserta }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow" style="border-radius: 20px; border: none;">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><b><i class="bi bi-person-badge"></i> Profil Peserta:</b></h5>
                        @if ($statusPeserta == 'Peserta Tambahan')
                            <div class="alert alert-danger alert-sm text-center text-sm">
                                <div class="row">
                                    <div class="col-12">
                                        <div><i class="bi bi-exclamation-circle-fill"></i></div>
                                        Peserta tidak terdaftar dalam {{ count($kegiatan) }} list kegiatan yang
                                        tertera, peserta
                                        akan absen sebagai <b>Peserta Tambahan</b>.
                                    </div>
                                </div>
                            </div>
                        @endif
                        <table class="table">
                            <tr>
                                <td>

                                    <h6 class="mb-2" style="font-size: 12px"><b class="text-muted"><i
                                                class="bi bi-person-badge-fill"></i> Nama</b></h6>
                                    {{ $pesertaScanned->nama }}
                                </td>
                                <td>
                                    <h6 class="mb-2" style="font-size: 12px"><b class="text-muted"><i
                                                class="bi bi-bar-chart-fill"></i> Jabatan</b></h6>
                                    {{ $pesertaScanned->jabatan }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="mb-2" style="font-size: 12px"><b class="text-muted"><i
                                                class="bi bi-geo"></i>
                                            Asal</b></h6>
                                    {{ $pesertaScanned->asal }}
                                </td>
                                <td>
                                    <h6 class="mb-2" style="font-size: 12px"><b class="text-muted"><i
                                                class="bi bi-telephone"></i>
                                            Kontak</b></h6>
                                    {{ $pesertaScanned->email }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <form action="/scan/apeksi22/absen/store" method="post">
                    @csrf
                    @if (count($kegiatan) > 1)
                        <label for="text-muted">
                            <span class="text-danger">*</span> Pilih untuk diabsen:
                        </label>
                        <select name="kegiatan_id" class="form-select mb-5">
                            @foreach ($kegiatan as $kegSelect)
                                <option value="{{ $kegSelect->kegiatan_id }}">
                                    {{ $kegSelect->nama_kegiatan }}
                                </option>
                            @endforeach
                        </select>
                    @elseif (count($kegiatan) == 0)
                    @else
                        <input type="hidden" value="{{ $kegiatan[0]['kegiatan_id'] }}" name="kegiatan_id">
                    @endif
                    @if (count($kegiatan) != 0)
                        <input type="hidden" value="{{ $pesertaScanned->user_id }}" name="user_id">
                        <button type="submit" class="btn btn-success w-100 btn-lg"
                            onclick="return confirm('Apakah anda yakin peserta sudah benar?')"
                            style="font-size: 15px; border-radius: 15px"><i class="bi bi-plus-circle-fill"></i>
                            Konfirmasi Peserta</button>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 text-center text-white">
            Made with <i class="bi bi-balloon-heart-fill text-danger"></i> by Diskominfo Dev Team <br>
            &copy; {{ date('Y') }}
        </div>
    </div>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>
