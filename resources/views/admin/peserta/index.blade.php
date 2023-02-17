@extends('admin.layouts.main')
@section('isi')
    @if (session()->has('success'))
        <script>
            Swal.fire(
                'Berhasil', {
                    {
                        session('success')
                    }
                },
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
                            <h4 class="mb-2 ml-2">Data Peserta</h4>
                            <a href="/admin/peserta/create" class="btn btn-outline-primary mx-4 float-end">+Tambah</a>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Jabatan</th>
                                        <th>Email</th>
                                        <th>HP</th>
                                        <th>Asal</th>
                                        <th>Harapan</th>
                                        <th>Foto</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($pesertaRows) > 0)
                                        @foreach ($pesertaRows as $key => $k)
                                            <tr>
                                                <td>{{ $key = $key + 1 }}</td>
                                                <td>{{ $k->nama }}</td>
                                                <td>{{ $k->kategori }}</td>
                                                <td>{{ $k->jabatan }}</td>
                                                <td>{{ $k->email }}</td>
                                                <td>{{ $k->hp }}</td>
                                                <td>{{ $k->asal }}</td>
                                                <td>{{ $k->harapan }}</td>
                                                <td><a target="_blank" href="/{{ $k->foto }}"><img
                                                            src="/{{ $k->foto }}" width="100px" alt=""></a>
                                                </td>
                                                </td>
                                                <td>
                                                    <a href="/admin/cetak-peserta/pdf/{{ $k->user_id }}"
                                                        class="btn btn-sm btn-outline-info w-100">
                                                        ID Card &nbsp;&nbsp; <i class="fa fa-download"
                                                            aria-hidden="true"></i></a>
                                                    <form action="/admin/peserta/{{ $k->user_id }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="/registrasi{{ $k->kategori == 'Panitia' ? '-panitia' : '' }}/edit/{{ $k->user_id }}"
                                                            class="btn btn-primary btn-sm w-50"><i class="fa fa-pencil"
                                                                aria-hidden="true"></i></a>
                                                        <button onclick="return confirm('Yakin?')" type="submit"
                                                            class="btn btn-danger btn-sm w-50"><i class="fa fa-trash-o"
                                                                aria-hidden="true"></i></button>
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
