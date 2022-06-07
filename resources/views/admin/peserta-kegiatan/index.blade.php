@extends('admin.layouts.main')
@section('isi')
    @if (session()->has('success'))
        <script>
            Swal.fire(
                'Berhasil',
                {{ session('success') }},
                'success'
            )
        </script>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">

                        <div class="d-flex justify-content-between">
                            <h4 class="mb-2 ml-2">Peserta Kegiatan {{ $kegiatan->nama_kegiatan }}</h4>
                            <a href="/admin/peserta-kegiatan/create/{{ $kegiatan->kegiatan_id }}"
                                class="btn btn-outline-primary mx-4 float-end">+Tambah
                                Peserta</a>
                        </div>
                        <p class="text-sm text-center"><b>Terdaftar <span
                                    class="badge bg-primary text-white">{{ count($peserta) }}</span> peserta dari
                                <span class="badge bg-success text-white">{{ $kegiatan->kuota }}</span>
                                kuota</b></p>
                    </div>
                    <div class="p-4">
                        <div class="table-responsive">
                            <table class="table align-items-center ">
                                <tbody>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Asal</th>
                                        <th></th>
                                    </tr>
                                    @if (count($peserta) > 0)
                                        @foreach ($peserta as $key => $r)
                                            <tr>
                                                <td>{{ $key = $key + 1 }}</td>
                                                <td>{{ $r->nama }}</td>
                                                <td>{{ $r->asal }}</td>
                                                <td>
                                                    <form
                                                        action="/admin/peserta-kegiatan/destroy/{{ $r->absen_id }}/{{ $kegiatan->kegiatan_id }}"
                                                        method="post">
                                                        @csrf
                                                        <button onclick="return confirm('Yakin?')" type="submit"
                                                            class="btn btn-danger"><i class="fa fa-pencil"git ></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">Data belum ada</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
