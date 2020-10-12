<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Thanks;
use App\Models\History;
use Throwable;

class ShopController extends Controller
{
    public function index()
    {
        $stocks = Stock::paginate(6);
        return view('shop', compact('stocks'));
    }

    public function myCart(Cart $cart)
    {
        $data = $cart->showCart();
        return view('mycart', $data);
    }

    public function addMyCart(Request $request, Cart $cart)
    {
        $stock_id = $request->stock_id;
        $cart_count = $request->cart_count;
        $message = $cart->addCart($stock_id, $cart_count);

        $data = $cart->showCart();

        return view('mycart', $data)->with(compact('message'));
    }

    public function updateMyCart(Request $request, Cart $cart)
    {
        $stock_id = $request->stock_id;
        $cart_count = $request->cart_count;
        $message = $cart->updateCart($stock_id, $cart_count);

        $data = $cart->showCart();

        return view('mycart', $data)->with(compact('message'));
    }

    public function deleteCart(Request $request, Cart $cart)
    {
        $stock_id = $request->stock_id;
        $message = $cart->deleteCart($stock_id);

        $data = $cart->showCart();

        return view('mycart', $data)->with(compact('message'));
    }

    public function checkout(Request $request, Cart $cart, History $history)
    {
        $user = Auth::user();
        $mail_data['user'] = $user->name;

        $cart_data = $cart->showCart();
        $mail_data['total_count'] = $cart_data['total_count'];
        $mail_data['sum'] = $cart_data['sum'];



        try {
            $checkout_items = $cart->checkoutCart();
        } catch (Throwable $e) {
            return redirect('mycart')->with('msg_danger', '在庫不足のため購入できませんでした。');
        }

        $history->addHistory($checkout_items);
        $mail_data['checkout_items'] = $checkout_items;

        Mail::to($user->email)->send(new Thanks($mail_data));

        return view('checkout');
    }
}
