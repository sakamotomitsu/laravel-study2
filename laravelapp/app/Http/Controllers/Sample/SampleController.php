<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use http\Env\Url;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    //
//    public function index(Request $request)
//    {
//        $data = [
//            'msg' => 'SAMPLE-CONTROLLER-INDEX!'
//        ];
//        return view('hello.index', $data);
//    }

    public function index(Request $request)
    {
        $sample_msg = config('sample.message');
        $sample_data = config('sample.data');
        $data = [
            'msg' => $sample_msg,
            'data' => $sample_data
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        $data = [
            'msg' => 'SAMPLE-CONTROLLER-OHTER!'
        ];
        return view('hello.index', $data);
    }
}
