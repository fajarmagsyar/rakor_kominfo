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
                                    <label for="userName" class="form-label">Nama Kegiatan
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_kegiatan" parsley-trigger="change" required
                                        placeholder="Masukkan Nama Kegiatan"
                                        class="form-control @error('nama_kegiatan') is-invalid @enderror" id="userName"
                                        value="{{ old('nama_kegiatan') }}" />
                                    @error('nama_kegiatan')
                                        <div id="nama_kegiatan" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label for="userName" class="form-label">Tanggal
                                        <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal" parsley-trigger="change" required
                                        class="form-control @error('tanggal') is-invalid @enderror" id="userName"
                                        value="{{ old('tanggal') }}" />
                                    @error('tanggal')
                                        <div id="tanggal" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>




                                <div class="mb-3">
                                    <label for="userName" class="form-label">Jam Masuk
                                        <span class="text-danger">*</span></label>
                                    <input type="time" name="jam_masuk" parsley-trigger="change" required
                                        class="form-control @error('jam_masuk') is-invalid @enderror" id="userName"
                                        value="{{ old('jam_masuk') }}" />
                                    @error('jam_masuk')
                                        <div id="jam_masuk" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>




                                <div class="mb-3">
                                    <label for="userName" class="form-label">Jam Keluar
                                        <span class="text-danger">*</span></label>
                                    <input type="time" name="jam_keluar" parsley-trigger="change" required
                                        class="form-control @error('jam_keluar') is-invalid @enderror" id="userName"
                                        value="{{ old('jam_keluar') }}" />
                                    @error('jam_keluar')
                                        <div id="jam_keluar" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="userName" class="form-label">Kuota
                                        <span class="text-danger">*</span></label>
                                    <input type="number" name="kuota" parsley-trigger="change" required
                                        placeholder="Masukkan Jumlah Kuota"
                                        class="form-control @error('kuota') is-invalid @enderror" id="userName"
                                        value="{{ old('kuota') }}" />
                                    @error('kuota')
                                        <div id="kuota" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>




                                <div class="mb-3">
                                    <label for="userName" class="form-label">Koordinat
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="long_lat" parsley-trigger="change" required
                                        placeholder="Masukkan Koordinat"
                                        class="form-control @error('long_lat') is-invalid @enderror" id="userName"
                                        value="{{ old('long_lat') }}" />
                                    @error('long_lat')
                                        <div id="long_lat" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>





                                <div class="mb-3">
                                    <label for="userName" class="form-label">Lokasi
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="lokasi" parsley-trigger="change" required
                                        placeholder="Masukkan Lokasi"
                                        class="form-control @error('lokasi') is-invalid @enderror" id="userName"
                                        value="{{ old('lokasi') }}" />
                                    @error('lokasi')
                                        <div id="lokasi" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label for="userName" class="form-label">Deskripsi
                                        <span class="text-danger">*</span></label>
                                    <textarea placeholder="Masukan Deskripsi" name="deskripsi" value="{{ old('deskripsi') }}"
                                        class="form-control @error('deskripsi') is-invalid @enderror"
                                        id="">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div id="deskripsi" class="invalid-feedback">
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
