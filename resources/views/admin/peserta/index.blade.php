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
                            <h4 class="mb-2 ml-2">Data Peserta</h4>
                            <a href="/admin/peserta/create" class="btn btn-outline-primary mx-4 float-end">Tambah</a>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="table-responsive">
                            <table class="table align-items-center ">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>HP</th>
                                        <th>asal</th>
                                        <th></th>
                                    </tr>
                                    @if (count($pesertaRows) > 0)
                                        @foreach ($pesertaRows as $key => $k)
                                            <tr>
                                                <td>{{ $key = $key + 1 }}</td>
                                                <td>{{ $k->nama }}</td>
                                                <td>{{ $k->email }}</td>
                                                <td>{{ $k->hp }}</td>
                                                <td>{{ $k->asal }}</td>
                                                <td>
                                                    <form action="/admin/peserta/{{ $k->user_id }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="/admin/peserta/{{ $k->user_id }}/edit"
                                                            class="btn btn-primary btn-sm"><i
                                                                class="ni ni-ruler-pencil"></i></a>
                                                        <button onclick="return confirm('Yakin?')" type="submit"
                                                            class="btn btn-danger btn-sm"><i
                                                                class="ni ni-fat-remove"></i></button>
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
