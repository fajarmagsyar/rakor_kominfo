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
                                <a class="btn btn-outline-primary" href="/admin/kegiatan/create">Tambah</a>
                            </div>


                            <h4 class="mt-0 header-title">{{ $pageTitle }}</h4>
                            <p class="text-muted font-14 mb-3">
                                Olah {{ $pageTitle }}.
                            </p>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Deskripsi Kegiatan</th>
                                            <th>Koordinat</th>
                                            <th>Deskripsi</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($kegiatanRows) < 1) <tr>
                                            <td colspan="10" class="text-center">Data belum ada, silahkan
                                                tambah
                                                data</td>
                                            </tr>
                                            @else
                                            @foreach ($kegiatanRows as $key => $r)
                                            <tr>
                                                <th class="align-middle text-center" scope="row">
                                                    {{ $key = $key + 1 }}
                                                </th>
                                                <td>
                                                    <ol class="list-group list-group">
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><i class="ni ni-badge"></i> Nama
                                                                    Kegiatan
                                                                </div>
                                                                <span
                                                                    class="text-sm text-muted">{{ $r->nama_kegiatan }}</span>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><i class="ni ni-pin-3"></i> Lokasi
                                                                </div>
                                                                <span class="text-sm text-muted">{{ $r->lokasi }}</span>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><i
                                                                        class="ni ni-calendar-grid-58"></i> Tanggal
                                                                </div>
                                                                <span
                                                                    class="text-sm text-muted">{{ $r->tanggal }}</span>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><i class="ni ni-watch-time"></i>
                                                                    Waktu</div>
                                                                <span class="text-sm text-muted">Mulai
                                                                    :{{ $r->jam_masuk }}
                                                                </span> <br>
                                                                <span class="text-sm text-muted">Selesai
                                                                    :{{ $r->jam_keluar }}
                                                                </span>
                                                            </div>
                                                        </li>
                                                    </ol>
                                                </td>
                                                <td>
                                                    @php
                                                    $longlatPecah = explode('|', $r->long_lat);
                                                    @endphp
                                                    <ol class="list-group list-group">
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold">Longitude</div>
                                                                <span
                                                                    class="text-sm text-muted">{{ $longlatPecah[0] }}</span>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold">Latiude</div>
                                                                <span
                                                                    class="text-sm text-muted">{{ $longlatPecah[1] }}</span>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><a href="maps.google.com"><i
                                                                            class="ni ni-square-pin"></i> Lihat
                                                                        Map</a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ol class="list-group list-group">
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><i class="ni ni-single-02"></i>
                                                                    Kuota
                                                                    {{ $r->kuota }} Orang</div>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><i class="ni ni-align-left-2"></i>
                                                                    Deskripsi
                                                                </div>
                                                                <span class="text-sm text-muted">
                                                                    {!! $r->deskripsi !!}
                                                                    <br>
                                                                    <a href="/admin/peserta-kegiatan/{{ $r->kegiatan_id }}"
                                                                        class="btn btn-primary mt-4"><i
                                                                            class="ni ni-circle-08"></i>
                                                                        Peserta</a>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    </ol>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <form action="/admin/kegiatan/{{ $r->kegiatan_id }}" method="post"
                                                        class="d-inline">
                                                        <a class="btn btn-sm btn-primary mb-2"
                                                            href=" /admin/kegiatan/{{ $r->kegiatan_id }}/edit"><i
                                                                class="ni ni-ruler-pencil"></i></a>
                                                        @csrf
                                                        @method('delete')

                                                        <input type="hidden" value="{{ $r->kegiatan_id }} "
                                                            name="kegiatan_id">
                                                        <button type="submit"
                                                            class="btn btn-sm  btn-danger mb-2 d-inline"
                                                            onclick="return confirm('Data ini akan dihapus. Lanjutkan?')"><i
                                                                class="ni ni-fat-remove"></i></i></button>
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