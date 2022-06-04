@extends('admin.layouts.main')
@section('isi')
    

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">ARTIKEL</h6>
                        </div>

                        <div class="float-end">
                            <a class="btn btn-sm btn-outline-success" href="/admin/asset/create">+
                                TAMBAH</a>
                                 <a href="admin/asset/ubah" class="btn btn-sm btn-outline-info"><i class="fa fa-pencil"></i>
                                    UBAH</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Nama </p>
                                            <h6 class="text-sm mb-0">Ini ISI</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Isi </p>
                                            <h6 class="text-sm mb-0">Ini ISI</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Aksi </p>
                                            <h6 class="text-sm mb-0"><i class="fa fa-trash-o"></i>
                                            </h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                   
                                
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
        
@endsection
