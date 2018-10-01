<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crawl Licitações</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">        "

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                display: flex;
                justify-content: center;
            }

            .bidding-container{
                margin-top: 20px;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                max-width: 800px;

            }

            .title {
                font-size: 84px;
                margin-top: 10px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Crawl Licitações
                </div>

                <div class="links">
                    <a href="#" onclick="getBiddings()">Licitações</a>
                    <a href="https://josuerockefeller.com">Autor</a>
                    <a href="https://github.com/josuebsilva">GitHub</a>
                </div>
                <div class="bidding-container">
                    <hr>
                    <div class="bidding-list"></div>
                    <div id="loading"><img src="{{ Request::fullUrl() }}/img/ajax-loader.gif"></div>
                    <button class="btn btn-success btn-lg" id="btn-bidding-update" onclick="extractBiddings()" style="float:right">Atualizar</button>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="{{ Request::fullUrl() }}/js/js-framework/utils/alert.js"></script>
        <script src="{{ Request::fullUrl() }}/js/js-framework/http/http.js"></script>
        <script src="{{ Request::fullUrl() }}/js/app.js"></script>
    </body>
</html>
