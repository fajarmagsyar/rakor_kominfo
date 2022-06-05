<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
        padding: 40px 0;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        grid-gap: 20px;
        align-items: stretch;
    }

    .grid>article {
        border: 1px solid #ccc;
        box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
    }

    .grid>article img {
        max-width: 100%;
    }

    .grid .text {
        padding: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        @foreach ($rowspeserta as $key => $k)
        <main class="grid">
            <article>
                {!! QrCode::errorCorrection('L')->color(75, 93,
                234)->style('round')->eye('circle')->generate('http://' .
                $_SERVER['SERVER_NAME'] . '/scan/apeksi22/absen/' . $k->user_id) !!}
                <div class="text">
                    <h3>{{ $k->nama }}</h3>
                    <p>{{ $k->email }}</p>

                </div>
            </article>
        </main>
        @endforeach
    </div>

    <!-- <table style="width:100%;" border="1" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>HP</th>
                <th>Asal</th>
                <th class="text-center">Qr</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp

            <tr>
                <td>{{ $key = $key + 1 }}</td>
                <td></td>
                <td></td>
                <td>{{ $k->hp }}</td>
                <td>{{ $k->asal }}</td>
                <td class="text-center">
                    <form class="form-horizontal" action="{{ route('qrcode.download', ['type' => 'jpg']) }}"
                        method="post">
                        @csrf
                        <input type='hidden' value="jpg" name="qr_type" />
                        <input type='hidden' value="{{ 'jpg' }}" name="section" />
                        {{-- <button type="submit"
                                                            class="align-middle btn btn-outline-primary btn-sm ml-1">
                                                            <i class="fas fa-fw fa-download"></i>
                                                            JPG
                                                        </button> --}}
                    </form>

                </td>
            </tr>

        </tbody>
    </table> -->
</body>

</html>