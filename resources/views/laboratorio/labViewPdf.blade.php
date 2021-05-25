<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Aloha!</title>
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

        body {
            border-style: solid;
            border-width: 1px;
            border-left-width: 1px;
            border-right-width: 1px;
            border-color: black;
        }
    </style>
</head>

<body>

    <table width="100%" id="yyy">
        <tr>
            <td valign="" width=10%><img src="{{ asset('Plantilla/assets/img/logo_reporte.png')}}" alt="" width="150" />
            </td>
            <td align="center">
                <h3>Laboratorio clinico Hematologica,<br> Microbiologia Quimica Sanguinea e Inmunologia <br>{{$dp}}</h3>
            </td>
            <td align="rigth" width=10%>
                <h3># {{$ID}}</h3>
            </td>
        </tr>
    </table>
    <hr>
    <table width="100%">
        <tr>
            <td align="left" width=50%>
                <h4 style="font-family:serif;">Nombre: {{$pa->pa_nombre}} {{$pa->pa_appaterno}} {{$pa->pa_apmaterno}}</h4>
            </td>
            <td align="left">
                <h4 style="font-family:serif;">HCL: {{$pa->pa_hcl}}</h4>
            </td>
        </tr>
    </table>
    <hr>

    @foreach($lbs as $clave=>$lb)

    @switch($lb['tipo'])
    @case("1")
    <h3>Bioquimica Clinica</h3>
    <table width="100%">
        <tr>
            <td style="width: min-content;">
                <table width="100%">
                    <thead style="background-color: lightgray;">
                        <tr>
                            <th colspan="4" align="center">Perfil Metabolico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="left">Glucemia</td>
                            <td align="center">{{$lbs[$clave]['data'][0]['value']}}</td>
                            <td align="right">70-110 mg/dL</td>
                        </tr>
                        <tr>
                            <td align="left">Ac. Urico</td>
                            <td align="center">{{$lbs[$clave]['data'][1]['value']}}</td>
                            <td align="right">2.6-6.0 mg/dL</td>
                        </tr>
                        <tr>
                            <td align="left">Proteinas totales</td>
                            <td align="center">{{$lbs[$clave]['data'][2]['value']}}</td>
                            <td align="right">6.2-8.5 g/dL</td>
                        </tr>
                        <tr>
                            <td align="left">Albumina</td>
                            <td align="center">{{$lbs[$clave]['data'][3]['value']}}</td>
                            <td align="right">3.5-5.3 g/dL</td>
                        </tr>

                    </tbody>
                </table>
                <table width="100%">
                    <thead style="background-color: lightgray;">
                        <tr>
                            <th colspan="4" align="center">Perfin Renal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="left">Creatinina</td>
                            <td align="center">{{$lbs[$clave]['data'][4]['value']}}</td>
                            <td align="right">06-1.4 mg/dL</td>
                        </tr>
                        <tr>
                            <td align="left">Nitrogeno Ureico</td>
                            <td align="center">{{$lbs[$clave]['data'][5]['value']}}</td>
                            <td align="right">7.0-25 mg/dL</td>
                        </tr>
                        <tr>
                            <td align="left">Urea</td>
                            <td align="center">{{$lbs[$clave]['data'][6]['value']}}</td>
                            <td align="right">15-45 mg/dL</td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%">
                    <thead style="background-color: lightgray;">
                        <tr>
                            <th colspan="4" align="center">Perfil Lipidico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="left">Colesterol</td>
                            <td align="center">{{$lbs[$clave]['data'][7]['value']}}</td>
                            <td align="right">&lt; 200 mg/dL</td>
                        </tr>
                        <tr>
                            <td align="left">Trigliceridos</td>
                            <td align="center">{{$lbs[$clave]['data'][8]['value']}}</td>
                            <td align="right">30-150 mg/dL</td>
                        </tr>
                        <tr>
                            <td align="left">HDL-COL</td>
                            <td align="center">{{$lbs[$clave]['data'][9]['value']}}</td>
                            <td align="right">30-85 mg/dL</td>
                        </tr>
                        <tr>
                            <td align="left">LDL-COL</td>
                            <td align="center">{{$lbs[$clave]['data'][10]['value']}}</td>
                            <td align="right"> &lt; 155 mg/dL</td>
                        </tr>
                        <tr>
                            <td align="left">VLDL</td>
                            <td align="center">{{$lbs[$clave]['data'][11]['value']}}</td>
                            <td align="right">&lt; 40 mg/dL</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="width: min-content;">
                <table width="100%">
                    <thead style="background-color: lightgray;">
                        <tr>
                            <th colspan="4" align="center">Perfil Hepatico </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="left">B. Total </td>
                            <td align="center">{{$lbs[$clave]['data'][12]['value']}}</td>
                            <td align="right">&lt; a 1.0 mg/dL</td>
                        </tr>
                        <tr>
                            <td align="left">B. Directa</td>
                            <td align="center">{{$lbs[$clave]['data'][13]['value']}}</td>
                            <td align="right">&lt; a 0.2 mg/dL</td>
                        </tr>
                        <tr>
                            <td align="left">B. Indirecta</td>
                            <td align="center">{{$lbs[$clave]['data'][14]['value']}}</td>
                            <td align="right">&lt; a 0.8 mg/dL</td>
                        </tr>
                        <tr>
                            <td align="left">AST/GOT</td>
                            <td align="center">{{$lbs[$clave]['data'][15]['value']}}</td>
                            <td align="right">0 - 38 UI/L</td>
                        </tr>
                        <tr>
                            <td align="left">ALT/GPT</td>
                            <td align="center">{{$lbs[$clave]['data'][16]['value']}}</td>
                            <td align="right">0-40 UI/L</td>
                        </tr>
                        <tr>
                            <td align="left">F. Alcalina</td>
                            <td align="center">{{$lbs[$clave]['data'][17]['value']}}</td>
                            <td align="right">15-270 UI/L</td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%">
                    <thead style="background-color: lightgray;">
                        <tr>
                            <th colspan="4" align="center">Perfil Pancreatico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="left">Amilasa</td>
                            <td align="center">{{$lbs[$clave]['data'][18]['value']}}</td>
                            <td align="right">31-107U/L</td>
                        </tr>
                        <tr>
                            <td align="left">Lipasa</td>
                            <td align="center">{{$lbs[$clave]['data'][19]['value']}}</td>
                            <td align="right">1-9 UI/L</td>
                        </tr>
                    </tbody>
                    <table width="100%">
                        <thead style="background-color: lightgray;">
                            <tr>
                                <th colspan="4" align="center">Perfil Electrolito</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td align="left">Sodio(NA)</td>
                                <td align="center">{{$lbs[$clave]['data'][20]['value']}}</td>
                                <td align="right">136-145 mEq/L</td>
                            </tr>
                            <tr>
                                <td align="left">Potasio(K)</td>
                                <td align="center">{{$lbs[$clave]['data'][21]['value']}}</td>
                                <td align="right">3.5-5.5 mEq/L</td>
                            </tr>
                            <tr>
                                <td align="left">Cloro</td>
                                <td align="center">{{$lbs[$clave]['data'][22]['value']}}</td>
                                <td align="right">96-106 mEq/L</td>
                            </tr>
                            <tr>
                                <td align="left">Calcio(Ca)</td>
                                <td align="center">{{$lbs[$clave]['data'][23]['value']}}</td>
                                <td align="right">8.6-10.4 mEq/L</td>
                            </tr>
                        </tbody>
                    </table>
            </td>
        </tr>
    </table>
    <hr>
    @break
    @case("2")
    
    <h3>Coagulograma</h3>
    <table width="100%">
        <tr>
            <td style="width: min-content;">
                <table width="100%">
                    <thead style="background-color: lightgray;">
                        <tr>
                            <th colspan="4" align="center">Perfil Metabolico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="left">Glucemia</td>
                            <td align="center">{{$lbs[$clave]['data'][0]['value']}}</td>
                            <td align="right">70-110 mg/dL</td>
                        </tr>
                        <tr>
                            <td align="left">Ac. Urico</td>
                            <td align="center">{{$lbs[$clave]['data'][1]['value']}}</td>
                            <td align="right">2.6-6.0 mg/dL</td>
                        </tr>
                        <tr>
                            <td align="left">Proteinas totales</td>
                            <td align="center">{{$lbs[$clave]['data'][2]['value']}}</td>
                            <td align="right">6.2-8.5 g/dL</td>
                        </tr>
                        <tr>
                            <td align="left">Albumina</td>
                            <td align="center">{{$lbs[$clave]['data'][3]['value']}}</td>
                            <td align="right">3.5-5.3 g/dL</td>
                        </tr>

                    </tbody>
                </table>
                <table width="100%">
                    <thead style="background-color: lightgray;">
                        <tr>
                            <th colspan="4" align="center">Perfin Renal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="left">Creatinina</td>
                            <td align="center">{{$lbs[$clave]['data'][4]['value']}}</td>
                            <td align="right">06-1.4 mg/dL</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="width: min-content;">
            </td>
        </tr>
    </table>
    <hr>
    @break

    @endswitch
    @endforeach
</body>

</html>