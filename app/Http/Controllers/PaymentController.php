<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Student;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $total_price = 0;

        foreach (Cart::content() as $order) {
            $total_price += $order->price * $order->qty;
        }

        return view('payment.index', [
            'orders' => Cart::content(),
            'total_price' => $total_price,
        ]);
    }

    public function store(Request $request)
    {
        $student = Student::findOrFail($request->input('id'));

        $total_price = 0;

        // Count total price
        foreach (Cart::content() as $order) {
            $total_price += $order->price * $order->qty;
        }

        // Empty Cart when balance to low
        if ($student->balance < $total_price) {
            foreach (Cart::content() as $item) {
                Cart::remove($item->rowId);
            }
            return redirect()->route('payment')->with('balanceError', 'Niet genoeg geld.');
        }

        // Update new balance of student
        $student->balance = $student->balance - $total_price;
        $student->save();

        // Save all products in current cart to orders.
        foreach (Cart::content() as $product) {
            $order = new Orders();
            $order->product_name = $product->name;
            $order->qty = $product->qty;
            $order->student_naam = $student->name;
            $order->save();
        }

        // Empty Cart when succes payment
        foreach (Cart::content() as $item) {
            Cart::remove($item->rowId);
        }

        return redirect()->route('producten.index')->with('orderSucces', 'Bedankt voor het bestellen.');
    }


    public function cancel()
    {
        // Empty Cart when succes payment
        foreach (Cart::content() as $item) {
            Cart::remove($item->rowId);
        }

        return redirect()->route('producten.index');
    }
}
