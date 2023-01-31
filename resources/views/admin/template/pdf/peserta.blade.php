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


        .title {
            color: rgb(255, 255, 255);
            opacity: 1;
            margin-top: 18px;
            font-weight: bolder;
        }

        .subtitle {
            color: rgba(255, 255, 255, 1);
            opacity: 1;
            margin-top: 0px;
            font-size: 11px
        }

        .table {
            color: rgb(255, 255, 255);
            opacity: 0.8;
            font-size: 10px
        }

        .profile {
            margin-top: 70px
        }

        .detail {
            position: absolute;
            margin-left: 130px;
            margin-top: 28px
        }

        .qr-code {
            margin-top: 5px;
            margin-left: 30px;
            position: absolute;
        }

        .frame {
            width: 200px;
            height: 200px;
            display: inline-block;
            position: relative;
        }

        .frame>img {
            max-width: 100%;
            border-radius: 100px;
            max-height: 100%;
            width: 100%;
            height: auto;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            box-shadow: 10px 10px 10px #000;
        }
    </style>
</head>

<body style="font-family: Calibri, Helvetica, sans-serif; color: white">

    <div class="container">
        <img src="data:image/png;base64,{{ $card }}" alt=""
            style="position: absolute; z-index: -99999; width: 100%">
        <center>
            <div class="profile">
                <div class="frame">
                    <img src="{{ public_path('/' . $p->foto) }}">
                </div>
            </div>
            <div class="title" style="font-size: 19px">{{ strtoupper($p->asal) }}</div>
        </center>
        <div class="wrapper-bottom">

            <div class="qr-code">
                <img src="data:image/png;base64, {!! $qr !!}" alt="" width="80px">
            </div>
            <div class="detail" style="color: white !important">

                <div class="subtitle" style="font-weight:400; margin-bottom:10px; font-size: 20px">{{ $p->nama }}
                </div>
                <div class="subtitle">{{ $p->jabatan }}</div>
                <div class="table">
                    {{ $p->email }}
                    {{ $p->hp }}
                </div>
            </div>
        </div>
    </div>

</body>

</html>
