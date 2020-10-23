<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Exception;

class Cart extends Model
{
    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function showCart()
    {
        $user_id = Auth::id();
        $data['my_carts'] = $this->with('stock')->where('user_id', $user_id)->get();

        $data['total_count'] = 0;
        $data['sum'] = 0;
        foreach ($data['my_carts'] as $my_cart) {
            $cart_count = $my_cart->cart_count;
            $data['total_count'] += $cart_count;
            $data['sum'] += $my_cart->stock->fee * $cart_count;
        }
        return $data;
    }

    public function addCart($stock_id, $cart_count)
    {
        $user_id = Auth::id();
        $cart_add_info = $this->firstOrCreate(['stock_id' => $stock_id, 'user_id' => $user_id], ['cart_count' => $cart_count]);

        if ($cart_add_info->wasRecentlyCreated) {
            $message = 'カートに追加しました';
        } else {
            $message = '商品は既にカートに登録済みです。数量はカート内にて変更できます。';
        }

        return $message;
    }

    public function updateCart($stock_id, $cart_count)
    {
        $user_id = Auth::id();
        $updateCart = Cart::where(['stock_id' => $stock_id, 'user_id' => $user_id])->first();
        $updateCart->cart_count = $cart_count;
        $update = $updateCart->save();


        if ($update > 0) {
            $message = '数量を変更しました';
        } else {
            $message = '数量の変更に失敗しました';
        }

        return $message;
    }

    public function deleteCart($stock_id)
    {
        $user_id = Auth::id();
        $delete = $this->where(['stock_id' => $stock_id, 'user_id' => $user_id])->delete();

        if ($delete > 0) {
            $message = 'カートから一つの商品を削除しました';
        } else {
            $message = '削除に失敗しました';
        }

        return $message;
    }

    public function checkoutCart()
    {
        $user_id = Auth::id();
        $checkout_items = $this->with('stock')->where('user_id', $user_id)->get();
        DB::transaction(function () use ($checkout_items) {
            foreach ($checkout_items as  $item) {
                $stock_count =  $item->stock->stock_count;
                $cart_count = $item->cart_count;
                $new_stock_count = $stock_count - $cart_count;
                if ($new_stock_count < 0) {
                    throw new Exception("在庫不足のため購入できませんでした。");
                }
                $item->stock->stock_count = $new_stock_count;
                $item->stock->save();
            }
        });

        $cart_version = $this->where('user_id', $user_id)->first()->cart_version;
        Schema::table('carts', function (Blueprint $table) use ($cart_version) {
            $table->integer('cart_version')->default($cart_version + 1)->change();
        });

        $this->where('user_id', $user_id)->delete();

        return $checkout_items;
    }
}
