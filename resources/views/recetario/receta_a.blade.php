<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSJO RECETARIO</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <style>
        body {
            background: white;
            margin-top: 10px;
            margin-bottom: 10px;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row " heigth=100>
                            <div class="col-md-3">
                                <img alt="" src="{{asset('Plantilla/assets/img/logoCSJO.jpg')}}" width="180px" height="100px" class="circle">
                            </div>
                            <div class="col-md-9 text-center">
                                <h4 class="font-weight-bold mb-1" style="font-size: 18;">Centro de salud Jesus Obrero <br> Recetario Medico </h4>
                                <p class="text-muted ">Medico: nombre del medico <br> Fecha: dd-mm-yyyy</p>
                            </div>
                        </div>
                        <p> <strong> Paciente:</strong> Nombre y datos del paciente </p>
                        <div class="row p-1" style="height: min-content=800px;">
                            <div class="col-md-12">
                                <table class=" table table-sm text-center">
                                    <thead>
                                        <tr>
                                            <th class="border-0 text-uppercase small font-weight-bold">Medicamento</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Forma</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Dosis Duración</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: small;">
                                        <tr>
                                            <td>paracetamol</td>
                                            <td>pastillas 200 mg </td>
                                            <td>tamar cada 8 horas por 6 diasajslñfjaslfjaslñjfñlasjasdfafñdiasajslñfjaslfjaslñjfñlasjfñ</td>
                                        </tr>
                                        <tr>
                                            <td>paracetamol</td>
                                            <td>pastillas 200 mg asdfa</td>
                                            <td>tamar cada 8 horas por 6 diasajslñfjaslfjaslñjfñlasjfñdiasajslñfjaslfjaslñjfñlasjfñ</td>
                                        </tr>
                                        <tr>
                                            <td>paracetamol</td>
                                            <td>pastillas 200 mg asdfa</td>
                                            <td>tamar cada 8 horas por 6 diasajslñfjaslfjaslñjfñlasjfñdiasajslñfjaslfjaslñjfñlasjfñ</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p> <strong> Nota:</strong> en esta seccion se dispondra de notas del tratamiento que el medico indica </p>

                            </div>
                        </div>
                        <div class="row " heigth=100>
                            <div class="col-md-6">
                                <p style="font-size: small;">Esta receta medica contiene un codigo de control QR y a la ves esta almacenada en nuestros servidores</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <img src="https://static-unitag.com/images/help/QRCode/qrcode.png?mh=07b7c2a2" width="100px" height="100px" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>