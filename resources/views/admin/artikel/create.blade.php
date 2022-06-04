@extends('admin.layouts.main')
@section('isi')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0"><b>UBAH ARTIKEL</b></p>
                        </div>
                    </div>
                    <form action="/admin/artikel" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <input type="hidden" value="{{ $ArtikelRows-artikel_id }}" name="artikel_id">
                        <div class="card-body">
                            <p class="text-uppercase text-sm">ARTIKEL</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Visi</label>
                                        <textarea name="visi" required>
                                            <?php
                                            echo $ArtikelRows->visi;
                                            ?>
                                         </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Misi</label>
                                        <textarea name="misi" required>
                                            <?php
                                            echo $ArtikelRows->;
                                            ?>
                                     </textarea>
                                    </div>
                                </div>
                            </div>
                            <p class="text-uppercase text-sm">ARTIKEL</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama</label>
                                        <input class="form-control" type="text" name="nama"
                                            value="{{ $ArtikelRows->nama }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Sejarah</label>
                                        <textarea name="sejarah" value="{{ $ArtikelRows->sejarah }}" required>
                                            <?php
                                            echo $ArtikelRows->sejarah;
                                            ?>
                                         </textarea>
                                    </div>
                                </div>
                            </div>
                            <p class="text-uppercase text-sm">Struktur Organisasi</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Upload foto struktur
                                            (*file
                                            .jpg, .png dibawah 2MB)</label>
                                        <input class="form-control" type="file" name="struktur" required>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm ms-auto float-end mb-3" type="submit"><i
                                    class="ni ni-fat-add"></i>
                                Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
