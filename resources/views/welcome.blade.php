<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Recipe Puppy</title>

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
            .font-bold {
                font-weight: 700;
            }
            .btn-sec {
                padding-top: 30px;
            }
            .box {
                -webkit-box-shadow: 0 0 10px #ddd;
                -moz-box-shadow: 0 0 10px #ddd;
                box-shadow: 0 0 10px #ddd;
                padding: 20px;
                margin-bottom: 30px;
            }
            .m-b-20 {
                margin-bottom: 20px; 
            }
            form h4.title {
                text-decoration: underline;
            }
            iframe {
                height: 50vh;
                border: 2px solid #ddd;
            }
            .list-group.left {
                max-height: 50vh;
                overflow: scroll;
                border: 2px solid #ddd;
                border-radius: 5px;
            }
            .page-item:first-child .page-link,
            .page-item:last-child .page-link {
                border-radius: 0px;
            }
            a.list-group-item p {
                margin: 0px;
            }
            @media screen and (max-width: 768px) {
                .image,
                a.list-group-item h4,
                a.list-group-item p {
                    text-align: center;
                }
                .image img {
                    width: auto;
                    margin-bottom: 10px;
                }
                .list-group.left {
                    margin-bottom: 20px;
                }
                .btn-sec {
                    padding-top: 0px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="header">
                <h2 class="text-center font-bold">Recipe Puppy</h2>
            </div>            
            <form action="" method="GET" id="searchForm">
                <div class="box">
                    <h4 class="title">Search Box</h4>
                    <div class="row m-b-20">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="title">Search by title:</label>
                                <input type="text" name="title" value="{{ array_key_exists('title', $formInput) ? $formInput['title'] : ''}}" class="form-control" placeholder="e.g. Cake">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="ingredients">Search by ingredients:</label>
                                <input type="text" name="ingredients" value="{{array_key_exists('ingredients', $formInput) ? $formInput['ingredients'] : ''}}" class="form-control" placeholder="e.g. tomato, cheese">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 btn-sec">
                            <input type="hidden" value="1" name="page" id="page">
                            <button type="reset" class="btn">Reset</button>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                    <h4 class="title">Recipe List</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="list-group left">
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
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <iframe name="iframe1" title="Recipe Page" width="100%">
                            </iframe>
                        </div>
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
            $( document ).ready(function() {
                $("a.list-group-item").click(function() {
                    $("a.list-group-item.active").removeClass("active");
                    $(this).addClass("active");
                });
            });
        </script>
    </body>
</html>
