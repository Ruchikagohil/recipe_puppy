<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){

        $jsonurl = "http://www.recipepuppy.com/api/";
        $json = file_get_contents($jsonurl);
        $recipes = json_decode($json);

        return view('welcome', ['recipes'=>$recipes]);
        // return response()->json($json);
    }
}
