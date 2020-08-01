<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
//    public function index()
//    {
//        $sample_msg = env('SAMPLE_MESSAGE');
//        $sample_data = env('SAMPLE_DATA');
//        $data = [
//            'msg' => $sample_msg,
//            'data' => explode(',', $sample_data)
//        ];
//        return view('hello.index', $data);
//    }
//    public function index()
//    {
//        $sample_msg = $this -> file_name;
//        $sample_data = Storage::get($this -> file_name);
//        $data = [
//            'msg' => $sample_msg,
//            'data' => explode(PHP_EOL, $sample_data)
//        ];
//        return view('hello.index', $data);
//    }
    public function index()
    {
        $sample_msg = Storage::disk('public') -> url($this -> file_name);
        $sample_data = Storage::disk('public') -> get($this -> file_name);
        $data = [
            'msg' => $sample_msg,
            'data' => explode(PHP_EOL, $sample_data)
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
//    public function other(Request $request)
//    {
//        return redirect() -> route('sample');
//    }
//    public function other($msg)
//    {
////        $data = Storage::get($this -> file_name) . PHP_EOL . $msg;
////        Storage::put($this -> file_name, $data);
//        // ↓もっと簡単に
//        Storage::append($this -> file_name, $msg);
//        return redirect() -> route('hello');
//    }
    public function other($msg)
    {
        Storage::disk('public') -> prepend($this -> file_name, $msg);
        return redirect() -> route('hello');
    }
}
