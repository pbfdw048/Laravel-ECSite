<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

        $data['count'] = $this->where('user_id', $user_id)->count();

        $data['sum'] = 0;
        foreach ($data['my_carts'] as $my_cart) {
            $data['sum'] += $my_cart->stock->fee;
        }
        return $data;
    }

    public function addCart($stock_id)
    {
        $user_id = Auth::id();
        $cart_add_info = $this->firstOrCreate(['stock_id' => $stock_id, 'user_id' => $user_id]);

        if ($cart_add_info->wasRecentlyCreated) {
            $message = 'カートに追加しました';
        } else {
            $message = 'カートに登録済みです';
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
        $cart_version = $this->where('user_id', $user_id)->first()->cart_version;

        Schema::table('carts', function (Blueprint $table) use ($cart_version) {
            $table->integer('cart_version')->default($cart_version + 1)->change();
        });
        $this->where('user_id', $user_id)->delete();

        return $checkout_items;
    }
}
