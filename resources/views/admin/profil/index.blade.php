@extends('admin.layouts.main')
@section('isi')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Visi dan Misi</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 align-items-center">
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Visi:</p>
                                                <h6 class="text-sm mb-0"><?php
                                                echo $profilRow->visi;
                                                ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 align-items-center">
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Misi:</p>
                                                <h6 class="text-sm mb-0">
                                                    <?php
                                                    echo $profilRow->misi;
                                                    ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="/admin/profil/create" class="btn btn-outline-primary mx-4">Ubah profil website</a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Profil Website</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Nama</h6>
                                        <span class="text-xs">{{ $profilRow->nama }}</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Sejarah</h6>
                                        <span class="text-xs w-100"><?php
                                        echo $profilRow->sejarah;
                                        ?></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Struktur Organisasi</h6>
                        </div>
                    </div>
                    <div class="container mb-4">
                        <img src="{{ $profilRow->struktur }}" alt="" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
