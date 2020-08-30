<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public function index(Request $request, Response $response)
    {
        $name = $request -> query('name');
        $mail = $request -> query('mail');
        $tel = $request -> query('tel');
        $msg = $request -> query('msg');

        $keys = ['名前', 'メール', '電話'];
        $values = [$name, $mail, $tel];
        $data = [
            'msg' => $msg,
            'keys' => $keys,
            'values' => $values
        ];
        $request -> flash();
        return view('hello.index', $data);
    }

    public function other()
    {
        $data = [
            'name' => 'Taro',
            'mail' => 'taro@example.com',
            'tel' => '111-2222-3333'
        ];

        $query_str = http_build_query($data);
        $data['msg'] = $query_str;
        return redirect() -> route('hello', $data);
    }
}
