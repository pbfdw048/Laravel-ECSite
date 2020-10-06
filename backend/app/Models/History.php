<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class History extends Model
{
    protected $guarded = [
        'id'
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function addHistory($checkout_items)
    {
        foreach ($checkout_items as $checkout_item) {
            $this->Create([
                'stock_id' => $checkout_item->stock_id,
                'user_id' => $checkout_item->user_id,
                'cart_version' => $checkout_item->cart_version
            ]);
        }
    }

    public function showHistory()
    {
        $user_id = Auth::id();
        $data['my_carts'] = $this->with('stock')->where('user_id', $user_id)->orderBy('id', 'desc')->paginate(10);

        return $data;
    }

    public function showDetail($cart_version)
    {
        $user_id = Auth::id();
        $data['my_carts'] = $this->with('stock')->where([
            'user_id' => $user_id, 'cart_version' => $cart_version
        ])->orderBy('id', 'desc')->get();


        $data['count'] = 0;
        $data['sum'] = 0;
        foreach ($data['my_carts'] as $my_cart) {
            $data['sum'] += $my_cart->stock->fee;
            $data['count']++;
        }

        return $data;
    }
}
