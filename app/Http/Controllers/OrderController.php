<?php

namespace App\Http\Controllers;

use App\Events\MovieOrdered;
use App\Http\Requests\CustomerRequest;
use App\Models\Order;
use App\Models\Scard;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = Scard::where('session_id', session()->getId())->get();
        $priceTotal = 0;

        if($data->count()) {
            $data = $data->map(function ($item) use (&$priceTotal) {
                $sum = $item->quantity * $item->movie->price;
                $priceTotal = $priceTotal + $sum;
                return $item;
            });
        }

        return view('public.order.create', compact('data','priceTotal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CustomerRequest $request)
    {
        $validated  = $request->validated();
        $customer   = Customer::whereEmail($request->post('email'))->first();

        if (!$customer) {
            $customer   = Customer::create($validated);
        }

        $scard = Scard::where('session_id', session()->getId())->get();
        $scardIds = [];

        if($scard->count()) {
            // @todo: put all scard items in one order
            foreach ($scard as $item) {
                $scardIds[] = $item->id;
                $data = [
                    'customer_id'   => $customer->id,
                    'movie_id'      => $item->movie_id,
                    'quantity'      => $item->quantity,
                    'price'         => $item->quantity * $item->movie->price,
                ];
                $order = Order::create($data);
                // trigger Order Event
                event(new MovieOrdered($order));
                // @todo: redirect to order detail confirmation page
                // @todo: payment stuff
            }
            Scard::destroy($scardIds);
        }
        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(OrderRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
