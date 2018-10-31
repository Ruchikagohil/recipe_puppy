<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/css/app.css">

        <!-- Styles -->
        <style>
            /* html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            } */
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="header">
                <h3 class="text-center">Recipe Puppy</h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="list-group">
                        {{-- <form action="">
                            <
                        </form> --}}
                        @foreach($recipes->results as $recipe)
                        <a href="{{ $recipe->href }}" class="list-group-item list-group-item-action flex-column align-items-start" target="iframe1">
                        <div class="row">
                            <div class="col-md-3 image">
                                <img src="{{ $recipe->thumbnail }}" alt="Recipe">
                            </div>
                            <div class="col-md-9">
                                <h4>{{ $recipe->title }}</h4>
                                <p>{{ $recipe->ingredients }}</p>
                            </div>
                        </div>    
                        </a>    
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    <iframe name="iframe1" title="Recipe Page" width="100%" height="600" src="https://www.allrecipes.com/recipe/68898/potato-and-cheese-frittata/">
                    </iframe>
                </div>
            </div>
        </div>        
    </body>
</html>
