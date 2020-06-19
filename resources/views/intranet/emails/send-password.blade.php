<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperación de Contraseña</title>

    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
        p,
        h1,
        h2,
        h3,
        h4 {
            font-weight: normal;
            color: #616161;
        }
    </style>
</head>
<body style="width: 100%; background: #f5f5f5;">

<div style="width: 100%; max-width: 500px; margin: 50px auto;">
    <div style="background: #fff; border-radius: 2px 2px 0 0; border-top: 4px solid #007bff; width: 100%;">
        <div style="padding: 20px;">
            <div style="text-align: center;">
                <img width="100" border="0" style="margin: auto; width: 250px;" src="https://www.microserv.cl/wp-content/uploads/2017/10/logo-finalcorregido-1.png" alt="">
            </div>

        </div>
        <div style="border-bottom: 1px solid #f5f5f5;"></div>
        <div style="padding: 20px; text-align: center;">
            <h3 style="color: #1b1b1b; font-weight: bold; margin-bottom: 5px;">Recuperación de contraseña</h3>
            <p style="text-align: left;">Estimado(a) <b>{{strtoupper($user->full_name)}}</b></p>
            <p style="text-align: left;">Se código de recuperación de contraseña es <b>{{ $user->remember_token }}</b>, por favor continue el proceso.</p>
        </div>
    </div>
</div>

</body>
</html>
