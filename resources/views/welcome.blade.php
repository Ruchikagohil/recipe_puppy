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
            .image img {
                width: 100%;
            }
            .header {
                margin: 30px;
            }
            .hide {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="header">
                <h3 class="text-center">Recipe Puppy</h3>
                {{-- <div>{{$jsonurl}}</div> --}}
            </div>
            <form action="" method="GET" id="searchForm">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="title">Title</label>
                        <input type="text" name="title" value="{{ array_key_exists('title', $formInput) ? $formInput['title'] : ''}}" class="form-control" placeholder="e.g. Cake">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="ingredients">Ingredients</label>
                            <input type="text" name="ingredients" value="{{array_key_exists('ingredients', $formInput) ? $formInput['ingredients'] : ''}}" class="form-control" placeholder="e.g. tomato, cheese">
                        </div>
                    </div>
                    <div class="col-md-2" style="padding-top: 30px; text-align: center;">
                        <input type="hidden" value="1" name="page" id="page">
                        <button type="reset" class="btn">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="list-group">
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
                            <?php $pageNo = array_key_exists('page', $formInput) ? $formInput['page'] : 1; ?>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <ul class="pagination">
                                <li class="page-item {{ $pageNo <= 1 ? ' hide' : '' }}" onclick="goToPage({{ $pageNo - 1 }})"><span class="page-link">Previous</span></li>
                                    <li class="page-item"><span class="page-link">{{ $pageNo }}</span></li>
                                    <li class="page-item {{ $pageNo >= 100 ? ' hide' : '' }}" onclick="goToPage({{ $pageNo + 1 }})"><span class="page-link">Next</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <iframe name="iframe1" title="Recipe Page" width="100%" height="600">
                        </iframe>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="/js/app.js" ></script>
        <script>
            function goToPage(pageNo) {
                var searchForm = document.getElementById("searchForm");
                document.getElementById("page").value = pageNo;
                searchForm.submit();
            }
        </script>
    </body>
</html>
