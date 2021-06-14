<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Aloha!</title>
    <!-- <link type="text/css" rel="stylesheet" href="{{ asset('Plantilla/bootstrap/style.css')}}" /> -->
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td valign="" width=40%><img src="{{ asset('Plantilla/assets/img/logo_reporte.png')}}" alt="" width="150" />
            </td>
            <td align="left">
                <h3>Receta Medica</h3>
                <!-- <pre>
                </pre> -->
            </td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td width=40%><strong>Paciente:</strong>{{$paciente1}}</td>
            <td><strong>Medico:</strong> {{$medico->usu_nombre }} {{ $medico->usu_appaterno  }} {{ $medico->usu_apMaterno}}</td>
        </tr>
    </table>
    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>Medicamento</th>
                <th>Forma</th>
                <th>Via</th>
                <th>Dosis</th>
            </tr>
        </thead>
        <tbody>
            @foreach($farmacos as $key=>$medic)
            <tr>
                <td>{{ $farmacos[$key]['a']}}</td>
                <td align="center">{{ $farmacos[$key]['b']}}</td>
                <td align="center">{{ $farmacos[$key]['c']}}</td>
                <td align="center">{{ $farmacos[$key]['d']}}</td>
            </tr>
            @endforeach
            <!-- <tr>
                <th scope="row">1</th>
                <td>Playstation IV - Black</td>
                <td align="right">1</td>
                <td align="right">1400.00</td>
                <td align="right">1400.00</td>
            </tr> -->
        </tbody>

        <!-- <tfoot>
            <tr>
                <td colspan="3"></td>
                <td align="right">Subtotal $</td>
                <td align="right">1635.00</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">Tax $</td>
                <td align="right">294.3</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">Total $</td>
                <td align="right" class="gray">$ 1929.3</td>
            </tr>
        </tfoot> -->
    </table>
    <table width="100%">
        <tr>
            <td align="left">
                <p>
                    <strong>Nota:{{$descMedico}} </strong>
                    {{$descMedico}}
                </p>
            </td>
            <td align="right">
                <img src="data:image/png;base64,{!! base64_encode($qr)!!}" alt="" width="100">
            </td>
            <!-- <td valign="top" align="right"><br><img src="https://static-unitag.com/images/help/QRCode/qrcode.png?mh=07b7c2a2" width="100px" height="100px" alt=""> -->
        </tr>
    </table>
</body>

</html>