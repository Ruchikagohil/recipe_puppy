<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request){

        $ingredientsQuery = trim($request->input('ingredients'), ' ');
        $titleQuery =  trim($request->input('title'), ' ');
        $page =  trim($request->input('page', 1), ' ');
        $queryParams = http_build_query(['i'=>$ingredientsQuery, 'q'=>$titleQuery, 'p'=>$page]);
        $jsonurl = "http://www.recipepuppy.com/api/?$queryParams";

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $jsonurl);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        $recipes = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        return view('welcome', ['recipes'=>$recipes, 'formInput'=>$request->all(), 'jsonurl'=>$jsonurl]);
    }
}
