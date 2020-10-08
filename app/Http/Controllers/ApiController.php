<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index(Request $request){


        $baseUrl = 'http://api.plos.org';
        $url = $baseUrl.'/search?q=title:DNA';
        if($request->filled('start')){
            $url .= '&start='.$request->input('start');
}
        if($request->filled('rows')){
            $url .= '&rows='.$request->input('rows');
}
        $data = collect(json_decode(Http::get($url)))['response']->docs;
        //dd(compact('data'));
        return view('data-list',compact('data'));
    }
}
