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
                    <form action="/admin/fasilitas/{{ $data->fasilitas_id }}" class="parsley-examples"
                        id="form-valid-parsley" method="post" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" value="{{ $data->fasilitas_id }}" name="fasilitas_id">


                        <div class="row">



                            <div class="mb-3">
                                <label for="userName" class="form-label">Kategori
                                    <span class="text-danger">*</span></label>
                                <select name="kategori" id=""
                                    class="form-control @error('kategori') is-invalid @enderror"
                                    value="{{ old('kategori', $data['kategori']) }}" aria-label="badan unit"
                                    name="kategori" id="kategori">
                                    @error('kategori')
                                    <div id="kategori" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <option value="">Pilih Badan Unit</option>
                                    @foreach($rowsKategori as $gd)
                                    <option {{old('kategori', $data['kategori'])==$gd ? 'selected' : '' }}
                                        value="{{ $gd }}">{{ $gd }}</option>
                                    @endforeach
                                </select>
                                @error('nama_kegiatan')
                                <div id="nama_kegiatan" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label for="userName" class="form-label">Nama Fasilitas
                                    <span class="text-danger">*</span></label>
                                <input type="text" name="fasilitas" parsley-trigger="change" required
                                    class="form-control @error('fasilitas') is-invalid @enderror" id="userName"
                                    value="{{ old('fasilitas', $data->nama_fasilitas) }}" />
                                @error('fasilitas')
                                <div id="fasilitas" class="invalid-feedback">
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
                                    value="{{ old('long_lat', $data->long_lat) }}" />
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
                                    value="{{ old('lokasi', $data->lokasi) }}" />
                                @error('lokasi')
                                <div id="lokasi" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="userName" class="form-label">Deskripsi
                                    <span class="text-danger">*</span></label>
                                <textarea placeholder="Masukan Deskripsi" name="deskripsi"
                                    value="{{ old('deskripsi', $data->deskripsi) }}"
                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                    id="">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                                @error('deskripsi')
                                <div id="deskripsi" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <label for="foto" class="form-label">Foto Kegiatan (Format: JPG
                                Maksimal 1Mb)
                                <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                    value="{{ old('foto') }}" id="foto" accept=".jpg" name="foto">
                                <label class="input-group-text" for="foto">Upload</label>
                                @error('foto')
                                <div id="foto" class="invalid-feedback">
                                    {{$message}}
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