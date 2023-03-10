@extends('admin.layouts.main')
@section('isi')
    @if (session()->has('success'))
        <div class="toast-container" style="position: absolute; bottom: 80px; right: 10px; z-index: 999">
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-toggle="toast">
                <div class="toast-header">
                    <img src="/admin/assets/img/apeksi.png" alt="brand-logo" height="12" class="me-1" />
                    <strong class="me-auto">RAKOR KOMINFO</strong>
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
                                    <a class="btn btn-sm btn-outline-success" href="/admin/fasilitas/create">+
                                        TAMBAH</a>
                                </div>


                                <h4 class="mt-0 header-title">{{ $pageTitle }}</h4>
                                <p class="text-muted font-14 mb-3">
                                    Olah {{ $pageTitle }}.
                                </p>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kategori</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>Lokasi</th>
                                                <th>Koordinat</th>
                                                <th>Foto</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($fasilitasRows) < 1)
                                                <tr>
                                                    <td colspan="10" class="text-center">Data belum ada, silahkan
                                                        tambah
                                                        data</td>
                                                </tr>
                                            @else
                                                @foreach ($fasilitasRows as $key => $r)
                                                    @php
                                                        $m = explode('|', $r->long_lat);
                                                    @endphp
                                                    <tr>
                                                        <th scope="row" class="text-center">
                                                            {{ $key = $key + 1 }}
                                                        </th>



                                                        <td>
                                                            {{ $r->kategori }}
                                                        </td>
                                                        <td>
                                                            {{ $r->nama_fasilitas }}
                                                        </td>
                                                        <td>
                                                            {!! substr($r->deskripsi, 0, 50) !!}...

                                                        </td>
                                                        <td>
                                                            {{ $r->lokasi }}
                                                        </td>
                                                        <td>
                                                            Long: {{ $m[0] }} <br>
                                                            Lat: {{ $m[1] }}
                                                        </td>
                                                        <td>
                                                            <img src="{{ $r->foto }}" width="100px">
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <form action="/admin/fasilitas/{{ $r->fasilitas_id }}"
                                                                method="post" class="d-inline">
                                                                <a class="btn btn-sm btn-primary mb-2"
                                                                    href=" /admin/fasilitas/{{ $r->fasilitas_id }}/edit"><i
                                                                        class="fa fa-pencil" aria-hidden="true"></i>
                                                                </a>
                                                                @csrf
                                                                @method('delete')

                                                                <input type="hidden" value="{{ $r->fasilitas_id }} "
                                                                    name="fasilitas_id">
                                                                <button type="submit"
                                                                    class="btn btn-sm  btn-danger mb-2 d-inline"
                                                                    onclick="return confirm('Data ini akan dihapus. Lanjutkan?')"><i
                                                                        class="fa fa-trash-o"
                                                                        aria-hidden="true"></i></button>
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
