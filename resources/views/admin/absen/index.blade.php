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
                        <div class="dropdown">
                            <button class="btn btn-succes btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Dropdown button
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="/admin/cetak-absen/pdf">Cetak</a></li>
                            @forelse ( $absenRows as $key => $r )
                            <li><a class="dropdown-item" href="/admin/cetak-absenp/pdf{{ $r -> id_kegitan }}">{{ $r -> nama_kegiatan }}</a></li>
                            @empty
                            @endforelse
                            </ul>
                          </div>
                    </div>

                    <h4 class="mt-0 header-title">{{ $pageTitle }}</h4>
                    <p class="text-muted font-14 mb-3">
                        Olah {{ $pageTitle }}.
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Kegiatan</th>
                                    <th class="text-center">Peserta</th>
                                    <th class="text-center">Status Peserta</th>
                                    <th class="text-center">Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($absenRows) < 1)
                                    <tr>
                                        <td colspan="10" class="text-center">Data belum ada, silahkan
                                            tambah
                                            data</td>
                                    </tr>
                                @else
                                    @foreach ($absenRows as $key => $r)
                                        <tr>
                                            <th class="align-middle text-center" scope="row">
                                                {{ $key = $key + 1 }}
                                            </th>
                                            <td class="align-middle  text-cente">
                                                {{ $r->nama_kegiatan }}
                                            </td>

                                            <td class="align-middle  text-cente">
                                                {{ $r->nama }}
                                            </td>

                                            <td class="align-middle  text-cente">
                                                {{ $r->status_peserta }}
                                            </td>
                                            <td class="align-middle  text-cente">
                                                {{ $r->created_at }}
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
