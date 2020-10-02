<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

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
        $data['my_carts'] = $this->with('stock')->where('user_id', Auth::id())->get();

        $data['count'] = $this->where('user_id', Auth::id())->count();

        $data['sum'] = 0;
        foreach ($data['my_carts'] as $my_cart) {
            $data['sum'] += $my_cart->stock->fee;
        }
        return $data;
    }

    public function addCart($stock_id)
    {
        $cart_add_info = Cart::firstOrCreate(['stock_id' => $stock_id, 'user_id' => Auth::id()]);

        if ($cart_add_info->wasRecentlyCreated) {
            $message = 'カートに追加しました';
        } else {
            $message = 'カートに登録済みです';
        }

        return $message;
    }

    public function deleteCart($stock_id)
    {

        $delete = $this->where(['stock_id' => $stock_id, 'user_id' => Auth::id()])->delete();

        if ($delete > 0) {
            $message = 'カートから一つの商品を削除しました';
        } else {
            $message = '削除に失敗しました';
        }

        return $message;
    }
}
