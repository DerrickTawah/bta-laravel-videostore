<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Movie;
use App\Models\Author;
use App\Http\Requests\MovieRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Request;

class AdminOrderController extends AdminController
{
   public function index() {
        $data = Order::orderBy('created_at')->paginate(config('my.pagination_limit'));
        return view('admin.order.index', compact('data'));
   }

    public function show( $id ) {
        $data = Order::whereId($id)->first();
        return view('admin.order.show', compact('data'));
    }

    public function edit( $id = null ) {
        $data = ($id > 0) ? Order::whereId($id)->first() : null;
        $customer = Customer::orderBy('email')->get();
        return view('admin.order.edit', compact('data','customer'));
    }

    public function store( Request $request, $id = null) {
        $validated = $request->validated();
        if( $id > 0 ) {
            Order::whereId($id)->update($validated);
        } else {
            Order::create($validated);
        }
        return redirect()->route('admin-movie.index');
    }

    public function delete( $id ) {
        Order::destroy($id);
        return redirect()->route('admin-movie.index');
    }
}
