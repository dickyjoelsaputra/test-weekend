<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Costumer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Resources\TestDua;

class CostumerController extends Controller
{
    public function testsatu()
    {
        $conDave = Costumer::where('first_name', 'LIKE', 'dave')->get();

        return response()->json(['conDave' => $conDave]);
    }

    public function testdua()
    {
        $order = Order::whereBetween('total_value', ['10.000', '50.000'])->get();


        return new TestDua($order->loadMissing('costumers:costumer_id,first_name,last_name'));
        // return response()->json(['order' => $order->loadMissing(['costumers:first_name,last_name'])]);
    }

    public function testtiga()
    {

        // $from = date('2022-01-01');
        // $to = date('2022-06-30');
        // $time = "1900-01-01 00:00:00";
        // $date = new Carbon($time);
        // $now = date('Y', '2016');
        $order = Order::whereYear('transaction_date', 2016)->whereMonth('transaction_date', 7)->get();
        // Reservation::whereBetween('transaction_date', [$from, $to])->get();
        // $order = Order::whereBetween('transaction_date', [$from, $to])->get();

        $datak = $order->sum('total_value');

        $data = new TestDua($order->loadMissing('costumers:costumer_id,first_name,last_name'));
        return response()->json(['total_transaction' => $data, 'total_transaction_value' => $datak]);
    }

    public function testempat()
    {
        $order = Order::select('costumer_id')->whereNot(function ($query) {
            $query->whereYear('transaction_date', 2016)
                ->whereMonth('transaction_date', 7);
        })->get();

        // $order = Order::whereNot(function ($query) {
        //     $query->whereYear('transaction_date', 2016)
        //         ->whereMonth('transaction_date', 7);
        // })->first();

        // $costumer = Costumer::

        $costumer = Costumer::whereIn('costumer_id', $order)->get();

        // $costumer = Costumer::where('costumer_id', $order->costumer_id)->get();
        return response()->json($costumer);

        // return new TestDua($costumer);

    }

    public function testlima()
    {

        // $order = Order::groupBy('costumer_id')
        // ->having('costumer_id', '>', 1)->whereYear('transaction_date', 2016)->whereMonth('transaction_date', 7)
        // ->get();

        // $order = Order::whereYear('transaction_date', 2016)->whereMonth('transaction_date', 7)
        //     ->groupBy('costumer_id')
        //     ->having('costumer_id', '>', 1)->get();

        // $order = Order::withCount(['costumers' => function ($query) {
        //     return $query->whereYear('transaction_date', 2016)->whereMonth('transaction_date', 7);
        // }])->having('costumer_id', '>=', 2);

        $order = Costumer::withCount('orders')->get();

        return response()->json($order);
    }
}
