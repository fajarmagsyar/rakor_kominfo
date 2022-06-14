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
                            <h4 class="mb-2 ml-2">Data Galeri</h4>
                            <a href="/admin/galeri/create" class="btn btn-outline-primary mx-4 float-end">+Tambah</a>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="table-responsive">
                            <table class="table align-items-center ">
                                <tbody>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Foto</th>
                                        <th></th>
                                    </tr>

                                    @forelse ( $galeri as $key => $galeris)
                                    <tr>
                                        <td>{{ $key = $key + 1 }}</td>
                                        <td>{{ $galeris ->kategori }}</td>
                                        <td> <img src="{{ $galeris->foto }}" width="100px"></td>
                                        </td>
                                        <td class="text-center align-middle">
                                            <form action="/admin/galeri/{{ $galeris->galeri_id }}"
                                                method="post" class="d-inline">
                                                <a class="btn btn-sm btn-primary mb-2"
                                                    href=" /admin/galeri/{{ $galeris->galeri_id }}/edit"><i
                                                        class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>

                                                @csrf
                                                @method('delete')

                                                <input type="hidden" value="{{ $galeris->galeri_id }} "
                                                    name="galeri_id">
                                                <button type="submit"
                                                    class="btn btn-sm  btn-danger mb-2 d-inline"
                                                    onclick="return confirm('Data ini akan dihapus. Lanjutkan?')"><i
                                                        class="fa fa-trash-o"
                                                        aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data belum ada</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
