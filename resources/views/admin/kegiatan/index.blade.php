@extends('admin.layouts.main')
@section('isi')
    @if (session()->has('success'))
        <div class="toast-container" style="position: absolute; bottom: 80px; right: 10px; z-index: 999">
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-toggle="toast">
                <div class="toast-header">
                    <img src="/admin/assets/img/apeksi.png" alt="brand-logo" height="12" class="me-1" />
                    <strong class="me-auto">APEKSI</strong>
                    <small>Sukses</small>
                    <button type="button" class="btn-close ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="float-end">
                                    <a class="btn btn-sm btn-outline-success" href="/admin/kegiatan/create">+
                                        TAMBAH</a>
                                    <a href="/admin/cetak-kegiatan/pdf" class="btn btn-sm btn-outline-info"><i
                                            class="mdi mdi-printer"></i>
                                        Cetak
                                        Laporan</a>
                                </div>


                                <h4 class="mt-0 header-title">{{ $pageTitle }}</h4>
                                <p class="text-muted font-14 mb-3">
                                    Olah {{ $pageTitle }}.
                                </p>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Jam Keluar</th>
                                                <th>Kuota</th>
                                                <th>Lokasi</th>
                                                <th>Koordinat</th>
                                                <th>Deskripsi</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($kegiatanRows) < 1)
                                                <tr>
                                                    <td colspan="10" class="text-center">Data belum ada, silahkan
                                                        tambah
                                                        data</td>
                                                </tr>
                                            @else
                                                @foreach ($kegiatanRows as $key => $r)
                                                    <tr>
                                                        <th class="align-middle" scope="row">
                                                            {{ $key = $key + 1 }}
                                                        </th>



                                                        <td class="align-middle">
                                                            {{ $r->nama_kegiatan }}
                                                        </td>

                                                        <td class="align-middle">
                                                            {{ $r->tanggal }}
                                                        </td>

                                                        <td class="align-middle">
                                                            {{ $r->jam_masuk }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $r->jam_keluar }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $r->kuota }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $r->lokasi }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $r->long_lat }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $r->deskripsi }}
                                                        </td>


                                                        <td class="text-center align-middle">
                                                            <form action="/admin/kegiatan/{{ $r->kegiatan_id }}"
                                                                method="post" class="d-inline">
                                                                <a class="btn btn-sm btn-warning mb-2"
                                                                    href=" /admin/kegiatan/{{ $r->kegiatan_id }}/edit"><i
                                                                        class="mdi mdi-pencil"></i></a>
                                                                @csrf
                                                                @method('delete')

                                                                <input type="hidden" value="{{ $r->kegiatan_id }} "
                                                                    name="kegiatan_id">


                                                                <button type="submit"
                                                                    class="btn btn-sm  btn-danger mb-2 d-inline"
                                                                    onclick="return confirm('Data ini akan dihapus. Lanjutkan?')"><i
                                                                        class="mdi mdi-delete"></i></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- end row -->

                        </div> <!-- container-fluid -->

                    </div> <!-- content -->

                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $(".parsley-examples").parsley()
        }), $(function() {
            $("#demo-form").parsley().on("field:validated", function() {
                var e = 0 === $(".parsley-error").length;
                $(".alert-info").toggleClass("d-none", !e), $(".alert-warning").toggleClass("d-none", e)
            }).on("form:submit", function() {
                return !1
            })
        });
    </script>
@endsection
