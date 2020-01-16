<?php

namespace App\Http\Controllers;

use App\Example;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{

    

    public function home()
    {
        dd(resolve('App\Example'), resolve('App\Example'));
    }

    public function facadesTest()
    {
        // shorthand method for calling function.
        Cache::remember('foo', 60, function(){
            return 'foobar';
        });

        return File::get(public_path('index.php'));
        // return Cache::get('foo');
    }
}
