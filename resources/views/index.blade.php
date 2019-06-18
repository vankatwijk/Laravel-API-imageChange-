<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                display: flex;
                justify-content: center;
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
      <div class="container">
          <form action="/change" enctype="multipart/form-data" method="post">
              @csrf

              <div class="row">
                  <div class="col-8 offset-2">

                      <div class="row">
                          <h1>Upload an image to be changed</h1>
                      </div>


                      <div class="row">
                          <label for="image" class="col-md-4 col-form-label">Image</label>

                          <input type="file" class="form-control-file" id="image" name="image">

                          @if ($errors->has('image'))
                              <strong>{{ $errors->first('image') }}</strong>
                          @endif
                      </div>

                      <div class="row pt-4">
                          <button class="btn btn-primary">upload image</button>
                      </div>

                  </div>
              </div>
          </form>
      </div>
    </body>
</html>
