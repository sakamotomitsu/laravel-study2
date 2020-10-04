<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use Illuminate\Http\Response;
//use Illuminate\Support\Facades\Storage;
//use App\MyClasses\MyService;

use App\MyClasses\MyService;

class HelloController extends Controller
{
    function __construct(MyService $myservice)
    {
        $myservice = app('App\MyClasses\MyService');
    }

    public function index(MyService $myservice, int $id = -1)
    {
        $myservice->setId($id);
        $data = [
            'msg' => $myservice->say($id),
            'data' => $myservice->alldata()
        ];
        return view('hello.index', $data);
    }
}
