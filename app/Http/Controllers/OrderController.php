<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

class OrderController extends Controller
{
    public function index()
    {
        $orders = \App\Models\Order::orderBy('payment_status', 'asc')->orderBy('updated_at', 'desc')
               ->paginate(9)->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }

    public function complete($id){
        $order = \App\Models\Order::findOrFail($id);
        $order->payment_status = 'completed';
        $order->save();
        
         // Redirect back with success message
         Alert::success('Successful!', 'Order payment status updated to completed.');
         return redirect()->back();
    }
}
