<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    function __construct()
    {
        // NOTE: このクラス内でしか効果を発揮しない
        config(['sample.message' => '新しいメッセージ！']);
    }

//    public function index(Request $request)
//    {
//        $data = [
//            'msg' => $request -> hello
//        ];
//        return view('hello.index', $data);
//    }
//    public function index($person)
//    {
//        $data = [
//            'msg' => $person
//        ];
//        return view('hello.index', $data);
//    }
//    public function index()
//    {
//        $sample_msg = config('sample.message');
//        $sample_data = config('sample.data');
//        $data = [
//            'msg' => $sample_msg,
//            'data' => $sample_data
//        ];
//        return view('hello.index', $data);
//    }
    public function index()
    {
        $sample_msg = env('SAMPLE_MESSAGE');
        $sample_data = env('SAMPLE_DATA');
        $data = [
            'msg' => $sample_msg,
            'data' => explode(',', $sample_data)
        ];
        return view('hello.index', $data);
    }



//    public function other(Request $request)
//    {
//        $data = [
//            'msg' => $request -> bye
//        ];
//        return view('hello.index', $data);
//    }
    public function other(Request $request)
    {
        return redirect() -> route('sample');
    }
}