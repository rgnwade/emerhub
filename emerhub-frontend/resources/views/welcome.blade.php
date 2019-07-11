<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>UPLOAD YOUR FILE</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
              align-items: center;
              display: grid;
              justify-content: center;
              margin-top: 10%;
}
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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
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

        <div class="flex-center position-ref flex-center">
            <h1>UPLOAD YOUR FILE</h1>
            <br>
            <br>
            <div class="form-upload">
              <form class="modal-body" method="POST" action="{{ route('PostFile') }}" enctype="multipart/form-data">
                {{csrf_field()}}
            <input type="file" name="file_name" id="file_name"  onchange="readURL(this);" class="form-control">
            <button type="submit" class="btn btn-outline-secondary">UPLOAD</button>
          </form>
        </div>

        <a>File:</a>{{ $datas }}
        <button type="submit" class="btn btn-outline-secondary">Convert</button>

        </div>
    </body>
</html>
