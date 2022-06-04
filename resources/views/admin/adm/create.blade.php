@extends('admin.layouts.main')
@section('isi')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0"><b>Tambah Admin</b></p>
                        </div>
                    </div>
                    <form action="/admin/adm" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <p class="text-sm">Isikan detail admin dengan benar</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email</label>
                                        <input type="text" name="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">No. HP</label>
                                        <input type="number" name="no_hp" placeholder="081XXXXXXXXXX" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Password</label>
                                        <input type="password" name="password" class="form-control" required>
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
