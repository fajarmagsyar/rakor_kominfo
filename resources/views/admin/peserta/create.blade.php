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

                        <form action="/admin/kegiatan" class="parsley-examples" id="form-valid-parsley" method="post"
                            enctype="multipart/form-data">
                            @method('post')
                            @csrf

                            <div class="row">



                                <div class="mb-3">
                                    <label for="userName" class="form-label">Nama Peserta
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_peserta" parsley-trigger="change" required
                                        placeholder="Masukkan Nama Peserta "
                                        class="form-control @error('nama_peserta') is-invalid @enderror" id="userName"
                                        value="{{ old('nama_peserta') }}" />
                                    @error('nama_peserta')
                                        <div id="nama_peserta" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan Peserta
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="jabatan" parsley-trigger="change" required
                                        placeholder="Masukkan jabatan Peserta"
                                        class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                        value="{{ old('jabatan') }}" />
                                    @error('jabatan')
                                        <div id="jabatan" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label for="userName" class="form-label">Email
                                        <span class="text-danger">*</span></label>
                                    <input type="email" name="email" parsley-trigger="change" required
                                     placeholder="Masukkan Email Peserta "
                                        class="form-control @error('email') is-invalid @enderror" id="userName"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                        <div id="email" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>




                                <div class="mb-3">
                                    <label for="userName" class="form-label">Asal
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="asal" parsley-trigger="change" required
                                    placeholder="Masukkan Asal Peserta "
                                        class="form-control @error('asal') is-invalid @enderror" id="userName"
                                        value="{{ old('asal') }}" />
                                    @error('asal')
                                        <div id="asal" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="userName" class="form-label">No.handphone
                                        <span class="text-danger">*</span></label>
                                    <input type="number" name="number" parsley-trigger="change" required
                                    placeholder="Masukkan No.handphone Peserta "
                                        class="form-control @error('number') is-invalid @enderror" id="userName"
                                        value="{{ old('number') }}" />
                                    @error('number')
                                        <div id="number" class="invalid-feedback">
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
