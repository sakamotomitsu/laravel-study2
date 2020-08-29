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
//    public function index()
//    {
//        $sample_msg = Storage::disk('public') -> url($this -> file_name);
//        $sample_data = Storage::disk('public') -> get($this -> file_name);
//        $data = [
//            'msg' => $sample_msg,
//            'data' => explode(PHP_EOL, $sample_data)
//        ];
//        return view('hello.index', $data);
//    }
    public function index()
    {
        $url = Storage::disk('public') -> url($this -> file_name);
        $size = Storage::disk('public') -> size($this -> file_name);
        $modified = Storage::disk('public')
            -> lastModified($this ->file_name);

        $modified_time = date('y-m-d H:i:s', $modified);
        $sample_keys = ['url', 'size', 'modified'];
        $sample_meta = [$url, $size, $modified_time];

        $result = '<table><tr><th>' . implode('</th><th>', $sample_keys) . '</th></tr>';
        $result .= '<tr><td>' . implode('</td><td>', $sample_meta) . '</td></tr></table>';

        $sample_data = Storage::disk('public') -> get($this -> file_name);

        $data = [
            'msg' => $result,
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
//    public function other($msg)
//    {
//        Storage::disk('public') -> prepend($this -> file_name, $msg);
//        return redirect() -> route('hello');
//    }
//    public function other($msg)
//    {
////        // copy moveは、元ファイルが無かったり、移動・コピー先にファイルが存在している場合、例外が発生する
////        // その為、はじめにdelete処理を走らせている
////        Storage::disk('public') -> delete('bk_' . $this -> file_name);
////        Storage::disk('public') -> copy($this -> file_name, 'bk_' . $this -> file_name);
////        Storage::disk('public') -> delete('bk_' . $this -> file_name);
////        Storage::disk('public') -> move('public/bk_' .$this -> file_name, 'bk_' . $this -> file_name);
//
//        // ↓上のコードを元にexistsを使って存在するのか確認
//        if( Storage::disk('public') -> exists('bk_' . $this -> file_name) ) {
//            Storage::disk('public') -> delete('bk_' . $this -> file_name);
//        }
//        Storage::disk('public') -> copy($this -> file_name, 'bk_' . $this -> file_name);
//        if( Storage::disk('local') -> exists('bk_' . $this -> file_name) ) {
//            Storage::disk('local') -> delete('bk_' .$this -> file_name);
//        }
//        Storage::disk('local') -> move('public/bk_' . $this -> file_name, 'bk_' . $this -> file_name);
//
//        return redirect() -> route('hello');
//    }
//    public function other($msg)
//    {
//        return Storage::disk('public')->download($this -> file_name);
//    }
    public function other(Request $request)
    {
        $ext = '.' . $request->file('file')->extension();
        // putFileの第一引数は、/Storage/app/ をルートとします
        Storage::disk('local')->putFileas('files', $request->file('file'), 'uploaded'.$ext);
        return redirect()->route('hello');
    }
}
