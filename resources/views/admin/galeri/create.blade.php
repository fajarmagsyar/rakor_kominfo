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

                    <form action="/admin/galeri" class="parsley-examples" id="form-valid-parsley" method="post"
                        enctype="multipart/form-data">
                        @method('post')
                        @csrf

                        <div class="row">

                            <div class="mb-3">
                                <label for="userName" class="form-label">Kategori
                                    <span class="text-danger">*</span></label>
                                <select class="form-select @error('kategori') is-invalid @enderror"
                                    value="{{old('kategori')}}" aria-label="golongan darah" name="kategori"
                                    id="kategori">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($rowsKategori as $gd)
                                    <option {{old('kategori')==$gd ? 'selected' : '' }} value="{{ $gd }}">{{ $gd
                                        }}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                <div id="kategori" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="userName" class="form-label">Foto
                                    <span class="text-danger">*</span></label>
                                <input type="file" name="foto" parsley-trigger="change" required
                                    placeholder="Masukkan Foto" class="form-control @error('foto') is-invalid @enderror"
                                    id="userName" value="{{ old('foto') }}" />
                                @error('foto')
                                <div id="foto" class="invalid-feedback">
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
