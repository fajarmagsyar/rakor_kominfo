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


                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Nama Peserta
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="nama" parsley-trigger="change"
                                            placeholder="Nama Lengkap" required
                                            class="form-control @error('nama') is-invalid @enderror" id="nama"
                                            value="{{ old('nama') }}" />
                                        @error('nama')
                                            <div id="nama" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Jabatan
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="jabatan" parsley-trigger="change"
                                            placeholder="Jabatan anda saat ini" required
                                            class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                            value="{{ old('jabatan') }}" />
                                        @error('jabatan')
                                            <div id="jabatan" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input type="checkbox" name="pic" value="1"> Centang jika anda PIC dari
                                        Kota Tujuan anda.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Kota Asal
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="asal" parsley-trigger="change"
                                            placeholder="Kota asal anda" required
                                            class="form-control @error('asal') is-invalid @enderror" id="asal"
                                            value="{{ old('asal') }}" />
                                        @error('asal')
                                            <div id="asal" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12 mx-auto">
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Waktu Kedatangan
                                            <span class="text-danger">*</span></label>
                                        <input type="datetime-local" name="datang" parsley-trigger="change" required
                                            class="form-control selector @error('datang') is-invalid @enderror"
                                            id="datang" value="{{ old('datang') }}" />
                                        @error('datang')
                                            <div id="datang" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12 mx-auto">
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Waktu Kepulangan
                                            <span class="text-danger">*</span></label>
                                        <input type="datetime-local" name="pergi" parsley-trigger="change" minlength="12"
                                            maxlength="12" required
                                            class="form-control selector @error('pergi') is-invalid @enderror"
                                            id="pergi" value="{{ old('pergi') }}" />
                                        @error('pergi')
                                            <div id="pergi" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 mx-auto">
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Maskapai Penerbangan
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="maskapai" parsley-trigger="change" required
                                            placeholder="Nama Maskapai/No. Penerbangan"
                                            class="form-control @error('maskapai') is-invalid @enderror" id="maskapai"
                                            value="{{ old('maskapai') }}" />
                                        @error('maskapai')
                                            <div id="maskapai" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="" class="text-muted text-sm">Contoh: LION/JT-609</label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12 mx-auto">
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Email
                                            <span class="text-danger">*</span></label>
                                        <input type="email" name="email" parsley-trigger="change" required
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            value="{{ old('email') }}" />
                                        @error('email')
                                            <div id="email" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 mx-auto">
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">No.handphone
                                            <span class="text-danger">*</span></label>
                                        <input type="number" name="hp" parsley-trigger="change" required
                                            class="form-control @error('hp') is-invalid @enderror" id="hp"
                                            value="{{ old('hp') }}" />
                                        @error('hp')
                                            <div id="hp" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="test" class="text-muted text-sm">Contoh: 08xxxxxxxxxx12 </label>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button class="btn waves-effect waves-light text-white"
                                        style="background-color: #0ea2bd"
                                        onClick="return confirm('Yakin data yang anda masukkan sudah benar?')"
                                        type="submit"><i class="bi bi-plus"></i> Registrasi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- end card -->
            </div>
        </div>

    </div>
    <script>
        $(".selector").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d h:i",
            time_24hr: true
        });
    </script>
@endsection
