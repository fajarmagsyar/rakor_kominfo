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
                            <a href="/admin/peserta/create" class="btn btn-outline-primary mx-4 float-end">Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Email</th>
                                    <th>HP</th>
                                    <th>asal</th>
                                    <th>Qr</th>
                                    <th></th>
                                </tr>
                                @if (count($pesertaRows) > 0)
                                @foreach ($pesertaRows as $key => $k)
                                <tr>
                                    <td>{{ $key = $key + 1 }}</td>
                                    <td>{{ $k->nama }}</td>
                                    <td>{{$k->jabatan}}</td>
                                    <td>{{ $k->email }}</td>
                                    <td>{{ $k->hp }}</td>
                                    <td>{{ $k->asal }}</td>
                                    <td> {!! QrCode::color(255, 0, 0)->generate(" $k->user_id "); !!}
                                        <form class="form-horizontal"
                                            action="{{ route('qrcode.download',['type' => 'jpg'])}}" method="post">
                                            @csrf
                                            <input type='hidden' value="jpg" name="qr_type" />
                                            <input type='hidden' value="{{ 'jpg' }}" name="section" />
                                            <button type="submit"
                                                class="align-middle btn btn-outline-primary btn-sm ml-1">
                                                <i class="fas fa-fw fa-download"></i>
                                                JPG
                                            </button>
                                        </form>

                                                </td>
                                                <td>
                                                    <a href="/admin/cetak-peserta/pdf/{{ $k->user_id }}"
                                                        class="btn btn-sm btn-outline-info w-100">
                                                        ID Card &nbsp;&nbsp; <i class="fa fa-download"
                                                            aria-hidden="true"></i></a>
                                                    <form action="/admin/peserta/{{ $k->user_id }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="/admin/peserta/{{ $k->user_id }}/edit"
                                                            class="btn btn-primary btn-sm w-50"><i
                                                                class="fa fa-pencil-square" aria-hidden="true"></i></a>
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
</div>
@endsection
