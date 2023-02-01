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
            top: 339px;
            margin-left: 30px;
            position: absolute;
        }

        .frame {
            width: 200px;
            height: 200px;
            display: inline-block;
            position: relative;
            background-image: url(data:image/png;base64,{{ $foto }});
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            border-radius: 100px;

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
                </div>
            </div>
            <div class="title" style="font-size: 17px">{{ strtoupper($p->asal) }}</div>
        </center>
        <div class="wrapper-bottom">

            <div class="qr-code">
                <img src="data:image/png;base64, {!! $qr !!}" alt="" width="80px">
            </div>
            <div class="detail" style="color: white !important">

                <div class="subtitle" style="font-weight:400; margin-bottom:10px; font-size: 17px; padding-right: 10px">
                    <b>{{ strtoupper($p->nama) }}</b>
                </div>
                <div class="subtitle">{{ $p->jabatan }}</div>
                <div class="table">
                    {{ $p->email }}
                    <br>
                    {{ $p->hp }}
                </div>
            </div>
        </div>
    </div>

</body>

</html>
