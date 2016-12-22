<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Order;
use CodeCommerce\User;
use CodeCommerce\OrderStatus;

class AdminOrdersController extends Controller
{
    private $orderModel;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Order $order)
    {
        $this->orderModel = $order;
    }

    public function index()
    {
        $orders = $this->orderModel->paginate(10);
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderModel->find($id);
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = OrderStatus::lists('name','id');
        $order = $this->orderModel->find($id);
        return view('orders.edit', compact('order', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$order = Order::find($id);
        //$order->update($request->all());
        //dd($order);
        //return redirect()->route('admin.orders.index');

        $form = $request->all();
        $form['is_admin'] = $request->get('is_admin') ? true : false;
        $this->orderModel->find($id)->update($request->all());
        return redirect()->route('admin.orders.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->orderModel->find($id)->delete();
        return redirect()->route('admin.orders.index');
    }
}
