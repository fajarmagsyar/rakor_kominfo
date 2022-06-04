@extends('admin.layouts.main')
@section('isi')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ $pageTitle }}</h4>
                        <p class="text-muted font-14">
                            Pastikan data yang telah anda input benar dan sesuai dengan format yang tertera.
                        </p>
                        <form action="/admin/peserta/{{ $peserta->user_id }}" class="parsley-examples"
                            id="form-valid-parsley" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" value="{{ $peserta->user_id }}" name="kegiatan_id">


                            <div class="row">



                                <div class="mb-3">
                                    <label for="userName" class="form-label">Nama Kegiatan
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_kegiatan" parsley-trigger="change" required
                                        value="{{$peserta->nama}}"
                                        class="form-control @error('nama_kegiatan') is-invalid @enderror" id="userName"
                                        value="{{ old('nama_kegiatan', $peserta->nama) }}" />
                                    @error('nama_kegiatan')
                                        <div id="nama_kegiatan" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label for="userName" class="form-label">Email
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_kegiatan" parsley-trigger="change" required
                                        value="{{$peserta->email}}"
                                        class="form-control @error('nama_kegiatan') is-invalid @enderror" id="userName"
                                        value="{{ old('nama_kegiatan', $peserta->nama) }}" />
                                    @error('nama_kegiatan')
                                        <div id="nama_kegiatan" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>




                                <div class="mb-3">
                                    <label for="userName" class="form-label">Asal
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_kegiatan" parsley-trigger="change" required
                                        value="{{$peserta->asal}}"
                                        class="form-control @error('nama_kegiatan') is-invalid @enderror" id="userName"
                                        value="{{ old('nama_kegiatan', $peserta->asal) }}" />
                                    @error('nama_kegiatan')
                                        <div id="nama_kegiatan" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="userName" class="form-label">hp
                                        <span class="text-danger">*</span></label>
                                    <input type="number" name="nama_kegiatan" parsley-trigger="change" required
                                        value="{{$peserta->hp}}"
                                        class="form-control @error('nama_kegiatan') is-invalid @enderror" id="userName"
                                        value="{{ old('nama_kegiatan', $peserta->hp) }}" />
                                    @error('nama_kegiatan')
                                        <div id="nama_kegiatan" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit"><i
                                            class="mdi mdi-pencil-box"></i> Simpan</button>
                                    <button type="reset" class="btn btn-secondary waves-effect"><i
                                            class="mdi mdi-repeat"></i> Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- end card -->
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
