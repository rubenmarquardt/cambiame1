<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
             .errorMsj {                
                color: #ff1100;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Error en App <p>Team CAMBIAME</p>               
                <a href="{{ url('/') }}" >Inicio</a>
                </div>   
                <h2>Mensaje de error:</h2>
                <div class="errorMsj"><h3>{{ $exception->getMessage() }}</h3><div>             
            </div>
        </div>
    </body>
</html>
