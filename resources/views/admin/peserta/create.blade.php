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

                        <form action="/admin/peserta" class="parsley-examples" id="form-valid-parsley" method="post"
                            enctype="multipart/form-data">
                            @method('post')
                            @csrf

                            <div class="row">



                                <div class="mb-3">
                                    <label for="userName" class="form-label">Nama Peserta
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" parsley-trigger="change" required
                                        placeholder="Masukkan Peserta"
                                        class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        value="{{ old('nama') }}" />
                                    @error('nama')
                                        <div id="nama" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label for="userName" class="form-label">Email
                                        <span class="text-danger">*</span></label>
                                    <input type="email" name="email" parsley-trigger="change" required
                                    placeholder="Masukkan Email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
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
                                        placeholder="Masukkan asal peserta"
                                        class="form-control @error('asal') is-invalid @enderror" id="asal"
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
                                        <input type="number" name="hp" parsley-trigger="change" required
                                        placeholder="Masukkan no.handphone"
                                        class="form-control @error('hp') is-invalid @enderror" id="hp"
                                        value="{{ old('hp') }}" />
                                        @error('hp')
                                        <div id="hp" class="invalid-feedback">
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
