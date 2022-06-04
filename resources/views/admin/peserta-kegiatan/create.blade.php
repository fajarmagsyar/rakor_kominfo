@extends('admin.layouts.main')
@section('isi')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0"><b>Tambah Peserta Kegiatan {{ $kegiatan->nama_kegiatan }}</b></p>
                        </div>
                    </div>
                    <form action="/admin/peserta-kegiatan/store" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->kegiatan_id }}">
                        <div class="card-body">
                            <p class="text-sm">Pilih User</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama</label>
                                        <select name="user_id" id="" class="form-select">
                                            @if (count($peserta) < 1)
                                                <option selected disabled>Tidak ada pilihan</option>
                                            @else
                                                @foreach ($peserta as $r)
                                                    <option value="{{ $r->user_id }}">{{ $r->nama }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Kegiatan</label>
                                        <input readonly disabled value="{{ $kegiatan->nama_kegiatan }}"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-sm ms-auto float-end mb-3 mr-4" type="submit">
                                <i class="ni ni-fat-add"></i>
                                Simpan
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
