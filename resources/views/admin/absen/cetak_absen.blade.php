


   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       @section('Judul','Laporan absen kegiatan')
   </head>
   <body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="col-sm-12">
                        <h4 class="page-title">Laporan Absen Kegiatan</h4>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" display table table-striped table-hover mb-0"  width="100%" cellpadding="10px" cellspacing="0px" border="0.5">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kegiatan</th>
                                                <th>Peserta</th>
                                                <th>Status Peserta</th>
                                                <th>Tanggal Dan waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($absenRows as $key => $r)
                                                    <tr>
                                                        <td  scope="row">
                                                            {{ $key = $key + 1 }}
                                                        </td>

                                                        <td class="text-center">
                                                            {{ $r->nama_kegiatan }}
                                                        </td>

                                                        <td>
                                                            {{ $r->nama }}
                                                        </td>


                                                        <td>
                                                            {{ $r->status_peserta }}
                                                        </td>
                                                        <td>
                                                            {{ $r->created_at }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </body>
   </html>




