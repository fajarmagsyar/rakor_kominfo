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

                    <form action="/admin/artikel" class="parsley-examples" id="form-valid-parsley" method="post"
                        enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Nama <span class="text-danger">*</span></label>
                                <select class="form-select @error('user_id') is-invalid @enderror"
                                    value="{{old('user_id')}}" aria-label="unit kerja" id="user_id" name="user_id">
                                    <option value="">Pilih Nama</option>
                                    @foreach ($rowsArtikel as $d)
                                    <option {{old('user_id')==$d['user_id'] ? 'selected' : '' }}
                                        value="{{ $d['user_id'] }}">
                                        {{ $d['nama'] }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div id="user_id" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="userName" class="form-label">Isi
                                    <span class="text-danger">*</span></label>
                                <textarea placeholder="Masukan isi" name="isi" value="{{ old('isi') }}"
                                    class="form-control @error('isi') is-invalid @enderror"
                                    id="">{{ old('isi') }}</textarea>
                                @error('isi')
                                <div id="isi" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="userName" class="form-label">link
                                    <span class="text-danger">*</span></label>
                                <input type="text" name="link" parsley-trigger="change" placeholder="Masukkan Link"
                                    class="form-control @error('link') is-invalid @enderror" id="link"
                                    value="{{ old('link') }}" />
                                @error('link')
                                <div id="link" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                @error('link')
                                <div id="link" class="invalid-feedback">
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