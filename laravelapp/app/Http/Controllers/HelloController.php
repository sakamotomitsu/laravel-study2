<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\MyClasses\MyService;

class HelloController extends Controller
{
    private $file_name;

//    function __construct()
//    {
//        // NOTE: このクラス内でしか効果を発揮しない
//        config(['sample.message' => '新しいメッセージ！']);
//    }
    public function __construct()
    {
//        $this -> file_name = 'sample.txt';
        $this -> file_name = 'hello.txt';
    }

    public function index(MyService $myService)
    {
        $data = [
            'msg' => $myService->say(),
            'data' => $myService->data()
        ];
        return view('hello.index', $data);
    }
}
