<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tag Print</title>
    <style>
        .container {
            width: 100%
        }

        .d-flex {
            display: flex
        }

        .flex-row {
            flex-direction: row
        }

        .flex-col {
            flex-direction: column
        }

        .align-content-around {
            align-content: space-around
        }

        .justify-content-center {
            justify-content: center
        }

        .flex-wrap {
            flex-wrap: wrap
        }

        .p-1 {
            padding: 1px
        }

        .p-2 {
            padding: 2px
        }

        .m-3 {
            margin: 3px
        }

        .w-50 {
            width: 350px
        }

        .w-100 {
            width: 100%
        }

        .border {
            border: 2px solid #000
        }

        .qr {
            height: 130px;
            width: 130px
        }

        @media print {
            body {
                visibility: hidden
            }

            #printDiv {
                visibility: visible
            }
        }
    </style>
</head>

<body>
    @if (isset($codes))
        <button class="btn btn-primary" id="printBtn">Imprimir</button>
        <div id="printDiv" class="container d-flex justify-content-center flex-wrap col-12 p-2">
            @foreach ($codes as $code)
                <div class="container m-3 w-50 d-flex flex-row p-1 border">
                    <img class="qr col-4" src="{{ $code['qrcode'] }}" alt="QR Code {{ $code['name'] }}">
                    <div class="m-3 w-100">
                        <h5>{{ $code['name'] }}</h5>
                        <div class="d-flex flex-col">
                            <span><b>Nº Série:</b></span>
                            <span>{{ $code['serial_number'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <script>
        var printBtn = document.querySelector('#printBtn');

        printBtn.addEventListener('click', (event) => {
            window.print();
        });
    </script>

</body>

</html>
