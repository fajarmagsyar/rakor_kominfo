<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @page {
            size: 300px 500px;
            margin: 0;
        }

        body {}

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

        .container {
            width: 300px;
            height: 500px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 5px 10px;
        }

        .qr-code {
            margin-top: 90px;
        }

        .title {
            color: rgb(70, 92, 172);
            opacity: 1;
            margin-top: 18px;
            font-weight: bolder;
        }

        .subtitle {
            color: rgb(0, 0, 0, 0.5);
            opacity: 1;
            margin-top: 0px;
            font-size: 11px
        }

        .table {
            color: black;
            opacity: 0.8;
            font-size: 10px
        }
    </style>
</head>

<body style="font-family: Arial, Helvetica, sans-serif; color: white">

    <div class="container">
        <img src="data:image/png;base64,{{ $card }}" alt=""
            style="position: absolute; z-index: -99999; width: 100%">
        <center>
            <div class="qr-code">
                <img src="data:image/png;base64, {!! $qr !!}" alt="" width="180px">
            </div>
            <div class="title">{{ strtoupper($p->nama) }}</div>
            <div class="subtitle">{{ $p->jabatan }}</div>
            <div class="subtitle">{{ $p->asal }}</div>
            <div class="table">
                <br><br>
                <img src="data:image/png;base64,{{ $lemail }}" width="11px">
                <br>
                {{ $p->email }}
                <br><br>
                <img src="data:image/png;base64,{{ $ltelp }}" width="11px">
                <br>
                {{ $p->hp }}
            </div>
        </center>
    </div>

</body>

</html>
