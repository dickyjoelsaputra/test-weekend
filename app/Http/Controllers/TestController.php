<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testsatu(Request $request)
    {

        $result = max($request['data']);
        return response()->json(['result' => $result]);
    }

    public function testdua(Request $request)
    {
        $data1 = $request['data1'];
        $data2 = $request['data2'];

        $data = substr_count($data2, $data1);
        // echo 'true';
        return response()->json(['result' => $data]);
    }

    public function testiga(Request $request)
    {
        if ($request['promo']) {
            // $data = $this->discon($request['data1']);

            // return $data;
            // dd($request->all());

            foreach ($request['data1'] as $key => $value) {
                if ($value["price"] > 100000) {
                    return response()->json(['value' => $value]);
                }
            }
            // $data = json_decode($request['data1']->price);
        }
        return $this->nodiscon();
    }

    public function discon($data)
    {
        foreach ($data as $key => $value) {
            return $value;
        }
    }




    public function nodiscon()
    {
        return 0;
    }
}
