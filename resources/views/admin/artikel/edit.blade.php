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
                        <form action="/admin/artikel/{{ $data->artikel_id }}" class="parsley-examples"
                            id="form-valid-parsley" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" value="{{ $data->artikel_id }}" name="artikel_id">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="id_rayon" class="form-label">Nama <span
                                            class="text-danger">*</span></label>

                                    <select class="form-select" value="{{ $data['user_id'] }}"
                                        aria-label="user_id" name="user_id" id="user_id">

                                        @foreach ($rowsArtikel as $r)
                                        <option value="{{ $r['user_id'] }}"
                                            {{ $r->user_id == $data->user_id ? 'selected' : '' }}>
                                            {{ $r['nama'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Isi
                                        <span class="text-danger">*</span></label>
                                    <textarea placeholder="Masukan isi" name="isi"
                                        value="{{ old('isi') }}"
                                        class="form-control @error('isi') is-invalid @enderror"
                                        id="">{{ old('isi', $data->isi) }}</textarea>
                                    @error('isi')
                                    <div id="isi" class="invalid-feedback">
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

