@extends('admin.layouts.main')
@section('isi')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0"><b>Edit Peserta</b></p>
                        </div>
                    </div>
                    <form action="/admin/peserta/{{ $peserta->user_id }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="card-body">
                            <p class="text-sm">Isikan detail peserta dengan benar</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" required
                                            value="{{ $peserta->nama }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email</label>
                                        <input type="text" name="email" class="form-control" required
                                            value="{{ $peserta->email }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Asal</label>
                                        <input type="text" name="asal" class="form-control" required
                                            value="{{ $peserta->asal }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">No. HP</label>
                                        <input type="number" name="no_hp" placeholder="081XXXXXXXXXX" class="form-control"
                                            required value="{{ $peserta->hp }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control" required
                                            value="{{ $peserta->jabatan }}">
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
