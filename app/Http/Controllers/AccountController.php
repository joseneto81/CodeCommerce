<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //$orders = Auth::user()->order()->paginate(5);
        $orders = Auth::user()->order;
        //dd($orders->all());
        //$orders = $orders-;
        return view('store.orders', compact('orders'));

    }
}
