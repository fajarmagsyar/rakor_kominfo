@extends('home.layouts.main')
@section('isi')
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
            </div>
            <div class="row gy-5">
                <div class="col-xl-2 col-md-2" style="padding-top: 130px;" data-aos="zoom-in">
                </div>

                <div class="col-xl-8 col-md-8" style="padding-top: 130px;" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item">
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-qr-code"></i>
                            </div>
                            <h3>Registrasi</h3>
                            <p class="text-muted font-14 fst-italic">
                                Pastikan data yang telah anda input benar dan sesuai dengan format yang tertera. <a
                                    href="/panduan-registrasi.jpg" target="_blank"><i>(Tata cara
                                        registrasi)</i></a>
                            </p>
                            <br>
                            <div style="text-align: left;">
                                <form action="/registrasi/edit/{{ $pesertaRow->user_id }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('post')
                                    @csrf
                                    <input type="hidden" name="user" value="user">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Kota Asal
                                                    <span class="text-danger">*</span></label>
                                                <select name="asal" class="form-select">
                                                    <option value="" selected disabled>- Pilih kota asal -</option>
                                                    @foreach ($kota as $r)
                                                        <option value="{{ $r }}"
                                                            {{ $pesertaRow->asal == $r ? 'selected' : '' }}>
                                                            {{ $r }}</option>
                                                    @endforeach
                                                </select>
                                                @error('asal')
                                                    <div id="asal" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Nama Peserta
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="nama" parsley-trigger="change"
                                                    placeholder="Nama Lengkap" required
                                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                    value="{{ old('nama', $pesertaRow->nama) }}" />
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
                                                    class="form-control @error('jabatan') is-invalid @enderror"
                                                    id="jabatan" value="{{ old('jabatan', $pesertaRow->jabatan) }}" />
                                                @error('jabatan')
                                                    <div id="jabatan" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Kategori Peserta
                                                    <span class="text-danger">*</span></label>
                                                <select name="kategori" class="form-select">
                                                    <option value="" selected disabled>- Pilih Kategori -</option>
                                                    @foreach ($kategori as $d)
                                                        <option value="{{ $d }}"
                                                            {{ $pesertaRow->kategori == $d ? 'selected' : '' }}>
                                                            {{ $d }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kategori')
                                                    <div id="kategori" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-sm-12 mx-auto">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Email
                                                    <span class="text-danger">*</span></label>
                                                <input type="email" name="email" parsley-trigger="change" required
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    value="{{ old('email', $pesertaRow->email) }}" />
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
                                                    value="{{ old('hp', $pesertaRow->hp) }}" />
                                                @error('hp')
                                                    <div id="hp" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <label for="test" class="text-muted text-sm">Contoh: 08xxxxxxxxxx12
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-sm-12 mx-auto">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Foto Anda
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" name="foto" required
                                                    class="form-control @error('foto') is-invalid @enderror"
                                                    id="foto" value="{{ old('foto', $pesertaRow->foto) }}"
                                                    accept=".jpg, .png" />
                                                @error('foto')
                                                    <div id="foto" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-sm-12 mx-auto">
                                            <div class="mb-3 mt-2">
                                                <label for="userName" class="form-label">Harapan Anda</label>
                                                <textarea type="number" name="harapan" parsley-trigger="change"
                                                    class="form-control @error('harapan') is-invalid @enderror" id="harapan">{{ old('harapan', $pesertaRow->harapan) }}</textarea>
                                                @error('harapan')
                                                    <div id="harapan" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <button class="btn waves-effect waves-light text-white"
                                                style="background-color: #3478c5"
                                                onClick="return confirm('Yakin data yang anda masukkan sudah benar?')"
                                                type="submit"><i class="bi bi-plus"></i> Ubah data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>
    </section><!-- End Services Section -->

    <script>
        $(".selector").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d h:i",
            time_24hr: true
        });
    </script>
@endsection
