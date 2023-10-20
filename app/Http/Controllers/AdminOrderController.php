<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use PDF;
class AdminOrderController extends Controller
{
    public function index(){
//        return $orders = Order::all();
        return view('backend.order.index', ['orders' => Order::orderBy('id', 'desc')->get()]);
    }
    public function detail($id)
    {
        return view('backend.order.detail', ['order' => Order::find($id)]);
    }
    public function edit($id)
    {
        return view('backend.order.edit', ['order' => Order::find($id)]);
    }
    public function update(Request $request, $id)
    {
        $this->order = Order::find($id);
        if ($request->order_status == 'Pending') {
            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
            $this->order->save();
        } elseif ($request->order_status == 'Processing') {
            $this->order->order_status      = $request->order_status;
            $this->order->delivery_address  = $request->delivery_address;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
            $this->order->save();
        } elseif ($request->order_status == 'Complete') {
            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
            $this->order->save();
        } elseif ($request->order_status == 'Cancel') {
            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
            $this->order->save();
        }
        return redirect()->route('admin.all-order')->with('message', 'Order Status Info is Updated');
    }
    public function showInvoice($id)
    {
        return view('backend.order.invoice', ['order' => Order::find($id)]);
    }

    public function printInvoice($id)
    {

        $pdf = PDF::loadView('backend.order.print-invoice', ['order' => Order::find($id)]);
        return $pdf->stream($id . '-order.pdf');
    }

    public function delete($id)
    {
        $this->order = Order::find($id);
        if ($this->order->order_status == 'Cancel') {
            Order::deleteOrder($id);
            OrderDetail::deleteOrderDetail($id);
            return back()->with('message', 'Order is deleted successfully');
        }

    }


}
